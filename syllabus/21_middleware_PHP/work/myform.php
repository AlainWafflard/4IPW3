<?php
//require_once('param.php');
//require_once('mylib.php');

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo Form</title>
</head>
<body>

<?php
// param
$name_ok = "Safwan";
$age_ok = 23;

// Traitement du form
var_dump($_GET);
var_dump($_POST);

$myname = $_POST['myname'] ?? 'null';
var_dump($myname);
var_dump($name_ok);

if( $myname==$name_ok and $_POST['myage']==$age_ok )
{
    // validation ok
    ?>
    <h1>Bienvenue</h1>
    <p>Vous êtes chez vous, <?=$_POST['myname']?></p>
    <?php
}
else
{
    // validation  ko
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
    <button type="submit">envoyer</button>
    </form>
    <?php
}
?>

</body>
</html>