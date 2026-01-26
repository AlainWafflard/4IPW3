<?php

function main_search():string
{
    // model
    $press_a = [];
    if( ! empty($_POST['keyword']))
    {
        $press_a = get_press_list_titles($_POST['keyword']);
    }

    // view
	return join( "\n", [
		html_head(get_menu()),
		html_search_form(),
        html_press_list_titles($press_a),
		html_foot(),
	]);

}

