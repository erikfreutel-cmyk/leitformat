<?php
/**
 * Title: Studio: Galerie
 * Slug: lf/studio-galerie
 * Categories: leitformat
 * Description: Drei Kamera-Ansichten. Regie-Foto kommt mit AUFTRAG-05 (dann 2 × 2).
 */

$lf_bilder = array(
	array( 'studio/studio-kamera-1-1200.webp', 'Kamera 1, Nahaufnahme: Gesprächspartner am Mikrofon im Studio', '<strong>Kamera 1:</strong> Nahaufnahme, Sony 4K' ),
	array( 'studio/studio-totale-1200.webp', 'Kamera 2, Totale: alle Personen und das ganze Set', '<strong>Kamera 2:</strong> Totale, Sony 4K' ),
	array( 'studio/studio-kamera-3-1200.webp', 'Kamera 3, Nahaufnahme: zweite Person am Mikrofon', '<strong>Kamera 3:</strong> Nahaufnahme, Sony 4K' ),
);
$lf_html = '';
foreach ( $lf_bilder as $b ) {
	$lf_html .= lf_image( $b[0], $b[1], 'lf-galerie__bild', false, $b[2] ) . "\n";
}
echo lf_section( 'lf-galerie',
	lf_head( 'Drei Perspektiven, ein Schnitt.', 'Nahaufnahme, Totale, Gegenschuss: Im Schnitt entsteht der Wechsel im Gespräch, den Zuschauer von Fernsehinterviews kennen.' ) . "\n"
	. lf_group( 'lf-galerie__grid', $lf_html )
);
