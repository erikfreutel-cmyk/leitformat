<?php
/**
 * Title: Seite Corporate: Stimmen, Ablauf, FAQ, Anfrage
 * Slug: lf/corporate-2
 * Categories: leitformat
 */

echo lf_section( 'lf-kundenstimmen',
	lf_group( 'lf-stimmen lf-stimmen--zwei',
		lf_stimme( '„Ich bin mit der Zusammenarbeit mit NextGen Podcast sehr zufrieden. Die Leistungen wurden zuverlässig und termingerecht erbracht. Hervorzuheben sind die hohe Flexibilität, die ausgeprägte Serviceorientierung sowie der stets professionelle Umgang.“', 'Alexander Hub', 'Kommunikation, thyssenkrupp · Interner Podcast, Schnitt und Weiterentwicklung', true ) . "\n"
		. lf_stimme( '„NextGen Podcast hat uns dabei geholfen, das Tool Podcast technisch und redaktionell aufs nächste Level zu heben. Wir schätzen die professionelle und pragmatische Zusammenarbeit sehr.“', 'Carolin Kossin', 'Corporate Communications Manager, Unternehmensgruppe Theo Müller · Video-Podcast in Deutsch, Englisch und Polnisch', true )
	)
)
. "\n\n" . lf_ablauf( 'Vom Kennenlernen zum Staffelplan in sechs Wochen.', array(
	array( 'Tag 0', 'Kennenlernen', 'Ziele, Zielgruppen, Freigabeprozess. Angebot innerhalb von zwei Werktagen.' ),
	array( 'Tag 7', 'Konzept', 'Format, Host, Zielkontenliste, Rhythmus. Eine Seite, keine Präsentation.' ),
	array( 'Tag 21', 'Pilotfolge', 'Aufnahme und Schnitt der ersten Folge, Freigabe durch Ihre Gremien.' ),
	array( 'Woche 6', 'Staffelplan', 'Gäste, Termine und Themen für die nächsten Monate stehen fest.' ),
) )
. "\n\n" . lf_faq_section( 'Was Kommunikationsabteilungen fragen.', 'corporate' )
. "\n\n" . lf_anfrage( 'Gespräch mit Wolfgang Patz.', 'Buchen Sie direkt 30 Minuten im Kalender. Oder schreiben Sie uns, Antwort am selben Werktag.', 'Konzernprojekt', true, true );
