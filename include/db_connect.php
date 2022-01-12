<?php 
 
 
// Connect with the database 
$db = new mysqli("localhost", "root", "", "deevlooper"); 
 
// Display error if failed to connect 
if ($db->connect_errno) { 
    echo "Connection to database is failed: ".$db->connect_error;
    exit();
}