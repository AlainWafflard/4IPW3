<?php

/**
 * bouton logout à afficher
 */
function html_logout_button()
{
	?>
    <a href="?page=login&action=logout">log out</a>
    <!--<button type="submit" name="logout">log out</button>-->
    <!--
	Remarque : On peut aussi utiliser un hyper-lien pour se délogguer, par ex.
	<a href="?action=logout">log out</a>
	-->
	<?php
}

/**
 * bouton login à afficher
 */
function html_login_button($user="inconnu")
{
	?>
    <a href="?page=login&action=login">log in</a>
    <?php
}

/**
 * open form
 */
function html_open_form()
{
	?>
    <form method="post">
	<?php
}

/**
 * close form
 */
function html_close_form()
{
	?>
    </form>
	<?php
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
	?>
    <p>
        <a href=".">go to HOME</a>
    </p>
	<?php
}

?>