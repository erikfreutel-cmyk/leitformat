<?php
/**
 * Leitformat – Theme-Funktionen.
 *
 * @package leitformat
 */

defined( 'ABSPATH' ) || exit;

define( 'LF_VERSION', wp_get_theme( 'leitformat' )->get( 'Version' ) );

/**
 * SVG aus assets/img/ inline ausgeben (Logo im Header/Footer).
 */
function lf_svg( string $name ): string {
	$file = get_theme_file_path( "assets/img/{$name}.svg" );
	if ( ! is_readable( $file ) ) {
		return '';
	}
	$svg = trim( (string) file_get_contents( $file ) );
	// Link trägt das Label, das SVG ist Dekoration.
	return str_replace( ' role="img" aria-label="Leitformat"', ' aria-hidden="true" focusable="false"', $svg );
}

/* --------------------------------------------------------------------------
 * Theme-Setup
 * ----------------------------------------------------------------------- */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	remove_theme_support( 'core-block-patterns' );
	add_editor_style( 'assets/css/theme.css' );
} );

add_action( 'init', function () {
	register_block_pattern_category( 'leitformat', array( 'label' => 'Leitformat' ) );

	$styles = array(
		'lf-primary'   => 'Primär (Signal)',
		'lf-secondary' => 'Sekundär (Outline)',
		'lf-dark'      => 'Dunkel (Tinte)',
		'lf-light'     => 'Hell (auf dunkel)',
	);
	foreach ( $styles as $name => $label ) {
		register_block_style( 'core/button', array( 'name' => $name, 'label' => $label ) );
	}
} );

/* --------------------------------------------------------------------------
 * Styles und Skripte
 * ----------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'lf-theme', get_theme_file_uri( 'assets/css/theme.css' ), array(), LF_VERSION );
	// Klein genug, dass WordPress es inline ausgibt (kein render-blockierender Request).
	wp_style_add_data( 'lf-theme', 'path', get_theme_file_path( 'assets/css/theme.css' ) );

	wp_enqueue_script( 'lf-nav', get_theme_file_uri( 'assets/js/nav.js' ), array(), LF_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'lf-sticky-cta', get_theme_file_uri( 'assets/js/sticky-cta.js' ), array(), LF_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );

	// Nicht genutzte Core-Styles.
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'classic-theme-styles' );
} );

// Block-CSS nur für Blöcke, die auf der Seite vorkommen.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );
add_filter( 'styles_inline_size_limit', fn() => 40000 );

// Schriften vorladen, die über dem Falz gebraucht werden.
add_action( 'wp_head', function () {
	foreach ( array( 'bricolage-grotesque-latin-var.woff2', 'instrument-sans-latin-400-normal.woff2' ) as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( get_theme_file_uri( "assets/fonts/{$font}" ) )
		);
	}
}, 1 );

/* --------------------------------------------------------------------------
 * Head aufräumen
 * ----------------------------------------------------------------------- */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'emoji_svg_url', '__return_false' );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
add_filter( 'the_generator', '__return_empty_string' );

// .htaccess wird von Hand gepflegt (server/htaccess-leitformat.de) – WordPress schreibt nie hinein.
add_filter( 'flush_rewrite_rules_hard', '__return_false' );

add_filter( 'document_title_separator', fn() => '–' );

/* --------------------------------------------------------------------------
 * Favicon, Open Graph
 * ----------------------------------------------------------------------- */

add_action( 'wp_head', function () {
	$img = get_theme_file_uri( 'assets/img/' );
	printf( '<link rel="icon" href="%s" sizes="32x32">' . "\n", esc_url( $img . 'favicon.ico' ) );
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( $img . 'favicon.svg' ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $img . 'apple-touch-icon.png' ) );
	echo '<meta name="theme-color" content="#15171C">' . "\n";

	$title = wp_get_document_title();
	$desc  = is_singular() && has_excerpt() ? get_the_excerpt() : get_bloginfo( 'description' );
	$url   = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
	$image = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : $img . 'og-default.png';

	$meta = array(
		'og:site_name' => 'Leitformat',
		'og:locale'    => 'de_DE',
		'og:type'      => is_front_page() ? 'website' : 'article',
		'og:title'     => $title,
		'og:description' => $desc,
		'og:url'       => $url,
		'og:image'     => $image,
	);
	foreach ( $meta as $property => $content ) {
		printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
	}
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
}, 5 );

// WordPress' eigenes Site-Icon nicht zusätzlich ausgeben.
add_filter( 'get_site_icon_url', '__return_empty_string' );

/* --------------------------------------------------------------------------
 * Google Tag Manager (ID kommt in AUFTRAG-04 in wp-config.php)
 * ----------------------------------------------------------------------- */

function lf_gtm_id(): string {
	return defined( 'LF_GTM_ID' ) ? preg_replace( '/[^A-Z0-9-]/', '', (string) LF_GTM_ID ) : '';
}

add_action( 'wp_head', function () {
	$id = lf_gtm_id();
	if ( ! $id ) {
		return;
	}
	?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo esc_js( $id ); ?>');</script>
	<?php
}, 2 );

add_action( 'wp_body_open', function () {
	$id = lf_gtm_id();
	if ( ! $id ) {
		return;
	}
	printf(
		'<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=%s" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>',
		esc_attr( $id )
	);
} );

/* --------------------------------------------------------------------------
 * Schema: Organization auf jeder Seite
 * ----------------------------------------------------------------------- */

add_action( 'wp_head', function () {
	$org = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Organization',
		'@id'           => home_url( '/#organization' ),
		'name'          => 'Leitformat',
		'alternateName' => 'NextGen Podcast',
		'legalName'     => 'NextGen Media GmbH',
		'url'           => home_url( '/' ),
		'logo'          => get_theme_file_uri( 'assets/img/logo.svg' ),
		'foundingDate'  => '2018',
		'email'         => 'kontakt@leitformat.de',
		'telephone'     => '+49 30 20634903',
		'address'       => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Franz-Jacob-Straße 2c',
			'postalCode'      => '10369',
			'addressLocality' => 'Berlin',
			'addressCountry'  => 'DE',
		),
		'founder'       => array(
			'@type'  => 'Person',
			'name'   => 'Wolfgang Patz',
			'sameAs' => array( 'https://www.linkedin.com/in/wolfgang-patz/' ),
		),
		'sameAs'        => array( 'https://nextgen-podcast.de/' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $org, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
} );

/* --------------------------------------------------------------------------
 * Fester Mobil-Button auf jeder Seite außer Kontakt und Danke
 * ----------------------------------------------------------------------- */

add_action( 'wp_footer', function () {
	if ( is_page( array( 'kontakt', 'danke' ) ) || is_404() ) {
		return;
	}
	echo do_blocks( '<!-- wp:pattern {"slug":"lf/sticky-cta"} /-->' );
} );
