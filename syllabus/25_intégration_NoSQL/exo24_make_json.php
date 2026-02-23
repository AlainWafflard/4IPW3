<pre>
<?php

$article = [
    'id'    => "Margaret",
    'image' => "./model/media/robes.jpg",
    'type'  => 'Robe',
    'ref'   => "41V2138",
    'couleur' => "Virtual Pink",
    'lien'  => "http://www.desigual.com/fr_BE/mode-femme/robe/prod-margaret-40V2141?selectedColor=3145",
    'prix'  => 79,
    'taille' => [ 'XL', 'L' ]
];

$article_json = json_encode($article, JSON_PRETTY_PRINT );

echo $article_json;
?>
</pre>

