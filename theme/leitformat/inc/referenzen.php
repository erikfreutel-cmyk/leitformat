<?php
/**
 * Referenzen: Beitragstyp „referenz“ unter /referenzen/<slug>/.
 * Einzelreferenzen (typ einzel) und Sammelseiten (typ sammlung) sind beide Einträge dieses Typs,
 * damit alle URLs unter /referenzen/ liegen. Daten je Eintrag als JSON in post meta „lf_ref“
 * (Quelle: server/referenzen.json, angelegt mit server/referenzen-import.php).
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', function () {
	register_post_type( 'referenz', array(
		'label'         => 'Referenzen',
		'labels'        => array( 'singular_name' => 'Referenz' ),
		'public'        => true,
		'show_in_rest'  => true,
		'menu_icon'     => 'dashicons-microphone',
		'has_archive'   => false,
		'rewrite'       => array( 'slug' => 'referenzen', 'with_front' => false ),
		'supports'      => array( 'title', 'thumbnail', 'custom-fields' ),
	) );
	register_post_meta( 'referenz', 'lf_ref', array( 'type' => 'string', 'single' => true, 'show_in_rest' => false ) );
} );

// Bildgrößen als WebP ausgeben (Cover aus der alten Seite sind JPG/PNG).
add_filter( 'image_editor_output_format', fn( $f ) => array_merge( $f, array( 'image/jpeg' => 'image/webp', 'image/png' => 'image/webp' ) ) );
add_action( 'after_setup_theme', fn() => add_image_size( 'lf-kachel', 600, 600, true ) );

/** Daten einer Referenz. */
function lf_ref( $post = null ): array {
	$post = get_post( $post );
	if ( ! $post ) {
		return array();
	}
	$data = json_decode( (string) get_post_meta( $post->ID, 'lf_ref', true ), true );
	return is_array( $data ) ? $data : array();
}

/** Cover-Bild (Beitragsbild) als <img>, sonst Platzhalterfläche mit Initiale. */
function lf_ref_cover( WP_Post $post, string $class = 'lf-ref__cover', bool $eager = false ): string {
	if ( has_post_thumbnail( $post ) ) {
		return get_the_post_thumbnail( $post, 'lf-kachel', array( 'class' => $class, 'loading' => $eager ? 'eager' : 'lazy', 'sizes' => '(min-width: 900px) 25vw, 50vw' ) );
	}
	return '<span class="' . esc_attr( $class ) . ' lf-ref__cover--leer" aria-hidden="true"></span>';
}

/** Player mit Klick-Einwilligung aus dem embed-Feld. */
function lf_ref_player( array $embed, string $titel ): string {
	$typ = $embed['typ'] ?? '';
	$id  = (string) ( $embed['id_oder_url'] ?? '' );
	if ( 'youtube' === $typ ) {
		preg_match( '~(?:v=|youtu\.be/|embed/)([A-Za-z0-9_-]{11})~', $id, $m );
		$yt = $m[1] ?? ( preg_match( '~^[A-Za-z0-9_-]{11}$~', $id ) ? $id : '' );
		return $yt ? lf_video( $titel, 'Folge abspielen: ' . $titel, '', '', '', $yt, (int) ( $embed['start'] ?? 0 ) ) : '';
	}
	if ( 'vimeo' === $typ ) {
		preg_match( '~(\d{6,})~', $id, $m );
		return ! empty( $m[1] ) ? lf_video( $titel, 'Folge abspielen: ' . $titel, $m[1] ) : '';
	}
	if ( in_array( $typ, array( 'spotify', 'podigee', 'andere' ), true ) && str_starts_with( $id, 'https://' ) ) {
		$src = $id;
		if ( 'spotify' === $typ && ! str_contains( $src, '/embed/' ) ) {
			$src = preg_replace( '~open\.spotify\.com/~', 'open.spotify.com/embed/', $src );
		}
		$anbieter = 'spotify' === $typ ? 'Spotify' : ( 'podigee' === $typ ? 'Podigee' : wp_parse_url( $src, PHP_URL_HOST ) );
		return "<!-- wp:html -->\n<div class=\"lf-audio\" data-embed=\"" . esc_url( $src ) . '"><button class="lf-btn lf-btn--secondary" type="button" data-lf-embed>Folge anhören</button><p class="lf-video__consent">Beim Abspielen lädt der Player von ' . esc_html( $anbieter ) . ".</p></div>\n<!-- /wp:html -->";
	}
	return '';
}

/** Kachel für Übersicht und Sammelseiten. */
function lf_ref_kachel( WP_Post $post, array $d ): string {
	$kat = implode( ',', array_map( 'sanitize_title', $d['kategorien'] ?? array() ) );
	return '<a class="lf-ref lf-ref--bild" href="' . esc_url( get_permalink( $post ) ) . '" data-kat="' . esc_attr( $kat ) . '">'
		. lf_ref_cover( $post )
		. '<span class="lf-ref__text"><span class="lf-ref__name">' . esc_html( $d['podcast_name'] ?? $post->post_title ) . '</span>'
		. '<span class="lf-ref__sub">' . esc_html( trim( ( $d['kunde'] ?? '' ) . ' · ' . ( $d['format'] ?? '' ), ' ·' ) ) . '</span>'
		. ( ! empty( $d['kurz'] ) ? '<span class="lf-ref__kurz">' . esc_html( $d['kurz'] ) . '</span>' : '' )
		. '</span></a>';
}

// Referenzen indexierbar halten, auch wenn die Seite sonst noindex ist (gilt ab Go-Live; bis dahin blog_public 0).
add_filter( 'wp_robots', function ( array $r ) {
	if ( is_singular( 'referenz' ) && get_option( 'blog_public' ) ) {
		unset( $r['noindex'], $r['nofollow'] );
		$r['index'] = true;
		$r['follow'] = true;
	}
	return $r;
} );

// VideoObject-Schema auf Referenzen mit Video.
add_action( 'wp_head', function () {
	if ( ! is_singular( 'referenz' ) ) {
		return;
	}
	$d = lf_ref();
	$e = $d['embed'] ?? null;
	if ( ! $e || ! in_array( $e['typ'] ?? '', array( 'youtube', 'vimeo' ), true ) ) {
		return;
	}
	$url    = 'youtube' === $e['typ'] ? 'https://www.youtube.com/watch?v=' . preg_replace( '~.*(?:v=|youtu\.be/|embed/)([A-Za-z0-9_-]{11}).*~', '$1', $e['id_oder_url'] ) : 'https://vimeo.com/' . preg_replace( '~\D~', '', $e['id_oder_url'] );
	$thumb  = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : get_theme_file_uri( 'assets/img/og-default.png' );
	$schema = array(
		'@context'     => 'https://schema.org',
		'@type'        => 'VideoObject',
		'name'         => $d['podcast_name'] ?? get_the_title(),
		'description'  => $d['kurz'] ?? ( $d['format_text'] ?? '' ),
		'thumbnailUrl' => $thumb,
		'uploadDate'   => get_the_date( 'c' ),
		'contentUrl'   => $url,
		'publisher'    => array( '@id' => home_url( '/#organization' ) ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
} );
