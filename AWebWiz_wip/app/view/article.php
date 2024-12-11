<?php

function html_article_main($article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    // $art_id = $article_a['id'];
    $content = $article_a['content'];
    $date = $article_a['date_published'];
    $image_path = MEDIA_ARTICLE_PATH.$article_a['image_name'];

    $out = <<< HTML
    <section class="article">
        <article>
            <h1>$title</h1>
            <h2>$hook</h2>
            <div class="media_article"><img src="$image_path" alt="$title"></div>
            <div>$date</div>
            <div>$content</div>
        </article>
    </section>
    HTML;

    return $out;
}

function html_all_articles_main($article_aa)
{
    ob_start();
    ?>
    <section class="other">
        <?php
        foreach( $article_aa as $art_a)
        {
            $title = $art_a['title'];
            $art_id = $art_a['id'];

            echo <<< HTML
                <article>
                    <a href="?page=article&art_id=$art_id"><h1>$title</h1></a>
                </article>
            HTML;
        }
        ?>
    </section>
    <?php
    return ob_get_clean();
}

