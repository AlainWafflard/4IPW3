<?php

function get_config($param)
{
	switch($param)
	{
		case "title":
			return "Exercice MySQL / SQL (INSERT/SELECT) en MVC";
		case "h1":
			return "Insert and Select Data In Database Using PHP.";
		case "css":
			return array(
				"view/main.css",
			);
		default:
			return '';
	}
}

?>