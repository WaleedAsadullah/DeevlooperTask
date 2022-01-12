<?php 

session_start();
include_once('includes/db_connection.php'); 
$conn = connect_db();
function insert_query($sql)
{$conn = connect_db();
	if (mysqli_query($conn, $sql)) {
  // echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}

function create_user($name,$email){
	$token = bin2hex(random_bytes(15));
	$name = mysqli_real_escape_string(connect_db(),$name);
	$e_mailquary = " select * from authentication where email = '".$email."'";
    $query = mysqli_query(connect_db(),$e_mailquary);
    $e_mailcount = mysqli_num_rows($query);
    if($e_mailcount==0){
	$sql = 'INSERT INTO `authentication`(`id`, `create_at`, `name`, `email`, `pass`, `token`) VALUES (NULL , CURRENT_TIMESTAMP, "'.$name.'", "'.$email.'", "'.$token.'", "'.$token.'")';
	insert_query($sql);
	}
}

function loginCheck(){
	if(isset($_SESSION['email'])){
		header('location:home.php');
	}
}

function checkLogout()
{
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
}

?>