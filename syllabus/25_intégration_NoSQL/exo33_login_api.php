<?php
session_start();

/**
 * validate vérifie si $name existe bien chez playground
 * URI : http://playground.burotix.be/login/?login=<login>&passwd=<passwd>
 * Méthode GET
 *
 * format du JSON retourné par l'API
 *  {
    "identified": true,
    "name": "Luke Skywalker",
    "role": "user"
    }
 *
 * Remarque : Utilisation problématique : On ne peut pas envoyer des credentials en GET (security issue).
 */
function validate_get($name, $password): bool
{
    // construire URI
    $uri_head = "https://playground.burotix.be/login/exo33_login_api_on_serveur.php?";
    $uri_param = [
      "login"   => $name,
      "passwd"  => $password,
    ];
    $uri = $uri_head . http_build_query($uri_param);
    var_dump($uri);
    $json_string = file_get_contents($uri);
    $auth_a = json_decode($json_string, true);
    echo <<< HTML
        <h3>Envoi des données sous GET et HTTP</h3>
        <h3>retour brut du serveur : </h3>
HTML;
    var_dump($auth_a);

    if( ! $auth_a['identified'])
    {
        // user not identified
        echo "<div>$name inconnu !</div>";
        return false;
    }

    // user identified
	echo <<< HTML
        <div>
        Vous êtes {$auth_a['name']} avec le rôle : {$auth_a['role']}
        </div>
HTML;
	return true;
}

/**
 * validate vérifie si $name existe bien chez playground
 * URI : http://playground.burotix.be/login/?login=<login>&passwd=<passwd>
 * Méthode POST => Il faut utiliser "context".
 *
 * Format du JSON retourné par l'API : idem GET
 *
 * Remarque : Utilisation maintenant correcte des credentials :
 * - cachés sous POST
 * - cryptés sous https
 * - non stockés en clair
 *
 * Mais on peut encore améliorer :
 *  - Valider la réponse JSON avant de l'utiliser (si playground.burotix.be est en erreur)
 *  - Vérifier le certificat SSL du serveur distant
 *  - Définir un timeout
 *
 */
function validate_post($name, $password): bool
{
    // construire URI
    $uri_head    = "https://playground.burotix.be/login/exo33_login_api_on_serveur.php";
    $uri_param_s = http_build_query([
      "login"   => $name,
      "passwd"  => $password,
    ]);
    var_dump($uri_param_s);

	$context = stream_context_create([
		"http" => [
			"method"  => "POST",
			"header"  => "Content-Type: application/x-www-form-urlencoded\r\n" .
                         "Content-Length: " . strlen($uri_param_s) . "\r\n",
			"content" => $uri_param_s,
		]
	]);
    var_dump($context);

    $json_string = file_get_contents($uri_head, false, $context);
    $auth_a = json_decode($json_string, true);
    echo <<< HTML
        <h3>Envoi des données sous POST et HTTPS</h3>
        <h3>retour brut du serveur : </h3>
HTML;
    var_dump($auth_a);

    if( ! $auth_a['identified'])
    {
        // user not identified
        echo "<div>$name inconnu !</div>";
        return false;
    }

    // user identified
	echo <<< HTML
        <div>
        Vous êtes {$auth_a['name']} avec le rôle : {$auth_a['role']}
        </div>
HTML;
	return true;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!doctype HTML>
<html lang="fr">
<head>
    <title>exo 33 - login & logout with session, API, JSON</title>
</head>
<body>
<h1>exo 33 - login & logout with session, API, JSON</h1>
<p>Exo inspiré du chap 22 "traitement de formulaire", exo 24. <br>Modification : la fonction <code>validate()</code></p>
<p>Utilisateurs autorisés : <br>
    - user / user<br>
    - admin / admin</p>

<form method="post">

	<?php

	if( isset($_POST['identify'] ) )
	{
		// l'utilisateur veut s'identifier.
        // Deux méthodes : GET et POST => Deux scripts sont proposés
        // Ici, vu la sécurité, il vaut mieux utiliser POST
		 $user_exists = validate_get($_POST['avatar'], $_POST['password']);
//		$user_exists = validate_post($_POST['avatar'], $_POST['password']);
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
          <input name="password" required type="password" placeholder="votre mot de passe" />
      </div>
      <button name="identify" type="submit">s'identifier</button>
		<?php
	}
	?>

</form>
</body>
</html>