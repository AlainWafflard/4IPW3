<?php
include("view/html_helper.php");

html_page_head();
db_init();

// exemple de consultation de la base de données 
// sur base de mots-clés de recherche 
if(isset($_POST['search_b']) and ! empty($_POST['search_keyword']))
{
	// l'utilisateur a cliqué sur "chercher"
	// et il a spécifié des mots-clés 
	$search_word = $_POST['search_keyword'];
	$message[] = "Affichage d'une partie de table";   
}
else
{
	// affichage normal : toute la table 
	$search_word = "";
	$message[] = "Affichage de toute la table";   
}

// afficher titre page
html_h1();

// Example with SELECT 
// Afficher les parties recherchées 
html_display_deals($search_word);

// afficher form pour une recherche 
html_display_search_form();

db_close();
html_page_foot();
// EOF
?>					
