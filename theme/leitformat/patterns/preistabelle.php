<?php
/**
 * Title: Studio-Preistabelle
 * Slug: lf/preistabelle
 * Categories: leitformat
 * Description: Studio-Preise mit Storno und Satz zur Postproduktion. Abschnitt-ID preise.
 */

echo lf_section( 'lf-studiopreise',
	lf_head( 'Studio ab 200 € je Stunde.', 'Alle Preise netto zuzüglich Umsatzsteuer. Techniker und Rohdaten inklusive.' ) . "\n"
	. lf_table(
		array( 'Buchung', 'Dauer', 'Preis' ),
		array(
			array( 'Einzelstunde', '1 Stunde', '200 €' ),
			array( 'Session', 'bis 120 Minuten', '300 €' ),
			array( 'Halbtag', 'bis 4 Stunden', '400 €' ),
			array( 'Ganztag', 'bis 8 Stunden', '600 €' ),
		),
		'lf-table--preise'
	) . "\n"
	. lf_p( 'Storno: kostenfrei bis 48 Stunden vorher, bis 24 Stunden vorher 50 %, danach 100 %.', 'lf-note' ) . "\n"
	. lf_p( 'Schnitt, Clips und Veröffentlichung buchen Sie dazu – ab 450 € je Video-Folge – oder als <a href="/preise/">Paket</a>.' ),
	'preise'
);
