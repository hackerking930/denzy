<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:41 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profile</title>
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
								<h2>Profile</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">Profile</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
            <style>
               
                </style>
			<div class="shop-main-area">
				<!-- user-login-area-start -->
			<div class="user-login-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-10 col-md-12 col-12 ml-auto mr-auto pro-box">
                            <div class = "pro-lbox">
                                <img src = "img/pngwing.com.png">
                                <h4><?php echo $_SESSION['fname']; ?></h4>
								<a href = "profile.php"><button class = "pro-btn">Back To Profile</button></a>
</div>
<div class = "pro-rbox">
		<div class="container">
                       
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="checkbox-form">						
                                        <div class="row">
                                            <div class="col-xl-12">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                                                <div class="checkout-form-list">
                                                    <label>New password <span class="required">*</span></label>										
                                                    <input type="password" placeholder="" id = "pass" required value = "<?php echo $row['fname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                                                <div class="checkout-form-list">
                                                    <label>Confirm Password <span class="required">*</span></label>										
                                                    <input type="password" placeholder="" id = "cpass" required value = "<?php echo $row['fname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">			
                                                    <input type="submit" id = "submit" required value = "Change password">
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
		  $("#submit").on("click",function() {
            var pass = $("#pass").val();
            var cpass = $("#cpass").val();
            if(pass == "" || cpass == "") {
                swal("Error","Please Fill Both the fields","error");
            }
            else if(pass != cpass) {
                swal("Error","Both Passwords do not Match","warning")
            }
            else {
                $.ajax({
                    url:"cp.php",
                    type:"POST",
                    data:{pass:pass,cpass:cpass},
                    success:function(data) {
                         if(data == 1) {
                             swal("Success","Passwords Changed Successfully","success");
                         }
                         else {
                             swal("Error",data,"warning");
                         }
                    }
                })
            }
          });
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
