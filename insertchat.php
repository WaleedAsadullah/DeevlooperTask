<?php

include "includes/function.php";

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$textarea = $mydata["textarea"];
$email = $mydata["email"];

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

if(!empty($textarea) && !empty($email)){
    $sql = "INSERT INTO `messages` (`id`, `email`, `messages`) VALUES (NULL, '$email','$textarea')";
    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "Data save successfully";
    }else{
        // echo "Data is not save";
    }
}else{
    // echo "Fill All Fields";
}
// echo $sql;
?>