<?php
define( "ROOT_DIR", "../app/" );

/**
 * include all MVC PHP files
 */
function include_mvc_php_files()
{
	// include all PHP files
	foreach ( array( 'model', 'view', 'controller') as $dir )
	{
		$file_a = scandir(ROOT_DIR.$dir);

		foreach ( $file_a as $file)
		{
			if( substr( $file, -4, 4 ) != ".php" ) continue;
			// echo($file."\n");
			require_once( ROOT_DIR.$dir.DIRECTORY_SEPARATOR.$file );
		}
	}

}
/*	require_once "common/view.php";
	require_once "$component/view.php";
	require_once "$component/model.php";
	require_once "$component/controller.php";*/
//	main();


// ROUTER
session_start();

//echo DIRECTORY_SEPARATOR;
include_mvc_php_files();

// select page to load, ie. function to launch
$page = @$_GET['page'] ?: 'home';
$main = "main_{$page}";
$main();

//launch($page);

