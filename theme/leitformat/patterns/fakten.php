<?php
/**
 * Title: Fakten (zweispaltige Liste)
 * Slug: lf/fakten
 * Categories: leitformat
 */

echo lf_section( 'lf-section--white lf-fakten',
	lf_head( 'Eingerichtet, bevor Sie ankommen.', 'Technik, Raum und Anfahrt auf einen Blick.' ) . "\n"
	. lf_group( 'lf-fakten__grid',
		lf_group( 'lf-fakten__spalte', lf_h( 3, 'Technik und Raum', 'lf-fakten__titel' ) . "\n" . lf_list( array(
			'Raum 4 × 5 m, bis 4 Personen vor der Kamera',
			'3 × Sony 4K, 3 × Shure SM7B, 2 × Amaran-Licht',
			'Getrennte Tonspur je Person',
			'Remote-Gäste zuschaltbar',
			'Regie im Studio, ein Techniker die ganze Aufnahme',
			'Set und Hintergrund mit Ihrem Branding',
		), 'lf-checks' ) ) . "\n"
		. lf_group( 'lf-fakten__spalte', lf_h( 3, 'Termine und Anfahrt', 'lf-fakten__titel' ) . "\n" . lf_list( array(
			'Montag bis Freitag 8 bis 18 Uhr',
			'Franz-Jacob-Straße 2c, 10369 Berlin',
			'Tram und Bus: Haltestelle Franz-Jacob-Straße',
			'Ringbahn: Storkower Straße und Landsberger Allee, wenige Minuten',
			'Kostenfreie Parkplätze an der Franz-Jacob- und Storkower Straße',
			'Tiefgarage hinter dem Edeka – Kosten übernehmen wir',
		), 'lf-checks' ) )
	)
);
