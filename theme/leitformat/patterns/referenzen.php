<?php
/**
 * Title: Referenzen
 * Slug: lf/referenzen
 * Categories: leitformat
 */

$lf_tiles = '';
foreach ( lf_referenzen() as $lf_slug => $lf_r ) {
	$lf_post   = get_page_by_path( $lf_slug, OBJECT, 'referenz' );
	$lf_cover  = $lf_post ? lf_ref_cover( $lf_post ) : '';
	$lf_tiles .= '<a class="lf-ref lf-ref--bild" href="/referenzen/' . esc_attr( $lf_slug ) . '/">' . $lf_cover . '<span class="lf-ref__text"><span class="lf-ref__name">' . lf_e( $lf_r[0] ) . '</span><span class="lf-ref__sub">' . lf_e( $lf_r[1] ) . '</span></span></a>';
}
echo lf_section( 'lf-referenzen',
	lf_head( '85 Podcast-Projekte. Acht davon im Detail.', 'Interne Podcasts, Employer Branding, Wissensformate und Video-Podcasts – von der ersten Folge bis zur festen Sendung.' ) . "\n"
	. "<!-- wp:html -->\n<div class=\"lf-ref-grid\">" . $lf_tiles . "</div>\n<!-- /wp:html -->\n"
	. lf_testimonial_gegenbauer(),
	'referenz'
);
