<?php
declare(strict_types=1);

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

function factorielle( int $n)
{
    // n! = n * (n-1)!
    // ex. 4! = 4 * 3!
    if( $n <= 1 ) return 1;
    return $n * factorielle($n-1);
}

