<?php
/**
 * Title: Anfahrt mit Karte
 * Slug: lf/anfahrt
 * Categories: leitformat
 */

echo lf_section( 'lf-anfahrt',
	lf_group( 'lf-anfahrt__text',
		lf_h( 2, 'Wenige Minuten von der Ringbahn.' ) . "\n"
		. lf_p( 'Franz-Jacob-Straße 2c, 10369 Berlin-Lichtenberg. Tram und Bus halten an der Franz-Jacob-Straße, die Ringbahnhöfe Storkower Straße und Landsberger Allee sind wenige Minuten entfernt.' ) . "\n"
		. lf_kontaktdaten()
	) . "\n"
	. lf_karte()
);
