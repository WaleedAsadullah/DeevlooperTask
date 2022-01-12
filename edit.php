<?php

include "includes/function.php";

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['sid'];

$sql = "SELECT * FROM students where id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);

?>