<?php
session_start();

error_reporting(0);
include "dbconn.php";

if ($_SESSION['fname'] == '') {
	$cart = 0;
} else {
	$cart = 1;
	$fname = $_SESSION['fname'];
	$query = "SELECT * FROM users WHERE fname = '{$fname}'";
	$result = mysqli_query($conn, $query);
	$fetch = mysqli_fetch_assoc($result);
	$uid = $fetch['id'];
}





?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:10:21 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home</title>
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
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="home-2">
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
		<!-- slider-area-start -->
		<div class="slider-area">
			<div id="slider">
				<img src="img/slider/4.jpg" alt="slider-img" title="#caption1" />
				<img src="img/slider/5.jpg" alt="slider-img" title="#caption2" />
				<img src="img/slider/6.jpg" alt="slider-img" title="#caption3" />
			</div>
			<div class="nivo-html-caption" id="caption1">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-text">
								<h3 class="wow fadeInLeft" data-wow-delay=".3s">Clothing</h3>
								<h3 class="wow fadeInLeft" data-wow-delay=".5s">Exclusive Collection</h3>
								<p class="wow fadeInLeft" data-wow-delay="1.3s">Typi non habent claritatem insitam est usus legentis in iis qui facit eorum <br /> claritatem.</p>
								<a href="#" class=" wow bounceInRight" data-wow-delay="1.5s">Shop Now</a>
							</div>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
			<div class="nivo-html-caption" id="caption2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-text">
								<h3 class="wow fadeInLeft" data-wow-delay=".3s">Accessories</h3>
								<h3 class="wow fadeInLeft" data-wow-delay=".5s">Explore Trending</h3>
								<p class="wow fadeInLeft" data-wow-delay="1.3s">Typi non habent claritatem insitam est usus legentis in iis qui facit eorum <br /> claritatem..</p>
								<a href="shop.php" class=" wow bounceInRight" data-wow-delay="1.5s">Shop Now</a>
							</div>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
			<div class="nivo-html-caption" id="caption3">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-text">
								<h3 class="wow fadeInLeft" data-wow-delay=".3s">Bag</h3>
								<h3 class="wow fadeInLeft" data-wow-delay=".5s">Lookbook</h3>
								<p class="wow fadeInLeft" data-wow-delay="1.3s">Discover the collection as styled by fashion icon Caroline Issa in our new season <br /> campaign.</p>
								<a href="shop.php" class=" wow bounceInRight" data-wow-delay="1.5s">Shop Now</a>
							</div>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- feature-product-area-start -->
		<div class="feature-product-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title mb-30 text-center">
							<h2>Featured Products</h2>
							<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas.</p>
						</div>
					</div>
					<div class="col-lg-12">
						<!-- tab-menu-start -->
						<!-- tab-menu-end -->
					</div>
				</div>
			</div>
			<style>

			</style>
			<div class="box" id="Clothing">
				<?php
				$sql = "SELECT * FROM products order by rand() limit 3";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($res)) {
				?>
					<div class="lbox">
						<img src="upload/<?php echo $row['pimg']; ?>">
						<br>
						<h6><?php echo $row['pname']; ?></h6>
						<span>Rs <?php echo $row['price']; ?></span>
						<br>
						<?php
						if ($cart == 0) {
						?>
							<a href="login.php">Sign In To View</a>
						<?php
						} else {
						?>
							<a id="cart" data-id="<?php echo $row['id']; ?>" class="cart">Add to Cart</a>
							<br>
							<a href="product-details.php?id=<?php echo $row['id']; ?>">View This</a>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>

		<script>
			$(".cart").on("click", function() {
				var id = $(this).attr('data-id');
				var uid = <?php echo $uid; ?>;
				var qty = 1;
				$.ajax({
					url: "addcart.php",
					type: "POST",
					data: {
						id: id,
						uid: uid,
						qty: qty
					},
					success: function(data) {
						if (data == 1) {
							swal("Success", "Product Added To Cart", "success");
							window.setTimeout(function() {
								window.location.href = "http://localhost/denzys/index.php";
							}, 1000);
						} else if (data == 2) {
							swal("Success", "Cart Updated", "success");
							window.setTimeout(function() {
								window.location.href = "http://localhost/denzys/index.php";
							}, 1000);
						} else if (data == 0) {
							swal("Error", "Internal Server Error", "error");
						}
					}
				});
			});
		</script>
		<!-- feature-product-area-end -->
		<!-- testimonial-area-start -->
		<div class="testimonial-area bg ptb-80">
			<div class="container">
				<div class="testimonial-active owl-carousel">
					<div class="single-testimonial text-center">
						<div class="testimonial-img">
							<a href="#"><img src="img/testimonial/1.jpg" alt="man" /></a>
						</div>
						<div class="testimonial-content">
							<p>This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie augue magna. Pellentesque felis lorem, pulvinar sed eros n..</p>
							<i class="fa fa-quote-right"></i>
							<h4>Rebecka Filson</h4>
						</div>
					</div>
					<div class="single-testimonial text-center">
						<div class="testimonial-img">
							<a href="#"><img src="img/testimonial/1.jpg" alt="man" /></a>
						</div>
						<div class="testimonial-content">
							<p>Mauris blandit, metus a venenatis lacinia, felis enim tincidunt est, condimentum vulputate orci augue eu metus. Fusce dictum, nisi et semper ultricies, felis tortor blandit odio, egestas consequat pur..</p>
							<i class="fa fa-quote-right"></i>
							<h4>Nathanael Jaworski</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial-area-end -->
		<!-- arrivals-area-start -->
		<div class="arrivals-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title mb-30 text-center">
							<h2>Latest Arrivals </h2>
							<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas. </p>
						</div>

					</div>

				</div>
				<!-- tab-area-start -->

				<!-- tab-area-end -->
			</div>
			<div class="box" id="Clothing">
				<?php
				$sql = "SELECT * FROM products order by id DESC limit 6";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($res)) {
				?>
					<div class="lbox" data-id="<?php echo $row['id']; ?>">
						<img src="upload/<?php echo $row['pimg']; ?>">
						<br>
						<h6><?php echo $row['pname']; ?></h6>
						<span>Rs <?php echo $row['price']; ?></span>
						<br>
						<?php
						if ($cart == 0) {
						?>
							<a href="login.php">Sign In To View</a>
						<?php
						} else {
						?>
							<a class="cart2" data-id="<?php echo $row['id']; ?>">Add to Cart</a>
							<br>
							<a href="product-details.php?id=<?php echo $row['id']; ?>">View This</a>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
			</div>
			<script>
				$(".cart2").on("click", function() {
					var id = $(this).attr('data-id');
					var uid = <?php echo $uid; ?>;
					var qty = 1;
					$.ajax({
						url: "addcart.php",
						type: "POST",
						data: {
							id: id,
							uid: uid,
							qty: qty
						},
						success: function(data) {
							if (data == 1) {
								swal("Success", "Product Added To Cart", "success");
								window.setTimeout(function() {
									window.location.href = "http://localhost/denzys/index.php";
								}, 1000);
							} else if (data == 2) {
								swal("Success", "Cart Updated", "success");
								window.setTimeout(function() {
									window.location.href = "http://localhost/denzys/index.php";
								}, 1000);
							} else if (data == 0) {
								swal("Error", "Internal Server Error", "error");
							}
						}
					});
				});
			</script>
		</div>
		<!-- arrivals-area-end -->
		<!-- banner-area-start -->
		<!-- banner-area-2-start -->
		<div class="banner-area-2">
			<div class="container">
				<div class="br-bottom ptb-80">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-12">
							<!-- single-banner-2-start -->
							<div class="single-banner-2 text-center mb-3">
								<div class="banner-icon">
									<a href="#"><img src="img/banner/2.png" alt="banner" /></a>
								</div>
								<div class="banner-text">
									<h2>Free Shipping Worldwide</h2>
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
								</div>
							</div>
							<!-- single-banner-2-end -->
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-12">
							<!-- single-banner-2-start -->
							<div class="single-banner-2 text-center mb-3">
								<div class="banner-icon">
									<a href="#"><img src="img/banner/3.png" alt="banner" /></a>
								</div>
								<div class="banner-text">
									<h2>Money Back Guarantee</h2>
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
								</div>
							</div>
							<!-- single-banner-2-end -->
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-12">
							<!-- single-banner-2-start -->
							<div class="single-banner-2 text-center">
								<div class="banner-icon">
									<a href="#"><img src="img/banner/4.png" alt="banner" /></a>
								</div>
								<div class="banner-text">
									<h2>online support 24/7</h2>
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
								</div>
							</div>
							<!-- single-banner-2-end -->
						</div>
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
		<div class="modal-area">
			<!-- single-modal-start -->
			<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="modal-img">
								<div class="single-img">
									<img src="img/product/2.jpg" alt="hat" class="primary" />
								</div>
							</div>
							<div class="model-text">
								<h2><a href="#">Pyrolux Pyrostone</a> </h2>
								<div class="product-rating">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-rate">
									<span class="old-price"><del>$30.00</del></span>
									<span class="new-price">$28.00</span>
								</div>
								<div class="short-description mt-20">
									<p>Bacon ipsum dolor sit amet ut nostrud chuck, voluptate adipisicing veniam kielbasa fugiat ex spare ribs. Incididunt sint officia non cow, ut et. Cillum porchetta tongue occaecat laborum bacon aliquip fatback flank dolore short loin ball tip bresaola deserunt dolor. Shoulder fugiat ut in ut tail swine dolore, capicola ullamco beef occaecat meatball. Laboris turkey in et chuck deserunt ad incididunt do.</p>
								</div>
								<form action="#">
									<input type="number" value="1" />
									<button type="submit">Add to cart</button>
								</form>
								<div class="product-meta">
									<span>
										Categories:
										<a href="#">albums</a>,<a href="#">Music</a>
									</span>
									<span>
										Tags:
										<a href="#">albums</a>,<a href="#">Music</a>
									</span>
								</div>
								<!-- social-icon-start -->
								<div class="social-icon mt-20">
									<ul>
										<li><a href="#" data-toggle="tooltip" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Email to a Friend"><i class="fa fa-envelope-o"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Pin on Pinterest"><i class="fa fa-pinterest"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<!-- social-icon-end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single-modal-end -->
		</div>
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:10:54 GMT -->

</html>