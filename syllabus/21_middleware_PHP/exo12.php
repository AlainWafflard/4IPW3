<!DOCTYPE html>
<html>
<body>
<?php
/*
DONNÉES EN ENTRÉE:
P : prix hors TVA de l’article acheté en €
Q : quantité commandée de l’article
T : taux de TVA à appliquer en décimal (ex.: 0.21)
PRE-CONDITIONS:
P : réel strictement positif 
Q : entier strictement positif 
T : réel compris entre 0 et 1 
RÉSULTATS:
Affiche le montant à payer TVA comprise (21%)
Si le montant HTVA est supérieur à 500€, 
alors le client a droit à une remise de 10% sur le montant TTC.
*/

$p = "5000";
$q = "10";
$t = "0.21";
$is_code_valid = true;

if( ! is_numeric($p) or $p <= 0 )
{
	echo "<p>le prix doit être un réel positif</p>";
	$is_code_valid=false;
}

if( ! ctype_digit($q) or $q <= 0 )
{
	echo "<p>le prix doit être un entier positif</p>";
	$is_code_valid=false;
}

if( ! is_numeric($t) or $t <= 0 or $t >= 1 )
{
	echo "<p>la TVA doit être réelle et comprise entre 0 et 1</p>";
	$is_code_valid=false;
}

if( $is_code_valid )
{
	$m_htva = $p * $q;
	$m_tva = $m_htva * $t ;
	$m_ttc = $m_htva + $m_tva;
	
	$remise = 0 ;
	if( $m_htva > 500 )
	{
		$remise = $m_htva * 0.10 ;
	}
	
	$m_final = $m_ttc - $remise;
	
	?>
	<p>Montant HTVA : <?=$m_htva?></p>
	<p>Montant TVA : <?=$m_tva?></p>
	<p>Montant TTC sans remise : <?=$m_ttc?></p>
	<p>Montant TTC avec remise : <?=$m_final?></p>
	<?php
}
else
{
	echo "<p>impossible de procéder au calcul</p>";
}
?>
</body>
</html>