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
    <section>
        <h2>
            HOME
        </h2>
        <p>
            Ceci est la home page.
        </p>
    </section>
    <?php
	return ob_get_clean();
}


/**
 * build a counter as a FETCH sample
 */
function html_fetch_sample()
{
	ob_start();
	?>
    <section id="html_fetch_sample">
        Ceci est un compteur utilisant une requête FETCH.<br>
        La valeur du compteur est stockée sur le serveur en variable SESSION.<br>
        <button type="button" id="b_compteur">Comptons !</button>
        <span class="compteur">compteur : <span id="compteur">0</span></span>
    </section>
	<?php
	return ob_get_clean();
}


/**
 * build a counter as a FETCH sample, integrated in vue.js framework
 */
function vuejs_fetch_sample()
{
	ob_start();
	?>
    <section id="vuejs_fetch_sample">
        <counter></counter>
    </section>
	<?php
	return ob_get_clean();
}


