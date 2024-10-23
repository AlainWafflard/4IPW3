<!DOCTYPE html>
<html>
<title>Calculez n!</title>
<body>
<?php

$n = 10 ;
$f = 1 ;

for( $i=1 ; $i<=$n ; $i++ )
{
	$f *= $i ;
}
	
?>
<p><?=$n?> ! = <?=$f?></p>

</body>
</html>