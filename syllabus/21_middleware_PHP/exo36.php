<html>
<head>
	<title>INVOICE : Displaying a php array on a html page</title>
	<style>
	div.catalogue table
	{
		border-collapse:collapse;
	}
	div.catalogue table td
	{
		border:1px solid black;
	}
	</style>
</head>
<body>
<pre>
<?php
// Exercice 09-13 : détails de facturation sous forme de tableau
// utilisation de la fonction php "printf"

$nb_lines = readline();
$t_tva = readline();

$cpt= 0 ; 
printf("%10s%10s%10s%10s%10s\n", 
    "P.U.", "Quant.", "M HT", "M TVA", "M TTC");

$tot_ht = 0 ;
$tot_ttc = 0 ;

while( $cpt < $nb_lines )
{
    $pu      = readline();
    $qnt     = readline();
    $m_ht    = $pu*$qnt;
    $m_tva   = $m_ht*$t_tva/100;
    $m_ttc   = $m_ht + $m_tva ;
    $tot_ht  += $m_ht ;
    $tot_ttc += $m_ttc;

    printf("%10.2f%10d%10.2f%10.2f%10.2f\n", 
        $pu, $qnt, $m_ht, $m_tva, $m_ttc);
    
    $cpt++;
}

printf("\nTotal HT  = %10.2f", $tot_ht);
printf("\nTotal TTC = %10.2f", $tot_ttc);
?></pre>
</body>
</html>