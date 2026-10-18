<?php
/**
 * Title: Header
 * Slug: lf/header
 * Categories: leitformat
 * Inserter: no
 */

// Header-Button: auf Seiten mit Anfrage-Block springt nav.js zu #anfrage, sonst /kontakt/#termin (Fallback /#anfrage).
$lf_nav = array(
	'/pilotfolge/'           => 'Pilotfolge',
	'/preise/'               => 'Pakete & Preise',
	'/podcast-studio-berlin/' => 'Studio Berlin',
	'/referenzen/'           => 'Referenzen',
	'/ueber-uns/'            => 'Über uns',
);
?>
<!-- wp:html -->
<div class="lf-header">
	<a class="lf-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Leitformat – Startseite"><?php echo lf_svg( 'logo' ); ?></a>
	<button class="lf-burger" type="button" aria-expanded="false" aria-controls="lf-nav" aria-label="Menü öffnen"><span></span></button>
	<nav class="lf-nav" id="lf-nav" aria-label="Hauptnavigation">
		<ul>
			<?php foreach ( $lf_nav as $lf_url => $lf_label ) : ?>
			<li><a href="<?php echo esc_url( home_url( $lf_url ) ); ?>"><?php echo esc_html( $lf_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<a class="lf-btn lf-btn--dark" href="<?php echo esc_url( home_url( get_page_by_path( 'kontakt' ) ? '/kontakt/#termin' : '/#anfrage' ) ); ?>" data-lf-cta>Erstgespräch buchen</a>
	</nav>
</div>
<!-- /wp:html -->
