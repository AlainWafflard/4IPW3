<?php

function main_home():string
{

	return join( "\n", [
		ctrl_head(),
		html_body(),
        html_foot(),
	]);

    // return html_head( ) . html_body() . html_foot();
}

