<?php
/**
 * Title: Kontaktseite
 * Slug: lf/kontakt
 * Categories: leitformat
 * Description: Formular links, Calendly rechts (id termin), Kontaktdaten, Karte. Abschnitt-ID anfrage.
 */

echo lf_section( 'lf-anfrage lf-kontakt',
	lf_group( 'lf-anfrage__form',
		lf_h( 1, 'Sagen Sie uns, was Sie planen.' ) . "\n"
		. lf_p( 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang Patz.', 'lf-lead' ) . "\n"
		. lf_formular() . "\n"
		. lf_kontaktdaten()
	) . "\n"
	. lf_group( 'lf-anfrage__side',
		lf_group( 'lf-card lf-termin',
			lf_p( '<strong>Erstgespräch mit Wolfgang Patz</strong>' ) . "\n"
			. lf_p( '30 Minuten, Video-Call, kostenlos.', 'lf-muted' ) . "\n"
			. "<!-- wp:html -->\n<div class=\"lf-termin__embed\" id=\"termin\">[Calendly-Kalender eingebettet – AUFTRAG-04]</div>\n<!-- /wp:html -->"
		) . "\n"
		. lf_karte()
	),
	'anfrage'
);
