
<?php
session_start();
error_reporting(0);

include "dbconn.php";

if($_SESSION['fname'] == '') {
	$login = 0;
}
else {
	$fname = $_SESSION['fname'];	
	$login = 1;
	$query = "SELECT * FROM users WHERE fname = '{$fname}'";
	$result = mysqli_query($conn,$query);
	$fetch = mysqli_fetch_assoc($result);
	$uid = $fetch['id'];
} 
?>
<style>
	.sticky img {
		margin-top:20px;
	}
	</style>
<div class="container">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-6 col-6">
								<!-- logo-area-start -->
								<div class="logo-area">
									<a href="index.php"><img height = "80" width = "100" src="img/logo/isolated-monochrome-black.svg" alt="logo" /></a>
								</div>
								<!-- logo-area-end -->
							</div>
							<div class="col-xl-7 col-lg-7 d-none d-lg-block">
								<!-- menu-area-start -->
								<div class="menu-area">
									<nav>
										<ul>
											<li><a href="index.php">Home</a>
											</li>
											<li><a href="#">Men</a>
												<ul class="mega-menu mega-menu-2">
												<li><a href="#">Clothing</a>
														<ul class="sub-menu-2">
													<?php
													$sql = "SELECT * FROM category";
													$res = mysqli_query($conn,$sql);
													while($row = mysqli_fetch_assoc($res)) {
														?>
														
															<li><a href="products.php?cat=<?php echo $row['cat_name']; ?>&&gender=male"><?php echo $row['cat_name']; ?></a></li>
														
														<?php
													}
													?>
													</ul>
													</li>
												</ul>
											</li>
											<li>
												<a href = "shop.php">
													Shop
												</a>
												</li>
											<li><a href="#">Women</a>
											<ul class="mega-menu mega-menu-2">
												<li><a href="#">Clothing</a>
														<ul class="sub-menu-2">
													<?php
													$sql = "SELECT * FROM category";
													$res = mysqli_query($conn,$sql);
													while($row = mysqli_fetch_assoc($res)) {
														?>
														
														<li><a href="products.php?cat=<?php echo $row['cat_name']; ?>&&gender=female"><?php echo $row['cat_name']; ?></a></li>
														
														<?php
													}
													?>
													</ul>
													</li>
												</ul>
											</li>
                                            <li>
                                                <a href="profile.php"><?php echo $_SESSION['fname']; ?></a>
                                            </li>   
										</ul>
									</nav>
								</div>
								<!-- menu-area-end -->
							</div>
							<div class="col-xl-3 col-lg-3 com-md-6 col-6">
								<!-- header-right-area-start -->
								<div class="header-right-area">
									<ul>
										<li><a href="#" id="show-search"><i class="icon ion-ios-search-strong"></i></a>
											<div class="search-content" id="hide-search">
												<span class="close" id="close-search">
													<i class="ion-close"></i>
												</span>
												<div class="search-text">
													<h1>Search</h1>
													<form action="search.php" method = "POST">
														<input type="text" placeholder="search" name = "search"/>
														<button class="btn" type="submit">
															<i class="fa fa-search"></i>
														</button>
													</form>
												</div>
											</div>
										</li>

										<!-- Cart -->
										<?php
											$query = "SELECT * FROM cart WHERE uid = '{$uid}'";
											$result = mysqli_query($conn,$query);
											$count = mysqli_num_rows($result);
										?>

										<li><a href="checkoutcart.php?id=<?php echo $uid; ?>"><i class="icon ion-bag"></i></a>
											<span><?php echo $count; ?></span>

											<?php
												if($count == 0) {
													?>
													<div class="mini-cart-sub">
													<div class="cart-product">
														<center>Cart is Empty</center>
												</div>
												</div>
													<?php
												}
												else {
													
											?>
											<div class="mini-cart-sub">
												<div class="cart-product">
													<?php while($rows = mysqli_fetch_assoc($result)) {
														$prodid = $rows['pid'];
														$product = "SELECT * FROM products WHERE id = '{$prodid}'";
														$pres = mysqli_query($conn,$product);
														while($prow = mysqli_fetch_assoc($pres)) {
															$total = $prow['price'];
															$qtyprice = $total * $rows['qty'];
															$total2 = $qtyprice + $total2;
														?>
													<div class="single-cart">
														<div class="cart-img">
															<a href="#"><img src="upload/<?php echo $prow['pimg']; ?>" alt="book" /></a>
														</div>
														<div class="cart-info">
															<h5><a href="#"><?php echo $prow['pname']; ?></a></h5>
															<p style = 'color:red'><?php echo $rows['qty']; ?> x Rs <?php echo $prow['price']; ?></p>
														</div>
													</div>
													<?php 
														}
													}
													?>
												</div>
												<div class="cart-totals">
													<h5>Total <span>Rs <?php echo $total2; ?></span></h5>
												</div>
												<div class="cart-bottom">
													<a href="checkoutcart.php?id=<?php echo $uid; ?>">Check out</a>
												</div>
											</div>
											<?php
													
												}
											?>
										</li>
										<li><a href="#" id="show-cart"><i class="icon ion-drag"></i></a>
											<div class="shapping-area" id="hide-cart">
												<div class="single-shapping">
													<span>My Account</span>
													<ul>
													<?php
														if($login == 0) {
															?>
															<li><a href="register.php">Register</a></li>
															<li><a href="login.php">Login</a></li>
															<?php
														}
														else {
															?>
															<li><a href="logout.php">Logout</a></li>
															<li><a href="orders.php">Orders</a></li>
															<?php
														}
														?>	
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<!-- header-right-area-end -->
							</div>
						</div>
					</div>