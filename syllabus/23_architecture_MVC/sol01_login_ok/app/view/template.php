<?php

function html_head($debug=false)
{
	ob_start();
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
	return ob_get_clean();
}

function html_foot()
{
	ob_start();
	?>
	</body>
	</html>
	<?php
	return ob_get_clean();
}

