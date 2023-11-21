<?php
error_reporting(0);
if($_SESSION['fname'] == '') {
	$login = 0;
}
else {
	$login = 1;
}
include "dbconn.php";

session_start();
?>

<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="mobile-menu">
									<nav id="mobile-menu-active">
										<ul id="nav">
											<li><a href="index.php">Home</a>
											</li>
											<li><a href="#">Men</a>
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
											<li><a href="#">Women</a>

											
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
                                            <li>
                                                <a href="profile.php"><?php echo $_SESSION['fname']; ?></a>
                                            </li>   
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>