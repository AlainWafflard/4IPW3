<?php

/**
 * build <body>
 * @param $user
 * @param $role
 */
function html_body($user="inconnu", $role="inconnu")
{
	?>
    <h1>
        HOME
    </h1>
    <p>
        Ceci est la home page
    </p>
    <p>
        Identification : user:<?=$user?>, rôle:<?=$role?>
    </p>
  <?php
}

