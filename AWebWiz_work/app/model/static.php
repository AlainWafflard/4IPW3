<?php

function get_static_contents($filename)
{
    $content_s = file_get_contents("../asset/static_content/$filename.html");
    return $content_s;
}

