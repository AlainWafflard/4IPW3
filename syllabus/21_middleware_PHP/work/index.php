<?php
require_once('param.php');
require_once('mylib.php');
require_once('mylib.php');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
</head>
<body>

<h1>
    <?php
    echo $title;
    ?>
</h1>

<h2><?=hello_world($name)?></h2>

<ul>
<?php
$my_array = [ 'Philippe', 'Adrien', 'Josette' ];

foreach ( $my_array as $nom )
{
    echo "<li>$nom";
}

?>
</ul>
<?php
foreach( array(5,6,2,4,5,9,6,'F') as $val )
{
    echo <<< HTML
        <div style="background-color:#{$val}AA;">
          $val
        </div>;
HTML;
}

$salaries = [
        "mohammad" => 2000,
         "qadir" => 1000,
         "zara" => 500
];
$salaries['hammad'] = 4000;
unset($salaries['qadir']);

echo "<ul>";

foreach ( $salaries as $nom => $sal  )
{
    echo "<li>$nom gagne $sal";
}
echo "</ul>";
?>
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

// factorielle
  echo "<div>" . factorielle(5.5). "</div>";
  echo "<div>" . factorielle(10) . "</div>";

  ?>
</p>

</body>
</html>