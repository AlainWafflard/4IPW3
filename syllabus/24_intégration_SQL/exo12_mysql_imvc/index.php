<?php
include("view/html_helper.php");

html_page_head();

db_init();

// Example with INSERT 
// insert new deal, the name of this new deal coming from the form
if(isset($_POST['submit']))
{
	//Fetching variables of the form which travels in URL
	$deal = $_POST['deal_name'];
	if( ! empty($deal))
	{
		db_insert_new_deal($deal);
	}
	else
	{
		$message[] = "Insertion Failed <br/> Some Fields are left empty !";   
	}
}

// afficher titre page
html_h1();

// Example with SELECT 
// Afficher l'ensemble des parties 
html_display_deals();

// afficher form pour nouvelle partie 
html_display_new_deal_form();

db_close();
html_page_foot();
// EOF
?>					
