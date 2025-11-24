<?php
include_once('param.php');
include_once('mylib.php');
include_once('mylib.php');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
</head>
<body>

<h1><?php echo $title; ?></h1>

<h2><?=hello_world($name)?></h2>
<p>
    <?=$name?>
    <?php

    $presentation = "Je suis $name";
    concat_string($presentation);
    echo $presentation;
    ?>
</p>

<p>
  <?=$msg ?>
</p>

<p>
  <?=$avertissement?>
</p>

<p>
  <?=$mise_en_place_1?>
</p>

<p>
  <?=$mise_en_place_2?>
</p>

<p>
  <?=$bienvenue?>
</p>

<p>
  Poli ? <?=$politesse?>
</p>

<p>
  <?php
  for( $i=10; $i<20; $i++ )
    {
      echo "<div>$i</div>";
    }
  ?>
</p>

<p>
  <?php
  // Afficher les multiples de 7 ou de 9 compris entre 100 et 200.
  for( $i=101; $i<200; $i++ )
	{
        if( $i % 7 == 0 or $i % 9 == 0 )
        {
            echo "<div>$i est multiple de 7 ou de 9.</div>";
        }
    }



  ?>
</p>

</body>
</html>