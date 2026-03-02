<?php

const MACHINE = "home"; // "classe38" ou  "home" ou ... ce qu'on veut

const DATABASE_TYPE = "MySql";  // "csv"
const DATABASE_NAME = "4ipdw_2023";

switch(MACHINE) {
	// ISFCE, classe 38
	case "classe38":
		define( "DATABASE_PORT", 3307 ); 	// MAriaDB
		define( "DATABASE_USERNAME", "root" );
		define( "DATABASE_PASSWORD", "" );
		break;
	case "home":
		define( "DATABASE_PORT", 3306 );  	// MysSQL
		define( "DATABASE_USERNAME", "root" );
		define( "DATABASE_PASSWORD", "root" );
		break;
}

const DSN =  "mysql:host=localhost;dbname=4ipdw_2023;port=".DATABASE_PORT.";";

// var_dump(DSN);
