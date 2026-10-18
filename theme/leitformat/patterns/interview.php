<?php
/**
 * Title: Seite Interview-Podcast
 * Slug: lf/interview
 * Categories: leitformat
 * Description: Wert-Rechner per assets/js/rechner.js. Porsche-Video (Vimeo 1169274184) als Standbild mit Link, bis die Domain in Vimeo freigegeben ist (WOLFGANG-03 D8).
 */

$lf_rechner = '<!-- wp:html -->
<form class="lf-rechner" data-lf-rechner aria-describedby="lf-rechner-hinweis" onsubmit="return false">
	<div class="lf-rechner__felder">
		<label>Folgen im Jahr<input type="number" name="folgen" value="24" min="1" max="200" inputmode="numeric"></label>
		<label>Davon echte Beziehungen (%)<input type="number" name="beziehung" value="25" min="0" max="100" inputmode="numeric"></label>
		<label>Abschlussquote (%)<input type="number" name="abschluss" value="50" min="0" max="100" inputmode="numeric"></label>
		<label>Kundenwert gesamt (€)<input type="number" name="wert" value="40000" min="0" step="1000" inputmode="numeric"></label>
	</div>
	<div class="lf-rechner__ergebnis" aria-live="polite">
		<p><span class="lf-rechner__zahl" data-lf-kunden>3</span> neue Kunden im Jahr</p>
		<p><span class="lf-rechner__zahl" data-lf-umsatz>120.000 €</span> möglicher Mehrumsatz</p>
	</div>
	<p class="lf-form__hint" id="lf-rechner-hinweis">Rechenbeispiel mit Ihren Annahmen, keine Garantie. Folgen × Beziehungen × Abschlussquote × Kundenwert.</p>
</form>
<!-- /wp:html -->';

echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		''
		. lf_h( 1, 'Der Interview-Podcast, in dem Ihre Wunschkunden die Gäste sind.' ) . "\n"
		. lf_p( 'Mehr Kunden, ein größeres Netzwerk und mehr Reichweite aus einem Format: Ihrem eigenen Interview-Podcast. Produziert in Berlin, Clips in 48 Stunden.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Erstgespräch buchen', '#anfrage' ), lf_button( 'Wert berechnen', '#rechner', 'lf-secondary' ) )
	) . "\n"
	. lf_group( 'lf-beleg',
		''
		. lf_p( '<strong>Wolfgang Patz moderiert seit 2020 den Hauptstadt-Podcast – Interview-Folgen im eigenen Format.</strong>' ) . "\n"
		. lf_p( 'Er hat das Format gestartet, um sein Netzwerk zu erweitern: Politiker, Olympiasieger, Unternehmer, Konzern-CEOs. Aus einem dieser Gäste wurde der erste Konzernkunde.', 'lf-muted' )
	)
)
. "\n\n" . lf_section( 'lf-section--white lf-tisch',
	lf_head( 'Sie brauchen nur einen Tisch.', 'Statt Anzeigen und Kaltakquise: Sie setzen sich mit einem Menschen an einen Tisch und reden. Daraus entsteht, wonach andere mit viel Aufwand suchen.' ) . "\n"
	. lf_karten( array(
		array( 'Der richtige Gast', 'Autorität in seiner Branche und ein Netzwerk, das für Sie zählt. Im besten Fall selbst Wunschkunde oder Türöffner zu einem.' ),
		array( 'Der Zugang', 'Kaum jemand sagt Nein, wenn Sie ihn als Experten einladen. Eine Einladung ist ein Angebot, keine Bitte.' ),
		array( 'Das Gespräch', 'Es geht um Ihren Gast, und nebenbei entsteht Mehrwert für Ihre Zuhörer. Verkaufen müssen Sie nichts.' ),
		array( 'In Kontakt bleiben', 'Nach der Veröffentlichung beginnt der wertvollste Teil. Aus dem Gespräch wird eine Beziehung, ein Auftrag oder eine Empfehlung.' ),
	), 'lf-karten--4', true )
)
. "\n\n" . lf_section( 'lf-porsche',
	lf_group( 'lf-testimonial',
		lf_group( 'lf-testimonial__media', lf_video_link( 'Simon Mader, CEO Adbaker', 'https://vimeo.com/1169274184' ) ) . "\n"
		. lf_group( 'lf-testimonial__text',
			''
			. lf_h( 2, 'Nach einem Podcast-Auftritt rief Porsche an.' ) . "\n"
			. lf_p( 'Simon Mader ist als Gast in Podcasts gegangen, statt kalt zu akquirieren. Nach seinem Auftritt im Hauptstadt-Podcast von Wolfgang Patz kam der Anruf:' ) . "\n"
			. '<!-- wp:quote {"className":"lf-bigquote"} -->' . "\n" . '<blockquote class="wp-block-quote lf-bigquote">' . lf_p( '„Hey Simon, hier hat grad jemand von Porsche angerufen und der will dich sprechen.“' ) . '</blockquote>' . "\n" . '<!-- /wp:quote -->'
		)
	)
)
. "\n\n" . lf_section( 'lf-section--white lf-rechner-section',
	lf_head( 'Was ein Interview-Podcast im Jahr bringen kann.', 'Ein neuer Kunde über den Podcast kann ein Vielfaches der Produktion einbringen. Rechnen Sie mit Ihren eigenen Annahmen.' ) . "\n"
	. $lf_rechner,
	'rechner'
)
. "\n\n" . lf_section( 'lf-fuerwen',
	lf_h( 2, 'Drei Größen, ein Prinzip.' ) . "\n"
	. lf_karten( array(
		array( 'Solo-Experten', 'Ein Berater lädt die großen Namen seiner Branche ein. Aus dem Gespräch wird ein Kontakt, aus dem Kontakt der nächste Kunde. <a href="/preise/#pakete">Format Experte, ab 2.400 € im Monat</a>' ),
		array( 'Mittelstand', 'Eine Beratung mit 80 Mitarbeitern lädt Entscheider auf Augenhöhe ein. Aus dem fachlichen Austausch wird mit der Zeit ein Mandat. <a href="/preise/#pakete">Format Unternehmen, ab 4.400 € im Monat</a>' ),
		array( 'Konzerne', 'Gäste aus der Zielkundenliste werden zu Fürsprechern der Marke – mit Reporting, wer danach angefragt hat. <a href="/corporate-podcast-agentur/">Format Konzern, ab 8.500 € im Monat</a>' ),
	), 'lf-karten--3' )
)
. "\n\n" . lf_section( 'lf-pakete', lf_head( 'Pakete für Ihren Interview-Podcast.', 'Alle Preise netto. Der Einstieg ist eine Pilotfolge für 2.900 €.' ) . "\n" . lf_paket_karten( array( 'Experte', 'Unternehmen' ), false ), 'pakete' )
. "\n\n" . lf_section( 'lf-kundenstimmen',
	lf_group( 'lf-stimmen lf-stimmen--eins',
		lf_stimme( '„Durch die Zusammenarbeit mit NextGen Podcast konnten wir die Qualität unseres Podcasts weiterentwickeln. Der gesamte Produktionsprozess läuft für uns wesentlich entspannter ab, da sich die Korrekturschleifen reduziert haben und die Umsetzung schnell erfolgt.“', 'Johanna Boccarius', 'hy Consulting · Return on Innovation, 35 Folgen in Audio und Video', true )
	)
)
. "\n\n" . lf_faq_section( 'Was Sie vor dem Start wissen wollen.', 'interview' )
. "\n\n" . lf_anfrage( 'Sagen Sie uns, wen Sie an Ihrem Tisch haben wollen.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.', 'Ein Format für unser Unternehmen' );
