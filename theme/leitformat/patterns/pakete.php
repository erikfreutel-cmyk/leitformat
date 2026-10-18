<?php
/**
 * Title: Pakete und Preise
 * Slug: lf/pakete
 * Categories: leitformat
 * Description: Pilotfolge als breite Karte (Text links, Studio-Foto rechts), drei Formate, Vergleichssatz. Preise stehen nur hier und in inc/content.php.
 */

$lf_pilot = lf_pilotkarte( 'Die Pilotfolge: eine komplette Video-Folge in 14 Tagen.', lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes. Die Pilotfolge wird vollständig auf das Setup angerechnet.' ), 'Festpreis, alles inklusive' );
// Anker #pilotfolge für den Hero-Button.
$lf_pilot = preg_replace( '/<div class="wp-block-group lf-pilot lf-pilot--foto">/', '<div class="wp-block-group lf-pilot lf-pilot--foto" id="pilotfolge">', $lf_pilot, 1 );
echo lf_section( 'lf-pakete',
	lf_head( 'Pakete und Preise.', 'Alle Preise netto. Der Einstieg ist eine Folge zum Festpreis, ohne Jahresvertrag.' ) . "\n"
	. $lf_pilot . "\n"
	. lf_paket_karten(),
	'pakete'
);
