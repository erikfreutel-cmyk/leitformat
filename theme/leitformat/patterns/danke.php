<?php
/**
 * Title: Danke-Seite
 * Slug: lf/danke
 * Categories: leitformat
 * Description: Nach dem Formular (Conversion zählt auf diesen Seitenaufruf, AUFTRAG-04). Calendly direkt, drei Video-Teaser.
 */

echo lf_section( 'lf-anfrage lf-danke',
	lf_group( 'lf-anfrage__form',
		lf_p( 'Anfrage gesendet', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Ihre Anfrage ist angekommen.' ) . "\n"
		. lf_p( 'Wolfgang Patz antwortet Ihnen am selben Werktag. Wählen Sie jetzt einen Termin, dann geht es schneller.', 'lf-lead' ) . "\n"
		. lf_p( 'Lieber telefonieren? <a href="' . LF_TELEFON_LINK . '"><strong>' . LF_TELEFON . '</strong></a>, Montag bis Freitag 9 bis 18 Uhr.', 'lf-anfrage__tel' )
	) . "\n"
	. lf_group( 'lf-anfrage__side',
		lf_group( 'lf-card lf-termin',
			lf_p( '<strong>Erstgespräch mit Wolfgang Patz</strong>' ) . "\n"
			. lf_p( '30 Minuten, Video-Call, kostenlos.', 'lf-muted' ) . "\n"
			. "<!-- wp:html -->\n<div class=\"lf-termin__embed\" id=\"termin\">[Calendly-Kalender eingebettet – AUFTRAG-04]</div>\n<!-- /wp:html -->"
		)
	)
) . "\n\n" . lf_section( 'lf-section--white lf-teaser',
	lf_h( 2, 'Bis zum Gespräch: drei kurze Videos.' ) . "\n"
	. lf_group( 'lf-teaser__grid',
		lf_group( 'lf-teaser__item', lf_video( 'Tom Kalányos, Gegenbauer · 0:26', 'Kundenstimme Gegenbauer abspielen', '1052003179' ) . "\n" . lf_p( '<strong>Kundenstimme Gegenbauer</strong>' ) . "\n" . lf_p( 'Kosten und Nutzen im Vergleich zu anderen Agenturen. ' . LF_NEXTGEN_HINWEIS, 'lf-muted' ) )
		. lf_group( 'lf-teaser__item', lf_video( 'Simon Mader, Adbaker', 'Porsche-Story abspielen', '1169274184' ) . "\n" . lf_p( '<strong>Nach dem Podcast rief Porsche an</strong>' ) . "\n" . lf_p( 'Wie ein Gastauftritt im Hauptstadt-Podcast zu einem Anruf führte.', 'lf-muted' ) )
		. lf_group( 'lf-teaser__item', lf_video( 'Wolfgang Patz', 'Video Warum Podcasts scheitern abspielen', '', '', '', 'QHnuyR7Gq7o' ) . "\n" . lf_p( '<strong>Warum Podcasts immer wieder scheitern</strong>' ) . "\n" . lf_p( 'Die häufigsten Gründe – und was Sie vorher klären.', 'lf-muted' ) )
	)
);
