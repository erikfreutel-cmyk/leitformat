<?php
/**
 * Title: Hero Startseite
 * Slug: lf/hero
 * Categories: leitformat
 * Description: Überschrift, Unterzeile und Buttons im Editor änderbar. Video kommt in AUFTRAG-05 (data-src).
 */

echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		lf_p( 'Video-Podcast-Agentur, Berlin', 'lf-eyebrow' ) . "\n"
		. lf_h( 1, 'Video-Podcasts, die bei Entscheidern ankommen.' ) . "\n"
		. lf_p( 'Ein Gespräch, alle Kanäle: Video, Audio, LinkedIn-Clips und Newsletter aus einer Aufnahme. Produziert in Berlin, in 48 Stunden ausgespielt, gemessen bis zur Anfrage.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Pilotfolge anfragen – 2.900 €', '#pilotfolge' ), lf_button( 'Erstgespräch buchen', '#anfrage', 'lf-secondary' ) ) . "\n"
		. lf_group( 'lf-stats',
		lf_group( 'lf-stat', lf_p( '85+', 'lf-stat__value' ) . lf_p( 'Podcast-Projekte', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( '1.250+', 'lf-stat__value' ) . lf_p( 'produzierte Episoden', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( '33', 'lf-stat__value' ) . lf_p( 'Google-Bewertungen', 'lf-stat__label' ) )
		. lf_group( 'lf-stat', lf_p( 'Berlin', 'lf-stat__value' ) . lf_p( 'eigenes Studio', 'lf-stat__label' ) )
	)
	) . "\n"
	. lf_group( 'lf-hero__media', lf_video( 'Wolfgang Patz zeigt eine Kundenfolge · 45 Sekunden', 'Video abspielen' ) )
);
