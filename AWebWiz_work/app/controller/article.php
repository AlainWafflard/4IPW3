<?php

function main_article():string
{
    // model
    // http://4ipw3-aww/?page=article&ident_art=4
    // $_GET["ident_art"]  => 4
    $article_a = get_press_article($_GET["ident_art"]);

    // view
	return join( "\n", [
		html_head(get_menu()),
		html_press_article($article_a),
		html_foot(),
	]);

}

