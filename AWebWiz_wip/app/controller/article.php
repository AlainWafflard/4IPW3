<?php

/**
 * génère la page avec un (seul) article complet
 * @return string html
 */
function main_article()
{
    $art_id = $_GET['art_id'];

    // récupérer les données de cet article
    $article_a = get_article_a($art_id);

    // générer la page html
    return join( "\n", [
        ctrl_head(),
        html_article_main($article_a),
        html_foot(),
    ]);
}