<?php
include("view/config.php");
include("model/db_helper.php");

global $message;

function html_page_head()
{
	$title = get_config('title');
	$css_a = get_config('css');
	?>
	<html>
	<head>
		<?php
		if( ! empty($title))
		{
			?>
			<title><?=$title?></title>
			<?php
		}
		
		foreach( $css_a as $css_file )
		{
			?>
			<link rel="stylesheet" href="<?=$css_file?>" />
			<?php
		}
		?>
	</head>
	<body>
	<form method="post">
	<?php
}

function html_page_foot()
{
	?>
	</form>
	</body>
	</html>
	<?php
}

function html_h1()
{
	?>
	<h1>
		<?=get_config("h1");?>
	</h1>
	<?php
}

function html_display_deals()
{
	$deal_a = db_fetch_deals();
	
	$html_code = "";
	foreach( $deal_a as $row )
	{
		// print_r($row);
		// concatenating HTML code into a single string
		$html_code .= <<< HTML
		<div>
			{$row['partie']}
		</div>
HTML;
		// echo "<PRE>" . print_r($row,true) . "</PRE>";	
	}
	
	?>
	<div class="main">
	<h2>Parties en cours</h2>
	<p><em>SELECT * FROM t_deal</em></p>
	<?=$html_code?>
	</div>
	<?php
}

function html_display_new_deal_form()
{
	global $message;
	?>
	<div class="main">
		<h2>Insérer une nouvelle partie</h2>
		<p><em>INSERT INTO t_deal (name_dea) <br/>VALUES (...)</em></p>
		<label>Deal Name:</label><br />
		<textarea rows="5" cols="25" name="deal_name"></textarea>
		<br />
		<input class="submit" type="submit" name="submit" value="Insert New Deal" />	
		<?=html_message();?>
	</div>
	<?php
}

function html_message()
{
	global $message;

	if( ! empty($message) )
	{
		foreach( $message as $m )
		{
			echo <<< HTML
				<p class="alert">$m</p>
HTML;
		}
	}
	else
	{
		echo '<p class="alert">no message</p>';
	}
}

///////////////////////////
// Previous functions 

// message à afficher lorsque l'utilisateur veut se délogguer
function logout_print()
{
	echo 'Vous êtes déloggué. ';
}

// message à afficher lorsque l'utilisateur a raté son identification
function unknown_user_print()
{
	echo "Vous n'êtes pas identifié.";
}

// message à afficher lorsque l'utilisateur est déjà identifié
function login_print($id)
{
	echo 'Bonjour ' . $id . '.';
}
	
// message à afficher lorsque l'utilisateur est administrateur
function admin_print()
{
	echo 'Vous êtes administrateur.';
}

// message à afficher lorsque l'utilisateur est administrateur
function user_print()
{
	echo 'Vous êtes un utilisateur simple.';
}

// message à afficher lorsque l'utilisateur est administrateur
function problem_print()
{
	echo 'Problème ....';
}

// bouton logout à afficher 
function logout_button_print()
{
	?>
	<button type="submit" name="logout">log out</button>
	<!-- 
	Remarque : On peut aussi utiliser un hyper-lien pour se délogguer, par ex.
	<a href="?action=logout">log out</a>
	-->
	<?php
}

function unidentified_user_print()
{
	?>
	Identifiez-vous : 
	<input type="text" name="identifier">
	<button type="submit">log in</button>
	<?php
}

?>