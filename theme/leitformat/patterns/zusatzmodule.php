<?php
/**
 * Title: Zusatzmodule
 * Slug: lf/zusatzmodule
 * Categories: leitformat
 */

echo lf_section( 'lf-zusatz',
	lf_head( 'Zusatzmodule.', 'Zu jedem Format buchbar. Der Preis steht im Angebot.' ) . "\n"
	. lf_list( array(
		'Moderation durch Wolfgang Patz',
		'Dreh vor Ort, auf Messen und Events',
		'Paid Amplification auf LinkedIn und YouTube (NextGen Media)',
		'Untertitel und Fremdsprachen',
		'Newsletter-Aufbau',
	), 'lf-checks lf-checks--cols' )
);
