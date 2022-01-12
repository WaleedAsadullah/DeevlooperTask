<?php

include "includes/function.php";
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $data = array();

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
}else{
    echo "<h2>No Record Found</h2>";
}
?>