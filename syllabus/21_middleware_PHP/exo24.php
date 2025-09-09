<html>
<head>
	<title> Affiche le résultat de m * p</title>
	<style>
	div.catalogue table
	{
		border-collapse:collapse;
	}
	div.catalogue table td
	{
		border:1px solid black;
	}
	</style>
</head>
<body>
<div>
<?php
// Affiche le résultat de m * p
// CONSIGNE : Vous ne pouvez pas utiliser l’opérateur de multiplication.

// INPUT
$m = 4;
$p = 5;
$mult = 0 ;

// VALIDATION
if( $p < 0 or $m < 0 )
{
	echo "Les deux arguments doivent être positifs ou nuls.";
	exit;
}

// PROCESSING
for( $i=0 ; $i < $p ; $i++ )
{
  $mult += $m ; // équivalent à :  $somme = $somme + $m ;
}

echo "$p * $m = $mult";

?>
</div>
</body>
</html>