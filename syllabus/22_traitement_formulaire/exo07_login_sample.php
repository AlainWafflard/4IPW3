<?php
/*
 *  Bibliothèque de fonctions (mini MVC)
 */

function html_head($title="4IPDW", $welcome="")
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
    </head>
    <body>
        <h1><?=$welcome?></h1>
        <pre>
            <?php
            var_dump($_GET);
            var_dump($_POST);
            ?>
        </pre>
    <?php
}


/**
 * affiche le formulaire de login
 * @param $intro string texte introductif
 * @param $value string valeur à afficher dans l'input
 */
function html_login_form($intro="", $value="")
{
    ?>
    <div><?=$intro?></div>
    <form method="get">
        <div>
            Votre login :
            <input type="text" name="login" placeholder="blabla" value="<?=$value?>"/>
            <button type="submit" name="send">
                Envoyer
            </button>
        </div>
    </form>
    <?php
}


function html_welcome_user($people)
{
    echo "<div>Hello $people.  Do what you want.</div>";
}


function html_foot()
{
    ?>
    </body>
    </html>
    <?php
}

///////////////////////////////////////////////////////////////////////
// MAIN
html_head("Home", "Welcome everybody to 4IPDW world !");

// CONTROLLER

if( isset($_GET['send']))
{
    // scénario : l'utilisateur se loggue, le bouton a été cliqué
    // print_r($_GET);
    // echo "Qui se loggue ? C'est " . $_GET['login'];

    // liste  des personnes autorisées
    $authorized_people = "Reda";

    // validation de la personne se logguant
    if( $authorized_people == $_GET['login'] )
    {
        // la bonne personne est logguée
        html_welcome_user($authorized_people);
    }
    else
    {
        // une mauvaise personne est logguée
        html_login_form("Go to hell", $_GET['login'] );
    }

}
else
{
    // scénario : l'utilisateur arrive sur le site
    // on affiche le form
    html_login_form();
}

html_foot();

