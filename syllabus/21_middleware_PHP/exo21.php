<html>
<head>
	<title>Afficher les 100 premiers nombres entiers positif à partir de 0 (inclus)</title>
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
// DONNÉES EN ENTRÉE :
$n = 100;

// PRE-CONDITIONS
if( ! ($n > 0 ))
{
	echo "L'argument 1 ($n) doit etre superieur a 0.";
	exit;
}

// RÉSULTATS
for( $cpt = 0 ; $cpt <= $n ; $cpt++ )
{
	echo "$cpt ";
}

?>
</div>
</body>
</html>