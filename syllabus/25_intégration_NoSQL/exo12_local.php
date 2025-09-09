<PRE><?php
/*
 * Comment convertir un fichier XML en objet/array PHP 
 * fonction : simplexml_load_file
 */

$document = simplexml_load_file('library+dtd+xsl.xml');

echo "<h1>Auteur du livre indexé 1 :";
print( $document->livre[1]->auteur );
echo "</h1>";

echo "<h1>Toute la bibliothèque:</h1>";
// var_dump($document); 
print_r($document);

?></PRE>