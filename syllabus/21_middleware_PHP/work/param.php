<?php

$title = 'Exo PHP 3';
$msg =  'Bienvenue/welcome dans le monde du PHP !';
$name = 'Bobo';
// $poli = "oui";

$avertissement = <<< VAR
    Vous n'êtes pas à l'heure, cher $name !
VAR;
// HEREDOC

$mise_en_place_1 = 'Asseyez-vous ici, $name.';
$mise_en_place_2 = "Asseyez-vous ici, $name.";

/*if( $name == 'Bobo' )
{
    $bienvenue = <<< HTML
        C'était chouette en tôle ?
HTML;
}
else
{
    $bienvenue = "Soyez le bienvenu.";
}*/

$bienvenue
	= $name == 'Bobo'
	? "C'était chouette en tôle ?"
	: "Soyez le bienvenu.";


$politesse = $poli ?? "nulle";

