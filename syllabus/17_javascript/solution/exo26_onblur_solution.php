<html>
<head>
<script>

function validate_mail(input_name)
{
	var el = document.getElementById(input_name);
	var longueur = el.value.length;
	if( longueur == 0 )
	{
		alert('entrez votre mail');
		return;
	}
	// document.forms["sendmail"].submit();
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
	<input 
		type="text" 
		name="mail" 
		id="mail"
		onblur="validate_mail('mail');"	/>
	<button type="submit">
		Validate
	</button>
</form>

<div id="resultat"></div>

</body>
</html>