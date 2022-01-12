<?php

include "includes/function.php";

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata["id"];
$name = $mydata["name"];
$email = $mydata["email"];
$password = $mydata["password"];

// insert data

// if(!empty($name) && !empty($email) && !empty($password)){
//     $sql = "INSERT INTO students(name,email,password) VALUES('$name','$email','$password')";
//     $result = mysqli_query($conn,$sql);
//     if($result){
//         echo "Data save successfully";
//     }else{
//         echo "Data is not save";
//     }
// }else{
//     echo "Fill All Fields";
// }

// insert or update data

if(!empty($name) && !empty($email) && !empty($password)){
    $sql = "INSERT INTO students(id,name,email,password) VALUES('$id','$name','$email','$password') ON DUPLICATE KEY UPDATE name = '$name', email = '$email', password = '$password' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Data save successfully";
    }else{
        echo "Data is not save";
    }
}else{
    echo "Fill All Fields";
}
?>