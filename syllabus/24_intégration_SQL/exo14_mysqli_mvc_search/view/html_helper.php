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

function html_display_deals($search_word="")
{
	// on interroge la table avec les mots-clés
	$deal_a = db_fetch_deals($search_word);
	
	// le résultat de la requête s'affiche de la même façon 
	// quelqu'il soit (vide, partiel ou complet)
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
	$nb = count($deal_a);
	
	?>
	<div class="main">
	<h2>Parties en cours</h2>
	<p><em>SELECT ... FROM t_deal [ WHERE ... ] </em></p>
	<?=$html_code?>
	<p><em>Il y a <?=$nb?> résultat(s).</em></p>
	</div>
	<?php
}

function html_display_search_form()
{
	global $message;
	?>
	<div class="main">
		<h2>Outil de recherche</h2>
		<p><em>SELECT * FROM t_deal<br/>WHERE name_dea LIKE "%...%"</em></p>
		<label>Entrez vos mots-clés:</label><br />
		<input type="text" name="search_keyword"></input>
		<br />
		<button class="submit" type="submit" name="search_b">
			Chercher
		</button>
		<button class="submit" type="submit" name="search_all">
			Afficher l'ensemble des parties
		</button>
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

?>