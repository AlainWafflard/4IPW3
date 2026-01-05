<?php

function html_press_list_titles($press_a)
{
    $out = <<< HTML
        <h2>Tous nos articles de presse</h2>
HTML;

    $out .= <<< HTML
        <ul class="">
HTML;
    foreach( $press_a as $item)
    {
        $visual = $item['title'];
        $out .= <<< HTML
            <li>$visual</li>
HTML;
    }
    $out .= "</ul>";
    
    return $out;
}

