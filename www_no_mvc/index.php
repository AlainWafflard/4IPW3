<?php
session_start();
require_once("math.php");
require_once("view.php");

?>
<html>
<head>

    <?php
    if(isset($_SESSION['bg_color']))
    {
        $bg_color = $_SESSION['bg_color'];
    }
    else
    {
        $bg_color = 'lightskyblue';
    }
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
echo form_background();

?>

<h1>mon premier script</h1>

</body>
</html>