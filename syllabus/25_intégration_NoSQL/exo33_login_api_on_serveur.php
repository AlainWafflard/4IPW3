<?php

header("Content-Type:application/json"); //ceci signifie que le format du corps de la requête est JSON

$auth_user_a = [
	[
		'login' => 'admin',
		'name' => 'Mercator',
		'password' => 'admin',
		'role' => 'admin',
	],
	[
		'login' => 'user',
		'name' => 'Christophe Colomb',
		'password' => 'user',
		'role' => 'user',
	],
	[
		'login' => 'anonymous',
		'name' => 'Amerigo Vespucci',
		'password' => '',
		'role' => 'anonymous',
	],
];

if (isset($_GET['all'])) {
	// retourner toute la DB
	// Naturellement, à ne pas prévoir en mode "déploiement"
	$data_json = json_encode($auth_user_a, JSON_PRETTY_PRINT);
	echo $data_json;
	exit;
}


$login = $_GET['login'] ?? $_POST['login'] ?? '';
$pw = $_GET['passwd'] ?? $_POST['passwd'] ?? '';


// traitement
$user_found_b = false;
foreach ($auth_user_a as $user) {
	if ($login == $user['login'] and $pw == $user['password']) {
		$user_found_b = true;
		break;
	}
}

// output
$out_a['identified'] = $user_found_b;

if ($user_found_b) {
	$out_a['name'] = $user['name'];
	$out_a['role'] = $user['role'];
}

$data_json = json_encode($out_a, JSON_PRETTY_PRINT);
echo $data_json;

