<?php

//logout.php
session_start() ;
include('includes/googleconfig.php');

//Reset OAuth access token
if(isset($_SESSION['access_token'])){
$google_client->revokeToken($_SESSION['access_token']);
}

//Destroy entire session data.

session_destroy() ;

//redirect page to index.php
header('location:index.php');

?>