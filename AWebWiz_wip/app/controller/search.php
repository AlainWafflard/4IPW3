<?php

function main_search()
{
    // get articles based on the user's keyword
    $kw = $_POST['search_kw'] ?? '';
    $limit = $_POST['search_limit'] ?? DEFAULT_SEARCH_LIMIT;
    $all_article_a = get_all_article_a($kw, $limit);

    // get HTML code
    return join( "\n", [
        ctrl_head(),
        html_search_form($kw, $limit),
        html_all_articles_main($all_article_a),
        html_foot(),
    ]);
}

