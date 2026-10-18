<?php
/**
 * Title: Seite Corporate-Podcast-Agentur
 * Slug: lf/corporate
 * Categories: leitformat
 * Description: Abschnitt „Interne Formate“ ist eigenes Pattern (lf/interne-formate).
 */

$lf_amplify = lf_quelle( 'Podcast Amplify 2026', 'https://www.columbiagorgenews.com/news/national/are-most-podcasts-dead-four-in-10-without-new-episode-in-a-year/article_e3dd42f0-3a63-5191-82f3-4242c888fa58.html' );

echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		lf_p( 'Corporate-Podcast-Agentur für Konzerne', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Corporate Podcasts, die Ihre Zielkunden erreichen – nicht nur Ihre Mitarbeiter.' ) . "\n"
		. lf_p( 'Video-Podcasts für Unternehmenskommunikation, Corporate Brand und Public Affairs. Gäste aus Ihren Zielkunden, Freigaben nach Ihrem Prozess, Reporting bis zur Anfrage.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Gespräch mit Wolfgang', '#anfrage' ), lf_button( 'Preise ansehen', '/preise/', 'lf-secondary' ) )
	) . "\n"
	. lf_group( 'lf-hero__media', lf_video( 'Wer wir sind · 3:42', 'Video Wer wir sind abspielen', '1127602118' ) )
)
. "\n\n" . lf_section( 'lf-logos', lf_p( 'Wir produzieren für', 'lf-logos__label' ) . "\n" . lf_list( array_map( 'lf_e', lf_logos( true ) ), 'lf-logos__list' ) )
. "\n\n" . lf_section( 'lf-section--white lf-versprechen',
	lf_h( 2, 'Drei Zusagen für zwölf Monate.' ) . "\n"
	. lf_karten( array(
		array( 'Format statt Folge', 'Konzept, Rhythmus, Gäste, Redaktion – über zwölf Monate geplant. 39 % aller Podcasts veröffentlichen innerhalb von zwölf Monaten keine neue Folge (' . $lf_amplify . '). Folge 9 entscheidet, nicht Folge 1.' ),
		array( 'Ein Dreh, fünf Ausspielungen', 'Video-Folge, Audio-Folge, Clips im Hochformat, Zitatkarten, Newsletter-Text. Clips 48 Stunden nach der Aufnahme.' ),
		array( 'Messbar bis zur Pipeline', 'Welche Zielkunden haben zugesehen, wer war Gast, wer hat danach angefragt. Reporting monatlich, als Gespräch.' ),
	), 'lf-karten--3' )
)
. "\n\n" . lf_section( 'lf-pakete',
	lf_head( 'Zwei Formate für große Organisationen.', 'Alle Preise netto. Der Einstieg ist eine Pilotfolge als Proof of Concept.' ) . "\n"
	. lf_paket_karten( array( 'Konzern', 'Unternehmen' ), false ),
	'pakete'
)
. "\n\n" . lf_section( 'lf-section--ink lf-abp',
	lf_head( 'Account-Based Podcasting: Ihre Zielkunden sitzen am Tisch.', 'Statt Reichweite für alle: Gespräche mit genau den Menschen, die Sie als Kunden gewinnen wollen.' ) . "\n"
	. lf_karten( array(
		array( 'Zielkontenliste', 'Gemeinsam mit Vertrieb und Kommunikation legen wir fest, welche Unternehmen und Entscheider Sie erreichen wollen.' ),
		array( 'Gäste aus Zielkunden', 'Wir laden Entscheider dieser Unternehmen als Experten ein. Eine Einladung ist ein Angebot, keine Bitte – die Zusagequote ist entsprechend hoch.' ),
		array( 'Reporting bis zur Anfrage', 'Wer war Gast, wer hat zugesehen, wer hat danach angefragt. Sie sehen, welche Gespräche Türen geöffnet haben.' ),
	), 'lf-karten--3 lf-karten--dunkel', true )
);
