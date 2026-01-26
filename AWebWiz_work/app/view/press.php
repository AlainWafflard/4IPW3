<?php

function html_press_list_titles($press_a)
{
    if(empty($press_a))
    {
        return '';
    }

    $out = <<< HTML
        <h2>Tous nos articles de presse</h2>
HTML;

    $out .= <<< HTML
        <ul class="">
HTML;
    foreach( $press_a as $item)
    {
        $visual = $item['title'];
        $ident_art = $item['ident_art'];
        $out .= <<< HTML
            <li><a href="?page=article&ident_art=$ident_art">$visual</a></li>
HTML;
    }
    $out .= "</ul>";
    
    return $out;
}

function html_press_article($art_a)
{
    $media_src = MEDIA_PATH . $art_a["image_art"];
    $out = <<< HTML
<main>
    <article class="main_article">
        <h2>{$art_a["title_art"]}</h2>
        <p><strong>{$art_a["hook_art"]}</strong></p>
        <div class="img"><img src="$media_src" /></div>
        <div>{$art_a["content_art"]}</div>
    </article>
</main>
HTML;

    return $out;
}

function html_search_form()
{
    $out = <<< HTML
<main>
    <form method="post">
        <label>Introduisez ici un mot-clé :</label>
        <input name="keyword" type="text">
        <button>search</button>    
    </form>
</main>
HTML;
    return $out;

}

