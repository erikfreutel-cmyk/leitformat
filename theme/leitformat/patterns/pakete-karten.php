<?php
/**
 * Title: Pakete (ohne Überschrift, für /preise/)
 * Slug: lf/pakete-karten
 * Categories: leitformat
 */

echo lf_section( 'lf-pakete lf-pakete--flat',
	lf_group( 'lf-pilot lf-pilot--bild',
	lf_group( 'lf-pilot__text',
		''
		. lf_h( 2, 'Die Pilotfolge: eine komplette Video-Folge in 14 Tagen.', 'lf-pilot__title' ) . "\n"
		. lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes. Die Pilotfolge wird vollständig auf das Setup angerechnet.' )
	) . "\n"
	. lf_group( 'lf-pilot__preis',
		lf_p( '2.900 €', 'lf-price lf-price--xl' ) . "\n"
		. lf_p( 'Festpreis, alles inklusive', 'lf-pilot__hinweis' ) . "\n"
		. lf_buttons( 'lf-pilot__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) )
	)
) . "\n" . lf_paket_karten(),
	'pakete'
);
