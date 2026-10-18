<?php
/**
 * Title: Danke-Seite
 * Slug: lf/danke
 * Categories: leitformat
 * Description: Nach dem Formular (Conversion zählt auf diesen Seitenaufruf, AUFTRAG-04). Calendly direkt, drei Video-Teaser.
 */

echo lf_section( 'lf-anfrage lf-danke',
	lf_group( 'lf-anfrage__form',
		''
		. lf_h( 1, 'Ihre Anfrage ist angekommen.' ) . "\n"
		. lf_p( 'Wolfgang Patz antwortet Ihnen am selben Werktag. Wählen Sie jetzt einen Termin, dann geht es schneller.', 'lf-lead' ) . "\n"
		. lf_p( 'Lieber telefonieren? <a href="' . LF_TELEFON_LINK . '"><strong>' . LF_TELEFON . '</strong></a>, Montag bis Freitag 9 bis 18 Uhr.', 'lf-anfrage__tel' )
	) . "\n"
	. lf_group( 'lf-anfrage__side',
		lf_group( 'lf-termin',
			lf_p( '<strong>Erstgespräch mit Wolfgang Patz</strong>' ) . "\n"
			. lf_p( '30 Minuten, Video-Call, kostenlos.', 'lf-muted' ) . "\n"
			. lf_termin_embed()
		)
	)
) . "\n\n" . lf_section( 'lf-section--white lf-teaser',
	lf_h( 2, 'Bis zum Gespräch: zwei kurze Videos.' ) . "\n"
	. lf_group( 'lf-teaser__grid',
		lf_group( 'lf-teaser__item', lf_video( 'Tom Kalányos, Gegenbauer, 26 Sekunden', 'Kundenstimme Gegenbauer abspielen', '1052003179', '', '', '', 0, 'kalanyos-gegenbauer.webp' ) . "\n" . lf_p( '<strong>Kundenstimme Gegenbauer</strong>' ) . "\n" . lf_p( 'Kosten und Nutzen im Vergleich zu anderen Agenturen, in 26 Sekunden. ' . LF_NEXTGEN_HINWEIS, 'lf-muted' ) )
		. lf_group( 'lf-teaser__item', lf_video_link( 'Simon Mader, CEO Adbaker', 'https://vimeo.com/1169274184' ) . "\n" . lf_p( '<strong>Nach dem Podcast rief Porsche an</strong>' ) . "\n" . lf_p( 'Wie ein Gastauftritt im Hauptstadt-Podcast von Wolfgang Patz zu einem Anruf führte.', 'lf-muted' ) )
	)
);
