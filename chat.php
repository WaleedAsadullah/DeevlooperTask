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
				<div class="chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-xs-9 message-view task-view">
							<div class="chat-window">
								<div class="fixed-header">
									<div class="navbar">
										<div class="user-details">
											<div class="pull-left user-img m-r-10">
												<a href="profile.html" title="Mike Litorus"><img src="assets/img/user.jpg" alt="" class="w-40 img-circle"><span class="status online"></span></a>
											</div>
											<div class="user-info pull-left">
												<a href="profile.html" title="Mike Litorus"><span class="font-bold">Deevlooper</span> </a>
												<span class="last-seen">Last seen today at 7:50 AM</span>
											</div>
										</div>
										<div class="search-box pull-right">
											<div class="input-group input-group-sm">
												<input type="text" class="form-control" placeholder="Search" required="">
												<span class="input-group-btn">
													<button class="btn" type="button"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="chats">
													<div class="chat chat-right">
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<p>Hello. What can I do for you?</p>
																</div>
															</div>
														</div>
													</div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile.html" class="avatar">
																<img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<p>I'm just looking around.</p>
																</div>
															</div>
														</div>
													</div>
													<div id="message">
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-footer">
									<div class="message-bar">
										<div class="message-inner">
											<div class="message-area">
												<div class="input-group">
													<textarea class="form-control" placeholder="Type message..." id="textarea" ></textarea>
													<input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
													<span class="input-group-btn">
														<button class="btn btn-primary"  id="btnsave" type="button" ><i class="fa fa-send"></i></button>
													</span>
												</div>
											</div>
										</div>
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
			<script src="js/msgjax.js"></script>


		</body>

		</html>