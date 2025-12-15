<?php
session_start();
require_once('app.php');
require_once('template.php');

// init flags
$welcome_f = false;
$login_f = false;
$logout_f = false;
$myapp_f = false;

// display page head
//html_head();

require_once('login_cookie.php');

//////////////////////////////////
// display all HTML code from here

// display page head
html_head();

if($welcome_f) html_welcome($_POST['myname']);

// validation  ko
if($login_f) html_form_login();

// on lance l'application
if($logout_f) html_logout();
if($myapp_f) my_app();

// display page foot
html_foot();
