<?php
/**
 * Title, Meta-Description, Robots und FAQPage-Schema je Seite.
 * Kein SEO-Plugin: die Zuordnung steht hier (Muster „Keyword – Leitformat“).
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

/**
 * SEO-Angaben je Seite. Schlüssel: 'front' oder Seiten-Slug.
 *
 * @return array{title?:string,desc?:string,faq?:string}
 */
function lf_seo(): array {
	$map = array(
		'front'      => array(
			'title' => 'Video-Podcast-Agentur für Unternehmen – Leitformat',
			'desc'  => 'Video-Podcasts, die bei Entscheidern ankommen. Konzept, Studio Berlin, Clips in 48 Stunden, Preise ab 2.400 € im Monat. Podcasts seit 2020 für DKB, thyssenkrupp, Weleda.',
			'faq'   => 'start',
		),
		'pilotfolge' => array(
			'title' => 'Pilotfolge: Video-Podcast in 14 Tagen – Leitformat',
			'desc'  => 'Ihre erste Video-Folge in 14 Tagen zum Festpreis von 2.900 €: Formatgespräch, Aufnahme in Berlin oder remote, Schnitt, 6 Clips, Thumbnail, Shownotes.',
			'faq'   => 'pilot',
		),
		'preise'     => array(
			'title' => 'Was kostet ein Video-Podcast? Preise – Leitformat',
			'desc'  => 'Pilotfolge 2.900 €, Formate ab 2.400 € im Monat, Studio Berlin ab 200 € je Stunde. Alle Preise netto, mit Vergleich zu Marktpreisen.',
			'faq'   => 'preise',
		),
		'podcast-studio-berlin' => array(
			'title' => 'Podcast-Studio Berlin mieten – Video & Audio, ab 200 € – Leitformat',
			'desc'  => 'Podcast-Studio in Berlin-Lichtenberg: 3 Sony-4K-Kameras, 3 Shure SM7B, bis 4 Personen, Techniker im Raum, Rohdaten am selben Tag. Ab 200 € je Stunde.',
			'faq'   => 'studio',
		),
		'corporate-podcast-agentur' => array(
			'title' => 'Corporate-Podcast-Agentur für Konzerne – Leitformat',
			'desc'  => 'Corporate Podcasts für Konzerne: Gäste aus Ihren Zielkunden, Freigaben nach Ihrem Prozess, Reporting bis zur Anfrage. Für DKB, thyssenkrupp, Müller.',
			'faq'   => 'corporate',
		),
		'interview-podcast' => array(
			'title' => 'Interview-Podcast als Vertriebssystem – Leitformat',
			'desc'  => 'Der Interview-Podcast, in dem Ihre Wunschkunden die Gäste sind. Mit Wert-Rechner, Porsche-Fallgeschichte und Paketen ab 2.400 € im Monat.',
			'faq'   => 'interview',
		),
		'video-podcast' => array(
			'title' => 'Video-Podcast produzieren lassen: Folge, Clips, LinkedIn – Leitformat',
			'desc'  => 'Ein Dreh, fünf Ausspielungen: Video-Folge, Audio-Folge, Clips, Zitatkarten, Newsletter. Clips in 48 Stunden, Folge in 5 Werktagen.',
			'faq'   => 'video',
		),
		'podcast-produktion' => array(
			'title' => 'Podcast-Produktion für Unternehmen: Audio und Video – Leitformat',
			'desc'  => 'Podcast produzieren lassen: Konzeption, Aufnahme, Schnitt, Clips, Veröffentlichung. Fertig in 5 Werktagen, Pilotfolge zum Festpreis von 2.900 €.',
			'faq'   => 'produktion',
		),
		'ueber-uns'   => array(
			'title' => 'Über uns: Team und Studio in Berlin – Leitformat',
			'desc'  => 'Wolfgang Patz, Erik Freutel und Team: Video-Podcasts aus dem eigenen Studio in Berlin. Ehemals NextGen Podcast, 33 Google-Bewertungen.',
		),
		'danke'       => array( 'title' => 'Anfrage gesendet – Leitformat', 'desc' => 'Ihre Anfrage ist angekommen. Wählen Sie jetzt einen Termin für das Erstgespräch.' ),
		'wiki'        => array( 'title' => 'Podcast-Wiki – Leitformat', 'desc' => 'Begriffe, Technik und Abläufe rund um Unternehmens-Podcasts, kurz erklärt.' ),
		'kontakt'     => array(
			'title' => 'Kontakt und Erstgespräch – Leitformat',
			'desc'  => 'Anfrage senden oder Erstgespräch mit Wolfgang Patz buchen: 30 Minuten, Video-Call, kostenlos. Antwort am selben Werktag. Studio in Berlin-Lichtenberg.',
		),
		'impressum'   => array( 'title' => 'Impressum – Leitformat', 'desc' => 'Impressum der NextGen Media GmbH, Berlin. Leitformat ist eine Marke der NextGen Media GmbH.' ),
		'datenschutz' => array( 'title' => 'Datenschutz – Leitformat', 'desc' => 'Datenschutzerklärung von leitformat.de: Hosting, Einwilligung, Formular, Calendly, Google Ads, Vimeo.' ),
		'agb'         => array( 'title' => 'AGB – Leitformat', 'desc' => 'Allgemeine Geschäftsbedingungen der NextGen Media GmbH für Podcast-Produktion, Formate und Studio.' ),
	);

	if ( is_front_page() ) {
		return $map['front'];
	}
	if ( is_page() ) {
		return $map[ get_post_field( 'post_name', get_queried_object_id() ) ] ?? array();
	}
	return array();
}

add_filter( 'pre_get_document_title', function ( $title ) {
	return lf_seo()['title'] ?? $title;
} );

function lf_meta_description(): string {
	$seo = lf_seo();
	if ( ! empty( $seo['desc'] ) ) {
		return $seo['desc'];
	}
	if ( is_singular() && has_excerpt() ) {
		return get_the_excerpt();
	}
	return (string) get_bloginfo( 'description' );
}

// Dauerhaft noindex, follow: /pilotfolge/ (Ads-Landingpage) und die Rechtsseiten – auch nach Go-Live.
add_filter( 'wp_robots', function ( array $robots ) {
	if ( is_page( array( 'pilotfolge', 'impressum', 'datenschutz', 'agb', 'danke', 'wiki' ) ) ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
		unset( $robots['nofollow'] );
	}
	return $robots;
}, 20 );

// FAQPage-Schema aus denselben Texten wie die sichtbare FAQ.
add_action( 'wp_head', function () {
	$set = lf_seo()['faq'] ?? '';
	if ( ! $set ) {
		return;
	}
	$items = array();
	foreach ( lf_faq( $set ) as $qa ) {
		if ( str_starts_with( $qa[1], '[' ) ) {
			continue; // Platzhalter nicht ins Schema.
		}
		$items[] = array(
			'@type'          => 'Question',
			'name'           => $qa[0],
			'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $qa[1] ),
		);
	}
	$schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items );
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
} );

// LocalBusiness-Schema für das Studio.
add_action( 'wp_head', function () {
	if ( ! is_page( 'podcast-studio-berlin' ) ) {
		return;
	}
	$schema = array(
		'@context'                  => 'https://schema.org',
		'@type'                     => 'LocalBusiness',
		'@id'                       => home_url( '/podcast-studio-berlin/#studio' ),
		'name'                      => 'Leitformat Podcast-Studio Berlin',
		'url'                       => home_url( '/podcast-studio-berlin/' ),
		'image'                     => get_theme_file_uri( 'assets/img/studio/studio-totale-1200.webp' ),
		'telephone'                 => '+49 30 20634903',
		'email'                     => 'kontakt@leitformat.de',
		'priceRange'                => '200–600 €',
		'address'                   => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Franz-Jacob-Straße 2c',
			'postalCode'      => '10369',
			'addressLocality' => 'Berlin',
			'addressCountry'  => 'DE',
		),
		'geo'                       => array( '@type' => 'GeoCoordinates', 'latitude' => 52.5251581, 'longitude' => 13.4660294 ),
		'openingHoursSpecification' => array(
			'@type'     => 'OpeningHoursSpecification',
			'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
			'opens'     => '08:00',
			'closes'    => '18:00',
		),
		'parentOrganization'        => array( '@id' => home_url( '/#organization' ) ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
} );
