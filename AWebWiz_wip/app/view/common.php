<?php

function html_head($menu_a=[], $user_id="", $user_role="")
{
    $debug = false;
	ob_start();
	?>
	<html lang="fr">
	<head>
		<title>AWebWiz Template (MVC)</title>
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />  <!-- lib externe -->
        <link rel="stylesheet" href="./css/internal/main.css" /> <!-- lib interne / perso -->
        <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="./js/quirks/QuirksMode.js"></script>
        <script src="./js/internal/favorite.js"></script>
	</head>
	<body>
    <header>
        <h1>
            France 24 (MVC)
            <img src="./media/icon3.png">
        </h1>
        <?php
        foreach( $menu_a as $menu)
        {
            $text = $menu[0];
            $link = $menu[1];
            $option = isset($menu[2]) ? "&name={$menu[2]}" : "";
            echo <<< HTML
                <a href="?page=$link$option">$text</a> | 
HTML;
        }
        ?>
        Welcome, <?=$user_id?> (<?=$user_role?>).
    </header>
    <main>
    <?php

	if($debug)
	{
        echo "<pre>";
        var_dump($_COOKIE);
		var_dump($_SESSION);
        var_dump($_GET);
        var_dump($_POST);
        echo "</pre>";
	}
	return ob_get_clean();
}

function html_foot()
{
	ob_start();
	?>
        </main>
        <footer>
            <hr />
            Made with the amazing AWebWiz framework
            <img src="./media/awebwiz.png" alt="AWebWiz logo">
        </footer>
	</body>
	</html>
	<?php
	return ob_get_clean();
}

