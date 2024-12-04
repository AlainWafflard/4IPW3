<?php

function get_menu_csv()
{
    $fn = '../asset/database/menu.csv';
    $menu_s = file_get_contents($fn);
    $menu_a = explode( "\n", $menu_s );
    $menu_aa = [];
    foreach ( $menu_a as $line )
    {
        $menu_aa[] = explode( '|', $line );
    }
    return $menu_aa;
}

/**
 * retourne l'objet PDO
 * crée l'objet PDO s'il n'existe pas
 */
function get_pdo()
{
    static $pdo;

    if(empty($pdo))
    {
        $pdo = new PDO( DATABASE_DSN, DATABASE_USERNAME, DATABASE_PASSWORD);
        $pdo->query("SET NAMES UTF8");
    }

    return $pdo;
}
