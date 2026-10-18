<?php
/**
 * Title: Ablauf Studio
 * Slug: lf/ablauf-studio
 * Categories: leitformat
 */

echo lf_ablauf( 'Von der Anfrage zu den Rohdaten am Aufnahmetag.', array(
	array( 'Anfrage', 'Wunschtermin schicken', 'Termin und Format genügen. Bestätigung innerhalb eines Werktags.' ),
	array( '15 Minuten', 'Vorgespräch', 'Setup, Zahl der Personen und ob Sie Schnitt dazu möchten.' ),
	array( 'Aufnahmetag', 'Aufnahme', 'Ein Techniker ist die ganze Zeit dabei und achtet auf Licht, Ton und Bild.' ),
	array( 'Am selben Tag', 'Übergabe', 'Rohdaten online: jede Kamera und jede Tonspur als eigene Datei.' ),
) );
