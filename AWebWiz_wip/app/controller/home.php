<?php

function main_home():string
{
    $article_a = get_article_a();
    $bottom_article_aa = get_bottom_article_a();

	return join( "\n", [
		ctrl_head(),
        html_home_main($article_a, $bottom_article_aa),
        html_foot(),
	]);

}

