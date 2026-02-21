<?php

/**
 * incrémente le compteur stocké en SESSION
 * @return JSON string
 */
function main_counter_fetch():string
{
	if(isset($_POST['vuejs'])) {
		// appelé depuis framework vue.js
		$session_var = 'vuejs_cpt_val';
	}
	else {
		// appelé depuis simple page HTML
		$session_var = 'cpt_val';
	}

	// on récupère la valeur stockée
	// si non existante alors 0
	$cpt_val = @$_SESSION[$session_var] ?: 0 ;

	// get or increment
	switch($_POST['action']) {
		case "get" :
			break;
		case "increment":
			$cpt_val++;
			break;
	}

	// on sauvegarde dans SESSION
	$_SESSION[$session_var] = $cpt_val;

	$ret_a = [
		'cpt_val'	=> $cpt_val,
	];
	return json_encode($ret_a);

}

