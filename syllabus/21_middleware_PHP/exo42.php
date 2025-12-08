<?php
/*
Input
Fichier CSV (à créer) contenant les informations de base de la facture
Par ligne de facture :
Taux de TVA
Prix unitaire
Quantité 

Processing
Lire le fichier et construire les tableaux associatifs
Calculer les sous-totaux
Calculer les totaux

Output 
facture avec sous-totaux et totaux TTC (cf screenshot).
*/

function lire_table_facture($fn)
{
	$f_a = array();
	$h = fopen( $fn, "r" );
	while( ! feof($h) )
	{
		$f_a[] = explode( ";" , trim(fgets($h))); 
	}
	fclose($h);
	return $f_a;
}

function print_table_header($line_a)
{
	echo "<TABLE><TR>";
	foreach( $line_a as $v )
	{
		echo "<TH>$v</TH>";
	}
	echo "</TR>";
}

function print_table_line( $line_a )
{
	echo "<TR>";
	foreach( $line_a as $v )
	{
		echo "<TD>$v</TD>";
	}
	echo "</TR>";
}

function print_table_footer()
{
	echo "</TABLE>";
}


?>
<!doctype HTML>
<HTML>
<HEAD>
<style>
td 
{
	text-align:right;
	width:100px;
	height: 20px;
}
</style>
</HEAD>
<BODY>
<?php

// ETAPE 1 : lire les données de la facture et les convertir en tableau 
$facture_a = lire_table_facture("facture.csv");
// echo "<PRE>" . print_r($facture_a, true ) . "</PRE>";

// ETAPE 2 : boucler sur le tableau et afficher les valeurs 

print_table_header(array( 'PU', 'QNT', 'Prix HT', 'TVA', 'Prix TTC' ));

$total_ht = $total_ttc = 0 ;
foreach( $facture_a as $f )
{
	// donner un nom plus clair aux variables
	$tva = $f[0];
	$pu  = $f[1];
	$qnt = $f[2];

	// calculs intermédiaires
	$mht = $pu * $qnt ;
	$mtva = $mht * $tva / 100 ;
	$mttc = $mht + $mtva;
	
	// présentation
	$puf = sprintf( "%6.2f", $pu);
	$mhtf = sprintf( "%6.2f", $mht);
	$mtvaf = sprintf( "%6.2f", $mtva );
	$mttcf =  sprintf( "%6.2f", $mttc );
	
	$total_ht += $mht;
	$total_ttc += $mttc;

	print_table_line( array( $puf, $qnt, $mhtf, $mtvaf, $mttcf ) );
}

print_table_line(array('', '', '', '', '', ));

$total_ht = sprintf( "%6.2f", $total_ht );
print_table_line( array( '', '', '', 'TOTAL HT', $total_ht ) );

$total_ttc = sprintf( "%6.2f", $total_ttc );
print_table_line( array( '', '', '', 'TOTAL TTC', $total_ttc ) );

print_table_footer();

?>

</BODY>
</HTML>