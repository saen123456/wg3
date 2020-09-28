<?php

//config.php

//Include Google Client Library for PHP autoload file
//use Google_Client;
require_once 'vendor/autoload.php';
//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('304462956554-8kjkdn5htlipfb7mc636p4qcq2t1hjlb.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('iG-CLso11IWgo2mrxfQNlwQg');

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
