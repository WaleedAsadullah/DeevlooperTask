<?php
include_once("includes/function.php");
checkLogout();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Ajax Crud</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
        <script src="jquery.min.js"></script>  
        <script src="jquery-ui.js"></script>
    </head>

    <body>
        <div class="main-wrapper">
          <?php include_once("includes/header.php");?>

          <?php include_once("includes/sidebar.php");?>

          <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title">Ajax Crud</h4>
                                <div class="table-responsive">
                                    <form action="" id="myform">
                                      <div class="form-group">
                                        <input type="hidden" name="" id="stuid">
                                        <label for="nameid">Name</label>
                                        <input type="text" class="form-control" id="nameid">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailid" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailid">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordid" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="passwordid">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" id="btnsave">Save</button>
                                    </div>
                                    <div id="msg"></div>
                                </form> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title">Ajax Crud</h4>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Password</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody id="tbody"></tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="js/jqajax.js"></script>

</body>

</html>

