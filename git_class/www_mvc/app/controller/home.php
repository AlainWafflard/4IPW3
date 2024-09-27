<?php

/**
 * paramétrage de l'identification : soit déjà identifié, soit non identifié
 * @return array
 */

function main_home()
{
	return join( "\n", [
		html_head( ),
		html_body(),
		html_foot(),
	]);

}

