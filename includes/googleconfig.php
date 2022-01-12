<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('750143738353-csq1mi3c4te75d0540rf3hq6ak93ima8.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/deevlooper/index.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
// session_start();

?>