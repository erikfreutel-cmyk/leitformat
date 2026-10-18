<?php
/**
 * Title: Podcast-Audit
 * Slug: lf/audit
 * Categories: leitformat
 */

$lf_audit = array(
	array( 'Sichtbarkeits-Check', '199 €', 'Lieferung in 48–72 Stunden.' ),
	array( 'Erlebnis-Check', '499 €', 'Enthält den Sichtbarkeits-Check. Lieferung in 48–72 Stunden.' ),
	array( 'Podcast Audit', 'ab 1.200 €', 'Enthält beide Checks. Lieferung in 5 Werktagen.' ),
);
$lf_html = '';
foreach ( $lf_audit as $a ) {
	$lf_html .= lf_group( 'lf-audit__karte', lf_h( 3, lf_e( $a[0] ), 'lf-audit__titel' ) . "\n" . lf_p( lf_e( $a[1] ), 'lf-price' ) . "\n" . lf_p( lf_e( $a[2] ), 'lf-muted' ) ) . "\n";
}
echo lf_section( 'lf-audit',
	lf_head( 'Bestehenden Podcast prüfen lassen: ab 199 €.', 'Für Podcasts, die schon laufen. Jede Stufe enthält die vorige.' ) . "\n"
	. lf_group( 'lf-audit__grid', $lf_html )
);
