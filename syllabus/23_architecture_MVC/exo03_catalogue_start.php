<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>VOO : Catalogue des produits</title>
<!-- link rel="stylesheet" type="text/css" href="./VOO _ Catalogue des produits_files/catalogue.css" -->
<style>

body
{
    font-family:Garamond;
    font-size: medium;
    /* font-size:10px; */
    width:26.2cm;
    background-color:lightyellow;
}

div#txt
{
    float:right;
    width:5cm; 
    background-color: red;
}

h1
{
    font-family:Arial;
    font-size:large;
	text-align:center;
}

div.button_bar
{
    background-color:Cornsilk ;
}

div.search_bar
{
	text-align:right;
    background-color:Cornsilk ;
}


div.login
{
    float:right;
    /* background-color:white; */
}

div.produit
{
    background-color:white;
    border:blue 2px solid;
    width:6cm;
    height:5.5cm;
    float:left;
    margin:1mm;
    padding:1mm;
	/* overflow-y:scroll;  */
}

div.produit div.formule
{
    font-weight:bold;
}

div.produit ul li 
{
}

div.produit .prix
{
    background-color:lightgreen;
}

div.produit .activation
{
    background-color:yellow;
}

div.produit .in_basket
{
    /* background-color:plum; */
    color:DarkMagenta;
    font-weight:bold;
}

div.recap table
{
    border:blue 1px solid;
    margin:2px;
    padding:2px;
}

div.recap td
{
    background-color:whitesmoke;
    margin:0px;
    padding:2px;
    border: 1px 0;
    border-color:blue;
}

div.recap td.total ,
div.recap th.total 
{
    border-top: blue 2px solid;
    border-bottom: blue 2px solid;
    margin:2px;
    padding:2px;
    font-weight:bold;
}

div.recap td.prix
{
    font-family: Courier, proportional ;
    text-align: right;
}

</style>
</head>
<body>
<?php
// paramètres
$fileName = 'voo_database.csv';
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
?>

<form method="POST">
<h1>VOO : Catalogue des produits</h1>
<div class="search_bar">
<input type="text" name="search_string"><button name="button_search">
            Chercher dans le catalogue
        </button>
</div>
<div class="login">
		Votre prénom : <input type="text" name="login_firstname">
		Votre nom : <input type="text" name="login_name">
</div>
<div class="button_bar">
<button name="button_basket_add">
            Enregistrer mon panier
        </button><button name="button_basket_see">
            Voir mon panier
        </button><button name="button_buy">
            Acheter
        </button>
</div>

<?php
// affichage catalogue
foreach( $product_a as $line => $product )
{
	if( $line == 0 ) continue; // skip la ligne avec les titres
	?>
	<div class="produit">
		<div class="formule">
			<?=$product[0]?>
		</div>
		<ul>
			<?php
			$formule_title = array( 
				"",
				"Appels",
				"SMS",
				"Internet",
				"Volume",
				"Vitesse",
			);
			for( $i=1 ; $i<=5 ; $i++ )
			{
				if(empty($product[$i])) continue;
				echo <<< FORMULE
				<li>{$formule_title[$i]} : {$product[$i]}</li>
FORMULE;
			}
			?>
		</ul>
		<div><a target="_blank" href="<?=$product[6]?>">
			Plus d'info
		</a></div>
		<div>
			Ajouter au panier : <br>
			<div class="prix">A la pièce : 12 €
				<select name="basket[toudou][single]"><option></option>
				<option value="1">1</option>
				<option value="2">2</option></select>
			</div>
		</div>
		<div class="prix">Groupe de 6 : 60 € 
			<select name="basket[toudou][pack]"><option></option>
			<option value="1">1</option>
			<option value="2">2</option></select>
		</div>
	</div>
	<?php
}
?>
</form>

</body></html>