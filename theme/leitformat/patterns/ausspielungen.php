<?php
/**
 * Title: Ein Dreh, fünf Ausspielungen
 * Slug: lf/ausspielungen
 * Categories: leitformat
 */

$lf_karten = array(
	array( 'placeholder-video.svg', 'Platzhalter: Standbild einer Video-Folge im Querformat', 'Video-Folge', 'YouTube und Spotify Video, 30–45 Minuten.' ),
	array( 'placeholder-audio.svg', 'Platzhalter: Audio-Wellenform', 'Audio-Folge', 'Spotify, Apple Podcasts, alle Apps, mit Hosting.' ),
	array( 'placeholder-clips.svg', 'Platzhalter: drei Clips im Hochformat', '3 bis 10 Clips im Hochformat', 'Je Folge, je nach Paket. Untertitelt, für LinkedIn, Shorts und Reels.' ),
	array( 'placeholder-zitat.svg', 'Platzhalter: Zitatkarte mit dem Satz „Folge 9 entscheidet, nicht Folge 1.“', 'Zitatkarten', 'Kernsätze als Bild, bereit zum Posten.' ),
	array( 'placeholder-newsletter.svg', 'Platzhalter: Newsletter-Textblock', 'Newsletter-Text', 'Zusammenfassung und Zitate, fertig für Ihren Versand.' ),
);
$lf_html = '';
foreach ( $lf_karten as $k ) {
	$lf_html .= lf_group( 'lf-ausspielung', lf_image( $k[0], $k[1], 'lf-ausspielung__bild' ) . "\n" . lf_p( '<strong>' . lf_e( $k[2] ) . '</strong>' ) . "\n" . lf_p( lf_e( $k[3] ), 'lf-muted' ) ) . "\n";
}
echo lf_section( 'lf-section--white lf-ausspielungen',
	lf_head( 'Ein Dreh, fünf Ausspielungen.', 'Aus einer Aufnahme am Dienstag entsteht der Content für den ganzen Monat. Clips sind am Donnerstag auf LinkedIn.' ) . "\n"
	. lf_group( 'lf-ausspielungen__grid', $lf_html )
);
