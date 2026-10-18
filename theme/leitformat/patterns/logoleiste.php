<?php
/**
 * Title: Logoleiste
 * Slug: lf/logoleiste
 * Categories: leitformat
 * Description: Wortmarken in Grau, bis die Logo-SVGs da sind (AUFTRAG-05).
 */

$lf_items = array_map( 'lf_e', lf_logos() );
echo lf_section( 'lf-logos',
	lf_p( 'Wir produzieren für', 'lf-logos__label' ) . "\n" . lf_list( $lf_items, 'lf-logos__list' )
);
