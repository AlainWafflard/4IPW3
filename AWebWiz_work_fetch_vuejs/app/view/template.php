<?php

function html_head()
{
    $debug = false;
	ob_start();
	?>
	<html lang="fr">
	<head>
		<title>AWebWiz Template (MVC)</title>

        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />  <!-- lib externe -->
        <link rel="stylesheet" href="./css/internal/main.css" /> <!-- lib interne / perso -->

        <script src="./js/quirks/QuirksMode.js"></script>
        <!--<script src="./js/internal/favorite.js"></script>-->
        <script src="./js/internal/counter.js"></script>

        <script src="./js/vue.js/vue.global.js"></script>
        <script type="importmap">
            {
                "imports": {
                    "vue" : "./js/vue.js/vue.esm-browser.js"
                }
            }
        </script>
        <script type="module" src="./components/app.js" defer></script>

    </head>
	<body>
    <header>
        <h1>
            France 24 (MVC)
            <img src="./media/icon3.png">
        </h1>
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

