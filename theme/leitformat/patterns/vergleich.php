<?php
/**
 * Title: Vergleichstabelle
 * Slug: lf/vergleich
 * Categories: leitformat
 */

echo lf_section( 'lf-vergleich',
	lf_h( 2, 'Was Sie bei uns bekommen – und anderswo nicht.' ) . "\n"
	. lf_table(
		array( '<span class="screen-reader-text">Leistung</span>', 'Leitformat', 'Audio-Agentur', 'Studio mieten', 'Freelancer', 'Inhouse' ),
		array(
			array( 'Video-Folge', 'Ja', 'Aufpreis', 'Nur Raum', 'Je nach Person', 'Selten' ),
			array( 'Clips in 48 Stunden', 'Ja', '–', '–', '–', '–' ),
			array( 'Konzept und Gäste', 'Ja', 'Ja', '–', '–', 'Eigene Zeit' ),
			// Vorschlag statt „39 % hören auf“: „Oft nach wenigen Folgen Schluss“ (RUECKFRAGEN 18.10.).
			array( 'Bei Folge 9 noch da', 'Ja, 12 Monate geplant', 'Je nach Vertrag', '–', 'Selten', '39 % hören auf' ),
			array( 'Reporting bis zur Anfrage', 'Ja', 'Downloads', '–', '–', '–' ),
		),
		'lf-table--vergleich'
	)
);
