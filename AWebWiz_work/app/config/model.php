<?php

const MACHINE = "classe38"; // "classe38" ou  "home" ou ... ce qu'on veut

const DATABASE_TYPE =  "MySql"; // "MySql";  // "csv" // "json"
const DATABASE_NAME = "press_2025_v04";

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

const DATABASE_DSN =  "mysql:host=localhost;dbname=".DATABASE_NAME.";port=".DATABASE_PORT.";charset=utf8mb4;";

// var_dump(DSN);
