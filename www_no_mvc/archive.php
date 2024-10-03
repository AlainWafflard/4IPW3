<?php

// $w = vide();
// $w = null;
$w = 0;

/*if(isset($v))
{
    echo "v est définie";
}
else
{
    echo "v non définie";
}*/

$v = $w ?? -1 ;
echo $v;

echo "<br>";

$tab = [ "Julie", "Sophie", "Maxime" ];
foreach($tab as $nom)
{
    echo $nom . "<br>";
}

$member_a = array(
    "name" => "Peter Parker",
    "email" => "peterparker@mail.com",
    "salary" => 2000,
);
$member2_a = array(
    "name" => "Peter Jackson",
    "email" => "peterjackson@mail.com",
    "salary" => 4000,
);
$all_members_a = [
    $member_a,
    $member2_a
];


$member_a['city'] = "Etterbeek";
var_dump($member_a);

$out = "<ul>";
foreach( $all_members_a as $m )
{
    $out .= "<li>member :<ol>";
    foreach( $m as $col => $value )
    {
        $out .=  <<< HTML
        <li>$col : $value</li>        
HTML;
    }
    $out .= "</ol></li>";
}
$out .= "</ul>";

echo $out;


/*
 $x = "hello world" ;
echo $x;
*/

/*for( $i=0 ; $i<5 ; $i++ )
{
    echo "<p>$i</p>\n";
}*/

$x = 4 ;
$y = "4" ;

$z1 = $x == $y;
echo $z1 ? "V1" : "F1";

$z2 = $x === $y ;
echo $z2 ? "V2" : "F2";

$out = <<< HTML

    <p>c'était mon 2ème script</p>

HTML;
echo $out;



//echo fact(7);

for ( $n=2 ; $n<=10 ; $n ++)
{
    $fact = fact($n);

    echo <<< HTML
    <p>$n ! = $fact</p> 
HTML;
}


?>