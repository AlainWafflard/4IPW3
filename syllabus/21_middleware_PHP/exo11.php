<!DOCTYPE html>
<html>
<body>
<?php
/*
IN: dettesActuelles: integer
	epargne: integer
	pretDemande: integer
OUT : 	écrire “Prêt accordé” 
		si le montant des dettes cumulées 
		ne dépassera pas 75% de l’épargne du client 
		sinon écrire “Prêt refusé”
*/

$dettesActuelles = 50000;
$epargne = 10000;
$pretDemande = 2000;
$dettesCumulees = $dettesActuelles + $pretDemande;

/*echo <<< DATA
	<p>Dettes actuelles : $dettesActuelles</p>
	<p>Epargne : $epargne</p>
	<p>Prêt demandé : $pretDemande</p>
DATA;*/

?>
<p>Dettes actuelles : <?=$dettesActuelles?> €</p>
<p>Epargne : <?=$epargne?> €</p>
<p>Prêt demandé : <?=$pretDemande?> €</p>
<?php

if( $dettesCumulees/$epargne < 0.75 )
{
	?>
	<p> => prêt accordé</p>
	<?php
}
else
{
	?>
	<p> => prêt refusé</p>
	<?php
}

$x = "42";
echo is_numeric($x) ? "numerique" : "non num";
echo ctype_digit($x) ? "entier" : "non entier";
echo "<br>";

$x = 42;
echo is_numeric($x) ? "numerique" : "non num";
echo ctype_digit($x) ? "entier" : "non entier";
echo "<br>";

$x = "42.56";
echo is_numeric($x) ? "numerique" : "non num";
echo ctype_digit($x) ? "entier" : "non entier";
echo "<br>";

$x = "blabla";
echo is_numeric($x) ? "numerique" : "non num";
echo ctype_digit($x) ? "entier" : "non entier";
echo "<br>";


?>
</body>
</html>