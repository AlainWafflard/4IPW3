<?php



/*function hello_world()
{
	return "Hello World !";
}*/

function hello_world( $name='')
{
	if( ! empty($name))
	{
		$out = "Hello World, dear $name !";
	}
	else
	{
		$out = "Hello World !";
	}

	$name = "Truc";

	return $out;
}

function concat_string( & $s)
{
	$s .= " et plein d'autres choses";
}