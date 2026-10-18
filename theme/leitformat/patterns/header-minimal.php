<?php
/**
 * Title: Header reduziert (Landingpages)
 * Slug: lf/header-minimal
 * Categories: leitformat
 * Inserter: no
 */
?>
<!-- wp:html -->
<div class="lf-header lf-header--minimal">
	<a class="lf-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Leitformat – Startseite"><?php echo lf_svg( 'logo' ); ?></a>
	<a class="lf-header__tel" href="<?php echo esc_attr( LF_TELEFON_LINK ); ?>"><?php echo esc_html( LF_TELEFON ); ?></a>
</div>
<!-- /wp:html -->
