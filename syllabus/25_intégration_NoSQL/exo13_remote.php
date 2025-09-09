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
 * Comment convertir un fichier XML en objet/array PHP 
 * fonction : simplexml_load_file
 *
 * Exemple 1 : la publicité 
 */

// URL du fichier localisé sur www.burotix.be
$xml_file_url = "http://playground.burotix.be/adv/banner_for_isfce.xml";
$adv_o = simplexml_load_file($xml_file_url); // objet contenant les données
// var_dump($adv_o);

$adv_image 	= $adv_o->banner_4IPDW->image; 	// adresse de l'image dans le banner
$adv_text 	= $adv_o->banner_4IPDW->text;	// texte à afficher dans le banner

?>

<div class="banner">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>

<div class="banner">
    <img src="<?=$adv_image;?>" style="float:right;" />
    <?=$adv_text;?>
</div>

</body>
</html>
