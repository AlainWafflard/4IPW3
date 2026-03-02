<?php

/**
 * bouton logout à afficher
 */
function html_logout_button()
{
	ob_start();
	?>
    <a href="?page=login&action=logout">log out</a>
    <!--<button type="submit" name="logout">log out</button>-->
    <!--
	Remarque : On peut aussi utiliser un hyper-lien pour se délogguer, par ex.
	<a href="?action=logout">log out</a>
	-->
	<?php
	return ob_get_clean();
}

/**
 * bouton login à afficher
 */
function html_login_button($user="inconnu")
{
	ob_start();
	?>
    <a href="?page=login&action=login">log in</a>
    <?php
	return ob_get_clean();
}

/**
 * open form
 */
function html_open_form()
{
	ob_start();
	?>
    <form method="post">
	<?php
	return ob_get_clean();
}

/**
 * close form
 */
function html_close_form()
{
	ob_start();
	?>
    </form>
	<?php
	return ob_get_clean();
}

/**
 *
 */
function html_unidentified_user()
{
	return <<< HTML
        Identifiez-vous :
        <input type="text" name="identifier">
        <button type="submit">log in</button>
    HTML;
}

function html_link_home()
{
	ob_start();
	?>
    <p>
        <a href=".">go to HOME</a>
    </p>
	<?php
	return ob_get_clean();
}

?>