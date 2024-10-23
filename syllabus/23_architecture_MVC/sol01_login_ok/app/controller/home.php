<?php

/**
 * paramétrage de l'identification : soit déjà identifié, soit non identifié
 * @return array
 */
function get_identification()
{
	// identification par défaut
	$user = $role = "inconnu";
	$login_display = true;// true : afficher lien pour login (false : logout)

	// Quoi afficher en rapport avec le login
	if (isset($_SESSION['id']))
	{
		// l'utilisateur est déjà identifié
		// login_print($_SESSION['id']);
		$user = $_SESSION['id'];
		$role = @$_SESSION['role'];
		$login_display = false;
	}

	return array( $user, $role, $login_display );
}

function main_home()
{
	list( $user, $role, $login_display ) = get_identification();

	echo join( "\n", [
		html_head(),

		html_body($user, $role),

		$login_display ? html_login_button() : html_logout_button(),

		html_foot(),
	]);

}

