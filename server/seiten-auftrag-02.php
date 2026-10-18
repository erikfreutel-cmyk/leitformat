<?php
// Legt /pilotfolge/ und /preise/ an (bzw. aktualisiert sie). Inhalt = Pattern-Verweise.
$pages = array(
	'pilotfolge' => array( 'Pilotfolge', array( 'hero-pilotfolge', 'logoleiste', 'pilotfolge-karte', 'ablauf-pilotfolge', 'testimonial', 'kundenstimmen', 'faq-pilotfolge', 'anfrage-pilotfolge' ) ),
	'preise'     => array( 'Preise', array( 'preise-intro', 'pakete-karten', 'zusatzmodule', 'studio-preise', 'audit', 'marktvergleich', 'testimonial', 'faq-preise', 'anfrage' ) ),
);
foreach ( $pages as $slug => $p ) {
	$content = implode( "\n\n", array_map( fn( $s ) => '<!-- wp:pattern {"slug":"lf/' . $s . '"} /-->', $p[1] ) );
	$existing = get_page_by_path( $slug );
	$id = wp_insert_post( array( 'ID' => $existing ? $existing->ID : 0, 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $p[0], 'post_name' => $slug, 'post_content' => $content ) );
	echo "$slug: $id\n";
}
