<?php

function main_home():string
{
	return join( "\n", [
		html_head( ),
		html_body(),
		html_foot(),
	]);

}

