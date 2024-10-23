<?php

/**
 * build <body>
 * @param $user
 * @param $role
 */
function html_body($user="inconnu", $role="inconnu")
{
	ob_start();
	?>
    <h2>
        HOME
    </h2>
    <p>
        Ceci est la home page
    </p>
    <p>
        Identification : user:<?=$user?>, rôle:<?=$role?>
    </p>
    <?php
	return ob_get_clean();
}

