<?php

function main_home():string
{
	return join( "\n", [
		html_head( ),
		html_body(),
		html_fetch_sample(),
		vuejs_fetch_sample(),
		html_foot(),
	]);

}

