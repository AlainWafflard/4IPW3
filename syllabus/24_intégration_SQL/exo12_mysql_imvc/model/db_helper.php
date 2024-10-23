<?php
global $conn;

function db_init()
{
	global $conn, $message;

	try 
	{		
		//Establishing Connection with Server
		$conn = mysqli_connect( "localhost", "root", "", "4ipdw_sample" );
	}
	catch (Exception $e) 
	{
		$message[] = 'Caught exception: ' . $e->getMessage();
		//Closing Connection with Server
		// mysqli_close($conn);
	}	
}

function db_close()
{
	global $conn, $message;

	//Closing Connection with Server
	mysqli_close($conn);
}

/**
 * insert new deal
 * @param string $deal the name of this new deal
 */
function db_insert_new_deal($deal)
{
	global $conn, $message;

	try 
	{
		// Insert Query of SQL
		$q = <<< SQL
			INSERT INTO t_deal (name_dea)
			VALUES ('$deal');
SQL;
		
		// execute the INSERT query 
		$result = mysqli_query($conn, $q );
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
	catch (Exception $e) 
	{
		$message[] = 'Caught exception: ' . $e->getMessage();
		//Closing Connection with Server
		mysqli_close($conn);
	}

}

/**
 * pour récupérer l'ensemble des perties 
 * @return array associative array with all deals
 */
function db_fetch_deals()
{
	global $conn, $message;

	try 
	{
		// SELECT * FROM t_deal 
		$q = <<< SQL
			SELECT name_dea AS partie 
			FROM t_deal 
			WHERE is_active_dea IS TRUE ;
SQL;
		$result = mysqli_query($conn, $q );
		$deal_a = mysqli_fetch_all($result, MYSQLI_ASSOC);
		// echo "<PRE>" . print_r($data,true) . "</PRE>";
		
		// freeing memory for other use 
		mysqli_free_result($result);
		
		return $deal_a;
	}
	catch (Exception $e) 
	{
		$message[] = 'Caught exception: ' . $e->getMessage();
		//Closing Connection with Server
		mysqli_close($conn);
	}	
	
}


/**
 * valider() vérifie que le nom entré par l'utilisateur existe bien dans 
 * le fichier login.csv
 * @param string $input nom entré par l'utilisateur 
 * @return boolean true si existe, false si n'existe pas + details sur l'utilisateur
 */
function db_valider($input)
{
	try
	{
		// lecture fichier
		$fh = fopen( './model/login2.csv', 'r' );
		while( ! feof($fh) )
		{
			$ligne = fgets($fh);
			$user_info = explode( ';', trim($ligne) );
			
			if( $user_info[0] == $input )
			{
				// l'utilisateur a été identifié
				// $_SESSION['id'] = $user_info[0];
				// $_SESSION['role'] = $user_info[2];
				fclose($fh);
				return array( true, $user_info[0], $user_info[2] );
			}
		}
		// l'utilisateur n'a pas été identifié
		fclose($fh);
		return array( false, null, null );
	}
	catch( Exception $e) 
	{
		echo "Problem while reading file login2.csv : " . $e->getMessage();
	}
}

?>