<?php
/*
 */
session_start();

/**
 * validate vérifie si $name existe bien chez playground
 * URI : http://playground.burotix.be/login/?login=<login>&passwd=<passwd>
 *
 * format du JSON retourné par l'API
 *  {
    "identified": true,
    "name": "Luke Skywalker",
    "role": "user"
    }
 */
function validate($name): bool
{
    // construire URI
    $uri_head = "http://playground.burotix.be/login/?";
    $uri_param = [
      "login"   => $name,
      "passwd"  => $name,
    ];
    $uri = $uri_head . http_build_query($uri_param);
    $json_string = file_get_contents($uri);
    $auth_a = json_decode($json_string, true);
    var_dump($auth_a);

    if( ! $auth_a['identified'])
    {
        // user not identified
        echo "<div>$name inconnu !</div>";
        return false;
    }

    // user identified
	echo "<div>Vous êtes {$auth_a['name']} avec le rôle : {$auth_a['role']}</div>";
	return true;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!doctype HTML>
<html lang="fr">
<head>
    <title>exo 24 - login & logout with session, API, JSON</title>
</head>
<body>
<h1>exo 24 - login & logout with session, API, JSON</h1>
<p>Exo inspiré du chap 22 "traitement de formulaire", exo 24. Unique modification : la fonction <i>validate()</i></p>
<p>Utilisateurs autorisés : <br>
    - user / user<br>
    - admin / admin</p>

<form method="post">

	<?php

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