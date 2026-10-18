<?php
/**
 * Title: Hero Pilotfolge
 * Slug: lf/hero-pilotfolge
 * Categories: leitformat
 */

echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		lf_p( 'Pilotfolge zum Festpreis', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Ihre erste Video-Folge in 14 Tagen. Festpreis 2.900 €.' ) . "\n"
		. lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) ) . "\n"
		. lf_group( 'lf-stats',
		lf_group( 'lf-stat', lf_p( '85+', 'lf-stat__value' ) . lf_p( 'Podcast-Projekte', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( '1.250+', 'lf-stat__value' ) . lf_p( 'produzierte Episoden', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( '33', 'lf-stat__value' ) . lf_p( 'Google-Bewertungen', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( 'Berlin', 'lf-stat__value' ) . lf_p( 'eigenes Studio', 'lf-stat__label' ) )
	)
	) . "\n"
	. lf_group( 'lf-hero__media', lf_video( 'Wolfgang Patz zeigt eine Kundenfolge · 45 Sekunden', 'Video abspielen' ) )
);
