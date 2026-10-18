<?php
/**
 * Title: Seite Video-Podcast: Zahlen, Ablauf, Pakete, Stimmen, Ratgeber, FAQ, Anfrage
 * Slug: lf/video-podcast-2
 * Categories: leitformat
 */

$lf_zahlen = array(
	array( '52 %', 'der deutschen Podcast-Hörer bevorzugen Video. 2025 waren es 36 %.', lf_quelle( 'Podstars/OMR-Studie 2026, n = 1.300', 'https://www.podcast.de/podcast-news/70-prozent-der-deutschen-bevoelkerung-hoeren-woechentlich' ) ),
	array( '81 %', 'der B2B-Marketer nutzen LinkedIn als wichtigste Videoplattform, 67 % spielen dort wiederverwendete Clips aus.', lf_quelle( 'Wistia-Report 2026 via ppc.land', 'https://ppc.land/linkedin-beats-youtube-as-top-b2b-video-channel-wistia-report-finds/' ) ),
	array( '1 Mrd.', 'Menschen sehen jeden Monat Podcasts auf YouTube.', lf_quelle( 'YouTube Blog', 'https://blog.youtube/news-and-events/podcasts-living-room-in-2025/' ) ),
);
$lf_z = '';
foreach ( $lf_zahlen as $z ) {
	$lf_z .= lf_group( 'lf-stat lf-stat--gross', lf_p( $z[0], 'lf-stat__value' ) . "\n" . lf_p( $z[1] ) . "\n" . lf_p( 'Quelle: ' . $z[2], 'lf-stat__quelle' ) ) . "\n";
}

$lf_ratgeber = lf_h( 2, 'Ratgeber: Was ein Video-Podcast leisten muss.' ) . "\n"
	. lf_p( 'Ein Video-Podcast ist ein Podcast mit Bild: Gespräch, Gesichter, Marke. Er kann genauso lang und inhaltsstark sein wie eine Audio-Folge – der Unterschied ist, dass man Sie und Ihre Gäste sieht.' ) . "\n"
	. lf_h( 3, 'Warum Video' ) . "\n"
	. lf_list( array(
		'<strong>Gefunden werden.</strong> Auf YouTube sind Folgen durchsuchbar, erscheinen bei Google und bekommen Empfehlungen. In Podcast-Apps erreichen Sie vor allem bestehende Abonnenten.',
		'<strong>Vertrauen.</strong> Mimik und Gestik schaffen eine andere Nähe als die Stimme allein – wichtig für Beratung und für Marken, die Vertrauen brauchen.',
		'<strong>Clips.</strong> Aus jeder Folge entstehen Clips im Hochformat für LinkedIn, Shorts und Reels. Die Folge arbeitet weiter, nachdem sie erschienen ist.',
	) ) . "\n"
	. lf_h( 3, 'Vier häufige Fehler' ) . "\n"
	. lf_list( array(
		'<strong>Schlechter Ton bei gutem Bild.</strong> Rauschen und Hall vertreiben Zuschauer schneller als ein unscharfes Bild. Gute Mikrofone und ein ruhiger Raum zuerst.',
		'<strong>Keine klare Zielgruppe.</strong> „Wir reden einfach mal“ trägt keine zwölf Monate. Zielgruppe, Struktur und Leitfragen gehören vor die erste Aufnahme.',
		'<strong>Zu lang, keine Höhepunkte.</strong> Nicht jede Aufnahme braucht 60 Minuten. Die stärksten Momente werden zu Clips.',
		'<strong>Keine Verbreitung geplant.</strong> Hochladen und hoffen reicht nicht. YouTube als Hauptkanal, Clips für Social Media, Hinweise im Newsletter.',
	) );

echo lf_section( 'lf-section--white lf-zahlen',
	lf_head( 'Video ist der Normalfall.', 'Wer heute Audio liefert, verkauft das Format von gestern.' ) . "\n"
	. lf_group( 'lf-zahlen__grid', $lf_z )
)
. "\n\n" . lf_ablauf( 'Dienstag aufgenommen, Donnerstag auf LinkedIn.', array(
	array( 'Dienstag', 'Aufnahme', 'Im Studio Berlin, remote oder bei Ihnen. Zwei Folgen an einem Termin.' ),
	array( '+ 48 Stunden', 'Clips', 'Hochformat, untertitelt, mit Postingtext. Freigabe per Link.' ),
	array( '5 Werktage', 'Folge fertig', 'Video- und Audio-Folge, Thumbnail, Shownotes, Newsletter-Text.' ),
	array( 'Nach Freigabe', 'Veröffentlichung', 'YouTube, Spotify, alle Podcast-Apps. Zwei Korrekturrunden inklusive.' ),
) )
. "\n\n" . lf_section( 'lf-pakete', lf_head( 'Pakete und Preise.', 'Alle Preise netto. Der Einstieg ist eine Pilotfolge zum Festpreis, ohne Jahresvertrag.' ) . "\n" . lf_paket_karten(), 'pakete' )
. "\n\n" . lf_section( 'lf-kundenstimmen',
	lf_group( 'lf-stimmen lf-stimmen--zwei',
		lf_stimme( '„NextGen Podcast hat uns dabei geholfen, das Tool Podcast technisch und redaktionell aufs nächste Level zu heben. Wir schätzen die professionelle und pragmatische Zusammenarbeit sehr.“', 'Carolin Kossin', 'Unternehmensgruppe Theo Müller · Produktion und Übersetzung des Video-Podcasts', true ) . "\n"
		. lf_stimme( '„Wir haben mit NextGen Podcast von der ersten Idee bis zur Produktion und Moderation unseres Podcasts zusammengearbeitet. Sie haben uns im gesamten Prozess hervorragend unterstützt. Die Zusammenarbeit mit NextGen Podcast ist sehr unkompliziert und zielorientiert.“', 'Johanna Vogel', 'Rheinische Notarkammer · Konzeption, Moderation und Produktion des Video-Podcasts', true )
	)
)
. "\n\n" . lf_section( 'lf-section--white lf-ratgeber', lf_group( 'lf-prose lf-prose--section', $lf_ratgeber ) )
. "\n\n" . lf_faq_section( 'Fragen zur Video-Produktion.', 'video' )
. "\n\n" . lf_anfrage( 'Sagen Sie uns, was Sie planen.', 'Antwort am selben Werktag. Oder buchen Sie direkt ein Erstgespräch mit Wolfgang.', 'Pilotfolge' );
