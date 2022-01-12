<?php

include "includes/function.php";

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM students where id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}

?>