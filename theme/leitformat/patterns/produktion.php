<?php
/**
 * Title: Seite Podcast-Produktion
 * Slug: lf/produktion
 * Categories: leitformat
 * Description: SEO-Leistungsseite. Pilotfolge-Karte, Audit, Kundenstimmen, Anfrage werden als eigene Patterns eingebunden.
 */


echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		lf_p( 'Podcast-Produktion für Unternehmen', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Podcast-Produktion, die bei Folge 9 noch läuft.' ) . "\n"
		. lf_p( 'Audio und Video, von der Konzeption bis zur veröffentlichten Folge. Fertig in 5 Werktagen, Clips in 48 Stunden, zwei Korrekturrunden inklusive.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Pilotfolge anfragen – 2.900 €', '#anfrage' ), lf_button( 'Preise ansehen', '/preise/', 'lf-secondary' ) )
	) . "\n"
	. lf_group( 'lf-hero__media', lf_image( 'studio/studio-totale-1200.webp', 'Podcast-Produktion im Studio Berlin: drei Personen am Aufnahmetisch', 'lf-hero__bild', true ) )
)
. "\n\n" . lf_section( 'lf-section--white lf-bausteine',
	lf_head( 'Zwölf Bausteine, ein Ansprechpartner.', 'Sie buchen den ganzen Weg oder genau die Teile, die bei Ihnen fehlen.' ) . "\n"
	. lf_karten( array(
		array( 'Konzeption', 'Format, Themen, Episodenstruktur – bevor die erste Aufnahme entsteht.' ),
		array( 'Audio-Schnitt', 'Versprecher, Pausen, Wiederholungen und Störgeräusche raus.' ),
		array( 'Video-Schnitt', 'Kameraperspektiven im Wechsel, Farbe und Bild angeglichen.' ),
		array( 'Tonoptimierung', 'Lautstärke angeglichen, Rauschen reduziert, klares Klangbild.' ),
		array( 'Shownotes', 'Episodenbeschreibung und Shownotes, fertig zur Veröffentlichung.' ),
		array( 'Veröffentlichung', 'Upload auf alle Plattformen, auf Wunsch zum festen Termin.' ),
		array( 'Intro und Outro', 'Mit Ihrer Stimme oder einer professionellen Sprecherin.' ),
		array( 'Cover', 'Ein Cover, das Ihr Format auf den ersten Blick erkennbar macht.' ),
		array( 'Clips', 'Hochformat, untertitelt, für LinkedIn, Instagram und TikTok.' ),
		array( 'Technisches Setup', 'Hosting eingerichtet, alle Verzeichnisse angebunden.' ),
		array( 'Moderation', 'Wolfgang Patz als Host, mit Vorbereitung und Gesprächsführung.' ),
		array( 'Reporting', 'Monatlich: Kennzahlen und eine klare Einschätzung.' ),
	), 'lf-karten--4' )
)
. "\n\n" . lf_section( 'lf-orte',
	lf_head( 'Studio, remote oder bei Ihnen.', 'Wo aufgenommen wird, entscheidet das Format – nicht unsere Technik.' ) . "\n"
	. lf_karten( array(
		array( 'Studio Berlin', '4 × 5 m, drei Sony-4K-Kameras, Techniker im Raum, Rohdaten am selben Tag. <a href="/podcast-studio-berlin/">Studio ansehen</a>' ),
		array( 'Remote', 'Wir begleiten die Aufnahme, achten auf Ton und Struktur und greifen live ein. Wir sagen Ihnen vorher genau, welche Technik Sie brauchen.' ),
		array( 'Vor Ort', 'Wir kommen mit Kameras und Mikrofonen zu Ihnen – ins Büro, auf die Messe, zum Event.' ),
	), 'lf-karten--3' )
);
