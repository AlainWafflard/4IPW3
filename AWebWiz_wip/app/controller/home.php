<?php

function main_home():string
{
    // get menu array from csv
    $menu_a = get_menu_csv();

	return join( "\n", [
		html_head( $menu_a ),
		html_body(),
        html_foot(),
	]);

    // return html_head( ) . html_body() . html_foot();
}

