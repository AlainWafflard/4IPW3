<?php

function main_press()
{
    // get all articles
    $all_article_a = get_all_article_a();

    // get HTML code
    return join( "\n", [
        ctrl_head(),
        html_all_articles_main($all_article_a),
        html_foot(),
    ]);
}

