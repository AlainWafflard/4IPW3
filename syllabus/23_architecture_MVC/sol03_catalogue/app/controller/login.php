<?php
//session_start();
//include "model/db_helper.php";
//include "view/html_helper.php";

function main_login()
{
	$action = @$_GET['action'] ?: "";
	$msg = '';

	//	if(isset($_POST['logout'] ))
	if( $action == 'logout' )
	{
		// l'utilisateur est en train de se délogguer
		// logout_print();
		session_unset();
		$msg = 'Vous êtes déloggué. ';
	}

	if( ! empty($_POST['identifier']))
	{
		// l'utilisateur est en train de s'identifier
		list( $valide, $_SESSION['id'], $_SESSION['role'] ) = login_validate($_POST['identifier']);
		// si identification ratée
		if( ! $valide )
		{
			// unknown_user_print();
			session_unset();
			$msg = "Vous n'êtes pas identifié.";
		}
	}

	if(isset($_SESSION['id']))
	{
		// l'utilisateur est déjà identifié
		// plus besoin du composant login
		// => redirection vers home page
		print('mouchard');
		header("Location: .");
	}
	else
	{
		// l'utilisateur n'est pas identifié
		$msg .= html_unidentified_user();
	}

	return join( "\n", [
		html_head(),
		html_open_form(),

		$msg,

		html_link_home(),

		html_close_form(),
		html_foot()
	]);

}

?>