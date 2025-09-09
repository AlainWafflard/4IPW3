<?php

function main_catalogue()
{

    // étape 1 : lire les données du catalogue
    $catalogue_a = get_catalogue_contents();

    // étape 2 : générer le code HTML du catalogue
    $catalogue_html = html_catalogue_contents($catalogue_a);

    // étape 3 : tout mettre en musique
    $catalogue_header = html_catalogue_header();
    $catalogue_footer = html_catalogue_footer();

    return join( "\n", [
        html_head(),
        $catalogue_header,
        $catalogue_html,
        $catalogue_footer,
        html_foot(),
    ]);
}

