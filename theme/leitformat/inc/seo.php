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
			'desc'  => 'Video-Podcasts, die bei Entscheidern ankommen. Konzept, Studio Berlin, Clips in 48 Stunden, Preise ab 2.400 € im Monat. Seit 2018 für DKB, thyssenkrupp, Weleda.',
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

// /pilotfolge/ bleibt dauerhaft noindex, follow (Ads-Landingpage, auch nach Go-Live).
add_filter( 'wp_robots', function ( array $robots ) {
	if ( is_page( 'pilotfolge' ) ) {
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
