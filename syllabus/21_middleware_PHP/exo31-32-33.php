<HTML>
<BODY>
<PRE>
<?php
$tab = array( 6, 5, 2, 6.5 );
$tab2 = array( 7, 4.5, 2.2, 6.5 );
print_r($tab);
print_r($tab2);

// EXERCICE 31

$somme = 0;
foreach( $tab as $v )
{
	$somme += $v ;
}
$moyenne = round($somme / count($tab), 1);
?>
Moyenne = <?=$moyenne?>
<?php

// EXERCICE 32

foreach( $tab as $i => $v )
{
	$tab_add[] = $v + $tab2[$i];
	$tab_mul[] = $v * $tab2[$i];
}

var_dump($tab2);
print_r($tab_add);
print_r($tab_mul);

// EXERCICE 33

$max = $min = $tab_mul[0];
foreach( $tab_mul as $v )
{
	if( $v > $max ) $max = $v ;
	if( $v < $min ) $min = $v ;
}
echo <<< HTML
	<div>max = $max</div>
	<div>min = $min</div>
HTML;

?>
</PRE>
</BODY>
</HTML>