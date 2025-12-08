<!doctype HTML>
<HTML lang="">
<HEAD>
	<title>Reading user form, append CSV, display  CSV ...</title>
	<style>
	div.catalogue label 
	{
		display: inline-block;
		width: 140px;
		vertical-align: top;
		text-align: left;
		background-color:whitesmoke;
	}

	div.catalogue span
	{
		display: inline-block;
		width: 140px;
		vertical-align: top;
		text-align: right;
	}

	div.catalogue
	{
		width:290px;
		border : 1px blue solid;
	}

	div.input input
	{
		background-color:yellow;
	}
	</style>
</HEAD>
<BODY>
<form method="get">
<?php
// paramètres
const SEP = "|";
$fileName = 'database_catalogue.csv';

// ETAPE 1 : LIRE FORM et SAUVEGARDER LES DONNEES DU FORM
// var_dump($_GET);

if( ! empty( $_GET ))
{
	// ouvrir le csv en mode append
	$h = fopen( $fileName, "a" );
	
	// ajouter les données 
	$s = "\n" . $_GET['nom'] . SEP . $_GET['prix'];
	// echo $s ;
	fwrite( $h, $s ); 
	
	// fermer le fichier 
	fclose($h);
}

// ETAPE 2 : lire le catalogue et le convertir en tableau associatif
$h = fopen( $fileName, "r" );
$catalogue_a = array();
$line = trim(fgets($h));
$title_a = explode( SEP , $line );

while( ! feof($h) )
{
	foreach( explode( SEP , trim(fgets($h)) ) as $i => $v )
	{
		$tmp_aa[ $title_a[$i] ] = $v ;
	}
	$catalogue_a[] = $tmp_aa;
}
fclose($h);

echo "<PRE>";
// print_r($catalogue_a);
echo "</PRE>";

// ETAPE 3 : boucler sur le tableau associatif et afficher les valeurs 

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
<div class="catalogue input">
	<label><input name="nom" type="text" placeholder="nom du produit" /></label>
	<span><input name="prix" type="text" placeholder="prix du produit" /></span>
</div>
<button type="submit">envoyer</button>

<div>
	PS : Ne pas utiliser le bouton "actualiser" ou "refresh" !  
	Pourquoi ? Faites-le et vous comprendrez !
</div>

</form>
</BODY>
</HTML>