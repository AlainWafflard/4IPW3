<html lang="fr">
<head>
	<title>Reading user form, append CSV, display  CSV ...</title>
	<style>
	.catalogue table 
	{
		border-collapse:collapse;
	}
	
	.catalogue td, .catalogue th
	{
		border:1px solid black;
	}
	
	.catalogue td input
	{
		background-color:yellow;
	}

	input
	{
		width:100px;
	}
	</style>
</head>
<body>
<form method="get">
<?php
// paramètres
const SEP = "|";
$fileName = 'database_catalogue.csv';

// toujours en premier lieu : processing des données du formulaire
// ajout du nouveau produit au catalogue
if( ! empty($_GET['produit']) )
{
	// composer ligne à ajouter 
	$line = "\n" . $_GET['produit'] . SEP . $_GET['prix'] . SEP . $_GET['delai'];
	// alternative risquée :
	// $line = "\n" . implode( $sep, $_GET );

	// ouverture fichier en mode 'append'
	$fh = fopen( $fileName, 'a' );
	fwrite( $fh, $line );
	fclose($fh);
}

// toujours en second lieu : affichage de la page
// lecture fichier
$product_a = array();
$fh = fopen( $fileName, 'r' );
while( ! feof($fh) )
{
	$ligne = fgets($fh);
	// echo $ligne.'<BR>';
	$product_a[] = explode( SEP, trim($ligne) );
}
fclose($fh);

// affichage catalogue
?>
<div class="catalogue"><table>
	<caption>Catalogue</caption>
	<?php
	foreach( $product_a as $key => $product )
	{
		$td = $key == 0 ? 'th' : 'td' ;
		echo "<tr>";
		foreach( $product as $detail )
		{
			echo "<$td>$detail</$td>";
		}
		echo "</tr>";
	}
	?>
	<tr>
		<td>
			<input name="produit" type="text">
		</td>
		<td>
			<input name="prix" type="number">
		</td>
		<td>
			<input name="delai" type="text">
		</td>
		<td>
			<button type="submit">add</button>
		</td>
	</tr>
</table></div>

</form>
</body>
</html>