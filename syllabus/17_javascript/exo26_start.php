<html>
<head>
<script>

function validate_mail(input_name)
{
	// à compléter 
}

</script>  
</head>
<body>

<div><pre>
	<?php
	if( ! empty($_POST))
	{
		echo "valeurs reçues par POST:";
		var_dump($_POST);
	}
	?>
</pre></div>
<form name="sendmail" method="post">
	Ins&eacute;rez votre email:
	<!-- code HTML à compléter -->
	<input 
		type="text" 
		name="mail" 
		id="mail" />
	<button type="submit">
		Validate
	</button>
</form>

<div id="resultat"></div>

</body>
</html>