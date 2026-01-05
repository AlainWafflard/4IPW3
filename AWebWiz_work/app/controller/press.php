<?php

function main_press()
{
    $press_a = get_press_list_titles();

    return join( "\n", [
        html_head(get_menu()),
        html_press_list_titles($press_a),
        html_foot(),
    ]);

}