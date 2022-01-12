<?php

//index.php

//Include Configuration File
include('includes/googleconfig.php');
include('includes/function.php');

if(isset($_REQUEST['submit'])){


    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];
    $email_search = "SELECT * FROM authentication where email = '".$email."' ";
        // echo $email_search ;
    $query = mysqli_query($conn,$email_search);

    $emai_count = mysqli_num_rows($query);

    if($emai_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass =  $email_pass['pass']; 

        if($db_pass==$password){

            $_SESSION['user_first_name'] = $email_pass['name'];
            $_SESSION['email'] = $email_pass['email'];
            
            echo'
            <script type="text/javascript">
            window.location.href ="home.php";
            </script>';
        }else{
                // $errorMessage = "Password is incorrect";
            echo '<script>
            alert("Password is incorrect")
            </script>';
        }
        
    }else{
        $errorMessage = "E-mail is incorrect";
        echo '<script>
        alert("E-mail is incorrect")
        </script>';
    }
}


$login_button = '';
// echo "pppp";
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
    echo "get working";
 //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if(!isset($token['error']))
    {
  //Set the access token used for requests
      $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
      $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
      $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
      $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
      if(!empty($data['given_name']))
      {
       $_SESSION['user_first_name'] = $data['given_name'];
   }

   if(!empty($data['family_name']))
   {
       $_SESSION['user_last_name'] = $data['family_name'];
   }

   if(!empty($data['email']))
   {
    create_user($data['given_name'],$data['email']);
    $_SESSION['email'] = $data['email'];
}

if(!empty($data['gender']))
{
   $_SESSION['user_gender'] = $data['gender'];
}

if(!empty($data['picture']))
{
   $_SESSION['user_image'] = $data['picture'];
}
}
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="assets/img/images.png"  width="60%"/></a>';
}
loginCheck();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utfN-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Preadmin - Bootstrap Admin Template</title>
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
        <div class="main-wrapper">
            <div class="account-page">
                <div class="container">
                    <h3 class="account-title">Login</h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.php"><img src="assets/img/logo2.png" alt="Preadmin"></a>
                            </div>
                            <form action="index.php">
                                <div class="form-group form-focus">
                                    <label class="control-label">email</label>
                                    <input class="form-control floating" type="email"  name="email" value="<?php if(isset($_REQUEST['submit'])) {echo $_REQUEST['email'];} ?>" required>
                                </div>
                                <div class="form-group form-focus">
                                    <label class="control-label">Password</label>
                                    <input class="form-control floating" type="password"  name="pass" required >
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit" value="Submit"  name="submit">Login</button>
                                </div>
                                <div class="form-group text-center">

                                    <?php 
                                    // echo $login_button ;
                                    ;?>

                                </div>
                                <div class="text-center">

                                    </div><?php
                                    if($login_button == '')
                                    {
                                    }
                                    else
                                    {
                                        echo '<div align="center">'.$login_button . '</div>';
                                    }
                                    ?>

                                    <div class="text-center">
                                        <br>
                                        <a href="forgot-password.php">Forgot your password?</a> <br>
                                        <a href="register.php">Donot have an account? Create it</a>
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

