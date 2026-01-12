<?php

function main_home():string
{
    // model
    $menu_a = get_menu();

    // view
	return join( "\n", [
		html_head($menu_a),
		html_body(),
		html_foot(),
	]);

}

