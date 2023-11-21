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


$id = $_GET['id'];



?>

<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:40 GMT -->
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Product</title>
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
    <body class="product-details">
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
								<h2>product details</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">product details</a></li>
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
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<!-- zoom-area-start -->
							<?php
							$sql = "SELECT * FROM products WHERE id = '{$id}'";
							$res = mysqli_query($conn,$sql);
							$row = mysqli_fetch_assoc($res);
							?>
							<?php
							$counts = "SELECT * FROM preview WHERE pid = '{$id}'";
							$countres = mysqli_query($conn,$counts);
							$countrow = mysqli_num_rows($countres);
						?>
							<div class="zoom-area mb-3">
								<img id="zoompro" src="upload/<?php echo $row['pimg']; ?>" data-zoom-image="upload/<?php echo $row['pimg']; ?>" alt="zoom"/>
								<div id="gallery" class="mt-30">
								</div>
							</div>
							<!-- zoom-area-end -->
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<!-- zoom-product-details-start -->
							<div class="zoom-product-details">
								<h1><?php echo $row['pname']; ?></h1>
								<div class="main-area mtb-30">
									<div class="review">
										<a href="#"><?php echo $countrow; ?> reviews On this product</a>
									</div>
								</div>
								<div class="price">
									<ul>
										<li class="new-price">Rs <?php echo $row['price']; ?></li>
									</ul>
									<p><?php echo $row['pdesc']; ?></p>
								</div>
								<div class="list-unstyled">
									<ul>
										<li>Brands <a href="#"><?php echo $row['brand']; ?></a></li>
										<?php
										if($row['stock'] > 0) {
										?>
										<li>Availability:  <a href="#">In Stock</a></li>
										<li>Product Size <a href="#"><?php echo $row['psize']; ?></a></li>
										<br />
										<div class="quality-button">
											<input class="qty" type="text" value="1" id = "qty"/>
											<input type="button" value="+" data-max="1000"  class="plus" />
											<input type="button" value="-" data-min="1" class="minus" />
										</div>
										<button id = "cart">Add to cart</button>
										<br><br><br>
										<a href = "checkout.php?pid=<?php echo $row['id']; ?>"><button style = "width:100%">Buy Now</button></a>
										<?php
										}
										else {
											?>
											<li>Availability:  <a href="#">Out Of Stock</a></li>
											<?php
										}
										?>
										
									</ul>
								</div>
								
							</div>
							<script>
								$("#cart").on("click",function() {	
									var qty = $("#qty").val();
									var id = <?php echo $id; ?>;
									var uid = <?php echo $uid; ?>;
									$.ajax({
					url:"addcart.php",
					type:"POST",
					data:{id:id,uid:uid,qty:qty},
					success:function(data) {
						if(data == 1) {
							swal("Success","Product Added To Cart","success");
							window.setTimeout(function(){
								location.reload();
							},1000);
						}
						else if(data == 2) {
							swal("Success","Cart Updated","success");
							window.setTimeout(function(){
								location.reload();
							},1000);
						}
						else if(data == 0){
							swal("Error","Internal Server Error","error");
						}
					}
				});
								});
								</script>
							<!-- zoom-product-details-end -->
						</div>
					</div>
					<div class="row">
						<?php
							$counts = "SELECT * FROM preview WHERE pid = '{$id}'";
							$countres = mysqli_query($conn,$counts);
							$countrow = mysqli_num_rows($countres);
						?>
						<!-- products-detalis-area-start -->
						<div class="products-detalis-area pt-80">
							<div class="col-lg-12">
								<!-- tab-menu-start -->
								<div class="tab-menu mb-30 text-center">
									<ul class="nav">
										<li><a class="active" href="#Description" data-toggle="tab">Description</a></li>
										<li><a href="#Reviews"  data-toggle="tab">Add Review</a></li>
										<li><a href="#Tags" data-toggle="tab">See Reviews (<?php echo $countrow; ?>)</a></li>
									</ul>
								</div>
								<!-- tab-menu-end -->
							</div>
							<!-- tab-area-start -->
							<div class="tab-content">
								<div class="tab-pane show active" id="Description">
									<div class="col-lg-12">
										<div class="tab-description">
											<p><?php echo $row['pdesc']; ?></p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="Reviews">
									<div class="col-lg-12">
										<div class="reviews-area">
											<h3>Add Reviews</h3>
											<p>Be the first to review “<?php echo $row['pname']; ?>” </p>

											<div class="comment-form mb-10">
												<label>Your Review</label>
												<textarea name="comment" id="comment" cols="20" rows="7"></textarea>
											</div>
											<div class="comment-form-author mb-10">
												<label>Name</label>
												<input type="text" id = "revname" value = "<?php echo $fetch['fname']; ?>"/>
											</div>
											<div class="comment-form-email mb-10">
												<label>email</label>
												<input type="text" id = "revemail" value = "<?php echo $fetch['email']; ?>" />
											</div>
											<button type="submit" id = "revsub">submit</button>
										</div>
									</div>
									<script>
										$("#revsub").on("click",function() {
											var prodid = <?php echo $row['id']; ?>;
											var revname = $("#revname").val();
											var revemail = $("#revemail").val();
											var revsub = $("#revsub").val();
											var comment = $("#comment").val();
											var uid = <?php echo $uid; ?>;
											if(prodid == "" || revname == "" || revemail == "" || comment == "") {
												swal("Error","Please fill the whole form to submit the review","error");
											}
											else {
												$.ajax({
													url:"prodreview.php",
													type:"POST",
													data:{prodid:prodid,revname:revname,revemail:revemail,comment:comment,uid:uid},
													success:function(data) {
														if(data == 1) {
															swal("Success","Review Submitted successfully","success");
														}
														else if(data == 2) {
															swal("Error","Review already submitted","warning");
														}
														else if (data == 3) {
															swal("Error","Email Format Not Correct","warning");
														}
														else {
															swal("Error",data,"error");
														}
													}
												});
											}
										});		
										</script>

								</div>
								<div class="tab-pane fade" id="Tags">
									<div class="col-lg-12">
										<div class="tab-description">
										<h3>Recent Reviews</h3>
										<hr>
											<?php 
												$take = "SELECT * FROM preview WHERE pid = '{$id}' order by id desc limit 3";
												$takeres = mysqli_query($conn,$take);
												while($takerow = mysqli_fetch_assoc($takeres)) {
												
											?>
											<h5><?php echo $takerow['uname']; ?></h5>
											<h6><?php echo $takerow['email']; ?></h6>
											<?php echo $takerow['review']; ?> </p>
											<hr>

											<?php
												}
											?>
											
										</div>
									</div>
								</div>
							</div>
							<!-- tab-area-end -->
						</div>
						<!-- products-detalis-area-end -->
					</div>
				</div>
			</div>
			<!-- shop-main-area-end -->
			<!-- arrivals-area-start -->
			<div class="arrivals-area ptb-80">
				
			</div>
			<center>
				<h2>Related Products</h2>
<p> Order online and have your products delivered to your closest store for free. </p>
			</center>
			<div class = "box" id = "Clothing">
			<?php
						$sql2 = "SELECT * FROM products WHERE category = '{$row['category']}' AND id != {$row['id']} order by rand() Limit 6";
						$res2 = mysqli_query($conn,$sql2);
						$count = mysqli_num_rows($res2);
						if($count == 0) {
							?>
							<center><h1>No Related Products Found</h1></center>
							<?php
						}else {
						while($row = mysqli_fetch_assoc($res2)) {
							$prodid = $row['id'];
					?>
                    <div class = "lbox">
                        <img src = "upload/<?php echo $row['pimg']; ?>">
                        <br>
                        <h6><?php echo $row['pname']; ?></h6>
                        <span><?php echo $row['price']; ?></span>
						<?php 
							if($cart == 0) {
								?>
								Sign In To View
								<?php
							}
							else {
								?>
								 <a href = "">Add to Cart</a>
								 <br>
								 <a href = "product-details.php?id=<?php echo $row['id']; ?>">View This</a>
								<?php
							}
						?>
                    </div>
						<?php
						}
					}
						?>
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
										<input type="number" value="1"/>
										<button type="submit">Add to cart</button>
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
											<li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i  class="fa fa-twitter"></i></a></li>
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:41 GMT -->
</html>
