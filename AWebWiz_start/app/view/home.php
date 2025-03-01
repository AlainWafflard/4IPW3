<?php

/**
 * build <body>
 * @param $user
 * @param $role
 */
function html_body()
{
	ob_start();
	?>
    <h2>
        HOME
    </h2>
    <p>
        Ceci est la home page
    </p>
    <?php
	return ob_get_clean();
}


/**
 * build a counter as a AJAX sample
 */
function html_ajax_sample()
{
	ob_start();
	?>
    <p>
        Ceci est un simple compteur utilisant une requête AJAX.
        <button type="button" id="b_compteur">Comptons !</button>
        <span class="compteur">compteur : <span id="compteur">0</span></span>
    </p>
	<?php
	return ob_get_clean();
}

