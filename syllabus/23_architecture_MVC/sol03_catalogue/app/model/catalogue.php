<?php

/**
 * Retourne les données du catalogue sous forme assoc array
 * @return array
 */

function get_catalogue_contents()
{
    // paramètres
    $fileName = '../asset/voo_database.csv';
    $sep = "|";
    $product_a = [];

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

    return $product_a;
}