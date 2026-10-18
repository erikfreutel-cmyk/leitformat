<?php
/**
 * Title: Pakete und Preise
 * Slug: lf/pakete
 * Categories: leitformat
 * Description: Pilotfolge als dunkle Karte, drei Formate, Vergleichssatz. Preise stehen nur hier und in inc/content.php.
 */

$lf_pilot = lf_group( 'lf-pilot lf-pilot--bild',
	lf_group( 'lf-pilot__text',
		''
		. lf_h( 3, 'Die Pilotfolge: eine komplette Video-Folge in 14 Tagen.', 'lf-pilot__title' ) . "\n"
		. lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes. Die Pilotfolge wird vollständig auf das Setup angerechnet.' )
	) . "\n"
	. lf_group( 'lf-pilot__preis',
		lf_p( '2.900 €', 'lf-price lf-price--xl' ) . "\n"
		. lf_p( 'Festpreis, alles inklusive', 'lf-pilot__hinweis' ) . "\n"
		. lf_buttons( 'lf-pilot__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) )
	)
);
// Anker #pilotfolge für den Hero-Button.
$lf_pilot = str_replace( '<div class="wp-block-group lf-pilot lf-pilot--bild">', '<div class="wp-block-group lf-pilot lf-pilot--bild" id="pilotfolge">', $lf_pilot );
echo lf_section( 'lf-pakete',
	lf_head( 'Pakete und Preise.', 'Alle Preise netto. Der Einstieg ist eine Folge zum Festpreis, ohne Jahresvertrag.' ) . "\n"
	. $lf_pilot . "\n"
	. lf_paket_karten(),
	'pakete'
);
