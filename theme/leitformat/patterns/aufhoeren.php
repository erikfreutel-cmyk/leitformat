<?php
/**
 * Title: Warum Podcasts aufhören
 * Slug: lf/aufhoeren
 * Categories: leitformat
 */

$lf_amplify = lf_quelle( 'Podcast Amplify 2026', 'https://www.columbiagorgenews.com/news/national/are-most-podcasts-dead-four-in-10-without-new-episode-in-a-year/article_e3dd42f0-3a63-5191-82f3-4242c888fa58.html' );

echo lf_section( 'lf-section--ink lf-aufhoeren',
	lf_head( 'Warum die meisten Podcasts nach zehn Folgen aufhören.', '39 % aller Podcasts veröffentlichen innerhalb von zwölf Monaten keine neue Folge (' . $lf_amplify . '). Es liegt selten an der Idee, fast immer am Weg zwischen Aufnahme und Veröffentlichung.' ) . "\n"
	. lf_karten( array(
		array( 'Postproduktion frisst Zeit', 'Schnitt, Ton und Export dauern länger als gedacht – Zeit, die für Inhalte fehlt.' ),
		array( 'Der Aufwand wird unterschätzt', 'Eine Folge von 30 Minuten bedeutet schnell mehrere Stunden Arbeit, bis sie fertig ist.' ),
		array( 'Fehlendes Handwerk kostet Qualität', 'Ohne Erfahrung in Schnitt und Tonbearbeitung klingt selbst gutes Rohmaterial unprofessionell.' ),
		array( 'Werkzeuge da, Abläufe nicht', 'Die Software ist installiert, aber jede Folge ist ein neuer Anlauf.' ),
		array( 'Freelancer sind schwer planbar', 'Wechselnde Verfügbarkeit und schwankende Qualität machen einen festen Rhythmus schwer.' ),
		array( 'Selbst machen ist teurer, als es scheint', 'Mit Zeitaufwand und Lernkurve gerechnet kostet Eigenproduktion oft mehr als ein erfahrener Partner.' ),
	), 'lf-karten--3 lf-karten--dunkel', true )
);
