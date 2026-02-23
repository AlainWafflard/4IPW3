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
	width:50%;
	background-color: #edcaa5;
}
</style>
</head>
<body>
<?php
/*
 * Comment convertir un fichier JSON en objet/array PHP
 * fonction : file_get_contents
 *
 * Exemple 1 : la publicité 
 */

// URL du fichier localisé sur burotix.be
$json_file_url = "http://playground.burotix.be/adv/banner_for_isfce.json";
$json_string = file_get_contents($json_file_url);
$adv_a=json_decode($json_string, true);

$adv_image 	= $adv_a['banner_4IPDW']['image']; 	// adresse de l'image dans le banner
$adv_text 	= $adv_a['banner_4IPDW']['text'];	// texte à afficher dans le banner

?>

<div class="banner">
	<img src="<?=$adv_image;?>" style="float:right;" />
	<?=$adv_text;?>
</div>

<h3>JSON string reçu du serveur</h3>
<?php
var_dump($json_string);
?>

<h3>conversion en assoc array</h3>
<?php
var_dump($adv_a);
?>

</body>
</html>
