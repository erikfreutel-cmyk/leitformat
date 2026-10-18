<?php
/**
 * Title: Studio-Preise
 * Slug: lf/studio-preise
 * Categories: leitformat
 */

echo lf_section( 'lf-section--white lf-studiopreise',
	lf_head( 'Studio Berlin ab 200 € je Stunde.', '4 × 5 m, 3 Kameras, bis 4 Personen. Alle Preise netto.' ) . "\n"
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
	. lf_p( '<a href="/podcast-studio-berlin/">Studio Berlin ansehen</a>', 'lf-link' )
);
