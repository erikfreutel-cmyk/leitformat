<?php
/**
 * Title: Über uns
 * Slug: lf/ueber-uns
 * Categories: leitformat
 * Description: Zeitstrahl, Wolfgang, Team, Presse, Bewertungen, ehemals NextGen Podcast. Fotos kommen mit AUFTRAG-05.
 */

$lf_zeit = array(
	array( '2015', 'Blog mit Erik Freutel', 'Zeitweise über 400.000 Seitenaufrufe im Monat. Reichweite, Content und Distribution selbst gelernt.' ),
	array( '2018', 'NextGen Media GmbH', 'Gründung in Berlin, Wolfgang Patz und Erik Freutel als Geschäftsführer.' ),
	array( '2020', 'Hauptstadt-Podcast', 'Eigenes Interview-Format mit Politikern, Spitzensportlern, Schauspielern und CEOs.' ),
	array( 'Danach', 'Gegenbauer', 'Erstes Kundenformat: Mitarbeiterinterviews als Video-Podcast. Der Start der Podcast-Agentur.' ),
	array( '2026', 'Leitformat', 'Neuer Name, Video als Standard. Dieselben Menschen, dasselbe Studio.' ),
);
$lf_steps = '';
foreach ( $lf_zeit as $z ) {
	$lf_steps .= lf_group( 'lf-step', lf_p( lf_e( $z[0] ), 'lf-step__when' ) . "\n" . lf_p( '<strong>' . lf_e( $z[1] ) . '</strong>' ) . "\n" . lf_p( lf_e( $z[2] ), 'lf-muted' ) ) . "\n";
}

$lf_team = array(
	array( 'Wolfgang Patz', 'Gründer und Geschäftsführer. Strategie, Kundenkommunikation, Formate.' ),
	array( 'Erik Freutel', 'Mitgründer. Formatentwicklung, Konzepte, Google Ads.' ),
	array( 'Lenny', 'Aufnahme, Produktion, Qualitätssicherung.' ),
	array( 'Andreas', 'Schnitt, Sounddesign, Postproduktion.' ),
	array( 'Clemens', 'Veröffentlichung, Distribution, Plattformen.' ),
	array( 'Sophia', '[Rolle – WOLFGANG-03, C5]' ),
);
$lf_karten = '';
foreach ( $lf_team as $t ) {
	$lf_karten .= lf_group( 'lf-person', "<!-- wp:html -->\n<div class=\"lf-person__bild\" aria-hidden=\"true\">" . lf_e( mb_substr( $t[0], 0, 1 ) ) . "</div>\n<!-- /wp:html -->\n" . lf_p( '<strong>' . lf_e( $t[0] ) . '</strong>' ) . "\n" . lf_p( lf_e( $t[1] ), 'lf-muted' ) ) . "\n";
}

$lf_presse = lf_list( array(
	'Comenius-EduMedia-Siegel 2024 für das Podcast-Projekt der Fortbildungsakademie des Innenministeriums NRW',
	'business-on.de, 6. Januar 2026: <a href="https://www.business-on.de/corporate-podcast-experte-wolfgang-patz-strategie-produktion-b2b-marketing.html" rel="noopener">Die Podcast-Matrix: Warum für Corporate Podcasts kein Weg an Wolfgang Patz vorbeiführt</a>',
	'Vergleich: TOP 7 Podcast-Agenturen in Deutschland – [Medium und Link – Wolfgang]',
	'Ratgeber: Warum Konzerne keine großen Agenturen brauchen – [Medium und Link – Wolfgang]',
	'Interview: Corporate Podcasts brauchen Klarheit, nicht Komplexität – [Medium und Link – Wolfgang]',
	'Interview: Vom Fleischer zum Corporate-Podcast-Strategen – [Medium und Link – Wolfgang]',
	'Interview: Corporate Podcasts und die wichtigsten Grundlagen – [Medium und Link – Wolfgang]',
), 'lf-presse' );

echo lf_section( 'lf-intro lf-ueber',
	lf_p( 'Über uns', 'lf-eyebrow' ) . "\n"
	. lf_h( 1, 'Sechs Leute, ein Studio in Berlin.' ) . "\n"
	. lf_p( 'Ein festes Team aus Strategie, Redaktion, Produktion und Technik. Keine wechselnden Freelancer, jedes Projekt hat feste Ansprechpartner.', 'lf-lead' )
)
. "\n\n" . lf_section( 'lf-section--white lf-ablauf lf-zeit',
	lf_h( 2, 'Von einem Blog zur Video-Podcast-Agentur.' ) . "\n" . lf_group( 'lf-steps', $lf_steps )
)
. "\n\n" . lf_section( 'lf-section--ink lf-wolfgang',
	lf_group( 'lf-wolfgang__bild', lf_image( 'placeholder-portrait.svg', 'Platzhalter: Porträt von Wolfgang Patz', 'lf-portrait' ) ) . "\n"
	. lf_group( 'lf-wolfgang__text',
		lf_p( 'Wolfgang Patz, Gründer und Geschäftsführer', 'lf-eyebrow lf-eyebrow--plain lf-eyebrow--dark' ) . "\n"
		. lf_h( 2, '„Ein Podcast ist die authentischste Content-Quelle eines Unternehmens.“' ) . "\n"
		. lf_p( 'Gelernter Fleischer, danach Jahre in leitender Verantwortung. 2017 der Neustart als Praktikant in einer Berliner Werbeagentur, um zu verstehen, wie Konzerne kommunizieren, dann ein Jahr in einer PR-Agentur. 2018 gründete er mit Erik Freutel die NextGen Media GmbH. Seit 2020 moderiert er den Hauptstadt-Podcast – Gespräche mit Politikern, Spitzensportlern, Schauspielern und CEOs.' ) . "\n"
		. lf_p( '<a href="https://www.linkedin.com/in/wolfgang-patz/" rel="noopener">Wolfgang auf LinkedIn</a> · [Link Hauptstadt-Podcast – Wolfgang]', 'lf-link' )
	)
)
. "\n\n" . lf_section( 'lf-team',
	lf_head( 'Wer an Ihrem Format arbeitet.', 'Sie sprechen mit den Menschen, die aufnehmen, schneiden und veröffentlichen.' ) . "\n" . lf_group( 'lf-team__grid', $lf_karten )
)
. "\n\n" . lf_section( 'lf-section--white lf-presse-section',
	lf_group( 'lf-presse__text',
		lf_h( 2, 'Presse und Auszeichnung.' ) . "\n"
		. '<!-- wp:quote {"className":"lf-sidequote lf-sidequote--hell"} -->' . "\n" . '<blockquote class="wp-block-quote lf-sidequote lf-sidequote--hell">'
		. lf_p( '„Wer Corporate Podcasts ernsthaft nutzen will, landet früher oder später bei Wolfgang Patz.“' )
		. '<cite>business-on.de, 6. Januar 2026</cite></blockquote>' . "\n" . '<!-- /wp:quote -->' . "\n"
		. $lf_presse . "\n"
		. lf_p( 'Interview- und Presseanfragen: <a href="mailto:kontakt@leitformat.de">kontakt@leitformat.de</a>', 'lf-note' )
	),
	'presse'
)
. "\n\n" . lf_section( 'lf-ehemals',
	lf_group( 'lf-ehemals__grid',
		lf_group( 'lf-ehemals__text',
			lf_h( 2, 'Ehemals NextGen Podcast.' ) . "\n"
			. lf_p( 'Bis 2026 hießen wir NextGen Podcast. Der neue Name steht für das, was wir heute liefern: Video als Standard und Formate mit Laufzeit statt einzelner Folgen. Die Menschen, das Studio und die Kunden sind dieselben.' )
		) . "\n"
		. lf_group( 'lf-card lf-bewertung',
			lf_p( '33', 'lf-price lf-price--xl' ) . "\n"
			. lf_p( 'Bewertungen auf Google, gesammelt als NextGen Podcast.', 'lf-muted' ) . "\n"
			. lf_p( '<a href="' . esc_url( LF_GOOGLE_PROFIL ) . '" rel="noopener">Bewertungen lesen</a>', 'lf-link' )
		)
	)
)
. "\n\n" . lf_anfrage( 'Lernen Sie uns kennen.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.' );
