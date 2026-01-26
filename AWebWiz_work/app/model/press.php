<?php

/**
 * requête avec les titres des articles
 * @return array
 */
function get_press_list_titles($keyword='')
{
    $content_a = [];
    switch(DATABASE_TYPE) {
        case "json":
            $content_s = file_get_contents('../asset/database/article.json');
            $content_a = json_decode($content_s, true);
            break;

        case "MySql":
            if( ! empty($keyword))
            {
                // requête préparée, avec un mot-clé
                $q = <<< SQL
                SELECT 
                    title_art AS title,
                    ident_art
                FROM `t_article` 
                WHERE 
                    title_art LIKE :keyword
                ORDER BY `date_art` DESC
                LIMIT 10;
SQL;
                $p = [
                    'keyword'   => "%$keyword%",
                ];
                $content_a = db_select_prepare($q, $p);
                // var_dump($content_a);
            }
            else
            {
                // requête non préparée, pas de mot clé
                $q = <<< SQL
                SELECT 
                    title_art AS title,
                    ident_art
                FROM `t_article` 
                ORDER BY `date_art` DESC
                LIMIT 10;
SQL;
                $content_a = db_select($q);
            }
            break;
    };
    return $content_a;
}

function get_press_article($ident)
{
    $content_a = [];
    $q = <<< SQL
        SELECT * 
        FROM `t_article` 
        WHERE `ident_art` = :ident_art ;
SQL;
    $param_a = [
        'ident_art' => $ident,
    ];
    $content_a = db_select_prepare($q, $param_a);

    // var_dump($content_a);
    return $content_a[0];
}

// Don't Repeat Yourself
//