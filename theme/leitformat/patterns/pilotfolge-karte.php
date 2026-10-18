<?php
/**
 * Title: Pilotfolge im Detail
 * Slug: lf/pilotfolge-karte
 * Categories: leitformat
 */

echo lf_section( 'lf-pilotdetail',
	lf_pilotkarte(
		'Eine fertige Folge, sechs Clips, ein Festpreis.',
		lf_list( array( 'Formatgespräch mit Wolfgang Patz', 'Aufnahme im Studio Berlin oder remote', 'Schnitt in Video und Audio', '6 Clips im Hochformat, untertitelt', 'Thumbnail', 'Shownotes' ), 'lf-checks' ) . "\n"
		. lf_p( 'Die Pilotfolge wird vollständig auf das Setup angerechnet. Beim Format Experte ist sie das Setup.' ),
		'Festpreis netto, fertig in 14 Tagen',
		2,
		'lf-pilot--detail'
	)
);
