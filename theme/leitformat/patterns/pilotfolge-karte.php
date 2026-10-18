<?php
/**
 * Title: Pilotfolge im Detail
 * Slug: lf/pilotfolge-karte
 * Categories: leitformat
 */

echo lf_section( 'lf-pilotdetail',
	lf_group( 'lf-pilot lf-pilot--detail lf-pilot--bild',
		lf_group( 'lf-pilot__text',
			''
			. lf_h( 2, 'Eine fertige Folge, sechs Clips, ein Festpreis.' ) . "\n"
			. lf_list( array( 'Formatgespräch mit Wolfgang Patz', 'Aufnahme im Studio Berlin oder remote', 'Schnitt in Video und Audio', '6 Clips im Hochformat, untertitelt', 'Thumbnail', 'Shownotes' ), 'lf-checks' ) . "\n"
			. lf_p( 'Die Pilotfolge wird vollständig auf das Setup angerechnet. Beim Format Experte ist sie das Setup.' )
		) . "\n"
		. lf_group( 'lf-pilot__preis',
			lf_p( '2.900 €', 'lf-price lf-price--xl' ) . "\n"
			. lf_p( 'Festpreis netto, fertig in 14 Tagen', 'lf-pilot__hinweis' ) . "\n"
			. lf_buttons( 'lf-pilot__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) )
		)
	)
);
