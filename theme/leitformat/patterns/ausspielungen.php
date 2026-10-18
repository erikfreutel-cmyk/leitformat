<?php
/**
 * Title: Ein Dreh, fünf Ausspielungen
 * Slug: lf/ausspielungen
 * Categories: leitformat
 * Description: Fünf Spalten mit Strich-Icons (28 px, 1,5 px Linie, Inline-SVG). Echte Standbilder kommen mit AUFTRAG-05.
 */

$lf_svg = function ( string $inhalt ): string {
	return '<svg class="lf-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $inhalt . '</svg>';
};
$lf_karten = array(
	array( $lf_svg( '<rect x="2.75" y="6.75" width="22.5" height="12.66" rx="1.5"/><path d="M12 10.3v5.6l4.8-2.8z"/>' ), 'Video-Folge', 'YouTube und Spotify Video, 30–45 Minuten.' ),
	array( $lf_svg( '<path d="M5 11v6M9.5 8v12M14 5v18M18.5 9v10M23 12v4"/>' ), 'Audio-Folge', 'Spotify, Apple Podcasts, alle Apps, mit Hosting.' ),
	array( $lf_svg( '<rect x="2.75" y="5.75" width="6.5" height="16.5" rx="1"/><rect x="10.75" y="5.75" width="6.5" height="16.5" rx="1"/><rect x="18.75" y="5.75" width="6.5" height="16.5" rx="1"/>' ), '3 bis 10 Clips im Hochformat', 'Je Folge, je nach Paket. Untertitelt, für LinkedIn, Shorts und Reels.' ),
	array( $lf_svg( '<rect x="3.75" y="3.75" width="20.5" height="20.5" rx="1.5"/><path d="M9.5 16.5c1.6-.6 2.4-1.8 2.4-3.6V10.5H8.8v3.2M16.5 16.5c1.6-.6 2.4-1.8 2.4-3.6V10.5h-3.1v3.2"/>' ), 'Zitatkarten', 'Kernsätze als Bild, bereit zum Posten.' ),
	array( $lf_svg( '<rect x="2.75" y="6.75" width="22.5" height="14.5" rx="1.5"/><path d="M3.5 7.75 14 15.25l10.5-7.5"/>' ), 'Newsletter-Text', 'Zusammenfassung und Zitate, fertig für Ihren Versand.' ),
);
$lf_html = '';
foreach ( $lf_karten as $k ) {
	$lf_html .= lf_group( 'lf-ausspielung', "<!-- wp:html -->\n" . $k[0] . "\n<!-- /wp:html -->\n" . lf_p( '<strong>' . lf_e( $k[1] ) . '</strong>' ) . "\n" . lf_p( lf_e( $k[2] ), 'lf-muted' ) ) . "\n";
}
echo lf_section( 'lf-section--white lf-ausspielungen',
	lf_head( 'Ein Dreh, fünf Ausspielungen.', 'Aus einer Aufnahme am Dienstag entsteht der Content für den ganzen Monat. Clips sind am Donnerstag auf LinkedIn.' ) . "\n"
	. lf_group( 'lf-ausspielungen__grid', $lf_html )
);
