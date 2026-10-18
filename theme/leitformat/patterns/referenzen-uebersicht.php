<?php
/**
 * Title: Referenzen-Übersicht mit Filter
 * Slug: lf/referenzen-uebersicht
 * Categories: leitformat
 * Description: Kacheln aus dem Beitragstyp referenz (Einzelseiten zuerst in fester Reihenfolge, dann Projekte der Sammelseiten). Filter per assets/js/filter.js.
 */

$lf_reihenfolge = array( 'gegenbauer', 'mueller-gruppe', 'thyssenkrupp', 'return-on-innovation', 'myra-minds', 'klimabauern', 'abgeordnetenhaus-berlin', 'wikimove', 'pluscast', 'besiegelt', 'johanniter' );
$lf_posts       = get_posts( array( 'post_type' => 'referenz', 'numberposts' => -1, 'post_status' => 'publish' ) );
$lf_einzel      = array();
$lf_sammel      = array();
foreach ( $lf_posts as $lf_p ) {
	$lf_d = lf_ref( $lf_p );
	if ( 'sammlung' === ( $lf_d['typ'] ?? '' ) ) {
		$lf_sammel[] = array( $lf_p, $lf_d );
	} else {
		$lf_einzel[ $lf_p->post_name ] = array( $lf_p, $lf_d );
	}
}
uksort( $lf_einzel, fn( $a, $b ) => ( array_search( $a, $lf_reihenfolge, true ) ?: 99 ) <=> ( array_search( $b, $lf_reihenfolge, true ) ?: 99 ) );

$lf_tiles = '';
$lf_n     = 0;
foreach ( $lf_einzel as $lf_e ) {
	$lf_tiles .= lf_ref_kachel( $lf_e[0], $lf_e[1] );
	$lf_n++;
}
foreach ( $lf_sammel as $lf_s ) {
	foreach ( $lf_s[1]['projekte'] ?? array() as $lf_pr ) {
		$lf_kat    = implode( ',', array_map( 'sanitize_title', $lf_pr['kategorien'] ?? array() ) );
		$lf_cover  = ! empty( $lf_pr['cover_id'] ) ? wp_get_attachment_image( (int) $lf_pr['cover_id'], 'lf-kachel', false, array( 'class' => 'lf-ref__cover', 'loading' => 'lazy', 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ) : '';
		$lf_tiles .= '<a class="lf-ref lf-ref--bild" href="' . esc_url( get_permalink( $lf_s[0] ) . '#' . $lf_pr['slug'] ) . '" data-kat="' . esc_attr( $lf_kat ) . '">' . $lf_cover
			. '<span class="lf-ref__text"><span class="lf-ref__name">' . esc_html( $lf_pr['podcast_name'] ?? '' ) . '</span><span class="lf-ref__sub">' . esc_html( $lf_pr['kunde'] ?? '' ) . '</span>'
			. ( ! empty( $lf_pr['kurz'] ) ? '<span class="lf-ref__kurz">' . esc_html( $lf_pr['kurz'] ) . '</span>' : '' ) . '</span></a>';
		$lf_n++;
	}
}

$lf_filter = array( 'alle' => 'Alle', 'video-podcast' => 'Video-Podcast', 'interner-podcast' => 'Interner Podcast', 'employer-branding' => 'Employer Branding', 'interview' => 'Interview', 'oeffentliche-hand' => 'Öffentliche Hand' );
$lf_buttons = '';
foreach ( $lf_filter as $lf_k => $lf_l ) {
	$lf_buttons .= '<button type="button" data-filter="' . esc_attr( $lf_k ) . '" aria-pressed="' . ( 'alle' === $lf_k ? 'true' : 'false' ) . '">' . esc_html( $lf_l ) . '</button>';
}
$lf_sammel_links = '';
foreach ( $lf_sammel as $lf_s ) {
	$lf_sammel_links .= '<li><a href="' . esc_url( get_permalink( $lf_s[0] ) ) . '">' . esc_html( $lf_s[1]['titel'] ?? $lf_s[0]->post_title ) . '</a></li>';
}

echo lf_section( 'lf-intro lf-ref-uebersicht',
	''
	. lf_h( 1, '85 Podcast-Projekte.' ) . "\n"
	. lf_p( 'Interne Podcasts, Employer Branding, Wissensformate und Video-Podcasts – von der ersten Folge bis zur festen Sendung. Hier eine Auswahl mit Folgen zum Anhören und Ansehen.', 'lf-lead' )
)
. "\n\n" . lf_section( 'lf-ref-liste',
	"<!-- wp:html -->\n<div class=\"lf-filter\" data-lf-filter role=\"group\" aria-label=\"Referenzen filtern\">" . $lf_buttons . '<span class="lf-filter__status" data-lf-filter-status aria-live="polite">' . $lf_n . " Projekte</span></div>\n<!-- /wp:html -->\n"
	. "<!-- wp:html -->\n<div class=\"lf-ref-grid lf-ref-grid--alle\">" . $lf_tiles . "</div>\n<!-- /wp:html -->\n"
	. ( $lf_sammel_links ? "<!-- wp:html -->\n<nav class=\"lf-sammel-nav\" aria-label=\"Referenzen nach Bereich\"><p><strong>Nach Bereich</strong></p><ul>" . $lf_sammel_links . "</ul></nav>\n<!-- /wp:html -->" : '' )
)
. "\n\n" . lf_testimonial_gegenbauer_section()
. "\n\n" . lf_anfrage( 'Ihr Format als nächste Referenz.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.' );
