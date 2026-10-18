<?php
/**
 * Title: Marktvergleich
 * Slug: lf/marktvergleich
 * Categories: leitformat
 */

echo lf_section( 'lf-section--white lf-markt',
	lf_head( 'Was eine Folge anderswo kostet.', 'Öffentliche Preise, wörtlich von den Seiten der Anbieter. Stand 18.10.2026.' ) . "\n"
	. lf_table(
		array( 'Anbieter', 'Preis', 'Was der Preis umfasst', 'Quelle' ),
		array(
			array( 'Podcastmania, Berlin', 'ab 2.300 € je Folge', 'Aufnahme, Schnitt, Sound Design, Mastering. Video im Preis nicht ausgewiesen.', '<a href="https://podcastmania.de/" rel="noopener">podcastmania.de</a>' ),
			array( 'Studio36, Berlin', 'ab 730 € netto je Folge', 'Produktion einer Folge. Video im Preis nicht ausgewiesen.', '<a href="https://studio36.berlin/podcasts/" rel="noopener">studio36.berlin</a>' ),
			array( 'IntoTheMinds', '750 € je Folge', 'Video-Folge von 5 bis 15 Minuten, mindestens 3 Folgen.', '<a href="https://www.intotheminds.com/de/video-podcast-agentur" rel="noopener">intotheminds.com</a>' ),
			array( '<strong>Leitformat Unternehmen</strong>', '<strong>rund 1.950 € je Folge</strong>', 'Video-Folge 30–45 Minuten mit 3 Kameras, Audio-Folge, 5 Clips, Gäste-Management. Ohne Setup gerechnet.', '–' ),
		),
		'lf-table--markt'
	)
);
