<?php

function main_static():string
{
    $name = $_GET['name'] ?? '404';
    $html_body = get_static_content($name);

	return join( "\n", [
		ctrl_head(),
		$html_body,
        html_foot(),
	]);

}

