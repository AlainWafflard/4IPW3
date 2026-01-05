<?php

function html_head($menu_a=[])
{
    $debug = false;

    // on génère le code html du menu, à partir de $menu_a
    $menu_s = <<< HTML
        <ul class="menu">
HTML;
    foreach( $menu_a as $menu_item)
    {
        $visual = $menu_item[0];
        $comp = $menu_item[1];
        $subcomp = $menu_item[2] ?? '';
        $menu_s .= <<< HTML
            <li>
                <a href="?page=$comp&subpage=$subcomp">
                    $visual
                </a>            
            </li>
HTML;
    }
    $menu_s .= "</ul>";

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
        <script src="./js/internal/counter.js"></script>
	</head>
	<body>
    <header>
        <h1>
            France 24 (MVC)
            <img src="./media/icon3.png">
        </h1>
        <?=$menu_s?>
    </header>
    <?php

	if($debug)
	{
        var_dump($_COOKIE);
		var_dump($_SESSION);
        var_dump($_GET);
        var_dump($_POST);
	}
	return ob_get_clean();
}

function html_foot()
{
	ob_start();
	?>
        <hr />
        <footer>
            Made with the amazing AWebWiz framework
            <img src="./media/awebwiz.png" alt="AWebWiz logo">
        </footer>
	</body>
	</html>
	<?php
	return ob_get_clean();
}

