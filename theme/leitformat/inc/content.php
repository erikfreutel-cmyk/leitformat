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
			array( 'Wem gehören die Rechte?', 'Rohmaterial, Schnitt und Clips gehören Ihnen. Musik lizenzieren wir für Ihre Nutzung, zeitlich unbegrenzt.' ),
			array( 'Wir haben keine Gäste. Was dann?', 'Gästeakquise ist Teil der Formate Unternehmen und Konzern. Im Konzern-Format kommen die Gäste aus Ihrer Zielkundenliste.' ),
			array( 'Brauchen wir ein eigenes Studio?', 'Nein. Unser Studio steht in Berlin, mobil kommen wir zu Ihnen.' ),
			array( 'Wie laufen Freigaben?', 'Jede Folge und jeder Clip wird per Link freigegeben, mit Kommentaren an der Stelle. Zwei Korrekturschleifen sind inklusive.' ),
			array( 'Wie messen Sie Erfolg?', 'Views und Downloads je Kanal, Reichweite bei Zielkunden auf LinkedIn und – im Konzern-Format – welche Gäste und Zuschauer später angefragt haben.' ),
		),
		'pilot'  => array(
			array( 'Was ist drin?', 'Formatgespräch, Aufnahme im Studio Berlin oder remote, Schnitt in Video und Audio, 6 Clips im Hochformat, Thumbnail und Shownotes. Festpreis 2.900 € netto.' ),
			array( 'Studio oder remote?', 'Beides geht. Das Studio in Berlin hat 4 × 5 m, 3 Kameras und Platz für bis zu 4 Personen. Remote nehmen wir mit Ihrer Technik auf.' ),
			array( 'Wem gehören die Rechte?', 'Rohmaterial, Schnitt und Clips gehören Ihnen. Musik lizenzieren wir für Ihre Nutzung, zeitlich unbegrenzt.' ),
			array( 'Was, wenn uns das Ergebnis nicht gefällt?', 'Zwei Korrekturrunden sind inklusive. Passt es danach nicht, sprechen wir darüber, bevor Sie etwas weiter buchen.' ),
			array( 'Was passiert nach der Pilotfolge?', 'Die Pilotfolge wird vollständig auf das Setup angerechnet. Beim Format Experte ist die Pilotfolge das Setup – danach zahlen Sie nur die Monatsrate.' ),
		),
		'preise' => array(
			array( 'Was kostet eine Folge?', 'Im Format Experte rund 1.200 €, im Format Unternehmen rund 2.200 € inklusive Video und Clips, jeweils ohne Setup gerechnet. Die Pilotfolge kostet 2.900 € als Einzelstück.' ),
			array( 'Gibt es Rabatt bei Jahresbuchung?', 'Wer die gesamte Laufzeit im Voraus zahlt, bekommt 10 % auf die Monatsraten. Auf das Setup gibt es keinen Rabatt.' ),
			array( 'Was kostet der Dreh vor Ort?', 'Das hängt von Ort, Dauer und Anzahl der Kameras ab. Sie bekommen den Preis schriftlich vor dem Dreh.' ),
			array( 'Sind Musik-Lizenzen enthalten?', 'Ja. Musik lizenzieren wir für Ihre Nutzung, zeitlich unbegrenzt.' ),
			array( 'Was passiert nach der Laufzeit?', 'Der Vertrag verlängert sich automatisch. Sie können mit vier Wochen Frist zum Ende der Laufzeit kündigen.' ),
			array( 'Wie wird abgerechnet?', 'Das Setup mit Beginn, danach monatlich. Zahlungsziel 14 Tage. Alle Preise netto zuzüglich Umsatzsteuer.' ),
		),
	);
	return $faq[ $set ] ?? array();
}

/** Kundennamen für die Logoleiste (Reihenfolge aus daten/medien-alte-seite.md, erste zehn). */
function lf_logos(): array {
	return array( 'DKB', 'Weleda', 'Müller', 'thyssenkrupp', 'Techniker Krankenkasse', 'Johanniter', 'Konrad-Adenauer-Stiftung', 'Wikimedia', 'NH Hotels', 'Globus' );
}

/** Acht Referenzen der Startseite: slug => [Name, Unterzeile]. */
function lf_referenzen(): array {
	return array(
		'wikimove'                => array( 'WIKIMOVE', 'Wikimedia Deutschland · Audio' ),
		'thyssenkrupp'            => array( 'thyssenkrupp', 'Interner Podcast' ),
		'return-on-innovation'    => array( 'Return on Innovation', 'Video-Podcast' ),
		'myra-minds'              => array( 'Myra Minds', 'Myra Security · Video-Podcast' ),
		'mueller-gruppe'          => array( 'Müller', 'Unternehmensgruppe Theo Müller · Video-Podcast' ),
		'klimabauern'             => array( '#KlimaBauern', 'Landesbauernverband Brandenburg' ),
		'gegenbauer'              => array( 'Gegenbauer Podcast', 'Konzeption, Moderation, Produktion' ),
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
function lf_video( string $caption, string $label, string $vimeo = '', string $src = '', string $poster = '' ): string {
	$has    = $vimeo || $src;
	$attrs  = $vimeo ? ' data-vimeo="' . esc_attr( $vimeo ) . '"' : '';
	$attrs .= $src ? ' data-src="' . esc_url( $src ) . '"' : '';
	$attrs .= $poster ? ' data-poster="' . esc_url( $poster ) . '"' : '';
	$icon   = '<svg width="30" height="30" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 5v14l12-7z"/></svg>';
	$play   = $has
		? '<button class="lf-video__play" type="button" aria-label="' . esc_attr( $label ) . '">' . $icon . '</button>'
		: '<span class="lf-video__play" aria-hidden="true">' . $icon . '</span>';
	$note   = $vimeo ? '<p class="lf-video__consent">Beim Abspielen lädt das Video von Vimeo.</p>' : '';
	return "<!-- wp:html -->\n<div class=\"lf-video\"{$attrs}>{$play}<p class=\"lf-video__caption\">" . lf_e( $caption ) . "</p>{$note}</div>\n<!-- /wp:html -->";
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
function lf_paket_karten(): string {
	$pakete = array(
		array(
			'name'   => 'Format Experte',
			'preis'  => 'ab 2.400 €',
			'meta'   => 'Setup 2.900 € = Pilotfolge · Laufzeit 6 Monate',
			'fuer'   => 'Für Kanzleien, Berater, Praxen und Makler mit eigenem Gesicht.',
			'punkte' => array( '2 Video-Folgen, remote oder Studio', 'Audio-Folge und Hosting', '3 Clips je Folge, Thumbnails, Shownotes' ),
			'button' => array( 'Erstgespräch buchen', '#anfrage', 'lf-secondary' ),
			'top'    => false,
		),
		array(
			'name'   => 'Format Unternehmen',
			'preis'  => 'ab 4.400 €',
			'meta'   => 'Setup 4.900 € inkl. Workshop und Pilotfolge · 12 Monate',
			'fuer'   => 'Für Marketing, HR und Vertrieb im Mittelstand.',
			'punkte' => array( '2 Studio-Folgen mit 3 Kameras', '5 Clips je Folge, LinkedIn-Textvorlagen', 'Gäste-Management und Monatsreport' ),
			'button' => array( 'Erstgespräch buchen', '#anfrage', 'lf-dark' ),
			'top'    => true,
		),
		array(
			'name'   => 'Format Konzern',
			'preis'  => 'ab 8.500 €',
			'meta'   => 'Setup ab 12.000 € · 12 Monate',
			'fuer'   => 'Für Unternehmenskommunikation und Corporate Brand.',
			'punkte' => array( 'Account-Based: Gäste aus Ihren Zielkunden', 'Video, Audio, Newsletter, Event-Schnitt, Clips nach Vereinbarung', 'Freigabeprozess und Pipeline-Reporting' ),
			'button' => array( 'Gespräch mit Wolfgang', '#anfrage', 'lf-secondary' ),
			'top'    => false,
		),
	);

	$out = '<!-- wp:group {"className":"lf-pakete__grid","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-pakete__grid">';
	foreach ( $pakete as $p ) {
		$cls  = 'lf-paket' . ( $p['top'] ? ' lf-paket--top' : '' );
		$list = '';
		foreach ( $p['punkte'] as $pt ) {
			$list .= "<!-- wp:list-item -->\n<li>" . lf_e( $pt ) . "</li>\n<!-- /wp:list-item -->\n";
		}
		$out .= "\n" . '<!-- wp:group {"className":"' . $cls . '","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group ' . $cls . '">'
			. lf_p( lf_e( $p['name'] ), 'lf-eyebrow' ) . "\n"
			. lf_p( lf_e( $p['preis'] ) . '<span> / Monat</span>', 'lf-price' ) . "\n"
			. lf_p( lf_e( $p['meta'] ), 'lf-paket__meta' ) . "\n"
			. lf_p( lf_e( $p['fuer'] ) ) . "\n"
			. '<!-- wp:list {"className":"lf-paket__list"} -->' . "\n" . '<ul class="wp-block-list lf-paket__list">' . $list . '</ul>' . "\n" . '<!-- /wp:list -->' . "\n"
			. '<!-- wp:buttons {"className":"lf-paket__cta"} -->' . "\n" . '<div class="wp-block-buttons lf-paket__cta">' . lf_button( $p['button'][0], $p['button'][1], $p['button'][2] ) . '</div>' . "\n" . '<!-- /wp:buttons -->'
			. '</div>' . "\n" . '<!-- /wp:group -->';
	}
	$out .= "</div>\n<!-- /wp:group -->\n\n";
	$out .= lf_p( 'Zum Vergleich: Audio-Produktion ohne Video kostet in Berlin ab 2.300 € je Folge (<a href="https://podcastmania.de/" rel="noopener">Podcastmania</a>, Stand Oktober 2026). Wir liefern Video und Clips darunter.', 'lf-note' );
	return $out;
}

/** Video-Testimonial Gegenbauer. */
function lf_testimonial_gegenbauer(): string {
	return '<!-- wp:group {"className":"lf-testimonial","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial">'
		. '<!-- wp:group {"className":"lf-testimonial__media","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial__media">'
		. lf_video( 'Tom Kalányos, Gegenbauer · 0:26', 'Kundenstimme abspielen', '1052003179' )
		. '</div>' . "\n" . '<!-- /wp:group -->' . "\n"
		. '<!-- wp:group {"className":"lf-testimonial__text","layout":{"type":"default"}} -->' . "\n" . '<div class="wp-block-group lf-testimonial__text">'
		. lf_p( 'Kundenstimme', 'lf-eyebrow lf-eyebrow--plain' ) . "\n"
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
function lf_formular( string $vorauswahl = '' ): string {
	$optionen = array( 'Pilotfolge', 'Ein Format für unser Unternehmen', 'Konzernprojekt', 'Studio buchen', 'Noch unklar' );
	$opts     = '';
	foreach ( $optionen as $o ) {
		$opts .= '<option' . ( $o === $vorauswahl ? ' selected' : '' ) . '>' . lf_e( $o ) . '</option>';
	}
	return '<!-- wp:html -->' . "\n"
		. '<form class="lf-form" method="post" action="/anfrage-senden/">'
		. '<div class="lf-form__row">'
		. '<label>Name<input type="text" name="name" autocomplete="name"></label>'
		. '<label>Unternehmen *<input type="text" name="firma" required autocomplete="organization"></label>'
		. '</div><div class="lf-form__row">'
		. '<label>E-Mail *<input type="email" name="email" required autocomplete="email"></label>'
		. '<label>Telefon (optional)<input type="tel" name="telefon" autocomplete="tel"></label>'
		. '</div>'
		. '<label>Was planen Sie?<select name="vorhaben">' . $opts . '</select></label>'
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

function lf_image( string $file, string $alt, string $class = '' ): string {
	$json = $class ? ',"className":"' . $class . '"' : '';
	return '<!-- wp:image {"sizeSlug":"full","linkDestination":"none"' . $json . '} -->' . "\n"
		. '<figure class="wp-block-image size-full' . ( $class ? " {$class}" : '' ) . '"><img src="' . lf_img( $file ) . '" alt="' . esc_attr( $alt ) . '" loading="lazy" decoding="async"/></figure>' . "\n"
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
	return lf_group( 'lf-card lf-stimme',
		lf_p( lf_e( $zitat ), 'lf-stimme__text' ) . "\n"
		. lf_p( '<strong>' . lf_e( $name ) . '</strong><br>' . lf_e( $meta ), 'lf-stimme__name' )
		. ( $nextgen ? "\n" . lf_p( LF_NEXTGEN_HINWEIS, 'lf-stimme__hinweis' ) : '' )
	);
}

/** Anfrage-Abschnitt; $calendly = false für /pilotfolge/. */
function lf_anfrage( string $h2, string $intro, string $vorauswahl = '', bool $calendly = true ): string {
	$telefon = lf_p( 'Lieber telefonieren? <a href="' . LF_TELEFON_LINK . '"><strong>' . LF_TELEFON . '</strong></a>, Montag bis Freitag 9 bis 18 Uhr.', 'lf-anfrage__tel' );
	$links   = lf_group( 'lf-anfrage__form', lf_h( 2, $h2 ) . "\n" . lf_p( $intro ) . "\n" . lf_formular( $vorauswahl ) . ( $calendly ? '' : "\n" . $telefon ) );
	if ( ! $calendly ) {
		return lf_section( 'lf-anfrage lf-anfrage--solo', $links, 'anfrage' );
	}
	$rechts = lf_group( 'lf-anfrage__side',
		lf_group( 'lf-card lf-termin',
			lf_p( '<strong>Erstgespräch mit Wolfgang Patz</strong>' ) . "\n"
			. lf_p( '30 Minuten, Video-Call, kostenlos.', 'lf-muted' ) . "\n"
			. "<!-- wp:html -->\n<div class=\"lf-termin__embed\" id=\"termin\">[Calendly-Kalender eingebettet – AUFTRAG-04]</div>\n<!-- /wp:html -->"
		) . "\n" . $telefon
	);
	return lf_section( 'lf-anfrage', $links . "\n" . $rechts, 'anfrage' );
}

/** Ablauf-Schritte: [[Frist, Titel, Text], …]. */
function lf_ablauf( string $h2, array $schritte ): string {
	$s = '';
	foreach ( $schritte as $x ) {
		$s .= lf_group( 'lf-step', lf_p( lf_e( $x[0] ), 'lf-step__when' ) . "\n" . lf_p( '<strong>' . lf_e( $x[1] ) . '</strong>' ) . "\n" . lf_p( lf_e( $x[2] ), 'lf-muted' ) ) . "\n";
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
		. lf_p( '<a href="' . esc_url( LF_ROUTE ) . '" rel="noopener">Route in Google Maps planen</a> · Karte © <a href="https://www.openstreetmap.org/copyright" rel="noopener">OpenStreetMap-Mitwirkende</a>', 'lf-karte__links' )
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
