<?php
/**
 * Legt die Referenzen (Beitragstyp referenz) aus referenzen.json an oder aktualisiert sie.
 * Einzelreferenzen = ein Eintrag je Projekt, Sammelseiten = ein Eintrag je Gruppe mit den Projekten im JSON.
 * Cover werden einmalig von nextgen-podcast.de in die Mediathek geholt (Titel/Alt-Text neu, Dateiname ohne alten Markennamen).
 *
 * Aufruf auf dem Server: wp eval-file referenzen-import.php (referenzen.json liegt daneben).
 */

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$json = json_decode( file_get_contents( __DIR__ . '/referenzen.json' ), true );
if ( ! $json || empty( $json['projekte'] ) ) {
	exit( "referenzen.json fehlt oder ist leer\n" );
}

$gruppen = array(
	'interne-formate'       => array( 'Interne Podcasts für Mitarbeiter', 'Formate für Intranet, Change und Employer Branding – mit Freigabeprozess, auch mehrsprachig.' ),
	'immobilien'            => array( 'Podcasts für die Immobilienbranche', 'Wissensformate und Interviews für Makler, Finanzierer und Verbände.' ),
	'medizin'               => array( 'Podcasts für Medizin und Gesundheit', 'Fachwissen verständlich erklärt – für Praxen, Kliniken und Therapeuten.' ),
	'beratung-und-training' => array( 'Podcasts für Beratung und Training', 'Formate, mit denen Berater und Trainer ihre Expertise zeigen.' ),
	'schnitt-und-lieferung' => array( 'Schnitt und Lieferung für bestehende Podcasts', 'Unternehmen, die selbst aufnehmen und uns Schnitt, Ton und Veröffentlichung übergeben.' ),
	'business'              => array( 'Business-Podcasts', 'Interviews und Wissensformate für Unternehmer und Führungskräfte.' ),
);

/** Cover holen, sofern noch nicht vorhanden. Gibt Attachment-ID zurück. */
function lf_cover_import( ?string $url, string $slug, string $alt, int $parent = 0 ): int {
	if ( ! $url ) {
		return 0;
	}
	$existing = get_posts( array( 'post_type' => 'attachment', 'meta_key' => '_lf_quelle', 'meta_value' => $url, 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $existing ) {
		return (int) $existing[0];
	}
	$tmp = download_url( $url, 30 );
	if ( is_wp_error( $tmp ) ) {
		echo "  Cover-Fehler {$slug}: " . $tmp->get_error_message() . "\n";
		return 0;
	}
	$ext  = strtolower( pathinfo( wp_parse_url( $url, PHP_URL_PATH ), PATHINFO_EXTENSION ) ) ?: 'jpg';
	$file = array( 'name' => 'podcast-cover-' . $slug . '.' . $ext, 'tmp_name' => $tmp );
	$id   = media_handle_sideload( $file, $parent, $alt );
	if ( is_wp_error( $id ) ) {
		@unlink( $tmp );
		echo "  Cover-Fehler {$slug}: " . $id->get_error_message() . "\n";
		return 0;
	}
	update_post_meta( $id, '_wp_attachment_image_alt', $alt );
	update_post_meta( $id, '_lf_quelle', $url );
	return (int) $id;
}

function lf_ref_post( string $slug, string $title, array $data ): int {
	$existing = get_page_by_path( $slug, OBJECT, 'referenz' );
	$id       = wp_insert_post( array(
		'ID'          => $existing ? $existing->ID : 0,
		'post_type'   => 'referenz',
		'post_status' => 'publish',
		'post_name'   => $slug,
		'post_title'  => $title,
	), true );
	if ( is_wp_error( $id ) ) {
		echo "Fehler {$slug}: " . $id->get_error_message() . "\n";
		return 0;
	}
	update_post_meta( $id, 'lf_ref', wp_slash( wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) ) );
	return (int) $id;
}

$sammel = array();
foreach ( $json['projekte'] as $p ) {
	$alt = 'Cover des Podcasts „' . ( $p['podcast_name'] ?? $p['slug'] ) . '“' . ( ! empty( $p['kunde'] ) ? ' von ' . $p['kunde'] : '' );
	if ( 'einzel' === ( $p['gruppe'] ?? '' ) ) {
		$p['typ'] = 'einzel';
		$id       = lf_ref_post( $p['slug'], ( $p['podcast_name'] ?? $p['slug'] ) . ' – ' . ( $p['kunde'] ?? '' ), $p );
		if ( $id ) {
			$cover = lf_cover_import( $p['cover'] ?? null, $p['slug'], $alt, $id );
			if ( $cover ) {
				set_post_thumbnail( $id, $cover );
			}
			echo "einzel {$p['slug']}: {$id}" . ( $cover ? " (Cover {$cover})" : ' (ohne Cover)' ) . "\n";
		}
	} else {
		$p['cover_id']               = lf_cover_import( $p['cover'] ?? null, $p['slug'], $alt );
		$sammel[ $p['gruppe'] ][]    = $p;
	}
}

foreach ( $sammel as $gruppe => $projekte ) {
	$g    = $gruppen[ $gruppe ] ?? array( ucfirst( $gruppe ), '' );
	$data = array( 'typ' => 'sammlung', 'titel' => $g[0], 'intro' => $g[1], 'projekte' => $projekte );
	$id   = lf_ref_post( $gruppe, $g[0], $data );
	echo "sammlung {$gruppe}: {$id} (" . count( $projekte ) . " Projekte)\n";
}
flush_rewrite_rules( false );
