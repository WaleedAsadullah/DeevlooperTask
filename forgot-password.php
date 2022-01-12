<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    </head>

    <body>

     <?php

     include_once("includes/function.php");
     $conn = connect_db();
     loginCheck();

     if(isset($_REQUEST['submit'])){
    $email = mysqli_real_escape_string($conn,$_REQUEST['email']);

    $e_mailquary = "SELECT * FROM authentication where email = '".$email."'";
    $query = mysqli_query(connect_db(),$e_mailquary);
    $e_mailcount = mysqli_num_rows($query);
    
    if($e_mailcount){

        $userdata = mysqli_fetch_assoc($query);
        $username = $userdata['name'];
        $token = $userdata['token'];

        $subject = "Password Reset";
        $message = "localhost/deevlooper/reset-password.php?token=".$token."";
        $sender = "From : waleedasad27@gmail.com";
        if (mail($email, $subject, $message,$sender)) {
            echo '<script>
                    alert("Check Your E-mail To Reset Password")
                    </script>';
            echo '
                <script>
                    location.replace(\'index.php\');
                </script>';
        }else{
            echo '<script>
                    alert("Failed");
                    </script>';
        }
}else{
            echo '<script>
                    alert("E-mail Does Not Exist")
                    </script>';
}
}
    ?>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">Reset Password</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.html"><img src="assets/img/logo2.png" alt="Preadmin"></a>
                        </div>
                        <form method="POST">
                            <div class="form-group form-focus">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email" name="email" required="" placeholder="Enter email">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit" name="submit">Send E-mail</button>
                            </div>
                            <div class="text-center">
                                <a href="index.php">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>

</html>