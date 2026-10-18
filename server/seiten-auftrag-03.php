<?php
/**
 * Legt die Seiten aus AUFTRAG-03 an oder aktualisiert sie.
 * Aufruf auf dem Server: wp eval-file seiten-auftrag-03.php (inhalte/ liegt daneben).
 * Pattern-Seiten bestehen nur aus wp:pattern-Verweisen; Rechtsseiten aus inhalte/*.html (Quelle: inhalte/*.md).
 */
$dir   = __DIR__ . '/inhalte/';
$pages = array(
	'kontakt'     => array( 'Kontakt', 'patterns', array( 'kontakt' ) ),
	'impressum'   => array( 'Impressum', 'datei', 'impressum.html' ),
	'datenschutz' => array( 'Datenschutz', 'datei', 'datenschutz.html' ),
	'agb'         => array( 'AGB', 'datei', 'agb.html' ),
);
$nur = isset( $args[0] ) ? explode( ',', $args[0] ) : array_keys( $pages );
foreach ( $pages as $slug => $p ) {
	if ( ! in_array( $slug, $nur, true ) ) {
		continue;
	}
	$content = 'patterns' === $p[1]
		? implode( "\n\n", array_map( fn( $s ) => '<!-- wp:pattern {"slug":"lf/' . $s . '"} /-->', $p[2] ) )
		: file_get_contents( $dir . $p[2] );
	$existing = get_page_by_path( $slug );
	$id       = wp_insert_post( array( 'ID' => $existing ? $existing->ID : 0, 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $p[0], 'post_name' => $slug, 'post_content' => $content ), true );
	echo $slug . ': ' . ( is_wp_error( $id ) ? $id->get_error_message() : $id ) . "\n";
}
