<?php
session_start();
?>
<html>
<head>
<title>exo 21 - login & logout with session</title>
</head>
<body>
<h1>exo 21 - login & logout with session</h1>
<p>N'importe quel utilisateur se loggue sous son nom.</p>
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
	$_SESSION['id'] = $_POST['identifier'];
}

if(isset($_SESSION['id']))
{
	// l'utilisateur est déjà identifié
	echo 'Bonjour ' . $_SESSION['id'] . '.';
	?>
	<button type="submit" name="logout">log out</button>
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
	Identifiez-vous : 
	<input type="text" name="identifier">
	<button type="submit">log in</button>
	<?php
}

?>
</form>
</body>
</html>