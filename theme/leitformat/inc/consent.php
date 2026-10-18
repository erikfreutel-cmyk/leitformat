<?php
/**
 * Consent Mode v2 mit eigenem Banner (AUFTRAG-04) und Calendly-Einbettung.
 * Cookie lf_consent = all | necessary (6 Monate). Standard: alles abgelehnt, vor GTM gesetzt.
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

// Consent-Standard vor allem anderen im <head> (GTM folgt mit Priorität 2).
add_action( 'wp_head', function () {
	?>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('consent','default',{ad_storage:'denied',analytics_storage:'denied',ad_user_data:'denied',ad_personalization:'denied',wait_for_update:500});gtag('set','ads_data_redaction',true);gtag('set','url_passthrough',true);if(/(?:^|; )lf_consent=all(?:;|$)/.test(document.cookie)){gtag('consent','update',{ad_storage:'granted',analytics_storage:'granted',ad_user_data:'granted',ad_personalization:'granted'});}</script>
	<?php
}, 0 );

add_action( 'wp_enqueue_scripts', function () {
	foreach ( array( 'consent', 'attribution', 'calendly' ) as $js ) {
		wp_enqueue_script( 'lf-' . $js, get_theme_file_uri( "assets/js/{$js}.js" ), array(), LF_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
	}
} );

// Banner (nur sichtbar, solange keine Auswahl gespeichert ist; consent.js entscheidet).
add_action( 'wp_footer', function () {
	?>
<div class="lf-consent" data-lf-consent role="dialog" aria-modal="false" aria-labelledby="lf-consent-titel" hidden>
	<p class="lf-consent__titel" id="lf-consent-titel"><strong>Cookies und Messung</strong></p>
	<p class="lf-consent__text">Wir messen mit Google Analytics und Google Ads, welche Anzeigen und Seiten zu Anfragen führen. Das geht nur mit Ihrer Einwilligung. Videos und Kalender laden erst, wenn Sie sie anklicken. <a href="/datenschutz/">Datenschutzerklärung</a></p>
	<div class="lf-consent__buttons">
		<button type="button" class="lf-btn lf-btn--dark" data-lf-consent-wahl="all">Alle akzeptieren</button>
		<button type="button" class="lf-btn lf-btn--dark" data-lf-consent-wahl="necessary">Nur notwendige</button>
	</div>
</div>
	<?php
}, 5 );

/**
 * Calendly-Container (#termin). Lädt per Klick oder nach Einwilligung, nie vorher.
 * Ohne LF_CALENDLY_URL: Hinweis auf Formular und Telefon (kein sichtbarer Platzhalter).
 */
function lf_termin_embed( string $seite = '' ): string {
	$url = lf_cfg( 'LF_CALENDLY_URL' );
	if ( ! $url ) {
		return "<!-- wp:html -->\n<div class=\"lf-termin__embed lf-termin__embed--ohne\" id=\"termin\"><p>Schreiben Sie uns Ihren Wunschtermin über das Formular – oder rufen Sie an: <a href=\"" . esc_attr( LF_TELEFON_LINK ) . '"><strong>' . esc_html( LF_TELEFON ) . "</strong></a>.</p></div>\n<!-- /wp:html -->";
	}
	$seite = $seite ?: ( is_front_page() ? 'startseite' : (string) get_post_field( 'post_name', get_queried_object_id() ) );
	$args  = array(
		'embed_domain'       => wp_parse_url( home_url(), PHP_URL_HOST ),
		'embed_type'         => 'Inline',
		'hide_gdpr_banner'   => '1',
		'utm_source'         => 'leitformat',
		'utm_medium'         => 'website',
		'utm_campaign'       => $seite,
	);
	if ( is_page( 'danke' ) && function_exists( 'lf_danke_daten' ) ) {
		$d = lf_danke_daten();
		if ( ! empty( $d['email'] ) ) {
			$args['name']  = $d['name'] ?? '';
			$args['email'] = $d['email'];
		}
	}
	$src = add_query_arg( array_map( 'rawurlencode', array_filter( $args ) ), $url );
	return "<!-- wp:html -->\n<div class=\"lf-termin__embed\" id=\"termin\" data-lf-calendly=\"" . esc_url( $src ) . '"><button type="button" class="lf-btn lf-btn--primary" data-lf-calendly-laden>Termin wählen</button><p class="lf-video__consent">Beim Laden zeigt Calendly den Kalender an; dabei werden Daten an Calendly übertragen.</p></div>' . "\n<!-- /wp:html -->";
}
