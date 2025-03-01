<html>
<head>
	<title>Exercice MySQL / SQL (INSERT/SELECT)</title>
	<style>
	@import url(http://fonts.googleapis.com/css?family=Droid+Serif); /* to import google font style */ 
	body
	{
		width:400px;
		border:1px dashed #aaa;
		padding:10px;
		margin:2% 5%;
		background-color:aliceblue;
	}
	.main
	{
		margin:5%;
		background: #fff;
		padding:5%;
		font-family: 'Droid Serif', serif;
		font-size:14px;
	}
	.main h2
	{
		text-align:center;
		text-shadow:2px 2px 2px #cfcfcf; 
	}
	h1
	{
		height:70px;
		text-align:center;
		text-shadow:2px 2px 2px #cfcfcf; 
	}
	textarea
	{ 
		width:100%; 
		height:60px; 
		border-radius:1px;
		box-shadow:0px 0px 1px 2px #123456; 
		margin-top:10px;
		padding:7px;
		border:none;
	}	
	.input
	{ 
		width:100%; 
		height:30px; 
		border-radius:2px;
		box-shadow:0px 0px 1px 2px #123456; 
		margin-top:10px;
		padding:7px;
		border:none;
		margin-bottom:20px;
	}
	.submit
	{
		color: white;
		border-radius:3px;
		background: #1F8DD6;
		padding:5px;
		margin-top:40px;
		border:none;
		width:100%; 
		height:30px;
		box-shadow:0px 0px 1px 2px #123456;
		font-size:18px;	   
	}

	p.alert 
	{
		color:red;
		text-align:left;
	}
	</style>
</head>
<body>

<?php
try 
{
	// Establishing Connection with Database 
	// ... default database, set on port 3306 
	// $conn = mysqli_connect( "localhost", "root", "", "sample" );
	// ... MySQL database, explicitely set on port 3306 
	// $conn = mysqli_connect( "localhost", "root", "", "sample", 3306 );
	// ... MariaDB database, explicitely set on port 3307
	$conn = mysqli_connect( "localhost", "root", "", "sample", 3307 );

	// Example with INSERT 
	// insert new deal, the name of this new deal coming from the form
	if(isset($_POST['submit']))
	{
		//Fetching variables of the form which travels in URL
		$deal = $_POST['deal_name'];
		if( ! empty($deal))
		{
			//Insert Query of SQL
			$q = <<< SQL
				INSERT INTO t_deal (name_dea)
				VALUES ('$deal');
SQL;
			
			// execute the INSERT query 
			$b = mysqli_query($conn, $q );
			if( ! $b ) throw new Exception("query  failed");

			// count number of affected rows
			// must be 1 (one)
			$n = mysqli_affected_rows($conn);
			$message[] = "$n ligne(s) affectée(s)";
			$message[] = "query : $q";

			// confirm insertion 
			$b = mysqli_commit($conn);
			if( ! $b ) throw new Exception("commit failed");

			$message[] = "New deal '$deal' inserted successfully...!!";
		}
		else
		{
			$message[] = "Insertion Failed <br/> Some Fields are left empty !";   
		}
	}
	
	// Example with SELECT 
	// Afficher l'ensemble des parties 
	// SELECT * FROM t_deal 
	$q = <<< SQL
		SELECT name_dea AS partie 
		FROM t_deal 
		WHERE is_active_dea IS TRUE ;
SQL;
	$result = mysqli_query($conn, $q );
	$select_html_code = "";

	while ($row = mysqli_fetch_array($result))
	{
		// print_r($row);
		// concatenating HTML code into a single string
		$select_html_code .= <<< HTML
		<div>
			{$row['partie']}
		</div>
HTML;
		// echo "<PRE>" . print_r($row,true) . "</PRE>";	
	}
	
	// $result = mysqli_query($conn, $q );
	// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// echo "<PRE>" . print_r($data,true) . "</PRE>";
	
	// freeing memory for other use 
	mysqli_free_result($result);
	
	//Closing Connection with Server
	mysqli_close($conn);

}
catch (Exception $e) 
{
    $message[] = 'Caught exception: ' . $e->getMessage();
	//Closing Connection with Server
	mysqli_close($conn);
}

?>					
<h1>Insert and Select Data In Database Using PHP.</h1>

<form method="post"><div class="main">
    <!-- method can be set POST for hiding values in URL-->
	<h2>Insérer une nouvelle partie</h2>
	<p><em>INSERT INTO t_deal (name_dea) <br/>VALUES (...)</em></p>
	<label>Deal Name:</label><br />
	<textarea rows="5" cols="25" name="deal_name"></textarea>
	<br />
	<input class="submit" type="submit" name="submit" value="Insert New Deal" />	
	<?php
	if( ! empty($message) )
	{
		foreach( $message as $m )
		{
			echo <<< HTML
				<p class="alert">$m</p>
HTML;
		}
	}
	?>
</div></form>

<div class="main">
	<h2>Parties en cours</h2>
	<p><em>SELECT * FROM t_deal</em></p>
	<?=$select_html_code?>
</div>

</body>
</html>