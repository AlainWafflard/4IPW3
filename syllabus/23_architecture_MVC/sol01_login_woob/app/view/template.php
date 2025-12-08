<?php

function html_head($debug=false)
{
	?>
	<html lang="fr">
	<head>
		<title>exercice login/logout en MVC</title>
        <link rel="stylesheet" src="asset/css/main.css" />
	</head>
	<body>
	<?php
	if($debug)
	{
		var_dump($_SESSION);
	}
}

function html_foot()
{
	?>
	</body>
	</html>
	<?php
}

