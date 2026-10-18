<?php
/**
 * Title: Referenz (Einzel- oder Sammelseite)
 * Slug: lf/referenz
 * Categories: leitformat
 * Inserter: no
 * Description: Rendert die aktuelle Referenz aus post meta lf_ref. Wird nur im Template single-referenz genutzt.
 */

$lf_post = get_post();
if ( ! $lf_post || 'referenz' !== $lf_post->post_type ) {
	return;
}
$lf_d = lf_ref( $lf_post );

if ( 'sammlung' === ( $lf_d['typ'] ?? '' ) ) {
	$lf_html = '';
	foreach ( $lf_d['projekte'] ?? array() as $lf_pr ) {
		$lf_cover = ! empty( $lf_pr['cover_id'] ) ? wp_get_attachment_image( (int) $lf_pr['cover_id'], 'lf-kachel', false, array( 'class' => 'lf-projekt__cover', 'loading' => 'lazy', 'sizes' => '(min-width: 900px) 240px, 40vw' ) ) : '';
		$lf_text  = array_filter( array( $lf_pr['ausgangslage'] ?? '', $lf_pr['format_text'] ?? '', $lf_pr['ergebnis'] ?? '' ) );
		$lf_zitat = '';
		if ( ! empty( $lf_pr['zitat']['text'] ) ) {
			$lf_zitat = lf_p( '<em>' . esc_html( $lf_pr['zitat']['text'] ) . '</em> – ' . esc_html( trim( ( $lf_pr['zitat']['name'] ?? '' ) . ', ' . ( $lf_pr['zitat']['rolle'] ?? '' ), ', ' ) ), 'lf-muted' );
			if ( str_contains( $lf_pr['zitat']['text'], 'NextGen' ) ) {
				$lf_zitat .= "\n" . lf_p( LF_NEXTGEN_HINWEIS, 'lf-stimme__hinweis' );
			}
		}
		$lf_html .= '<!-- wp:group {"tagName":"article","anchor":"' . esc_attr( $lf_pr['slug'] ) . '","className":"lf-projekt","layout":{"type":"default"}} -->' . "\n"
			. '<article id="' . esc_attr( $lf_pr['slug'] ) . '" class="wp-block-group lf-projekt">'
			. "<!-- wp:html -->\n" . $lf_cover . "\n<!-- /wp:html -->\n"
			. lf_group( 'lf-projekt__text',
				lf_h( 2, esc_html( $lf_pr['podcast_name'] ?? '' ), 'lf-projekt__titel' ) . "\n"
				. lf_p( esc_html( $lf_pr['kunde'] ?? '' ) . '<br>' . esc_html( $lf_pr['format'] ?? '' ), 'lf-muted' ) . "\n"
				. lf_p( esc_html( implode( ' ', array_slice( $lf_text, 0, 3 ) ) ) ) . "\n"
				. $lf_zitat . "\n"
				. ( ! empty( $lf_pr['embed'] ) ? lf_ref_player( $lf_pr['embed'], $lf_pr['podcast_name'] ?? '' ) : '' )
			)
			. '</article>' . "\n" . '<!-- /wp:group -->' . "\n";
	}
	echo do_blocks(
		lf_section( 'lf-intro lf-ref-kopf',
			lf_p( '<a href="/referenzen/">Alle Referenzen</a>', 'lf-crumb' ) . "\n"
			. lf_h( 1, esc_html( $lf_d['titel'] ?? get_the_title( $lf_post ) ) ) . "\n"
			. lf_p( esc_html( $lf_d['intro'] ?? '' ), 'lf-lead' )
		)
		. "\n" . lf_section( 'lf-projekte', $lf_html )
		. "\n" . lf_anfrage( 'Ähnliches Format anfragen.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.' )
	);
	return;
}

// Einzelreferenz.
$lf_fakten = array_filter( array(
	'Format'     => $lf_d['format'] ?? '',
	'Rhythmus'   => $lf_d['rhythmus'] ?? '',
	'Laufzeit'   => $lf_d['laufzeit'] ?? '',
	'Leistungen' => $lf_d['leistungen'] ?? '',
) );
$lf_f = '';
foreach ( $lf_fakten as $lf_k => $lf_v ) {
	$lf_f .= '<div><dt>' . esc_html( $lf_k ) . '</dt><dd>' . esc_html( $lf_v ) . '</dd></div>';
}
$lf_absaetze = '';
foreach ( array( 'ausgangslage' => 'Ausgangslage', 'format_text' => 'Format', 'ergebnis' => 'Ergebnis' ) as $lf_k => $lf_t ) {
	$lf_txt = $lf_d[ $lf_k ] ?? '';
	if ( ! $lf_txt ) {
		continue; // Keine sichtbaren Platzhalter – Ergebnis kommt mit WOLFGANG-02.
	}
	$lf_absaetze .= lf_h( 2, $lf_t, 'lf-ref__h' ) . "\n" . lf_p( esc_html( $lf_txt ) ) . "\n";
}
$lf_zitat = '';
if ( ! empty( $lf_d['zitat']['text'] ) ) {
	$lf_zitat = lf_stimme( $lf_d['zitat']['text'], $lf_d['zitat']['name'] ?? '', $lf_d['zitat']['rolle'] ?? '', str_contains( $lf_d['zitat']['text'], 'NextGen' ) );
}
$lf_player = ! empty( $lf_d['embed'] ) ? lf_ref_player( $lf_d['embed'], ( $lf_d['podcast_name'] ?? '' ) . ', ' . ( $lf_d['kunde'] ?? '' ) ) : '';

echo do_blocks(
	lf_section( 'lf-hero lf-ref-kopf',
		lf_group( 'lf-hero__text',
			lf_p( '<a href="/referenzen/">Alle Referenzen</a>', 'lf-crumb' ) . "\n"
			. lf_h( 1, esc_html( ( $lf_d['podcast_name'] ?? get_the_title( $lf_post ) ) . ' – ' . ( $lf_d['kunde'] ?? '' ) ) ) . "\n"
			. ( ! empty( $lf_d['kurz'] ) ? lf_p( esc_html( $lf_d['kurz'] ), 'lf-lead' ) : '' )
			. ( $lf_f ? "\n<!-- wp:html -->\n<dl class=\"lf-fakten-zeile\">" . $lf_f . "</dl>\n<!-- /wp:html -->" : '' )
		) . "\n"
		. lf_group( 'lf-hero__media', "<!-- wp:html -->\n" . lf_ref_cover( $lf_post, 'lf-ref__hero', true ) . "\n<!-- /wp:html -->" )
	)
	. "\n" . lf_section( 'lf-section--white lf-ref-body',
		lf_group( 'lf-ref-body__grid',
			lf_group( 'lf-prose lf-prose--section', $lf_absaetze ) . "\n"
			. lf_group( 'lf-ref-body__side', $lf_player . "\n" . $lf_zitat )
		)
	)
	. "\n" . lf_anfrage( 'Ähnliches Format anfragen.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.' )
);
