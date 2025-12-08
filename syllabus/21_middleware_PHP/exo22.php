<html>
<head>
	<title>Afficher les nombres pairs de m à p</title>
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
/* 
 * Afficher les nombres pairs de m à n (bornes incluses)
 * Mais on ne sait pas si n plus grand ou plus petit que m.
 */
 
// DONNÉES EN ENTRÉE :
$m = 50;
$p = 80;

// PRE-CONDITIONS
if( $m < $p )
{
	$min = $m ;
	$max = $p ;
}
else
{
	$min = $p ;
	$max = $m ;
}

// RÉSULTATS
for( $i=$min ; $i <= $max ; $i++ )
{
	if( $i % 2 == 0 ) 
	{
		echo "$i ";
	}
}

?>
</div>
</body>
</html>