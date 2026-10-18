<?php
/**
 * Title: Seite Video-Podcast
 * Slug: lf/video-podcast
 * Categories: leitformat
 * Description: Marktzahlen mit Quelle aus docs/strategie.md Abschnitt 2. Ausspielungen-Raster (lf/ausspielungen) wird separat eingebunden.
 */

echo lf_section( 'lf-hero',
	lf_group( 'lf-hero__text',
		''
		. lf_h( 1, 'Ein Dreh. Video-Folge, Audio-Folge, Clips, Newsletter.' ) . "\n"
		. lf_p( 'Aus einer Aufnahme am Dienstag entsteht der Content für den ganzen Monat. Clips 48 Stunden nach der Aufnahme, die fertige Folge in 5 Werktagen.', 'lf-lead' ) . "\n"
		. lf_buttons( 'lf-hero__cta', lf_button( 'Pilotfolge anfragen – 2.900 €', '#anfrage' ), lf_button( 'Pakete ansehen', '#pakete', 'lf-secondary' ) )
	) . "\n"
	. lf_group( 'lf-hero__media', lf_video( 'IVD Berlin-Brandenburg, Video-Podcast aus unserem Studio', 'Video-Beispiel abspielen', '', '', '', 'qyKi4ssLLhM', 22, 'studio/studio-totale-600.webp' ) )
);
