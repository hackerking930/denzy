<?php
session_start();
error_reporting(0);

include "dbconn.php";

if($_SESSION['fname'] == '') {
 header("location:login.php");
 	$cart = 0;
}
else {
	$cart = 1;
	$fname = $_SESSION['fname'];
	$query = "SELECT * FROM users WHERE fname = '{$fname}'";
	$result = mysqli_query($conn,$query);
	$fetch = mysqli_fetch_assoc($result);
	$uid = $fetch['id'];
}

?>
<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:45 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Orders</title>
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
	<style>
		.pag {
			margin-left:10px;
			background-color:black;
			color:#fff;
			padding:12px;
			text-align:center;
			border-radius:5px;
		}
		</style>
    <body class="cart">
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
								<h2>Orders</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">Orders</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<!-- cart-main-area-start -->
				<?php
					$sqll = "SELECT * FROM orders WHERE uid = '{$uid}'";
					$res = mysqli_query($conn,$sqll);
					$count = mysqli_num_rows($res);
					if($count == 0) {
						?>
						<center><h1>No Products Ordered Yet!</h1></center>
						<?php
					}
					else {
				?>
				<div class="cart-main-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
									<div class="table-content table-responsive">
										<table id = "table">
											<thead>
												<tr>
													<th class="product-thumbnail">Image</th>
													<th class="product-name">Product</th>
													<th class="product-price">Price</th>
													<th class="product-quantity">Quantity</th>
													<th class="product-subtotal">Total</th>
													<th class="product-remove">Invoice</th>
												</tr>
											</thead>
											<tbody>
												<?php
												  $results_per_page = 5;  

												$number_of_page = ceil($count / $results_per_page);  

												if (!isset ($_GET['page']) ) {  
													$page = 1;  
												} else {  
													$page = $_GET['page'];  
												}  
													$page_first_result = ($page-1) * $results_per_page;  

													$sqll = "SELECT * FROM orders WHERE uid = '{$uid}' LIMIT " . $page_first_result . ',' . $results_per_page;
													$res = mysqli_query($conn,$sqll);
													while($rows = mysqli_fetch_assoc($res)) {
                                                        $cid = $rows['cid'];
														$pid = $rows['pid'];
														$product = "SELECT * FROM products where id = '{$pid}'";
														$pres = mysqli_query($conn,$product);
														while($prow = mysqli_fetch_assoc($pres)) {
                                                            $qty = $rows['qty'];
                                                            $total4 = $qty * $prow['price'];
												?>
												<tr>
													<td class="product-thumbnail"><img src="upload/<?php echo $prow['pimg']; ?>" alt="man" /></td>
													<td class="product-name"><?php echo $prow['pname']; ?></td>
													<td class="product-price"><span class="amount">Rs <?php echo $prow['price']; ?></span></td>
													<td class="product-quantity"><?php echo $rows['qty']; ?></td>
													<td class="product-subtotal">Rs <?php echo $total4; ?></td>
													<td class="product-remove"><a href = "invoice.php?oid=<?php echo $rows['id']; ?>">View Invoice</a></td>
												</tr>
												<?php
														}
														
													}
													

													
												?>
											</tbody>
										</table>
									</div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
					for($page = 1; $page<= $number_of_page; $page++) {  
						echo '<a class = "pag" href = "orders.php?page=' . $page . '">' . $page . ' </a>';  
					}
				?>
				<!-- cart-main-area-end -->
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:46 GMT -->
</html>
