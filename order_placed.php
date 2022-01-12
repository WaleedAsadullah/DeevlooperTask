<?php
include_once("includes/function.php");
checkLogout();
include_once 'include/config.php';  

// If transaction data is available in the URL 
if(!empty($_POST['pp_Amount']) && !empty($_POST['pp_AuthCode']) && !empty($_POST['pp_ResponseCode']) && !empty($_POST['pp_MerchantID']) && 
	!empty($_POST['pp_SecureHash']) && !empty($_POST['pp_TxnRefNo']) && !empty($_POST['pp_RetreivalReferenceNo']))
{
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    //Get transaction information from URL 
	$Transaction_id 	= $_POST['pp_TxnRefNo'];
	$Amount 			= $_POST['pp_Amount']; 
	$AuthCode 			= $_POST['pp_AuthCode']; 
	$ResponseCode 		= $_POST['pp_ResponseCode'];
	$ResponseMessage 	= $_POST['pp_ResponseMessage'];
	$MerchantID 		= $_POST['pp_MerchantID'];
	$SecureHash 		= $_POST['pp_SecureHash'];
	$RetreivalReferenceNo = $_POST['pp_RetreivalReferenceNo'];

	//add period(.) before the last two digits of $Amount
	$Amount = substr($Amount, 0, -2) . '.00';
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	
	

	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	//Insert tansaction data into the database
	if($ResponseCode == '000')
		{$payment_status = 1;}
	else
		{$payment_status = 0;}
	
	$sql = "INSERT INTO payments(transaction_id,product_price,total,created_date,status) 
	VALUES('".$Transaction_id."','".$Amount."','".$Amount."','".date("Y-m-d H:i:s")."','".$payment_status."')"; 

		if($db->query($sql) === FALSE)
			{ echo "Error: " . $sql . "<br>" . $db->error; }

		$payment_id = $db->insert_id;
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	}
	else
	{
		$ResponseCode = 'error';
		$ResponseMessage = 'Some Serious error occurs please check transaction logs for more detail';
	}
	?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		<title>Home</title>
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

						<div class="col-lg-12">
							<div class="card-box">
								<div class="card-block">
									<?php if($ResponseCode == '000'){ ?>
										<!-- --------------------------------------------------------------------------- -->
										<!-- Payment successful -->
										<h1 class="success">Your Payment has been Successful</h1>
										<h4>Payment Information</h4>
										<p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
										<p><b>Transaction ID:</b> <?php echo $Transaction_id; ?></p>
										<p><b>Paid Amount:</b> <?php echo $Amount; ?></p>
										<p><b>Payment Status:</b> Success</p>
										<!-- --------------------------------------------------------------------------- -->


										<!-- --------------------------------------------------------------------------- -->
										<!-- Payment not successful -->
									<?php }else{ ?>
										<h1 class="error">Your Payment has Failed</h1>
										<p><b>Message: </b><?php echo $ResponseMessage;?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar-overlay" data-reff=""></div>
		<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>


	</body>

	</html>