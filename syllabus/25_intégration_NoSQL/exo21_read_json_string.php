<pre><?php
/*
 * Comment convertir un string JSON en objet ou array PHP
 * fonction : json_decode
 */

$string = <<< JSON
{
    "id": "Margaret",
    "image": ".\/model\/media\/robes.jpg",
    "type": "Robe",
    "ref": "41V2138",
    "couleur": "Virtual Pink",
    "lien": "http:\/\/www.desigual.com\/fr_BE\/mode-femme\/robe\/prod-margaret-40V2141?selectedColor=3145",
    "prix": 79,
    "taille": [
        "XL",
        "L"
    ]
}
JSON;

echo "JSON string : \n$string\n\n";

echo "PHP object :";
$object = json_decode($string);
var_dump($object);

echo "PHP assoc array :";
$array = json_decode($string, true);
var_dump($array);

echo "couleur de l'article:";
echo $array['couleur'];

?></pre>