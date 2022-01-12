<?php
include_once("includes/function.php");
include_once('include/config.php');
checkLogout();




date_default_timezone_set('Asia/Karachi');
//60 seconds = 1 minutes
ini_set('max_execution_time', 60);

$product_name = "Donation";
$pp_Amount 		= 0;
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//2.
//get the current date and time
$DateTime 		= new DateTime();
$pp_TxnDateTime = $DateTime->format('YmdHis');
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//3.
//to make expiry date and time add one hour to current date and time
$ExpiryDateTime = $DateTime;
$ExpiryDateTime->modify('+' . 1 . ' hours');
$pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//4.
//make unique transaction id using current date
$pp_TxnRefNo = 'T'.$pp_TxnDateTime;
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//--------------------------------------------------------------------------------
//$post_data
$post_data =  array(
	"pp_Version" 			=> JAZZCASH_API_VERSION_1,
	"pp_TxnType" 			=> "MWALLET",
	"pp_Language" 			=> JAZZCASH_LANGUAGE,
	"pp_MerchantID" 		=> JAZZCASH_MERCHANT_ID,
	"pp_SubMerchantID" 		=> "",
	"pp_Password" 			=> JAZZCASH_PASSWORD,
	"pp_BankID" 			=> "TBANK",
	"pp_ProductID" 			=> "RETL",
	"pp_TxnRefNo" 			=> $pp_TxnRefNo,
	"pp_Amount" 			=> $pp_Amount,
	"pp_TxnCurrency" 		=> JAZZCASH_CURRENCY_CODE,
	"pp_TxnDateTime" 		=> $pp_TxnDateTime,
	"pp_BillReference" 		=> "billRef",
	"pp_Description" 		=> "Donation",
	"pp_TxnExpiryDateTime" 	=> $pp_TxnExpiryDateTime,
	"pp_ReturnURL" 			=> JAZZCASH_RETURN_URL,
	"pp_SecureHash" 		=> "",
	"ppmpf_1" 				=> "1",
	"ppmpf_2" 				=> "2",
	"ppmpf_3" 				=> "3",
	"ppmpf_4" 				=> "4",
	"ppmpf_5" 				=> "5",
);
//--------------------------------------------------------------------------------


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//5.
//$sorted_string
//make an alphabetically ordered string using $post_data array above
//and skip the blank fields in $post_data array
$sorted_string  = JAZZCASH_INTEGERITY_SALT . '&';
$sorted_string .= $post_data['pp_Amount'] . '&';
$sorted_string .= $post_data['pp_BankID'] . '&';
$sorted_string .= $post_data['pp_BillReference'] . '&';
$sorted_string .= $post_data['pp_Description'] . '&';
$sorted_string .= $post_data['pp_Language'] . '&';
$sorted_string .= $post_data['pp_MerchantID'] . '&';
$sorted_string .= $post_data['pp_Password'] . '&';
$sorted_string .= $post_data['pp_ProductID'] . '&';
$sorted_string .= $post_data['pp_ReturnURL'] . '&';
$sorted_string .= $post_data['pp_TxnCurrency'] . '&';
$sorted_string .= $post_data['pp_TxnDateTime'] . '&';
$sorted_string .= $post_data['pp_TxnExpiryDateTime'] . '&';
$sorted_string .= $post_data['pp_TxnRefNo'] . '&';
$sorted_string .= $post_data['pp_TxnType'] . '&';
$sorted_string .= $post_data['pp_Version'] . '&';
$sorted_string .= $post_data['ppmpf_1'] . '&';
$sorted_string .= $post_data['ppmpf_2'] . '&';
$sorted_string .= $post_data['ppmpf_3'] . '&';
$sorted_string .= $post_data['ppmpf_4'] . '&';
$sorted_string .= $post_data['ppmpf_5'];

//sha256 hash encoding
$pp_SecureHash = hash_hmac('sha256', $sorted_string, JAZZCASH_INTEGERITY_SALT);
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

$post_data['pp_SecureHash'] =  $pp_SecureHash;
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Payment Gateway</title>
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
								<h3 align="center">Enter Amount Donation</a></h3><br/>
								<form class="form-horizontal"  action="<?php echo JAZZCASH_HTTP_POST_URL;?>" method="POST">
									<div class="form-group">
										<label class="control-label col-lg-2">Enter Donation Amount</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon">Rs.</span>
												<input class="form-control" type="number" placeholder="500.00" name="pp_Amount" required step="0.01" pattern="([0-9]{1,5}).([0-9]{2})">
											</div>
											<input type="hidden" name="product_name" value="<?php echo $product_name;?>">
											<input type="hidden" name="product_id" value="<?php echo 1;?>">

											<input type="hidden" name="pp_Version" value="<?php echo $post_data['pp_Version'];?>">
											<input type="hidden" name="pp_TxnType" value="<?php echo $post_data['pp_TxnType'];?>">
											<input type="hidden" name="pp_Language" value="<?php echo $post_data['pp_Language'];?>">
											<input type="hidden" name="pp_MerchantID" value="<?php echo $post_data['pp_MerchantID'];?>">
											<input type="hidden" name="pp_SubMerchantID" value="<?php echo $post_data['pp_SubMerchantID'];?>">
											<input type="hidden" name="pp_Password" value="<?php echo $post_data['pp_Password'];?>">
											<input type="hidden" name="pp_BankID" value="<?php echo $post_data['pp_BankID'];?>">
											<input type="hidden" name="pp_ProductID" value="<?php echo $post_data['pp_ProductID'];?>">

											<input type="hidden" name="pp_TxnRefNo" value="<?php echo $post_data['pp_TxnRefNo'];?>">
											<input type="hidden" name="pp_TxnCurrency" value="<?php echo $post_data['pp_TxnCurrency'];?>">
											<input type="hidden" name="pp_TxnDateTime" value="<?php echo $post_data['pp_TxnDateTime'];?>">
											<input type="hidden" name="pp_BillReference" value="<?php echo $post_data['pp_BillReference'];?>">
											<input type="hidden" name="pp_Description" value="<?php echo $post_data['pp_Description'];?>">
											<input type="hidden" name="pp_TxnExpiryDateTime" value="<?php echo $post_data['pp_TxnExpiryDateTime'];?>">
											<input type="hidden" name="pp_ReturnURL" value="<?php echo $post_data['pp_ReturnURL'];?>">
											<input type="hidden" name="pp_SecureHash" value="<?php echo $post_data['pp_SecureHash'];?>">
											<input type="hidden" name="ppmpf_1" value="<?php echo $post_data['ppmpf_1'];?>">
											<input type="hidden" name="ppmpf_2" value="<?php echo $post_data['ppmpf_2'];?>">
											<input type="hidden" name="ppmpf_3" value="<?php echo $post_data['ppmpf_3'];?>">
											<input type="hidden" name="ppmpf_4" value="<?php echo $post_data['ppmpf_4'];?>">
											<input type="hidden" name="ppmpf_5" value="<?php echo $post_data['ppmpf_5'];?>">
										</div>
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Donat Now (Jazz Cash)</button>
									</div>
								</form>
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
