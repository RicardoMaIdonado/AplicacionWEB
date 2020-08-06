<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('7847256983-8tqmvfcoi63ebqhdbh1l99ombcvo4sqg.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('okOCeaVOg9RhLJpHgZx5lyRq');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/vaince/loginGoogle.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();
