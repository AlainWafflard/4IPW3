<html>
<head>
<style>
body
{
	font-size:16px;
	position: relative;
	/* border: 4px #CCAA44 solid; */ 
	width: 800px;
	/* height:400px; */
	margin: auto;
}

.banner 
{
	border: rgb(25, 99, 161) 2px solid;
	border-radius:10px;
	margin:20px;
	padding:20px;
	width:600px;
	height:80px;
	background-color: #edcaa5;
}
</style>
</head>
<body><pre>
<?php
/*
 * Exemple 2 : la conversion de devises 
 * Sur le site web de la BCE, on trouve un fichier mis à jour préesentant la 
 * conversion des devises.  Dans l'exemple, on recherche la valeur de l'USD
 * par rapport à l'EUR. 
 *
 * C'est un cas plus compliqué car il faut procéder à une requête dans des données XML. 
 * Méthode 1, basée sur PHP  : on cherche la valeur dans une boucle 
 * Méthode 2, basée sur XPath : on cherche la valeur par une requête 
 */
$currency_xml = "http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml";
$currency_o = simplexml_load_file($currency_xml);

/*
 * POUR PROGRAMMEUR DEBUTANT 
 * Méthode 1, basée sur PHP  : on cherche la valeur dans une boucle 
 * $rate_1 contient le taux de change de l'EUR en USD.
 */
$currency_detail_o = $currency_o->Cube->Cube->Cube;
foreach( $currency_detail_o as $c )
{
	if( $c['currency'] == "USD" )
	{
		$rate_1 = $c['rate'];
		break;
	}
}

/*
 * POUR PROGRAMMEUR AVANCE
 * Méthode 2, basée sur XPath : on cherche la valeur par une requête XPath
 * Méthode techniquement meilleure mais plus complexe à aborder pour un débutant 
 * $rate_2 contient le taux de change de l'EUR en USD.
 */

// Assign "default" as namespace prefix for default namespace (empty prefix)
// because Xpath can not work with the default namespace
foreach($currency_o->getDocNamespaces() as $strPrefix => $strNamespace)
    if(empty($strPrefix))
		$currency_o->registerXPathNamespace("default",$strNamespace);

$xpath_s = '//default:Cube/default:Cube[@currency="USD"]';
$rate_2 = $currency_o->xpath($xpath_s)[0]['rate'];

?>

<h1>Conversion USD/EUR</h1>
<div class="banner">
	Méthode 1 (php) : 1 EUR = <?=$rate_1;?> USD<br/>
	Méthode 2 (XPath) : 1 EUR = <?=$rate_2;?> USD
</div>

<h1>Exemple</h1>
<?php
// Calcul du prix 
$eur_price = 150;
$usd_price = 150 * $rate_1 ;
?>
<div class="banner">
	Mon article est vendu <?=$eur_price;?> EUR (<?=$usd_price;?> USD)
</div>
<hr/>

<h1>Contenu du fichier XML de la BCE</h1>
<?php
print_r($currency_o);
?>

</pre></body>
</html>