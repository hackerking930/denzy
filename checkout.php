<?php
error_reporting(0);
session_start();
include "dbconn.php";
if(isset($_GET['cid'])) {
$cid = $_GET['cid'];
if(!isset($_GET['cdone'])) {
    $coupon = 0;
}
else {
    $cd = $_GET['cdone'];
    if($cd == 1) {
        $counpon = 1;
    }
}

$user = $_SESSION['fname'];
$query = "SELECT * FROM users WHERE fname = '{$user}'";
$reslt = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($reslt);

?>
<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout</title>
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
    </head>
    <body class="checkout">
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
								<h2>checkout</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">checkout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<div class="checkout-area">
					<div class="container">
                        <form action="buyc.php?cid=<?php echo $cid; ?>&&cdone=<?php echo $coupon; ?>&&uid=<?php echo $uid; ?>&&total=<?php echo $total2; ?>" method = "POST">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="checkbox-form">						
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 ">
                                                <div class="checkout-form-list">
                                                    <label>First Name <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "fname" value = "<?php echo $user; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Last Name <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "lname" value = "<?php echo $data['lname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input type="text" placeholder="Street address" required name = "addr" value = "<?php echo $data['addres']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="checkout-form-list">
                                                    <label>Town / City <span class="required">*</span></label>
                                                    <input type="text" placeholder="Town / City" required name = "tc" value = "<?php echo $data['tc']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>State <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "state" value = "<?php echo $data['state']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Postcode / Zip <span class="required">*</span></label>										
                                                    <input type="number" placeholder="Postcode / Zip" required name = "zip" value = "<?php echo $data['zipcode']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span class="required">*</span></label>										
                                                    <input type="email" placeholder="" required name = "email" value = "<?php echo $data['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Phone  <span class="required">*</span></label>										
                                                    <input type="number" placeholder="Phone Number" required name = "phone" value = "<?php echo $data['phno']; ?>">
                                                </div>
												
                                            </div>
																		
                                        </div>	
																				
                                    </div>
                                </div>
								<?php
									
								?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="your-order">
                                        <h3>Your order</h3>
                                        <div class="your-order-table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>							
                                                </thead>
                                                <tbody>
												<center>Note :- Cash on Delivery charges are upto 50 Rs</center>
                                                <?php
                                                            $prod = "SELECT * FROM cart WHERE uid = '{$cid}'";
                                                            $pres = mysqli_query($conn,$prod);
                                                            while($prow = mysqli_fetch_assoc($pres)) {
                                                                $id = $prow['pid'];
                                                            $sql = "SELECT * FROM products WHERE id = '{$id}'";
                                                            $res = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_assoc($res);
                                                            $total = $row['price'] + 50;

                                                            if($counpon == 1) {
                                                                $total3 = $total2 - 650;
                                                            }
                                                            else {
                                                                $total3 = $total2;
                                                            }
                                                        ?>
                                                    <tr class="cart_item">
                                                       
                                                        <td class="product-name">
                                                            <?php echo $row['pname']; ?> <strong class="product-quantity"> × <?php echo $prow['qty']; ?></strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="amount">Rs <?php echo $row['price']; ?></span>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                            }
                                                            ?>
													<tr class="cart_item">
                                                        <td class="product-name">
                                                           Select Payment Method<strong class="product-quantity"> </strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <select name = "payment">
																<option value = "Cash On Delivery">Cash On Delivery</option>
															</select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td><span class="amount">Rs <?php echo $total2;?>.00</span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td><strong><span class="amount">Rs <?php echo $total3;?>.00</span></strong>
                                                        </td>
                                                    </tr>	
												
																				
                                                </tfoot>
                                            </table>
                                            <div class="order-button-payment">
                                                <input type="submit" value="Place order">
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<!-- checkout-area-end -->
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:47 GMT -->
</html>
<?php
}
else {
    $id = $_GET['pid'];
    $user = $_SESSION['fname'];
$query = "SELECT * FROM users WHERE fname = '{$user}'";
$reslt = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($reslt);
?>
<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout</title>
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
    </head>
    <body class="checkout">
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
								<h2>checkout</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">checkout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<div class="checkout-area">
					<div class="container">
                        <form action="buy.php?pid=<?php echo $id; ?>&&uid=<?php echo $uid; ?>" method = "POST">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="checkbox-form">						
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 ">
                                                <div class="checkout-form-list">
                                                    <label>First Name <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "fname" value = "<?php echo $user; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Last Name <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "lname" value = "<?php echo $data['lname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input type="text" placeholder="Street address" required name = "addr" value = "<?php echo $data['addres']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="checkout-form-list">
                                                    <label>Town / City <span class="required">*</span></label>
                                                    <input type="text" placeholder="Town / City" required name = "tc" value = "<?php echo $data['tc']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>State <span class="required">*</span></label>										
                                                    <input type="text" placeholder="" required name = "state" value = "<?php echo $data['state']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Postcode / Zip <span class="required">*</span></label>										
                                                    <input type="number" placeholder="Postcode / Zip" required name = "zip" value = "<?php echo $data['zipcode']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span class="required">*</span></label>										
                                                    <input type="email" placeholder="" required name = "email" value = "<?php echo $data['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="checkout-form-list">
                                                    <label>Phone  <span class="required">*</span></label>										
                                                    <input type="number" placeholder="Phone Number" required name = "phone" value = "<?php echo $data['phno']; ?>">
                                                </div>
												
                                            </div>
																		
                                        </div>
																						
                                    </div>
                                </div>
								<?php
									
									$sql = "SELECT * FROM products WHERE id = '{$id}'";
									$res = mysqli_query($conn,$sql);
									$row = mysqli_fetch_assoc($res);
									$total = $row['price'] + 50;
								?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="your-order">
                                        <h3>Your order</h3>
                                        <div class="your-order-table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>							
                                                </thead>
                                                <tbody>
												<center>Note :- Cash on Delivery charges are upto 50 Rs</center>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            <?php echo $row['pname']; ?> <strong class="product-quantity"> × 1</strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="amount">Rs <?php echo $row['price']; ?></span>
                                                        </td>
                                                    </tr>
													<tr class="cart_item">
                                                        <td class="product-name">
                                                           Select Payment Method<strong class="product-quantity"> </strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <select name = "payment">
                                                                <option value = "Cash On Delivery">Cash On Delivery</option>
                                                                <option value = "Cop">Cashfree Payment</option>
															</select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td><span class="amount">Rs <?php echo $row['price'];?></span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td><strong><span class="amount">Rs <?php echo $row['price'];?></span></strong>
                                                        </td>
                                                    </tr>	
												
																				
                                                </tfoot>
                                            </table>
                                            <div class="order-button-payment">
                                                <input type="submit" value="Place order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<!-- checkout-area-end -->
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

<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 22:11:47 GMT -->
</html>
<?php
}
?>