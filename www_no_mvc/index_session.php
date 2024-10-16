<?php
session_start();
require_once("math.php");
require_once("view.php");
require_once("model.php");

?>
<html>
<head>

    <?php

    /*if(isset($_SESSION['login']['is_logged'])
    and $_SESSION['login']['is_logged'])
    {
        // déjà loggué
    }*/

    if(isset($_POST['set_logout']))
    {
        // il.elle se déloggue
        $message  = "Vous vous êtes déloggué.";
        unset($_SESSION['login']);
        unset($_SESSION['bg_color']);
    }

    if(isset($_POST['set_login']))
    {
        // qqn a cliqué sur le bouton "log".
        $login = $_POST['my_login'];
        $is_valid = check_login($login);
        if($is_valid)
        {
            // user identified
            $_SESSION['login']['is_logged'] =true;
            $_SESSION['login']['name'] = $login;
        }
        else
        {
            // user not identified
            unset($_SESSION['login']);
            $message = "Identifiant non reconnu.  Veuillez réessayer.";
        }
    }


    /*if(isset($_SESSION['bg_color']))
    {
        $bg_color = $_SESSION['bg_color'];
    }
    else
    {
        $bg_color = 'lightskyblue';
    }*/
    $bg_color = $_SESSION['bg_color'] ?? 'lightskyblue';
    if(isset($_POST['set_bgcolor']))
    {
        // l'utilisateur a cliqué sur le bouton
        $bg_color = $_POST['my_favorite_color'];
    }
    echo style_sheet($bg_color);
    $_SESSION['bg_color'] = $bg_color;
    ?>

</head>
<body>

<?php

if(isset($_POST['process_b']))
{
    // des données proviennent du form
    // le bouton "process_b" a été cliqué

    echo <<< HTML
    <h1>contenu du form</h1>
    HTML;
    // var_dump($_POST);

    foreach( $_POST as $key => $value )
    {
        if(is_array($value))
        {
            $out = implode( "|", $value);
        }
        else
        {
            $out = $value;
        }
        echo <<< HTML
            <p> $key =>  $out </p>
HTML;
    }
}

?>

<h1>Formulaire</h1>

<?php
// echo my_first_form();
// echo my_second_form();
echo form_background($bg_color);

?>

<h1>Log in</h1>
<?php

if( isset($_SESSION['login']['is_logged'])
and $_SESSION['login']['is_logged'] )
{
    // bienvenue
    echo <<< HTML
    <form method="post">
        <p>Bienvenue {$_SESSION['login']['name']}</p>
        <button type="submit" name="set_logout">log out</button>
    </form>
HTML;
}
else
{
    // non loggué
    echo form_login();

    if(isset($message))
    {
        echo <<< HTML
            <p>$message</p>
HTML;
    }
}
?>

</body>
</html>