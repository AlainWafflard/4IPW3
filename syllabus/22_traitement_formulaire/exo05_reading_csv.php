<html lang="fr">
<head>
	<title>Reading a CSV file / display table / form input</title>
	<style>
	.catalogue td
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
$fileName = 'database_catalogue.csv';
$sep = "|";

// lecture fichier
$fh = fopen( $fileName, 'r' );
if( ! $fh )
{
    // problème à l'ouverture du fichier => STOP
    ?>
    <div>Fichier inexistant ou inouvrable ...</div>
    </form>
    </body>
    </html>
    <?php
    exit;
}
while( ! feof($fh) )
{
	$ligne = fgets($fh);
	// echo $ligne.'<BR>';
	$product_a[] = explode( $sep, trim($ligne) );
}
fclose($fh);

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
	<tr>
		<td>
			<input name="produit">
		</td>
		<td>
			<input name="prix">
		</td>
		<td>
			<input name="delai">
		</td>
		<td>
			<button type="submit">add</button>
		</td>		
	</tr>
</table></div>
</form>
</body>
</html>