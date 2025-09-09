<?php
/**
 * valider() vérifie que le nom entré par l'utilisateur existe bien dans 
 * le fichier login.csv
 * @param string $input nom entré par l'utilisateur 
 * @return boolean true si existe, false si n'existe pas 
 */
function valider($input)
{
	// lecture fichier
	$fh = fopen( 'login2.csv', 'r' );
	while( ! feof($fh) )
	{
		$ligne = fgets($fh);
		$user_info = explode( ';', trim($ligne) );
		
		if( $user_info[0] == $input )
		{
			// l'utilisateur a été identifié
			$_SESSION['id'] = $user_info[0];
			$_SESSION['role'] = $user_info[2];
			fclose($fh);
			return true;
		}
	}
	// l'utilisateur n'a pas été identifié
	fclose($fh);
	return false;
}

///////////////////////////////////////

session_start();
?>
<html>
<head>
	<title>exercice sur les sessions, appliquées au login/logout</title>
</head>
<body>
<form method="post">
<?php
// var_dump($_POST);

if(isset($_POST['logout'] ))
{
	// l'utilisateur veut se délogguer
	echo 'Vous êtes déloggué. ';
	// unset($_SESSION['id']);
	session_unset();
}

if( ! empty($_POST['identifier']))
{
	// l'utilisateur est en train de s'identifier
	$valide = valider($_POST['identifier']);
	if( ! $valide )
	{
		echo "Vous n'êtes pas identifié.";
		session_unset();
	}
}

if(isset($_SESSION['id']))
{
	// l'utilisateur est déjà identifié
	echo 'Bonjour ' . $_SESSION['id'] . '.';

	if( $_SESSION['role'] == 'administrator' )
	{
		echo 'Vous êtes administrateur.';
	}
	elseif( $_SESSION['role'] == 'user' )
	{
		echo 'Vous êtes un utilisateur simple.';
	}
	else
	{
		echo 'Problème ....';
	}
	?>
	<button type="submit" name="logout">log out</button>
	<!-- 
	Remarque : On peut aussi utiliser un hyper-lien pour se délogguer, par ex.
	<a href="?action=logout">log out</a>
	-->
	<?php
}
else
{
	// l'utilisateur n'est pas identifié 
	?>
	Identifiez-vous : 
	<input type="text" name="identifier">
	<button type="submit">log in</button>
	<?php
}

?>
</form>
</body>
</html>