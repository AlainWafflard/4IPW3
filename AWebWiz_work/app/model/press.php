<?php

function get_press_list_titles()
{
    $content_s = file_get_contents('../asset/database/article.json');
    $content_a = json_decode( $content_s, true);
    return $content_a;
}

