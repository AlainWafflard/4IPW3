<?php

function main_home():string
{
	return join( "\n", [
		html_head(get_menu()),
		html_body(),
		html_foot(),
	]);

}

