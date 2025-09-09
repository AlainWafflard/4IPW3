<!doctype html>
<html>
<head>
	<title>Reading a CSV file ...</title>
	<style>
	div.catalogue table td
	{
		border:1px solid black;
	}
	</style>
</head>
<body>
<form method="get">

<?php
// paramètres
$fileName = 'database.csv';
$sep = "|";

// lecture fichier
$fh = fopen( $fileName, 'r' );

while( ! feof($fh) )
{
	$ligne = fgets($fh);
	// echo $ligne.'<BR>';
	$product_a[] = explode( $sep, trim($ligne) );
}
fclose($fh);
// var_dump($product_a);

// affichage catalogue
?>

<div class="catalogue"><table>
	<caption>Catalogue</caption>
	<?php
	foreach( $product_a as $product )
	{
		echo "<tr>";
		foreach( $product as $detail )
		{
			echo "<td>$detail</td>";
		}
		echo "</tr>";
	}
	?>
</table></div>

</form>
</body>
</html>