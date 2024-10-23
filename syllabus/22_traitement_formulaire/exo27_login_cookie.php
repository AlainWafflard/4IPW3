<?php
// var_dump($_COOKIE);

// default value for $is_logged
if(isset($_COOKIE['id']))
{
	$is_logged = true;
}
else
{
	$is_logged = false; 
}

if(isset($_POST['logout'] ))
{
	// l'utilisateur veut se délogguer
	setcookie("id", "", 1 ); // date dans le passé => cookie expiré
	$is_logged = false;
}

if( ! empty($_POST['identifier']))
{
	// l'utilisateur est en train de s'identifier
	$_COOKIE['id'] = $_POST['identifier'];
	$expire = time() + (86400 * 1); // expiration dans un jour
	setcookie( "id", $_POST['identifier'], $expire );
	$is_logged = true;
}

?>
<html>
<head>
<title>login & logout with cookie</title>
</head>
<body>
<h1>login & logout with cookie</h1>
<form method="post">
<?php
if($is_logged)
{
	// l'utilisateur est  identifié
	?>
	<div> 
		Bonjour <?=$_COOKIE['id']?>
		<button type="submit" name="logout">log out</button>
	</div>
	<!-- 
	Remarque : On peut aussi utiliser un hyper-lien pour se délogguer, par ex.
	<a href="?action=logout">log out</a>
	Mais .... pas avec la méthode POST bien entendu ... uniquement avec la méthode GET.
	-->
	<?php
}
else
{
	// l'utilisateur n'est pas identifié 
	?>
	<div>	
		Identifiez-vous :
		<input type="text" name="identifier">
		<button type="submit">log in</button>
	</div>
	<?php
}

// var_dump($_COOKIE);
?>
</form>
</body>
</html>