<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Reset Password</title>
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
    $token = $_REQUEST['token'];
    include_once("includes/function.php");
    loginCheck();
    $conn = connect_db();
    if(isset($_REQUEST['submit'])){
        $pass = mysqli_real_escape_string(connect_db(), $_REQUEST['pass']);

        $sql = "UPDATE `authentication` SET `pass`='".$pass."' where `token` = '".$token."'";
        if (mysqli_query(connect_db(),$sql)) {
            echo '<script>
            alert("Password Update Successfully")
            </script>';
            echo '
            <script>
            location.replace(\'index.php\');
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
                        <form >
                            <div class="form-group form-focus">
                                <label class="control-label">Enter New Password</label>
                                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                                <input class="form-control" type="password" name="pass" required="" placeholder="Enter New Password">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit" name="submit">Reset Password</button>
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