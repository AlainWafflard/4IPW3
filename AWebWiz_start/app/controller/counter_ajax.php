<?php

/**
 * @return JSON string
 */
function main_counter_ajax():string
{
	// on récupère la valeur stockée
	// si non existante alors 0
	$cpt_val = @$_SESSION['cpt_val'] ?: 0 ;

	// get or increment
	switch($_POST['action']) {
		case "get" :
			break;
		case "increment":
			$cpt_val++;
			break;
	}

	// on sauvegarde dans SESSION
	$_SESSION['cpt_val'] = $cpt_val;

	// return sous forme JSON
	$ret_a = [
		'cpt_val'	=> $cpt_val,
	];
	return json_encode($ret_a);
}

