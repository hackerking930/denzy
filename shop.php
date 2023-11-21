
<?php
error_reporting(0);
session_start();
if($_SESSION['fname'] == '') {
    $cart = 0;
}
else {
	$cart = 1;
}

include "dbconn.php";

?>

<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:37 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Mimosa-Responsive eCommerce Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
		<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="shop">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper-2">
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
								<h2>shop</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">shop</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-12 pull-right">
							<!-- shop-right-area-start -->
							<div class="shop-right-area mb-40-2 mb-30">
								<!-- tab-area-start -->
								<div class="tab-content">
									<div class="tab-pane" id="th" style = "display:block !important;">
										<div class="row">
											<!-- product -->
											<?php
											if (!isset ($_GET['page']) ) {  
												$page = 1;  
											} else {  
												$page = $_GET['page'];  
											}  
		
											$results_per_page = 20;  
											$page_first_result = ($page-1) * $results_per_page;  
		
											$query = "select * from products";  
											$result = mysqli_query($conn, $query);  
											$number_of_result = mysqli_num_rows($result);  
											
											//determine the total number of pages available  
											$number_of_page = ceil ($number_of_result / $results_per_page);  
												$sql = "SELECT *FROM products LIMIT " . $page_first_result . ',' . $results_per_page;  
												$res = mysqli_query($conn,$sql);
												$count = mysqli_num_rows($res);
												if($count == 0) {
													?>
														<center  style = "width:100%"><h1>Oppsie! Nothing Found Here</h1></center>
													<?php
												}else {
												while($row = mysqli_fetch_assoc($res)) {
											?>
											<div class="col-xl-3 col-lg-3 col-md-6 col-12">
												<!-- product-wrapper-start -->
												<div class="product-wrapper mb-40">
													<div class="product-img">
														<a href="#">
															<img src="upload/<?php echo $row['pimg']; ?>" alt="product" class="primary"/>
														</a>
													</div>
													<div class="product-content pt-20">
														<h2><a href="product-details.php?id=<?php echo $row['id'] ?>"><?php echo $row['pname']; ?></a></h2>
														<div class="price">
															<ul>
																<li class="new-price">Rs <?php echo $row['price'] ?></li>
															</ul>
														</div>
														<br>
														<?php 
															if($cart == 0) {
																?>
																<a href = "login.php">Sign In To  View</a>
																<?php
															}
															else {
																?>
																<a id = "btn" data-id = "<?php echo $row['id']; ?>" class = "cart">Add to Cart</a>
																<a href = "product-details.php?id=<?php echo $row['id']; ?>" id = "btn">View</a>
																<?php
															}
														?>
													</div>
												</div>
											</div>
											<?php
												}
											}
												?>


										</div>
									</div>
								</div>

								<script>
			   $(".cart").on("click",function() {
				var id = $(this).attr('data-id');
				var uid = <?php echo $uid; ?>;
				var qty = 1;
				$.ajax({
					url:"addcart.php",
					type:"POST",
					data:{id:id,uid:uid,qty:qty},
					success:function(data) {
						if(data == 1) {
							swal("Success","Product Added To Cart","success");
							window.setTimeout(function(){
							window.location.href = "http://localhost/denzys/shop.php";
							},1000);
						}
						else if(data == 2) {
							swal("Success","Cart Updated","success");
							window.setTimeout(function(){
							window.location.href = "http://localhost/denzys/shop.php";
							},1000);
						}
						else if(data == 0){
							swal("Error","Internal Server Error","error");
						}
					}
				});
			   });	
			   </script>
								<?php
									
								?>
								<!-- tab-area-end -->
								<!-- pagination-area-start -->
								<div class="pagination-area">
									<div class="pagination-number">
										<ul>
											<?php
											for($page = 1; $page<= $number_of_page; $page++) {  
												echo '<li><a href = "shop.php?page=' . $page . '">' . $page . ' </a></li>';  
											}
											?>
										</ul>
									</div>
									<div class="product-count">
										<p>Showing <?php echo $count; ?> of <?php echo $number_of_result; ?> items </p>
									</div>
								</div>
								<!-- pagination-area-end -->
							</div>
							<!-- shop-right-area-end -->
						</div>
					</div>	
				</div>
			</div>

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
			<!-- modal-area-start -->
			
			<!-- modal-area-end -->
	   </div>
	  <!-- page-wraper-start -->
	  
	  
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:37 GMT -->
</html>
