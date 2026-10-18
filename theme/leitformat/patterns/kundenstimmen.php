<?php
/**
 * Title: Kundenstimmen
 * Slug: lf/kundenstimmen
 * Categories: leitformat
 */

echo lf_section( 'lf-kundenstimmen',
	lf_group( 'lf-stimmen',
		lf_stimme( '„Wir hatten keinerlei Erfahrung im Podcast-Bereich, dafür viele Ideen und hohe Erwartungen. Das Ergebnis übertrifft unsere Erwartungen – wir sind rundum zufrieden und planen bereits die nächste Episode. So macht Podcast-Arbeit Spaß!“', 'Stefan Bordel', 'Myra Security · Konzeption und Video-Podcast-Produktion', false ) . "\n"
		. lf_stimme( '„NextGen Podcast hat uns dabei geholfen, das Tool Podcast technisch und redaktionell aufs nächste Level zu heben. Wir schätzen die professionelle und pragmatische Zusammenarbeit sehr.“', 'Carolin Kossin', 'Unternehmensgruppe Theo Müller · Produktion und Übersetzung des Video-Podcasts', true ) . "\n"
		. lf_stimme( '„Wir haben mit NextGen Podcast von der ersten Idee bis zur Produktion und Moderation unseres Podcasts zusammengearbeitet. Sie haben uns im gesamten Prozess hervorragend unterstützt. Die Zusammenarbeit mit NextGen Podcast ist sehr unkompliziert und zielorientiert.“', 'Johanna Vogel', 'Rheinische Notarkammer · Konzeption, Moderation und Produktion des Video-Podcasts', true )
	) . "\n"
	// Google-Profil-URL fehlt noch (RUECKFRAGEN 18.10.).
	. lf_p( 'Die Menschen dahinter sind dieselben: <a href="#">33 Bewertungen auf Google</a>.', 'lf-note' )
);
