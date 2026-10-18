<?php
/**
 * Title: Studio: Case IVD und Kundenstimme
 * Slug: lf/studio-case
 * Categories: leitformat
 */

echo lf_section( 'lf-studio-case',
	lf_group( 'lf-testimonial',
		lf_group( 'lf-testimonial__media', lf_video( 'IVD Berlin-Brandenburg, Video-Podcast aus diesem Studio', 'Video-Beispiel abspielen', '', '', '', 'qyKi4ssLLhM', 22, 'studio/studio-totale-600.webp' ) ) . "\n"
		. lf_group( 'lf-testimonial__text',
			''
			. lf_h( 2, 'IVD Berlin-Brandenburg: drei Personen, drei Kameras, eine Folge mit Clips.' ) . "\n"
			. lf_p( 'Ein Moderator und zwei Gesprächspartner, gleichzeitig aus drei Perspektiven aufgezeichnet. Aus dem Material entstanden die vollständige Video-Folge und zusätzliche Clips für Social Media.' )
		)
	) . "\n"
	. lf_group( 'lf-stimmen lf-stimmen--eins',
		lf_stimme( '„Wir hatten keinerlei Erfahrung im Podcast-Bereich, dafür viele Ideen und hohe Erwartungen. Das Ergebnis übertrifft unsere Erwartungen – wir sind rundum zufrieden und planen bereits die nächste Episode. So macht Podcast-Arbeit Spaß!“', 'Stefan Bordel', 'Myra Security · Konzeption und Video-Podcast-Produktion', false )
	)
);
