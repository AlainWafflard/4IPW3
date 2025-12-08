<?php

function html_head($debug=false)
{
	ob_start();
	?>
	<html lang="fr">
	<head>
		<title>exercice login/logout en MVC</title>
        <link rel="stylesheet" href="asset/css/main.css" />
	</head>
	<body>
    <h1>
        Site Test en MVC
    </h1>
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
        <hr />
	</body>
	</html>
	<?php
	return ob_get_clean();
}

