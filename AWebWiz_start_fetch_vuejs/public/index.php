<?php
require_once "../app/config/app.php";
require_once "../app/config/model.php";

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

///////////////////////////////////////////////////////////////////////////////

// ROUTER
session_start();

include_mvc_php_files();

// select header type, ie. type of returned data, default is HTML text  "Content-Type: text/html; charset=UTF-8";
$header = @$_REQUEST['return'] ?: 'text/html; charset=UTF-8';

// select page to load, ie. function to call
// making router more universal => using superglobal REQUEST instead of POST or GET
$page = @$_REQUEST['page'] ?: 'home';
$main = "main_{$page}";

// OUTPUT
header("Content-Type: $header");
echo $main();

