<?php
/**
 * Inhalte, die mehrere Patterns und das Schema teilen (FAQ, Pakete, Logos, Referenzen).
 * Änderungen laufen über Aufträge, nicht über das Backend.
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

const LF_NEXTGEN_HINWEIS = 'Aufgenommen, als wir noch NextGen Podcast hießen.';
const LF_TELEFON         = '+49 30 20 63 49 03';
const LF_TELEFON_LINK    = 'tel:+493020634903';
const LF_GOOGLE_PROFIL   = 'https://www.google.com/search?q=NextGen+Podcast+Berlin'; // bis Erik die Profil-URL liefert

/**
 * FAQ-Sätze. Schlüssel: start, pilot, preise.
 *
 * @return array<int, array{0:string,1:string}>
 */
function lf_faq( string $set ): array {
	$faq = array(
		'start'  => array(
			array( 'Was kostet eine Folge?', 'Im Format Experte rund 1.200 €, im Format Unternehmen rund 2.200 € inklusive Video und Clips, jeweils ohne Setup gerechnet. Die Pilotfolge kostet 2.900 € als Einzelstück.' ),
			array( 'Wie lange dauert es bis zur ersten Folge?', 'Vier Wochen vom Erstgespräch. Die Pilotfolge ist in 14 Tagen fertig.' ),
			array( 'Geht das auch remote?', 'Ja. Remote nehmen wir mit Ihrer Technik auf – wir sagen Ihnen vorher genau, was Sie brauchen. Studio Berlin und Dreh vor Ort sind die Alternativen.' ),
			array( 'Wem gehören die Rechte?', 'Sie erhalten die ausschließlichen Nutzungsrechte an Folge, Rohmaterial und Clips – zeitlich und räumlich unbegrenzt, für alle Ihre Kanäle, mit vollständiger Zahlung. Musik lizenzieren wir für Ihre Nutzung. Als Referenz nennen wir die Produktion nur mit Ihrer Zustimmung.' ),
			array( 'Wir haben keine Gäste. Was dann?', 'Gästeakquise ist Teil der Formate Unternehmen und Konzern. Im Konzern-Format kommen die Gäste aus Ihrer Zielkundenliste.' ),
			array( 'Brauchen wir ein eigenes Studio?', 'Nein. Unser Studio steht in Berlin, mobil kommen wir zu Ihnen.' ),
			array( 'Wie laufen Freigaben?', 'Jede Folge und jeder Clip wird per Link freigegeben, mit Kommentaren an der Stelle. Zwei Korrekturschleifen sind inklusive.' ),
			array( 'Wie messen Sie Erfolg?', 'Views und Downloads je Kanal, Reichweite bei Zielkunden auf LinkedIn und – im Konzern-Format – welche Gäste und Zuschauer später angefragt haben.' ),
		),
		'pilot'  => array(
			array( 'Was ist drin?', 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail und Shownotes. Festpreis 2.900 € netto.' ),
			array( 'Studio oder remote?', 'Beides geht. Das Studio in Berlin hat 4 × 5 m, 3 Kameras und Platz für bis zu 4 Personen. Remote nehmen wir mit Ihrer Technik auf.' ),
			array( 'Wem gehören die Rechte?', 'Sie erhalten die ausschließlichen Nutzungsrechte an Folge, Rohmaterial und Clips – zeitlich und räumlich unbegrenzt, für alle Ihre Kanäle, mit vollständiger Zahlung. Musik lizenzieren wir für Ihre Nutzung. Als Referenz nennen wir die Produktion nur mit Ihrer Zustimmung.' ),
			array( 'Was, wenn uns das Ergebnis nicht gefällt?', 'Zwei Korrekturrunden sind inklusive. Passt es danach nicht, sprechen wir darüber, bevor Sie etwas weiter buchen.' ),
			array( 'Was passiert nach der Pilotfolge?', 'Die Pilotfolge wird vollständig auf das Setup angerechnet. Beim Format Experte ist die Pilotfolge das Setup – danach zahlen Sie nur die Monatsrate.' ),
		),
		'studio' => array(
			array( 'Kann ich das Studio ohne Agentur mieten?', 'Ja. Sie mieten Raum, Technik und Techniker. Schnitt, Clips und Veröffentlichung buchen Sie nur, wenn Sie wollen.' ),
			array( 'Wie viele Personen passen ins Studio?', 'Bis zu vier Personen vor der Kamera.' ),
			array( 'Können Gäste remote dazukommen?', 'Ja. Wir schalten Remote-Gäste in Studioqualität zu.' ),
			array( 'Bringe ich eigene Technik mit?', 'Nicht nötig. Drei Kameras, drei Mikrofone und Licht stehen bereit und sind eingerichtet, bevor Sie ankommen.' ),
			array( 'Wer bedient die Kameras?', 'Wir. Bei jeder Aufnahme ist ein Techniker im Raum und achtet auf Licht, Ton und Bild. Sie konzentrieren sich auf das Gespräch.' ),
			array( 'Bekomme ich die Rohdaten?', 'Ja, am selben Tag online. Jede Person auf einer eigenen Tonspur, jede Kamera als eigene Datei. Sie können selbst schneiden.' ),
			array( 'Wie buche ich?', 'Über das Formular unten mit Wunschtermin und Format. Die Bestätigung kommt innerhalb eines Werktags. Für regelmäßige Aufnahmen halten wir feste Termine frei.' ),
			array( 'Wo parke ich?', 'Kostenfrei an der Franz-Jacob-Straße und der Storkower Straße. Oder in der Tiefgarage hinter dem Edeka an der Franz-Jacob-Straße 2c – die Kosten übernehmen wir, bringen Sie das Ticket mit.' ),
			array( 'Was kostet der Schnitt dazu?', 'Ab 450 € je Video-Folge, auf Wunsch mit Clips und Veröffentlichung. Laufende Formate gibt es als Paket ab 2.400 € im Monat.' ),
		),
		'corporate' => array(
			array( 'Wie laufen Freigaben?', 'Jede Folge und jeder Clip wird per Link freigegeben, mit Kommentaren an der Stelle. Wir richten den Ablauf nach Ihrem Freigabeprozess – auch mit Rechtsabteilung und Vorstandsbüro.' ),
			array( 'Wie gehen Sie mit Datenschutz um?', 'Für Gäste- und Mitarbeiterdaten schließen wir einen Vertrag zur Auftragsverarbeitung nach Art. 28 DSGVO. Die Einwilligungen der Personen vor der Kamera stimmen wir vor der Aufnahme mit Ihnen ab.' ),
			array( 'Geht das mehrsprachig?', 'Ja. Für die Unternehmensgruppe Theo Müller produzieren wir einen Video-Podcast in Deutsch, Englisch und Polnisch. Untertitel und Sprachfassungen sind als Zusatzmodul buchbar.' ),
			array( 'Wem gehören die Rechte?', 'Sie erhalten die ausschließlichen Nutzungsrechte an Folge, Rohmaterial und Clips – zeitlich und räumlich unbegrenzt, für alle Ihre Kanäle, mit vollständiger Zahlung. Musik lizenzieren wir für Ihre Nutzung. Als Referenz nennen wir die Produktion nur mit Ihrer Zustimmung.' ),
			array( 'Was passiert mit vertraulichen Inhalten?', 'Beide Seiten verpflichten sich zur Vertraulichkeit. Interne Folgen veröffentlichen wir nur in den Kanälen, die Sie freigeben – etwa im Intranet oder in einem geschützten Feed.' ),
			array( 'Wie sieht das Reporting aus?', 'Monatlich, als Gespräch: Abrufe je Kanal, Reichweite bei Zielkunden auf LinkedIn, und im Konzern-Format, welche Gäste und Zuschauer später angefragt haben.' ),
		),
		'interview' => array(
			array( 'Wir haben noch keinen Podcast. Passt das trotzdem?', 'Gerade dann. Wer das Format von Anfang an auf Gäste und Kontakte ausrichtet, spart sich Jahre des Ausprobierens.' ),
			array( 'Wie viel Zeit müssen wir selbst investieren?', 'Weniger als gedacht. Sie bringen sich und Ihre Gäste mit, Aufnahme, Schnitt und Veröffentlichung übernehmen wir.' ),
			array( 'Brauchen wir ein Studio oder Technik?', 'Nein. Sie nehmen in unserem Studio in Berlin auf, wir kommen mit Technik zu Ihnen, oder wir nehmen remote auf.' ),
			array( 'Für wen ist das nichts?', 'Für alle, die schnelle Reichweite suchen oder nicht regelmäßig vor das Mikrofon wollen. Es lohnt sich dort, wo ein einziger neuer Kunde viel zählt.' ),
			array( 'Wie schnell entstehen Kontakte oder Aufträge?', 'Ein Podcast ist kein Anzeigenknopf. Jede Folge baut eine Beziehung auf, und aus Beziehungen wird mit der Zeit Geschäft.' ),
			array( 'Was kostet das?', 'Das Format Experte beginnt bei 2.400 € im Monat für zwei Video-Folgen, das Format Unternehmen bei 4.400 €. Der Einstieg ist eine Pilotfolge für 2.900 €.' ),
		),
		'video' => array(
			array( 'Wie viele Clips bekommen wir je Folge?', 'Je nach Paket: 6 bei der Pilotfolge, 3 je Folge im Format Experte, 5 je Folge im Format Unternehmen. Im Konzern-Format nach Vereinbarung.' ),
			array( 'Für welche Plattformen?', 'YouTube und Spotify für die Video-Folge, alle Podcast-Apps für die Audio-Folge, LinkedIn, Instagram, TikTok und YouTube Shorts für die Clips.' ),
			array( 'Wann sind Clips und Folge fertig?', 'Clips 48 Stunden nach der Aufnahme, die fertige Folge in 5 Werktagen.' ),
			array( 'Bekommen wir auch eine Audio-Fassung?', 'Ja. Aus jeder Video-Folge entsteht eine Audio-Folge für alle Podcast-Apps, mit Hosting.' ),
			array( 'Sind die Clips untertitelt?', 'Ja. Jeder Clip ist im Hochformat und untertitelt, damit er auch ohne Ton funktioniert. Fremdsprachige Untertitel sind ein Zusatzmodul.' ),
			array( 'Geht Video auch ohne Studio?', 'Ja. Remote nehmen wir mit Ihrer Technik auf – wir sagen Ihnen vorher genau, was Sie brauchen. Oder wir kommen mit Kameras zu Ihnen.' ),
		),
		'produktion' => array(
			array( 'Können wir eine einzelne Folge produzieren lassen?', 'Ja, als Pilotfolge zum Festpreis von 2.900 €, ohne Vertragsbindung. Laufende Produktion gibt es als Format ab 2.400 € im Monat.' ),
			array( 'Wie läuft die Aufnahme ab?', 'Im Studio in Berlin, remote mit unserer Begleitung oder mit unserer Technik bei Ihnen vor Ort. Wir richten uns nach Ihrem Setup.' ),
			array( 'Wie lange dauert es bis zur fertigen Folge?', 'Nach vollständigem Material in 5 Werktagen. Clips liegen 48 Stunden nach der Aufnahme vor.' ),
			array( 'Wie viele Korrekturrunden sind enthalten?', 'Zwei. Sie bekommen Schnitt und Transkript und tragen Anmerkungen direkt im Dokument ein.' ),
			array( 'Helfen Sie auch bei Themen und Gästen?', 'Ja. Reine Postproduktion ist genauso buchbar wie Themenplanung, Fragengerüste und Gästemanagement.' ),
			array( 'Übernehmen Sie bestehende Podcasts?', 'Ja. Viele Projekte starten mit einem laufenden Format. Wir übernehmen die Produktion, ordnen die Abläufe und entwickeln das Format weiter.' ),
		),
		'preise' => array(
			array( 'Was kostet eine Folge?', 'Im Format Experte rund 1.200 €, im Format Unternehmen rund 2.200 € inklusive Video und Clips, jeweils ohne Setup gerechnet. Die Pilotfolge kostet 2.900 € als Einzelstück.' ),
			array( 'Gibt es Rabatt bei Jahresbuchung?', 'Wer die gesamte Laufzeit im Voraus zahlt, bekommt 10 % auf die Monatsraten. Auf das Setup gibt es keinen Rabatt.' ),
			array( 'Was kostet der Dreh vor Ort?', 'Das hängt von Ort, Dauer und Anzahl der Kameras ab. Sie bekommen den Preis schriftlich vor dem Dreh.' ),
			array( 'Sind Musik-Lizenzen enthalten?', 'Ja. Musik lizenzieren wir für Ihre Nutzung.' ),
			array( 'Was passiert nach der Laufzeit?', 'Der Vertrag verlängert sich automatisch. Sie können mit vier Wochen Frist zum Ende der Laufzeit kündigen.' ),
			array( 'Wie wird abgerechnet?', 'Das Setup mit Beginn, danach monatlich. Zahlungsziel 14 Tage. Alle Preise netto zuzüglich Umsatzsteuer.' ),
		),
	);
	return $faq[ $set ] ?? array();
}

/** Kundennamen für die Logoleiste (Reihenfolge aus daten/medien-alte-seite.md, erste zehn). */
function lf_logos( bool $alle = false ): array {
	$logos = array( 'DKB', 'thyssenkrupp', 'Weleda', 'Müller', 'Techniker Krankenkasse', 'Johanniter', 'Konrad-Adenauer-Stiftung', 'Wikimedia', 'NH Hotels', 'Globus', 'hy Consulting', 'Gegenbauer', 'Myra Security', 'Rheinische Notarkammer', 'Abgeordnetenhaus Berlin' );
	return $alle ? $logos : array_slice( $logos, 0, 5 );
}

/** Acht Referenzen der Startseite: slug => [Name, Unterzeile]. */
function lf_referenzen(): array {
	return array(
		'wikimove'                => array( 'WIKIMOVE', 'Wikimedia Deutschland' ),
		'thyssenkrupp'            => array( 'Interner Podcast', 'thyssenkrupp' ),
		'return-on-innovation'    => array( 'Return on Innovation', 'hy Consulting' ),
		'myra-minds'              => array( 'Myra Minds', 'Myra Security' ),
		'mueller-gruppe'          => array( 'Müller', 'Unternehmensgruppe Theo Müller' ),
		'klimabauern'             => array( '#KlimaBauern', 'Landesbauernverband Brandenburg' ),
		'gegenbauer'              => array( 'Gegenbauer Podcast', 'Gegenbauer' ),
		'abgeordnetenhaus-berlin' => array( 'Von Stadt zu Stadt', 'Abgeordnetenhaus von Berlin' ),
	);
}

/* --------------------------------------------------------------------------
 * Renderer für Block-Markup, das mehrere Patterns teilen
 * ----------------------------------------------------------------------- */

function lf_e( string $s ): string {
	return esc_html( $s );
}

function lf_img( string $name ): string {
	return esc_url( get_theme_file_uri( "assets/img/{$name}" ) );
}

/**
 * Video-Fläche 16:9. Mit $vimeo lädt der Klick den Vimeo-Player (Klick = Einwilligung),
 * mit $src ein selbst gehostetes MP4. Ohne Quelle nur Platzhalter ohne Bedienelement.
 */
function lf_video( string $caption, string $label, string $vimeo = '', string $src = '', string $poster = '', string $youtube = '', int $start = 0, string $bild = '' ): string {
	$has    = $vimeo || $src || $youtube;
	$attrs  = $vimeo ? ' data-vimeo="' . esc_attr( $vimeo ) . '"' : '';
	$attrs .= $youtube ? ' data-youtube="' . esc_attr( $youtube ) . '"' . ( $start ? ' data-start="' . $start . '"' : '' ) : '';
	$attrs .= $src ? ' data-src="' . esc_url( $src ) . '"' : '';
	$attrs .= $poster ? ' data-poster="' . esc_url( $poster ) . '"' : '';
	$icon   = '<svg width="30" height="30" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 5v14l12-7z"/></svg>';
	$play   = $has
		? '<button class="lf-video__play" type="button" aria-label="' . esc_attr( $label ) . '">' . $icon . '</button>'
		: '<span class="lf-video__play" aria-hidden="true">' . $icon . '</span>';
	$note   = $vimeo ? '<p class="lf-video__consent">Beim Abspielen lädt das Video von Vimeo.</p>' : ( $youtube ? '<p class="lf-video__consent">Beim Abspielen lädt das Video von YouTube.</p>' : '' );
	$img    = $bild ? '<img class="lf-video__poster" src="' . lf_img( $bild ) . '" alt="" loading="lazy" decoding="async">' : '';
	return "<!-- wp:html -->\n<figure class=\"lf-video-box\"><div class=\"lf-video\"{$attrs}>{$img}{$play}{$note}</div><figcaption class=\"lf-video__caption\">" . lf_e( $caption ) . "</figcaption></figure>\n<!-- /wp:html -->";
}

/** FAQ als <details>-Blöcke. */
function lf_faq_blocks( string $set ): string {
	$out = '';
	foreach ( lf_faq( $set ) as $item ) {
		$out .= '<!-- wp:details {"className":"lf-faq__item"} -->' . "\n"
			. '<details class="wp-block-details lf-faq__item"><summary>' . lf_e( $item[0] ) . '</summary>'
			. '<!-- wp:paragraph -->' . "\n" . '<p>' . lf_e( $item[1] ) . '</p>' . "\n" . '<!-- /wp:paragraph --></details>' . "\n"
			. '<!-- /wp:details -->' . "\n\n";
	}
	return $out;
}

function lf_button( string $text, string $href, string $style = 'lf-primary' ): string {
	return '<!-- wp:button {"className":"is-style-' . $style . '"} -->' . "\n"
		. '<div class="wp-block-button is-style-' . $style . '"><a class="wp-block-button__link wp-element-button" href="' . esc_attr( $href ) . '">' . lf_e( $text ) . '</a></div>' . "\n"
		. '<!-- /wp:button -->';
}

function lf_p( string $html, string $class = '' ): string {
	$attr = $class ? ' {"className":"' . $class . '"}' : '';
	$cls  = $class ? ' class="' . $class . '"' : '';
	return "<!-- wp:paragraph{$attr} -->\n<p{$cls}>{$html}</p>\n<!-- /wp:paragraph -->";
}

/** Drei Paketkarten (Experte, Unternehmen, Konzern). */
function lf_paket_karten( array $nur = array(), bool $vergleich = true ): string {
	$pakete = array(
		array(
			'name'   => 'Format Experte',
			'preis'  => 'ab 2.400 €',
			'meta'   => 'Setup 2.900 €, das ist die Pilotfolge.<br>Laufzeit 6 Monate.',
			'fuer'   => 'Für Kanzleien, Berater, Praxen und Makler mit eigenem Gesicht.',
			'punkte' => array( '2 Video-Folgen, remote oder Studio', 'Audio-Folge und Hosting', '3 Clips je Folge, Thumbnails, Shownotes' ),
			'button' => array( 'Erstgespräch buchen', '#anfrage', 'lf-secondary' ),
			'top'    => false,
		),
		array(
			'name'   => 'Format Unternehmen',
			'preis'  => 'ab 4.400 €',
			'meta'   => 'Setup 4.900 € mit Workshop und Pilotfolge.<br>Laufzeit 12 Monate.',
			'fuer'   => 'Für Marketing, HR und Vertrieb im Mittelstand.',
			'punkte' => array( '2 Studio-Folgen mit 3 Kameras', '5 Clips je Folge, LinkedIn-Textvorlagen', 'Gäste-Management und Monatsreport' ),
			'button' => array( 'Erstgespräch buchen', '#anfrage', 'lf-dark' ),
			'top'    => true,
		),
		array(
			'name'   => 'Format Konzern',
			'preis'  => 'ab 8.500 €',
			'meta'   => 'Setup ab 12.000 €.<br>Laufzeit 12 Monate.',
			'fuer'   => 'Für Unternehmenskommunikation und Corporate Brand.',
			'punkte' => array( 'Account-Based: Gäste aus Ihren Zielkunden', 'Video, Audio, Newsletter, Event-Schnitt, Clips nach Vereinbarung', 'Freigabeprozess und Pipeline-Reporting' ),
			'button' => array( 'Gespräch mit Wolfgang', '#anfrage', 'lf-secondary' ),
			'top'    => false,
		),
	);

	if ( $nur ) {
		$pakete = array_values( array_filter( $pakete, fn( $p ) => in_array( substr( $p['name'], 7 ), $nur, true ) ) );
	}
	$grid = 'lf-pakete__grid' . ( count( $pakete ) < 3 ? ' lf-pakete__grid--' . count( $pakete ) : '' );
	$out  = '<!-- wp:group {"className":"' . $grid . '","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group ' . $grid . '">';
	foreach ( $pakete as $p ) {
		$cls  = 'lf-paket' . ( $p['top'] ? ' lf-paket--top' : '' );
		$list = '';
		foreach ( $p['punkte'] as $pt ) {
			$list .= "<!-- wp:list-item -->\n<li>" . lf_e( $pt ) . "</li>\n<!-- /wp:list-item -->\n";
		}
		$out .= "\n" . '<!-- wp:group {"className":"' . $cls . '","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group ' . $cls . '">'
			. lf_h( 3, lf_e( $p['name'] ), 'lf-paket__titel' ) . "\n"
			. lf_p( lf_e( $p['preis'] ) . '<span> / Monat</span>', 'lf-price' ) . "\n"
			. lf_p( $p['meta'], 'lf-paket__meta' ) . "\n"
			. lf_p( lf_e( $p['fuer'] ) ) . "\n"
			. '<!-- wp:list {"className":"lf-paket__list"} -->' . "\n" . '<ul class="wp-block-list lf-paket__list">' . $list . '</ul>' . "\n" . '<!-- /wp:list -->' . "\n"
			. '<!-- wp:buttons {"className":"lf-paket__cta"} -->' . "\n" . '<div class="wp-block-buttons lf-paket__cta">' . lf_button( $p['button'][0], $p['button'][1], $p['button'][2] ) . '</div>' . "\n" . '<!-- /wp:buttons -->'
			. '</div>' . "\n" . '<!-- /wp:group -->';
	}
	$out .= "</div>\n<!-- /wp:group -->\n\n";
	if ( ! $vergleich ) {
		return $out;
	}
	$out .= lf_p( 'Zum Vergleich: Audio-Produktion ohne Video kostet in Berlin ab 2.300 € je Folge (<a href="https://podcastmania.de/" rel="noopener">Podcastmania</a>, Stand Oktober 2026). Unsere Formate: ab 1.200 € je Video-Folge, ohne Setup gerechnet.', 'lf-note' );
	return $out;
}

/** Video-Testimonial Gegenbauer. */
function lf_testimonial_gegenbauer(): string {
	return '<!-- wp:group {"className":"lf-testimonial","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial">'
		. '<!-- wp:group {"className":"lf-testimonial__media","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial__media">'
		. lf_video( 'Tom Kalányos, Gegenbauer, 26 Sekunden', 'Kundenstimme abspielen', '1052003179', '', '', '', 0, 'kalanyos-gegenbauer.webp' )
		. '</div>' . "\n" . '<!-- /wp:group -->' . "\n"
		. '<!-- wp:group {"className":"lf-testimonial__text","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial__text">'
		. ''
		. '<!-- wp:quote {"className":"lf-bigquote"} -->' . "\n" . '<blockquote class="wp-block-quote lf-bigquote">'
		. lf_p( '„Das Kosten-Nutzen-Verhältnis im Vergleich zu anderen Agenturen ist bei NextGen Podcast unangefochten Spitze.“' )
		. '</blockquote>' . "\n" . '<!-- /wp:quote -->' . "\n"
		. lf_p( '<strong>Tom Kalányos, damals Marketingleiter Gegenbauer</strong>' ) . "\n"
		. lf_p( 'Konzeption, Moderation, Produktion und Begleitung des Corporate Podcasts. ' . LF_NEXTGEN_HINWEIS, 'lf-muted' ) . "\n"
		. lf_p( '<a href="/referenzen/gegenbauer/">Gegenbauer-Referenz ansehen</a>', 'lf-link' )
		. '</div>' . "\n" . '<!-- /wp:group -->'
		. '</div>' . "\n" . '<!-- /wp:group -->';
}

/**
 * Formular (Funktion in AUFTRAG-04).
 */
function lf_formular( string $vorauswahl = '', bool $nachricht = false ): string {
	$state  = function_exists( 'lf_form_state' ) ? lf_form_state() : array( 'werte' => array(), 'fehler' => array() );
	$w      = $state['werte'];
	$f      = $state['fehler'];
	$wahl   = $w['vorhaben'] ?? ( array_search( $vorauswahl, LF_VORHABEN, true ) ?: '' );
	$opts   = '';
	foreach ( LF_VORHABEN as $key => $label ) {
		$opts .= '<option value="' . esc_attr( $key ) . '"' . selected( $wahl, $key, false ) . '>' . lf_e( $label ) . '</option>';
	}
	$feld = function ( string $name, string $label, string $type, string $auto, bool $pflicht = false ) use ( $w, $f ): string {
		$id  = 'lf-' . $name;
		$err = $f[ $name ] ?? '';
		return '<label for="' . $id . '">' . lf_e( $label ) . ( $pflicht ? ' *' : '' )
			. '<input id="' . $id . '" type="' . $type . '" name="' . $name . '" autocomplete="' . $auto . '" value="' . esc_attr( $w[ $name ] ?? '' ) . '"'
			. ( $pflicht ? ' required' : '' ) . ( $err ? ' aria-invalid="true" aria-describedby="' . $id . '-fehler"' : '' ) . '>'
			. ( $err ? '<span class="lf-form__fehler" id="' . $id . '-fehler">' . lf_e( $err ) . '</span>' : '' ) . '</label>';
	};
	$hidden = '<input type="hidden" name="_lf" value="' . esc_attr( wp_create_nonce( 'lf_anfrage' ) ) . '">'
		. '<input type="hidden" name="ts" value="' . esc_attr( lf_form_ts() ) . '">'
		. '<input type="hidden" name="seite" value="' . esc_url( home_url( remove_query_arg( array( 'lf_form', 't', 'src', 'v' ), wp_unslash( $_SERVER['REQUEST_URI'] ?? '/' ) ) ) ) . '">';
	foreach ( LF_ATTR_FELDER as $a ) {
		$hidden .= '<input type="hidden" name="' . $a . '" value="" data-lf-attr="' . $a . '">';
	}
	$summary = $f ? '<div class="lf-form__summary" role="alert"><strong>Bitte prüfen Sie Ihre Angaben.</strong> ' . lf_e( implode( ' ', $f ) ) . '</div>' : '';
	return '<!-- wp:html -->' . "\n"
		. '<form class="lf-form" method="post" action="/anfrage-senden/">'
		. $summary
		. '<div class="lf-form__row">' . $feld( 'name', 'Name', 'text', 'name' ) . $feld( 'firma', 'Unternehmen', 'text', 'organization', true ) . '</div>'
		. '<div class="lf-form__row">' . $feld( 'email', 'E-Mail', 'email', 'email', true ) . $feld( 'telefon', 'Telefon (optional)', 'tel', 'tel' ) . '</div>'
		. '<label for="lf-vorhaben">Was planen Sie?<select id="lf-vorhaben" name="vorhaben">' . $opts . '</select></label>'
		. ( $nachricht ? '<label for="lf-nachricht">Nachricht (optional)<textarea id="lf-nachricht" name="nachricht" rows="4">' . esc_textarea( $w['nachricht'] ?? '' ) . '</textarea></label>' : '' )
		. '<div class="lf-form__hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>'
		. $hidden
		. '<button class="lf-btn lf-btn--primary lf-btn--hero" type="submit">Anfrage senden</button>'
		. '<p class="lf-form__hint">Mit dem Absenden stimmen Sie der Verarbeitung Ihrer Angaben zur Beantwortung der Anfrage zu. Details in der <a href="/datenschutz/">Datenschutzerklärung</a>.</p>'
		. '</form>' . "\n" . '<!-- /wp:html -->';
}

/** Abschnitt: volle Breite, innen Container 1200 px. */
function lf_section( string $class, string $inner, string $anchor = '' ): string {
	$a_json = $anchor ? ',"anchor":"' . $anchor . '"' : '';
	$a_html = $anchor ? ' id="' . $anchor . '"' : '';
	return '<!-- wp:group {"tagName":"section"' . $a_json . ',"className":"lf-section ' . $class . '","layout":{"type":"default"}} -->' . "\n"
		. '<section' . $a_html . ' class="wp-block-group lf-section ' . $class . '">'
		. '<!-- wp:group {"className":"lf-container","layout":{"type":"default"}} -->' . "\n"
		. '<div class="wp-block-group lf-container">' . "\n" . $inner . "\n" . '</div>' . "\n" . '<!-- /wp:group -->'
		. '</section>' . "\n" . '<!-- /wp:group -->';
}

function lf_group( string $class, string $inner ): string {
	return '<!-- wp:group {"className":"' . $class . '","layout":{"type":"default"}} -->' . "\n"
		. '<div class="wp-block-group ' . $class . '">' . "\n" . $inner . "\n" . '</div>' . "\n" . '<!-- /wp:group -->';
}

function lf_h( int $level, string $text, string $class = '' ): string {
	$attrs = array();
	if ( 2 !== $level ) {
		$attrs[] = '"level":' . $level;
	}
	if ( $class ) {
		$attrs[] = '"className":"' . $class . '"';
	}
	$json = $attrs ? ' {' . implode( ',', $attrs ) . '}' : '';
	return "<!-- wp:heading{$json} -->\n<h{$level} class=\"wp-block-heading" . ( $class ? " {$class}" : '' ) . "\">{$text}</h{$level}>\n<!-- /wp:heading -->";
}

function lf_buttons( string $class, string ...$buttons ): string {
	return '<!-- wp:buttons {"className":"' . $class . '"} -->' . "\n" . '<div class="wp-block-buttons ' . $class . '">' . implode( "\n\n", $buttons ) . '</div>' . "\n" . '<!-- /wp:buttons -->';
}

function lf_list( array $items, string $class = '' ): string {
	$li = '';
	foreach ( $items as $i ) {
		$li .= "<!-- wp:list-item -->\n<li>{$i}</li>\n<!-- /wp:list-item -->\n";
	}
	$json = $class ? ' {"className":"' . $class . '"}' : '';
	return "<!-- wp:list{$json} -->\n<ul class=\"wp-block-list" . ( $class ? " {$class}" : '' ) . "\">{$li}</ul>\n<!-- /wp:list -->";
}

function lf_image( string $file, string $alt, string $class = '', bool $eager = false, string $caption = '' ): string {
	$json = $class ? ',"className":"' . $class . '"' : '';
	// Studiofotos liegen in zwei Breiten (…-600.webp, …-1200.webp).
	if ( str_ends_with( $file, '-1200.webp' ) ) {
		$extra = ' srcset="' . lf_srcset( $file ) . '" sizes="' . LF_SIZES . '" width="1200" height="672"';
	} else {
		$extra = '';
	}
	$load = $eager ? ' fetchpriority="high" decoding="async"' : ' loading="lazy" decoding="async"';
	$cap  = $caption ? '<figcaption class="wp-element-caption">' . $caption . '</figcaption>' : '';
	return '<!-- wp:image {"sizeSlug":"full","linkDestination":"none"' . $json . '} -->' . "\n"
		. '<figure class="wp-block-image size-full' . ( $class ? " {$class}" : '' ) . '"><img src="' . lf_img( $file ) . '" alt="' . esc_attr( $alt ) . '"' . $extra . $load . '/>' . $cap . '</figure>' . "\n"
		. '<!-- /wp:image -->';
}

/** Kopfzeile eines Abschnitts: H2 links, Absatz rechts. */
function lf_head( string $h2, string $p = '' ): string {
	return lf_group( 'lf-head', lf_h( 2, $h2 ) . ( $p ? "\n" . lf_p( $p ) : '' ) );
}

function lf_table( array $head, array $rows, string $class = '' ): string {
	$th = '';
	foreach ( $head as $h ) {
		$th .= '<th>' . $h . '</th>';
	}
	$tb = '';
	foreach ( $rows as $r ) {
		$tb .= '<tr>';
		foreach ( $r as $c ) {
			$tb .= '<td>' . $c . '</td>';
		}
		$tb .= '</tr>';
	}
	return lf_group( 'lf-scroll', '<!-- wp:table {"className":"lf-table ' . $class . '"} -->' . "\n"
		. '<figure class="wp-block-table lf-table ' . $class . '"><table><thead><tr>' . $th . '</tr></thead><tbody>' . $tb . '</tbody></table></figure>' . "\n"
		. '<!-- /wp:table -->' );
}

/** Kundenstimmen-Karte; $nextgen = Zitat nennt den alten Namen. */
function lf_stimme( string $zitat, string $name, string $meta, bool $nextgen ): string {
	return lf_group( 'lf-stimme',
		lf_p( lf_e( $zitat ), 'lf-stimme__text' ) . "\n"
		. lf_p( '<strong>' . lf_e( $name ) . '</strong><br>' . implode( '<br>', array_map( 'lf_e', explode( ' · ', $meta ) ) ), 'lf-stimme__name' )
		. ( $nextgen ? "\n" . lf_p( LF_NEXTGEN_HINWEIS, 'lf-stimme__hinweis' ) : '' )
	);
}

/** Anfrage-Abschnitt; $calendly = false für /pilotfolge/. */
function lf_anfrage( string $h2, string $intro, string $vorauswahl = '', bool $calendly = true, bool $calendly_zuerst = false ): string {
	$telefon = lf_p( 'Lieber telefonieren? <a href="' . LF_TELEFON_LINK . '"><strong>' . LF_TELEFON . '</strong></a>, Montag bis Freitag 9 bis 18 Uhr.', 'lf-anfrage__tel' );
	$links   = lf_group( 'lf-anfrage__form', lf_h( 2, $h2 ) . "\n" . lf_p( $intro ) . "\n" . lf_formular( $vorauswahl ) . ( $calendly ? '' : "\n" . $telefon ) );
	if ( ! $calendly ) {
		return lf_section( 'lf-anfrage lf-anfrage--solo', $links, 'anfrage' );
	}
	$rechts = lf_group( 'lf-anfrage__side',
		lf_group( 'lf-termin',
			lf_p( '<strong>Erstgespräch mit Wolfgang Patz</strong>' ) . "\n"
			. lf_p( '30 Minuten, Video-Call, kostenlos.', 'lf-muted' ) . "\n"
			. lf_termin_embed()
		) . "\n" . $telefon
	);
	if ( $calendly_zuerst ) {
		return lf_section( 'lf-anfrage lf-anfrage--termin-zuerst', $links . "\n" . $rechts, 'anfrage' );
	}
	return lf_section( 'lf-anfrage', $links . "\n" . $rechts, 'anfrage' );
}

/** Ablauf-Schritte: [[Frist, Titel, Text], …]. */
function lf_ablauf( string $h2, array $schritte ): string {
	$s = '';
	foreach ( $schritte as $x ) {
		$s .= lf_group( 'lf-step', lf_p( lf_e( $x[0] ), 'lf-step__when' . ( str_contains( $x[0], '48' ) ? ' lf-step__when--rec' : '' ) ) . "\n" . lf_p( '<strong>' . lf_e( $x[1] ) . '</strong>' ) . "\n" . lf_p( lf_e( $x[2] ), 'lf-muted' ) ) . "\n";
	}
	return lf_section( 'lf-section--white lf-ablauf', lf_h( 2, $h2 ) . "\n" . lf_group( 'lf-steps', $s ) );
}

function lf_faq_section( string $h2, string $set ): string {
	return lf_section( 'lf-section--white lf-faq', lf_h( 2, $h2 ) . "\n" . lf_group( 'lf-faq__list', lf_faq_blocks( $set ) ) );
}

const LF_ROUTE = 'https://www.google.com/maps/dir/?api=1&destination=Franz-Jacob-Stra%C3%9Fe+2c%2C+10369+Berlin';

/** Statischer Kartenausschnitt (eigenes Bild, kein Embed) mit Routen-Link. */
function lf_karte(): string {
	return lf_group( 'lf-karte',
		lf_image( 'karte-studio-berlin.webp', 'Kartenausschnitt Berlin-Lichtenberg: Studio in der Franz-Jacob-Straße 2c, nahe S-Bahnhof Storkower Straße', 'lf-karte__bild' ) . "\n"
		. lf_p( '<a href="' . esc_url( LF_ROUTE ) . '" rel="noopener">Route in Google Maps planen</a><br>Karte © <a href="https://www.openstreetmap.org/copyright" rel="noopener">OpenStreetMap-Mitwirkende</a>', 'lf-karte__links' )
	);
}

/** Kontaktdaten als Liste. */
function lf_kontaktdaten(): string {
	return lf_list( array(
		'Telefon <a href="' . LF_TELEFON_LINK . '">' . LF_TELEFON . '</a>, Montag bis Freitag 9 bis 18 Uhr',
		'Mobil <a href="tel:+491607849590">+49 160 78 49 590</a>',
		'E-Mail <a href="mailto:kontakt@leitformat.de">kontakt@leitformat.de</a>',
		'Studio: Franz-Jacob-Straße 2c, 10369 Berlin',
	), 'lf-kontaktdaten' );
}

/** Karten-Raster: [[Titel, Text], …]. */
function lf_karten( array $items, string $class = '', bool $nummern = false ): string {
	$html = '';
	foreach ( $items as $i => $k ) {
		$kopf  = $nummern ? lf_p( sprintf( '%02d', $i + 1 ), 'lf-karte__nr' ) . "\n" : '';
		$html .= lf_group( 'lf-karte-item', $kopf . lf_p( '<strong>' . $k[0] . '</strong>' ) . "\n" . lf_p( $k[1], 'lf-muted' ) ) . "\n";
	}
	return lf_group( 'lf-karten ' . $class, $html );
}

/** Quelle als kleine Fußnote. */
function lf_quelle( string $text, string $url ): string {
	return '<a href="' . esc_url( $url ) . '" rel="noopener">' . $text . '</a>';
}

function lf_testimonial_gegenbauer_section(): string {
	return lf_section( 'lf-testimonial-section', lf_testimonial_gegenbauer() );
}

/** Video-Fläche ohne Player: Standbild mit Link (Video noch nicht für leitformat.de freigegeben). */
function lf_video_link( string $caption, string $url, string $bild = 'studio/studio-totale-600.webp' ): string {
	$icon = '<svg width="30" height="30" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 5v14l12-7z"/></svg>';
	return "<!-- wp:html -->\n<a class=\"lf-video-box lf-video-box--link\" href=\"" . esc_url( $url ) . "\" rel=\"noopener\"><span class=\"lf-video\"><img class=\"lf-video__poster\" src=\"" . lf_img( $bild ) . "\" alt=\"\" loading=\"lazy\" decoding=\"async\"><span class=\"lf-video__play\" aria-hidden=\"true\">{$icon}</span></span><span class=\"lf-video__caption\">" . lf_e( $caption ) . ". Auf Vimeo ansehen.</span></a>\n<!-- /wp:html -->";
}

/** Pilotfolge-Karte: Text und Preis links, Studio-Foto rechts (DESIGN-01). */
function lf_pilotkarte( string $titel, string $text, string $hinweis, int $h = 3, string $klasse = '' ): string {
	return lf_group( trim( 'lf-pilot lf-pilot--foto ' . $klasse ),
		lf_group( 'lf-pilot__inhalt',
			lf_h( $h, $titel, 'lf-pilot__title' ) . "\n"
			. $text . "\n"
			. lf_group( 'lf-pilot__preis',
				lf_p( '2.900 €', 'lf-price lf-price--xl' ) . "\n"
				. lf_p( $hinweis, 'lf-pilot__hinweis' ) . "\n"
				. lf_buttons( 'lf-pilot__cta', lf_button( 'Pilotfolge anfragen', '#anfrage' ) )
			)
		) . "\n"
		. lf_group( 'lf-pilot__foto', lf_image( 'studio/studio-totale-1200.webp', 'Aufnahme einer Pilotfolge im Studio Berlin: drei Personen am Tisch, drei Kameras', 'lf-pilot__bild' ) )
	);
}

/**
 * Kundenlogos als Grafik (von der alten Seite, freigestellt, einfarbig; Grau per CSS).
 * Fehlen bewusst: Techniker Krankenkasse (kein Logo vorhanden – „TK.png“ der alten Seite ist thyssenkrupp),
 * Wikimedia (vorhandenes Logo ist die Wikimedia Foundation, Kunde ist Wikimedia Deutschland).
 * Höhe in px je Logo, damit die optische Größe gleich wirkt.
 */
function lf_logo_daten(): array {
	return array(
		'dkb'                      => array( 'DKB', 36 ),
		'thyssenkrupp'             => array( 'thyssenkrupp', 26 ),
		'weleda'                   => array( 'Weleda', 22 ),
		'mueller'                  => array( 'Müller', 34 ),
		'johanniter'               => array( 'Johanniter', 26 ),
		'gegenbauer'               => array( 'Gegenbauer', 18 ),
		'konrad-adenauer-stiftung' => array( 'Konrad-Adenauer-Stiftung', 28 ),
		'globus'                   => array( 'Globus', 30 ),
		'nh-hotels'                => array( 'NH Hotels', 32 ),
		'hy'                       => array( 'hy – The Axel Springer Consulting Group', 26 ),
		'myra'                     => array( 'Myra Security', 20 ),
		'rheinische-notarkammer'   => array( 'Rheinische Notarkammer', 34 ),
		'abgeordnetenhaus-berlin'  => array( 'Abgeordnetenhaus Berlin', 24 ),
	);
}

/** Logostreifen: Startseite fünf Logos, mit $alle sämtliche. */
function lf_logo_streifen( bool $alle = false ): string {
	$daten = lf_logo_daten();
	$wahl  = $alle ? array_keys( $daten ) : array( 'dkb', 'thyssenkrupp', 'weleda', 'mueller', 'johanniter' );
	$li    = '';
	foreach ( $wahl as $k ) {
		[ $name, $h ] = $daten[ $k ];
		$li .= '<li><img src="' . lf_img( "logos/{$k}.webp" ) . '" alt="' . esc_attr( $name ) . '" height="' . $h . '" loading="lazy" decoding="async"></li>';
	}
	return lf_section( 'lf-logos lf-logos--bild',
		lf_p( 'Wir produzieren für', 'lf-logos__label' ) . "\n"
		. "<!-- wp:html -->\n<ul class=\"lf-logos__bilder\">" . $li . "</ul>\n<!-- /wp:html -->"
	);
}

const LF_SIZES = '(min-width: 1200px) 600px, (min-width: 900px) 50vw, calc(100vw - 40px)';

/** srcset aus den vorhandenen Breiten (…-600/-800/-1200.webp). */
function lf_srcset( string $file ): string {
	$teile = array();
	foreach ( array( 600, 800, 1200 ) as $w ) {
		$f = str_replace( '-1200.webp', "-{$w}.webp", $file );
		if ( is_readable( get_theme_file_path( "assets/img/{$f}" ) ) ) {
			$teile[] = lf_img( $f ) . " {$w}w";
		}
	}
	return implode( ', ', $teile );
}
