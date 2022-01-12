<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Register</title>
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
     loginCheck();
     $conn = connect_db();

     if(isset($_REQUEST['submit'])){
      $email_search = "SELECT * FROM authentication where email = '".$_REQUEST['email']."'";

  // $result = mysqli_num_rows($email_search);
      $query = mysqli_query($conn,$email_search);
      if(mysqli_num_rows($query)>0){
        echo"<script type=\"text/javascript\">
        alert('This E-mail is Already Register')
        </script>";

    }else{
    // print_r($_REQUEST);
        $token = bin2hex(random_bytes(15));
        $sql = 'INSERT INTO `authentication`(`id`, `create_at`, `name`, `email`, `pass`, `token`) VALUES  (NULL, CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['email'].'\', \''.$_REQUEST['pass'].'\', \''.$token.'\')';
    // echo $sql;
            insert_query($sql);

    echo"<script type=\"text/javascript\">
    alert('account created successfully')
      window.location = 'index.php'
      </script>";
        }
    }
    ?>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">Register</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.html"><img src="assets/img/logo2.png" alt="Preadmin"></a>
                        </div>
                        <form action="register.php">
                            <div class="form-group form-focus">
                                <label class="control-label">Username</label>
                                <input class="form-control floating" type="text" name="name">
                            </div>
                            <div class="form-group form-focus">
                                <label class="control-label">Email</label>
                                <input class="form-control floating" type="text" name="email">
                            </div>
                            <div class="form-group form-focus">
                                <label class="control-label">Password</label>
                                <input class="form-control floating" type="password" name="pass">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit" name="submit">Register</button>
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