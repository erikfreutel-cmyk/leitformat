<?php
/**
 * Title: Pakete (ohne Überschrift, für /preise/)
 * Slug: lf/pakete-karten
 * Categories: leitformat
 */

echo lf_section( 'lf-pakete lf-pakete--flat',
	lf_pilotkarte( 'Die Pilotfolge: eine komplette Video-Folge in 14 Tagen.', lf_p( 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail, Shownotes. Die Pilotfolge wird vollständig auf das Setup angerechnet.' ), 'Festpreis, alles inklusive', 2 ) . "\n" . lf_paket_karten(),
	'pakete'
);
