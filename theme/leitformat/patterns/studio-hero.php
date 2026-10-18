<?php
/**
 * Title: Studio: Hero
 * Slug: lf/studio-hero
 * Categories: leitformat
 */

echo lf_section( 'lf-hero lf-hero--bild',
	lf_group( 'lf-hero__text',
		lf_p( 'Podcast-Studio, Berlin-Lichtenberg', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Podcast-Studio in Berlin: drei Kameras, ein Ansprechpartner, ab 200 €.' ) . "\n"
		. lf_p( '4 × 5 m in Berlin-Lichtenberg, drei Sony-4K-Kameras, drei Shure SM7B, Platz für vier Personen. Immer ein Techniker im Raum, Rohdaten am selben Tag.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Studio anfragen', '#anfrage' ), lf_button( 'Preise ansehen', '#preise', 'lf-secondary' ) )
	) . "\n"
	. lf_group( 'lf-hero__media', lf_image( 'studio/studio-totale-1200.webp', 'Totale des Podcast-Studios in Berlin: drei Personen am Holztisch mit Mikrofonen vor dunklem Vorhang', 'lf-hero__bild', true ) )
);
