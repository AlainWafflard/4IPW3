<?php


session_start();
require_once("math.php");
require_once("view.php");
require_once("model.php");

$cookie_login_a = json_decode($_COOKIE['login'] ?? '', true );
$is_login_valid = isset($cookie_login_a['is_logged']);
if($is_login_valid)
{
    $login_name = $cookie_login_a['name'] ?? '';
}

if(isset($_POST['set_logout']))
{
    // il.elle se déloggue
    $message  = "Vous vous êtes déloggué.";
    setcookie('login', 0, 0, "/");
    $is_login_valid = false;
    // unset($_SESSION['login']);
    // unset($_SESSION['bg_color']);
}

if(isset($_POST['set_login']))
{
    // qqn a cliqué sur le bouton "log".
    $login_name = $_POST['my_login'];
    $is_login_valid = check_login($login_name);
    if($is_login_valid)
    {
        // user identified
        // $_SESSION['login']['is_logged'] =true;
        // $_SESSION['login']['name'] = $login;
        $v = json_encode([
            'is_logged' => true,
            'name'      => $login_name
        ]);
        setcookie( 'login', $v, time()+60*5, "/" );
    }
    else
    {
        // user not identified
        // unset($_SESSION['login']);
        setcookie( 'login', 0, 0, "/" );
        $message = "Identifiant non reconnu.  Veuillez réessayer.";
    }
}

$bg_color = $_COOKIE['bg_color'] ?? 'lightskyblue';
if(isset($_POST['set_bgcolor']))
{
    // l'utilisateur a cliqué sur le bouton
    $bg_color = $_POST['my_favorite_color'];
}
// $_COOKIE['bg_color'] = $bg_color;
// set cookie expirant dans 5 min
setcookie( 'bg_color', $bg_color, time()+60*5, "/" );

?>
<html>
<head>

    <?php
    echo style_sheet($bg_color);
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

if( $is_login_valid )
{
    // bienvenue
    echo <<< HTML
    <form method="post">
        <p>Bienvenue {$login_name}</p>
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