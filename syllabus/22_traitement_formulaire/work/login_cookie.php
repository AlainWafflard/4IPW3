<?php

function html_logout()
{
    ?>
    <form method="post">
        <button name="logout" type="submit">logout</button>
    </form>
    <?php
}

function html_form_login()
{
    ?>
    <form method="post">
        <label>
            votre nom
            <input name="myname" type="text" />
        </label><br>
        <label>
            votre âge
            <input name="myage" type="number" />
        </label>
        <button name="login"  type="submit">log in</button>
    </form>
    <?php
}

function html_welcome($myname)
{
    ?>
    <h1>Bienvenue</h1>
    <p>Vous êtes chez vous, <?=$myname?></p>
    <?php
}


// param
$name_ok = "Safwan";
$age_ok = 23;

// Traitement du form
//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SESSION);

$myname = trim($_POST['myname'] ?? 'null');
//var_dump($myname);
//var_dump($name_ok);

if( isset($_POST['logout']))
{
    // logout a été cliqué
    // $_SESSION['login_ok']  = false;
    setcookie('login_ok', "0", time() + (60 * 5), "/");
    //    unset($_SESSION['login']);
    setcookie( 'login', "0", 0, "/" );
}

if( isset($_COOKIE['login_ok']) and $_COOKIE['login_ok']=="1" )
{
    // user déjà identifié
    $myname = $_COOKIE['login'];

    // on prolonge l'expiration
    setcookie( 'login', $myname, time() + 300, "/" );
    setcookie( 'login_ok', "1", time() + 300, "/" );

    $logout_f = true;
    //    html_logout();

    // on lance l'application
    $myapp_f = true;
    //    my_app();
}
elseif( $myname==$name_ok and $_POST['myage']==$age_ok )
{
    // user est en train de s'identifier
    // validation ok
    // $_SESSION['login'] = $myname;
    setcookie( 'login', $myname, time() + 300, "/" );
    // $_SESSION['login_ok'] = true;
    setcookie( 'login_ok', "1", time() + 300, "/" );

    $welcome_f = true;
    //    html_welcome($_POST['myname']);

    // on lance l'application
    $logout_f = true;
    $myapp_f = true;
//    html_logout();
//    my_app();
}
else
{
    // validation  ko
    $login_f = true;
//    html_form_login();
}

