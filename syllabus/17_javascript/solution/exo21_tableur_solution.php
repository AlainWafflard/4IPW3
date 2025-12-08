<html>
<head>
	<title>exo15-21 : tableur</title>
	<style type="text/css">

	label
	{
		display: inline-block;
		width:100px;
		border: 1px solid black;
	}
	
	input
	{
		display: inline-block;
		width:100px;
		border: 1px solid black;
	}

	</style>
    <script>
	
	function compute()
	{
		var v1 = document.getElementById('c1').value;
		var v2 = document.getElementById('c2').value;
		var v3 = document.getElementById('c3').value;
		var total = +v1 + +v2 + +v3 ; 
		document.getElementById('total').value = total ;
	}
    
	</script>  
</head>
<body>  
	<label  for="c1">
		valeur 1
	</label>
	<input 	id="c1" 
			type="text" 
			onchange="compute();" />
	<br>
	<label  for="c2">
		valeur 2
	</label>
	<input 	id="c2" 
			type="text"
			onchange="compute();" />
	<br>
	<label  for="c3">
		valeur 3
	</label>
	<input 	id="c3" 
			type="text"
			onchange="compute();" />
	<br>
	<label  for="total">
		total
	</label>
	<input  id="total"
		    type="text"
			disabled="true"
			value="0" />
</body>
</html>