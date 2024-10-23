<?php
/*
 *  format du CSV
 *      Alfred;Alfred;administrator
 *      Bertrand;Bertrand;user
 */
const LOGIN_FN = "database_login.csv";
session_start();

/**
 * validate vérifie si $name se trouve bien dans le CSV.
 */
function validate($name): bool
{
	// ouvrir fichier login.csh et construire tableau $login_a
	$h = fopen( LOGIN_FN, "r" );
	while( ! feof($h) )
	{
		$login_a[] = explode( ";" , trim(fgets($h))); 
	}
	fclose($h);
	
	// comparez $login_a avec $name
	foreach( $login_a as $line )
	{
		if( $line[0] == $name ) 
		{
			echo "<div>Vous êtes {$line[0]} avec le rôle : {$line[2]}</div>";
			return true;
		}
	}
	
	// si on arrive ici, c'est que $name n'a pas été trouvé dans le CSV
	// donc return false
	echo "<div>$name inconnu !</div>";
	return false;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!doctype HTML>
<html lang="fr">
<head>
	<title>exo 24 - login, mot de passe, logout, fichier CSV, session</title>
</head>
<body>
<h1>exo 24 - login & logout with session and CSV</h1>
<p>Utilisateurs autorisés : Alfred (administrator) et Bertrand (user).</p>

<form method="post">

<?php

// print_r($_POST);

if( isset($_POST['identify'] ) )
{
	// l'utilisateur veut s'identifier.
	$user_exists = validate($_POST['avatar']);
	if( $user_exists )
	{
		$_SESSION['user'] = $_POST['avatar'];
		echo "<div>vous êtes connu</div>";
	}
	else
	{
		echo "<div>vous êtes INCONNU.  Recommencez ou inscrivez-vous.</div>";
	}
}

if( isset($_POST['logout'] ) )
{
	// l'utilisateur veut se désinscrire
	unset($_SESSION['user']);
	echo "<div>Vous êtes désinscrit.</div>";
}


if( isset($_SESSION['user']) )
{
	echo "<div>Vous êtes identifié sous l'avatar :" . $_SESSION['user'] . "</div>";
	
	?>
	<button name="logout" type="submit">LOG OUT</button>
	<?php
}
else
{
	?>
	<div>
		Votre avatar
		<input name="avatar" required type="text" placeholder="votre nom" />
		<input type="hidden" name="monchampcache" value="mon_choix" />
	</div>
	<button name="identify" type="submit">s'identifier</button>
	<?php
}
?>

</form>
</body>
</html>