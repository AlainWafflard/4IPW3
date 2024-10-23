<?php

/*
Input
Tableau indexé de 3 tableaux associatifs
Par tableau associatif
Taux de TVA
Prix unitaire
Quantité 

Processing
Sous-totaux HT
Montant TVA
Sous-totaux TTC
Totaux HT et TTC

Output 
facture avec trois sous-totaux et les totaux HT et TTC (cf screenshot).
*/


function print_table_header($line_a)
{
	echo "<TABLE><TR>";
	foreach( $line_a as $v )
	{
		echo "<TH>$v</TH>";
	}
	echo "</TR>";
}

function print_table_line( $line_a )
{
	echo "<TR>";
	foreach( $line_a as $v )
	{
		echo "<TD>$v</TD>";
	}
	echo "</TR>";
}

function print_table_footer()
{
	echo "</TABLE>";
}


?>
<HTML>
<HEAD>
<STYLE>
td 
{
	text-align:right;
	width:100px;
	height: 20px;
}
</STYLE>
</HEAD>
<BODY>
<?php

$facture_a = array(
	array(
		'tva'	=> 21,
		'pu'	=> 50,
		'qnt'	=> 20,
	),
	array(
		'tva'	=> 21,
		'pu'	=> 35,
		'qnt'	=>  3,
	),
	array(
		'tva'	=> 21,
		'pu'	=>  5,
		'qnt'	=>  1,
	),
);

print_table_header(array( 'PU', 'QNT', 'Prix HT', 'TVA', 'Prix TTC' ));

$total_ht = $total_ttc = 0 ;
foreach( $facture_a as $f )
{
	$pu = sprintf( "%6.2f", $f['pu']);
	$pht = sprintf( "%6.2f", $f['pu'] * $f['qnt']);
	$tva = sprintf( "%6.2f", $pht * $f['tva']/100);
	$pttc =  sprintf( "%6.2f", $pht + $tva );
	
	$total_ht += $pht;
	$total_ttc += $pttc;

	print_table_line( array( $pu, $f['qnt'], $pht, $tva, $pttc ) );
}

print_table_line(array('', '', '', '', '', ));

$total_ht = sprintf( "%6.2f", $total_ht );
print_table_line( array( '', '', '', 'TOTAL HT', $total_ht ) );

$total_ttc = sprintf( "%6.2f", $total_ttc );
print_table_line( array( '', '', '', 'TOTAL TTC', $total_ttc ) );

print_table_footer();

?>

</BODY>
</HTML>