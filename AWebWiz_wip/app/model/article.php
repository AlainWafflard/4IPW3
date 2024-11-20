<?php

/**
 * retourne l'article à afficher sur la home page
 * en première position
 * temporairement c'est l'article d'id 1
 * @param $art_id id de l'article à getter dans la db
 * @return assoc array avec les données de l'article
 */
function get_article_a($art_id=1)
{
    $fn = '../asset/database/article.json';
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    foreach( $art_db_a as $art_a)
    {
        if( $art_a["id"] == $art_id ) break;
    }
    // $art_a possède les données de l'article id 1
    return $art_a ;
}

function get_bottom_article_a()
{
    $art_aa = [];
    foreach( [ 2, 3, 4 ] as $art_id)
    {
        $art_aa[] = get_article_a($art_id);
    }
    return $art_aa;
}

function get_all_article_a()
{
    $fn = '../asset/database/article.json';
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    return $art_db_a;
}

