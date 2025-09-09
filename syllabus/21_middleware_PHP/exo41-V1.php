<!doctype HTML>
<HTML>
<HEAD>
<style>
div.catalogue label 
{
	display: inline-block;
	width: 100px;
	vertical-align: top;
	text-align: left;
}

div.catalogue span
{
	display: inline-block;
	width: 100px;
	vertical-align: top;
	text-align: right;
}

div.catalogue
{
	width:300px;
	border : 1px blue solid;
}


</style>
</HEAD>
<BODY>

<?php

// ETAPE 1 : lire le catalogue et le convertir en tableau associatif
$h = fopen( "catalogue.csv", "r" );
$catalogue_a = array();
$line = trim(fgets($h));
$title_a = explode( "|" , $line );

while( ! feof($h) )
{
	foreach( explode( "|" , trim(fgets($h)) ) as $i => $v )
	{
		$tmp_aa[ $title_a[$i] ] = $v ;
	}
	$catalogue_a[] = $tmp_aa;
}
fclose($h);

echo "<PRE>";
// print_r($catalogue_a);
echo "</PRE>";

// ETAPE 2 : boucler sur le tableau associatif et afficher les valeurs 

foreach( $catalogue_a as $detail )
{
	echo <<< DIV
		<div class="catalogue">
			<label>{$detail['produit']}</label>
			<span>{$detail['prix']}</span>
		</div>
DIV;
}

?>

</BODY>
</HTML>