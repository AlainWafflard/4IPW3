<?php

function main_static()
{
    $filename = $_GET['subpage'];
    $static_contents = get_static_contents($filename);

    return join( "\n", [
        html_head(get_menu()),
        $static_contents,
        html_foot(),
    ]);

}

