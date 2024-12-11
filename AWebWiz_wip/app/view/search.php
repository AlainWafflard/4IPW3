<?php

function html_search_form($kw='', $lim=DEFAULT_SEARCH_LIMIT)
{
    return <<< HTML
        <form method="post">
            <label>Introduisez votre mot-clé</label>
            <input name="search_kw" type="text" value="$kw">
            <label>Nombre de résultats</label>
            <input name="search_limit" type="text" value="$lim">
            <button name="b_search">rechercher</button>
        </form>
HTML;
}