<html>
<head>
	<title>Exercice $_GET, foreach</title>
</head>
<body>
<div>
	<?php
	if( ! empty($_GET))
	{
		foreach( $_GET as $key => $val )
		{
			echo $key.":".$val."<br/>";
		}
		?>
		PS : Observez l'URL qui a été modifié !
		<HR>
		<?php
	}
	else
		?>
		Aucune donnée de formulaire reçue via $_GET.
		<?php
	?>
</div>
<form method="get"><div>
	Mon produit : <input type="text" name="produit"><br>
	Mon prix : <input type="number" name="prix">
	<button type="submit">envoyer</button>
</div></form>
</body>
</html>