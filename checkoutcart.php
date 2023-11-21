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
if(!isset($_GET['id'])) {
	header("location:404.php");
}

$id = $_GET['id'];
?>
<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:45 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cart</title>
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
								<h2>cart</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">cart</a></li>
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
					$sqll = "SELECT * FROM cart WHERE uid = '{$id}'";
					$res = mysqli_query($conn,$sqll);
					$count = mysqli_num_rows($res);
					if($count == 0) {
						?>
						<center><h1>No Items in Cart!</h1></center>
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
													<th class="product-remove">Remove</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$sqll = "SELECT * FROM cart WHERE uid = '{$id}'";
													$res = mysqli_query($conn,$sqll);
													while($rows = mysqli_fetch_assoc($res)) {
														$pid = $rows['pid'];
														$product = "SELECT * FROM products where id = '{$pid}'";
														$pres = mysqli_query($conn,$product);
														while($prow = mysqli_fetch_assoc($pres)) {
															$total4 = $prow['price'] * $rows['qty']; 
													
												?>
												<tr>
													<td class="product-thumbnail"><img src="upload/<?php echo $prow['pimg']; ?>" alt="man" /></td>
													<td class="product-name"><?php echo $prow['pname']; ?></td>
													<td class="product-price"><span class="amount"><?php echo $prow['price']; ?></span></td>
													<td class="product-quantity"><?php echo $rows['qty']; ?></td>
													<td class="product-subtotal"><?php echo $total4;?></td>
													<td class="product-remove"><i class="fa fa-times cross"  data-id = "<?php echo $rows['id']; ?>"></i></td>
												</tr>
												<?php
														}
													}
												?>
											</tbody>
										</table>
									</div>
							</div>
							<script>
									$('.cross').on("click",function() {
										var id = $(this).data("id");  
										$.ajax({
											url:"delcart.php",
											type:"POST",
											data:{id:id},
											success:function(data) {
												if(data == 1) {
													swal({
														title: "Success",
														text: "Product Deleted From Cart",
														type: "success"
													}).then(function() {
														location.reload();
													});
												}
												else {
													swal("Error","Internal Server Error","error");
												}
											}
										});
 									});
							</script>
						</div>
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-7 col-12">
								<div class="coupon">
									<h3>Coupon</h3>
									<p>Enter your coupon code if you have one.</p>
									<form action="#">
										<input type="text" placeholder="Coupon code" id = "couponcode">
										<a href="#" id = "coup">Apply Coupon</a>
									</form>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-5 col-12">
								<div class="cart_totals">
									<h2>Cart Totals</h2>
									<table>
										<tbody>
											<tr class="order-total">
												<th>Total</th>
												<td>
													<strong>
														<span class="amount">Rs <?php echo $total2; ?>.00</span>
													</strong>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="wc-proceed-to-checkout">
										<a href = "#" id = "ptc">Proceed to Checkout</a>
									</div>
									<script>
										$("#coup").on("click",function() {
											let cd = $("#couponcode").val();
											if(cd != "") {
												swal("Success","Coupon Applied", "success")
											}
										});

										$("#ptc").on("click",function() {
											let cd = $("#couponcode").val();
											if(cd != "") {
												alert(cd);
												window.location.href = "http://localhost/denzys/checkout.php?cid="+<?php echo $uid; ?>+"&cdone=1";
											}
											else {
												window.location.href = "http://localhost/denzys/checkout.php?cid="+<?php echo $uid; ?>
											}
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
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
