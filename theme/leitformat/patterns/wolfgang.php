<?php
/**
 * Title: Wolfgang Patz
 * Slug: lf/wolfgang
 * Categories: leitformat
 */

echo lf_section( 'lf-section--ink lf-wolfgang',
	lf_group( 'lf-wolfgang__bild', lf_image( 'placeholder-portrait.svg', 'Platzhalter: Porträt von Wolfgang Patz', 'lf-portrait' ) ) . "\n"
	. lf_group( 'lf-wolfgang__text',
		lf_p( 'Wer das macht', 'lf-eyebrow lf-eyebrow--plain lf-eyebrow--dark' ) . "\n"
		. lf_h( 2, 'Wolfgang Patz konzipiert und produziert Podcasts für Unternehmen – und moderiert seit 2020 den Hauptstadt-Podcast.' ) . "\n"
		. lf_p( 'Er sitzt in jedem Erstgespräch, entwickelt das Format und steht bei Bedarf selbst als Host vor der Kamera. Das Team dahinter ist bewusst klein: ein Ansprechpartner, keine Übergaben.' ) . "\n"
		. '<!-- wp:quote {"className":"lf-sidequote"} -->' . "\n" . '<blockquote class="wp-block-quote lf-sidequote">'
		. lf_p( '„Wolfgang berät uns immer sehr gut während der Aufnahmen und ist sehr schnell und professionell bei der Nachbearbeitung.“' )
		. '<cite>Eva Martin, Wikimedia Deutschland</cite></blockquote>' . "\n" . '<!-- /wp:quote -->' . "\n"
		. lf_p( '<a href="https://www.linkedin.com/in/wolfgang-patz/" rel="noopener">Wolfgang auf LinkedIn</a>', 'lf-link' )
	),
	'wolfgang'
);
