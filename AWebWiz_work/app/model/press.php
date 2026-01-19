<?php

function get_press_list_titles()
{
    $content_a = [];
    switch(DATABASE_TYPE) {
        case "json":
            $content_s = file_get_contents('../asset/database/article.json');
            $content_a = json_decode($content_s, true);
            break;

        case "MySql":
            $pdo = db_get_pdo();
            var_dump($pdo);
//            $pdo = db_get_pdo();
//            var_dump($pdo);
//            $pdo = db_get_pdo();
//            var_dump($pdo);

            break;
    };
    return $content_a;
}

// Don't Repeat Yourself
//