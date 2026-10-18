<?php
/**
 * Anfrageformular (AUFTRAG-04): Endpoint /anfrage-senden/, Mail per SMTP, Webhook ins Lead-Sheet,
 * Redirect auf /danke/ mit Einmal-Token (Conversion zählt genau einmal, erweiterte Conversions gehasht).
 *
 * Konstanten in wp-config.php (nicht im Repo):
 *   LF_MAIL_TO, LF_SMTP_HOST, LF_SMTP_PORT, LF_SMTP_USER, LF_SMTP_PASS, LF_MAIL_FROM,
 *   LF_LEAD_WEBHOOK, LF_LEAD_SECRET, LF_CALENDLY_URL
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

const LF_VORHABEN = array(
	'pilotfolge'  => 'Pilotfolge',
	'format'      => 'Ein Format für unser Unternehmen',
	'konzern'     => 'Konzernprojekt',
	'studio'      => 'Studio buchen',
	'unklar'      => 'Noch unklar',
);
const LF_ATTR_FELDER = array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid' );

function lf_cfg( string $name, string $default = '' ): string {
	return defined( $name ) ? (string) constant( $name ) : $default;
}

/** Signierter Zeitstempel: Formular muss mindestens 3 Sekunden offen gewesen sein. */
function lf_form_ts(): string {
	$t = (string) time();
	return $t . '.' . substr( hash_hmac( 'sha256', $t, wp_salt( 'nonce' ) ), 0, 16 );
}

function lf_form_ts_ok( string $ts ): bool {
	[ $t, $sig ] = array_pad( explode( '.', $ts, 2 ), 2, '' );
	if ( ! ctype_digit( $t ) || ! hash_equals( substr( hash_hmac( 'sha256', $t, wp_salt( 'nonce' ) ), 0, 16 ), $sig ) ) {
		return false;
	}
	$alter = time() - (int) $t;
	return $alter >= 3 && $alter <= DAY_IN_SECONDS;
}

/** Zustand eines zurückgewiesenen Formulars (Werte + Fehler), über ?lf_form=<token>. */
function lf_form_state(): array {
	$token = isset( $_GET['lf_form'] ) ? sanitize_key( wp_unslash( $_GET['lf_form'] ) ) : '';
	if ( ! $token ) {
		return array( 'werte' => array(), 'fehler' => array() );
	}
	$state = get_transient( 'lf_form_' . $token );
	return is_array( $state ) ? $state : array( 'werte' => array(), 'fehler' => array() );
}

/** E-Mail für Google erweiterte Conversions normalisieren und hashen. */
function lf_email_hash( string $email ): string {
	$email = strtolower( trim( $email ) );
	[ $local, $domain ] = array_pad( explode( '@', $email, 2 ), 2, '' );
	if ( in_array( $domain, array( 'gmail.com', 'googlemail.com' ), true ) ) {
		$local = str_replace( '.', '', $local );
	}
	return hash( 'sha256', $local . '@' . $domain );
}

/** Rücksprung mit Fehlern: zurück auf die Seite, Werte und Fehler für 10 Minuten. */
function lf_form_zurueck( array $werte, array $fehler ): void {
	$token = strtolower( wp_generate_password( 12, false ) );
	unset( $werte['email_hash'] );
	set_transient( 'lf_form_' . $token, array( 'werte' => $werte, 'fehler' => $fehler ), 10 * MINUTE_IN_SECONDS );
	$ziel = wp_validate_redirect( $werte['seite'] ?? '', home_url( '/kontakt/' ) );
	$ziel = remove_query_arg( 'lf_form', strtok( $ziel, '#' ) );
	wp_safe_redirect( add_query_arg( 'lf_form', $token, $ziel ) . '#anfrage', 303 );
	exit;
}

add_action( 'template_redirect', function () {
	$pfad = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( 'anfrage-senden' !== $pfad ) {
		return;
	}
	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) ) {
		wp_safe_redirect( home_url( '/kontakt/' ), 302 );
		exit;
	}
	nocache_headers();

	$p     = wp_unslash( $_POST );
	$werte = array(
		'name'      => sanitize_text_field( $p['name'] ?? '' ),
		'firma'     => sanitize_text_field( $p['firma'] ?? '' ),
		'email'     => sanitize_email( $p['email'] ?? '' ),
		'telefon'   => sanitize_text_field( $p['telefon'] ?? '' ),
		'vorhaben'  => sanitize_key( $p['vorhaben'] ?? '' ),
		'nachricht' => sanitize_textarea_field( $p['nachricht'] ?? '' ),
		'seite'     => esc_url_raw( $p['seite'] ?? '' ),
	);
	foreach ( LF_ATTR_FELDER as $f ) {
		$werte[ $f ] = sanitize_text_field( $p[ $f ] ?? '' );
	}

	// Bots: Honeypot gefüllt, Zeitstempel fehlt/zu schnell, Nonce ungültig → still verwerfen (Danke ohne Conversion).
	$bot = ! empty( $p['website'] ) || ! lf_form_ts_ok( (string) ( $p['ts'] ?? '' ) ) || ! wp_verify_nonce( (string) ( $p['_lf'] ?? '' ), 'lf_anfrage' );
	// Begrenzung: 5 Anfragen je IP in 10 Minuten.
	$ip_key = 'lf_rate_' . md5( (string) ( $_SERVER['REMOTE_ADDR'] ?? '' ) );
	$anzahl = (int) get_transient( $ip_key );
	if ( $bot || $anzahl >= 5 ) {
		wp_safe_redirect( home_url( '/danke/' ), 303 );
		exit;
	}

	$fehler = array();
	if ( '' === $werte['firma'] ) {
		$fehler['firma'] = 'Bitte nennen Sie Ihr Unternehmen.';
	}
	if ( '' === $werte['email'] || ! is_email( $werte['email'] ) ) {
		$fehler['email'] = 'Bitte geben Sie eine gültige E-Mail-Adresse an.';
	}
	if ( ! isset( LF_VORHABEN[ $werte['vorhaben'] ] ) ) {
		$werte['vorhaben'] = 'unklar';
	}
	if ( $fehler ) {
		lf_form_zurueck( $werte, $fehler );
	}
	set_transient( $ip_key, $anzahl + 1, 10 * MINUTE_IN_SECONDS );

	$vorhaben = LF_VORHABEN[ $werte['vorhaben'] ];
	$datum    = wp_date( 'Y-m-d H:i:s' );

	// 1. Mail an Wolfgang.
	$zeilen = array(
		'Vorhaben'  => $vorhaben,
		'Firma'     => $werte['firma'],
		'Name'      => $werte['name'],
		'E-Mail'    => $werte['email'],
		'Telefon'   => $werte['telefon'],
		'Nachricht' => $werte['nachricht'],
		'Seite'     => $werte['seite'],
		'Datum'     => $datum,
	);
	foreach ( LF_ATTR_FELDER as $f ) {
		if ( $werte[ $f ] ) {
			$zeilen[ $f ] = $werte[ $f ];
		}
	}
	$text = '';
	foreach ( $zeilen as $k => $v ) {
		if ( '' !== $v ) {
			$text .= str_pad( $k . ':', 12 ) . $v . "\n";
		}
	}
	$from   = lf_cfg( 'LF_MAIL_FROM', 'noreply@leitformat.de' );
	$header = array(
		'From: Leitformat <' . $from . '>',
		'Reply-To: ' . ( $werte['name'] ? $werte['name'] . ' ' : '' ) . '<' . $werte['email'] . '>',
	);
	$mail_ok = wp_mail( lf_cfg( 'LF_MAIL_TO', 'kontakt@leitformat.de' ), 'Anfrage: ' . $vorhaben . ' – ' . $werte['firma'], $text, $header );

	// 2. Webhook ins Lead-Sheet.
	$hook_ok = true;
	if ( lf_cfg( 'LF_LEAD_WEBHOOK' ) ) {
		$payload = array_merge(
			array( 'secret' => lf_cfg( 'LF_LEAD_SECRET' ), 'datum' => $datum, 'vorhaben' => $vorhaben ),
			array_intersect_key( $werte, array_flip( array_merge( array( 'seite', 'firma', 'name', 'email', 'telefon', 'nachricht' ), LF_ATTR_FELDER ) ) )
		);
		$res     = wp_remote_post( lf_cfg( 'LF_LEAD_WEBHOOK' ), array(
			'timeout'     => 8,
			'redirection' => 5, // Apps Script antwortet mit 302 auf googleusercontent.com.
			'headers'     => array( 'Content-Type' => 'application/json' ),
			'body'        => wp_json_encode( $payload ),
		) );
		$hook_ok = ! is_wp_error( $res ) && wp_remote_retrieve_response_code( $res ) < 400;
	}
	if ( ! $mail_ok || ! $hook_ok ) {
		error_log( '[leitformat] Anfrage ' . $datum . ': Mail ' . ( $mail_ok ? 'ok' : 'FEHLER' ) . ', Webhook ' . ( $hook_ok ? 'ok' : 'FEHLER' ) . ' – ' . $werte['firma'] );
	}
	if ( ! $mail_ok && ! $hook_ok ) {
		// Weder Mail noch Sheet: nicht als Erfolg zählen, Nutzer bekommt Hinweis mit Telefonnummer.
		lf_form_zurueck( $werte, array( 'versand' => 'Ihre Anfrage konnte gerade nicht gesendet werden. Bitte rufen Sie uns an: ' . LF_TELEFON . '.' ) );
	}

	// 3. Danke-Seite mit Einmal-Token (Conversion, erweiterte Conversions, Calendly-Vorbefüllung).
	$token = strtolower( wp_generate_password( 16, false ) );
	set_transient( 'lf_danke_' . $token, array(
		'email_hash' => lf_email_hash( $werte['email'] ),
		'name'       => $werte['name'],
		'email'      => $werte['email'],
		'vorhaben'   => $werte['vorhaben'],
	), 30 * MINUTE_IN_SECONDS );
	wp_safe_redirect( add_query_arg( array( 'src' => 'form', 'v' => $werte['vorhaben'], 't' => $token ), home_url( '/danke/' ) ), 303 );
	exit;
}, 1 );

/** Danke-Daten für diesen Aufruf (einmalig). */
function lf_danke_daten(): array {
	static $daten = null;
	if ( null !== $daten ) {
		return $daten;
	}
	$token = isset( $_GET['t'] ) ? sanitize_key( wp_unslash( $_GET['t'] ) ) : '';
	$daten = $token ? get_transient( 'lf_danke_' . $token ) : false;
	$daten = is_array( $daten ) ? $daten : array();
	if ( $daten && empty( $daten['gezaehlt'] ) ) {
		// Beim ersten Aufruf zählen; Name/E-Mail bleiben 30 Minuten für die Calendly-Vorbefüllung, der Hash nicht.
		set_transient( 'lf_danke_' . $token, array_merge( $daten, array( 'gezaehlt' => true, 'email_hash' => '' ) ), 30 * MINUTE_IN_SECONDS );
		$daten['erstmals'] = true;
	}
	return $daten;
}

// dataLayer auf /danke/: vor GTM. lf_once=true nur beim ersten Aufruf nach einem echten Formularversand.
add_action( 'wp_head', function () {
	if ( ! is_page( 'danke' ) ) {
		return;
	}
	nocache_headers();
	$d    = lf_danke_daten();
	$push = array( 'event' => 'lf_danke', 'lf_once' => ! empty( $d['erstmals'] ) );
	if ( ! empty( $d['erstmals'] ) ) {
		$push['lf_vorhaben'] = $d['vorhaben'] ?? '';
		if ( ! empty( $d['email_hash'] ) ) {
			$push['user_data'] = array( 'sha256_email_address' => $d['email_hash'] );
		}
	}
	echo '<script>window.dataLayer=window.dataLayer||[];dataLayer.push(' . wp_json_encode( $push ) . ");</script>\n";
}, 1 );

// SMTP über das KAS-Postfach, wenn konfiguriert.
add_action( 'phpmailer_init', function ( $m ) {
	if ( ! lf_cfg( 'LF_SMTP_HOST' ) ) {
		return;
	}
	$port         = (int) lf_cfg( 'LF_SMTP_PORT', '587' );
	$m->isSMTP();
	$m->Host       = lf_cfg( 'LF_SMTP_HOST' );
	$m->Port       = $port;
	$m->SMTPAuth   = true;
	$m->SMTPSecure = 465 === $port ? 'ssl' : 'tls';
	$m->Username   = lf_cfg( 'LF_SMTP_USER' );
	$m->Password   = lf_cfg( 'LF_SMTP_PASS' );
	$m->CharSet    = 'UTF-8';
} );
