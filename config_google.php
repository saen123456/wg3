<?php

//config.php

//Include Google Client Library for PHP autoload file
//use Google_Client;
require_once 'vendor/autoload.php';
//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('167253378744-q152i41crtqucvldcfoldl7ho2s7gfs1.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('J3jyV8RB3qdLXQLjaI23w-Mu');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://workgress.online/UserGoogleController/Google_Login');
//$google_client->setRedirectUri('http://localhost:8080/projectwg/UserGoogleController/Google_Login');
//$google_client->setRedirectUri('http://localhost:8080/projectwg/homepage_google');


$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page

/*if(!isset($_SESSION)) 
{ 
    session_start(); 
}  */
