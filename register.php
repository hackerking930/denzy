<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:41 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>User Registration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- magnific-popup css -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- ionicons.min css -->
        <link rel="stylesheet" href="css/ionicons.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="register">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper">
			<!-- header-area-start -->
			<header>
				<!-- header-top-area-start -->
				<div class="header-top-area" id="sticky-header">
					<?php
                        include "header.php";
                    ?>
				</div>
				<!-- header-top-area-end -->
				<!-- mobile-menu-area-start -->
				<div class="mobile-menu-area d-block d-lg-none clearfix">
                <?php
                        include "mobile_menu.php";
                    ?>
				</div>
				<!-- mobile-menu-area-end -->
			</header>
			<!-- header-area-end -->
			<!-- breadcrumbs-area-start -->
			<div class="breadcrumbs-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>register</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">register</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<!-- user-login-area-start -->
			<div class="user-login-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-10 col-md-12 col-12 ml-auto mr-auto">
							<form action="#">
								<div class="billing-fields">
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>First Name<span>*</span></label>
												<input type="text" id = "fname" />
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>Last Name<span>*</span></label>
												<input type="text" id = "lname">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>Email Address<span>*</span></label>
												<input type="email" id = "email">
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>Phone<span>*</span></label>
												<input type="number" id = "phno">
											</div>
										</div>
									</div>
									<div class="single-register">
										<label>Address<span>*</span></label>
										<input type="text" placeholder="Street address" id = "address">
									</div>
									<div class="single-register">
										<label>Town/City<span>*</span></label>
										<input type="text" id = "tc">
									</div>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>State<span>*</span></label>
												<input type = "text" placeholder = "State" id = "state">
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="single-register">
												<label>Postcode/zip<span>*</span></label>
												<input type="number" placeholder="Postcode/zip" id = "zip">
											</div>
										</div>
									</div>
									<div class="single-register">
										<label>Account password<span>*</span></label>
										<input type="password" placeholder="Password" id = "pass">
									</div>
									<div class="single-register">
										<label>Confirm password<span>*</span></label>
										<input type="password" placeholder="Password" id = "cpass">
									</div>
									<div class="single-register" id = "register">
										<a href="#">Register</a>
									</div>
									<br>
                                    <a href="login.php">Already Registered? Login Now</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- user-login-area-end -->
		</div>
			<!-- shop-main-area-end -->
			<!-- footer-area-start -->
			<footer>
				<div class="footer-area ptb-40">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-3 col-12">
								<!-- footer-logo-start -->
								<div class="footer-logo mb-3">
									<a href="#"><img src="img/logo/2.png" alt="logo" /></a>
								</div>
								<!-- footer-logo-end -->
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-12">
								<!-- copy-right-area-start -->
								<!-- copy-right-area-end -->
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-12">
								<!-- footer-social-icon-start -->
								<div class="footer-social-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-rss"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
								<!-- footer-social-icon-end -->
							</div>
						</div>
					</div>
				</div>
		   </footer>
			<!-- footer-area-end -->
	   </div>
	  <!-- page-wraper-start -->
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	  <script>
		  $("#register").on("click",function() {
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var phno = $("#phno").val();
			var email = $("#email").val();
			var address = $("#address").val();
			var tc = $("#tc").val();
			var zip = $("#zip").val();
			var states = $("#state").val();
			var pass = $("#pass").val();
			var cpass = $("#cpass").val();

			if(fname == '' || lname == '' || phno == '' || email == '' || address == '' || tc == '' || zip == '' || states == '' || pass == '' || cpass == '') {
				swal("Error","Fill the complete Form to register","error");
			}
			else if(pass != cpass) {
				swal("Error","Passwords Do Not Match","error");
			}
			else {
				$.ajax({
					url:"sign.php",
					type:"POST",
					data:{fname:fname,lname:lname,phno:phno,email:email,address:address,tc:tc,zip:zip,states:states,pass:pass},
					success:function(data) {
						if(data == 1) {
							swal("Success","Registraion Complete","success");
							window.setTimeout(function(){
							window.location.href = "http://localhost/denzys/login.php";
							}, 1000);
						}
						else if(data == 2) {
							swal("Error","Email Address or Username Already Taken","error");
						}
						else {
							swal("Error","Internal Server Error","error");
						}
					}
				});
			}
		  })
	  </script>
	  
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-v3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.js"></script>
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- magnific popup js -->
        <script src="js/magnific-popup.js"></script>
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
		<!-- wow js -->
        <script src="js/wow.min.js"></script>
		<!-- owl.carousel.min.js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- jquery.nivo.slider.js -->
        <script src="js/jquery.nivo.slider.js"></script>
		<!-- jquery.elevateZoom-3.0.8.min.js -->
        <script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.counterup.min.js -->
        <script src="js/jquery.counterup.min.js"></script>
		<!-- waypoints.min.js -->
        <script src="js/waypoints.min.js"></script>
		<!-- plugins js -->
        <script src="js/plugins.js"></script>
		<!-- main js -->
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:41 GMT -->
</html>
