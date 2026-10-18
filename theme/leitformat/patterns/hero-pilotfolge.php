<?php
/**
 * Title: Hero Pilotfolge
 * Slug: lf/hero-pilotfolge
 * Categories: leitformat
 * Description: Bild oben über die Containerbreite (16:9, max. 520 px hoch), darunter Headline, Preiszeile, Unterzeile, Button, Zahlen (DESIGN-01b).
 */

echo lf_section( 'lf-hero lf-hero--oben',
	lf_group( 'lf-hero__media', lf_image( 'studio/studio-totale-1200.webp', 'Video-Podcast-Aufnahme im Leitformat-Studio in Berlin: drei Personen am Holztisch, drei Kameras', 'lf-hero__bild', true, '', LF_SIZES_VOLL ) ) . "\n"
	. lf_group( 'lf-hero__text',
		lf_h( 1, 'Ihre erste Video-Folge in 14 Tagen.' ) . "\n"
		. lf_p( 'Festpreis 2.900 €, alles inklusive.', 'lf-hero__preis' ) . "\n"
		. lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) ) . "\n"
		. lf_group( 'lf-stats',
			lf_group( 'lf-stat', lf_p( '85+', 'lf-stat__value' ) . lf_p( 'Podcast-Projekte', 'lf-stat__label' ) )
			. lf_group( 'lf-stat', lf_p( '1.250+', 'lf-stat__value' ) . lf_p( 'produzierte Episoden', 'lf-stat__label' ) )
			. lf_group( 'lf-stat', lf_p( '33', 'lf-stat__value' ) . lf_p( 'Google-Bewertungen', 'lf-stat__label' ) )
			. lf_group( 'lf-stat', lf_p( 'Berlin', 'lf-stat__value' ) . lf_p( 'eigenes Studio', 'lf-stat__label' ) )
		)
	)
);
