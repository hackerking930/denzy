<?php
session_start();

include "dbconn.php";

if($_SESSION['email'] == '') {
    header("location:pages-sign-in.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Orders</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/phosphor-icons"></script>
</head>
<style>
	.card {
		width: 100%;
    overflow: hidden;
    overflow-x: auto;
	}
</style>
<body>
<div class="wrapper">
		<?php
            include "sidebar.php";
        ?>

		<div class="main">
        <?php
            include "header.php";
        ?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Orders</strong> </h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-8 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Orders</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT * FROM orders";
                                                $sql2 = "SELECT * FROM orders where gender = 'Male' or gender = 'male'";
                                                $sql3 = "SELECT * FROM orders where gender = 'female' or gender = 'Female'";
												$res = mysqli_query($conn,$sql);
                                                $res2 = mysqli_query($conn,$sql2);
                                                $res3 = mysqli_query($conn,$sql3);
												$row = mysqli_num_rows($res);
                                                $row2 = mysqli_num_rows($res2);
                                                $row3 = mysqli_num_rows($res3);
												?>
												<h1 class="mt-1 mb-3"><?php echo $row; ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Male Products Sold</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $row2; ?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Sales</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT SUM(price) as sprice FROM orders";
												$res = mysqli_query($conn,$sql);
												$row = mysqli_fetch_assoc($res);
												$price = $row['sprice'];
												?>
												<h1 class="mt-1 mb-3">Rs <?php echo $price; ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Female Products Sold</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $row3; ?></h1>
											</div>
                                            
										</div>
                                        
                                        
									</div>
								</div>
							</div>
						</div>
                        <h1 class="h3 mb-3"><strong>Gender Wise Orders</strong> </h1>
                    	<div class="row">
						 <div class="col-12 col-lg-6 col-xxl-6 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Orders From Male</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
										<th class=" d-xl-table-cell">Product Image</th>
											<th>Order By</th>
											<th class=" d-xl-table-cell">Order Date</th>
											
											<th class=" d-xl-table-cell">email</th>
											<th>Phone Number</th>
											<th class="d-md-table-cell">Payment Type</th>
											<th class="d-md-table-cell">Product Name</th>
											<th class="d-md-table-cell">Product Type</th>
											<th class="d-md-table-cell">Product For</th>
											<th class="d-md-table-cell">Product Quantity</th>

										</tr>
									</thead>
									<tbody>
									<style>
										.img img{
											height:100px;
											width:auto;
										}
										.tblu{
											overflow:hidden;
											overflow-x:scroll;
										}
												</style>
										<?php
										$query = "SELECT * FROM orders WHERE gender = 'Male' order by id DESC limit 10";
										$results = mysqli_query($conn,$query);
										while($fetch = mysqli_fetch_assoc($results)) {
											$pid = $fetch['pid'];
											$product = "SELECT * FROM products WHERE id = '{$pid}'";
											$pres = mysqli_query($conn,$product);
											$prow = mysqli_fetch_assoc($pres);
										?>
										<tr>
										<td class="d-xl-table-cell img"><img src = "../upload/<?php echo $prow['pimg']; ?>"></td>
											<td><?php echo $fetch['fname']; ?> <?php echo $fetch['lname']; ?></td>
											<td class="d-xl-table-cell"><?php echo $fetch['odate']; ?></td>
											
											<td class="d-xl-table-cell"><?php echo $fetch['email']; ?></td>
											<td class="d-xl-table-cell"><?php echo $fetch['phone']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['payment']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['pname']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['category']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['gender']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['qty']; ?></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
                            
						 </div>
                         <div class="col-12 col-lg-6 col-xxl-6 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Orders From Female</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
										<th class=" d-xl-table-cell">Product Image</th>
											<th>Order By</th>
											<th class=" d-xl-table-cell">Order Date</th>
											
											<th class=" d-xl-table-cell">email</th>
											<th>Phone Number</th>
											<th class="d-md-table-cell">Payment Type</th>
											<th class="d-md-table-cell">Product Name</th>
											<th class="d-md-table-cell">Product Type</th>
											<th class="d-md-table-cell">Product For</th>
											<th class="d-md-table-cell">Product Quantity</th>

										</tr>
									</thead>
									<tbody>
									<style>
										.img img{
											height:100px;
											width:auto;
										}
										.tblu{
											overflow:hidden;
											overflow-x:scroll;
										}
												</style>
										<?php
										$query = "SELECT * FROM orders WHERE gender = 'Female' order by id DESC limit 10";
										$results = mysqli_query($conn,$query);
										while($fetch = mysqli_fetch_assoc($results)) {
											$pid = $fetch['pid'];
											$product = "SELECT * FROM products WHERE id = '{$pid}'";
											$pres = mysqli_query($conn,$product);
											$prow = mysqli_fetch_assoc($pres);
										?>
										<tr>
										<td class="d-xl-table-cell img"><img src = "../upload/<?php echo $prow['pimg']; ?>"></td>
											<td><?php echo $fetch['fname']; ?> <?php echo $fetch['lname']; ?></td>
											<td class="d-xl-table-cell"><?php echo $fetch['odate']; ?></td>
											
											<td class="d-xl-table-cell"><?php echo $fetch['email']; ?></td>
											<td class="d-xl-table-cell"><?php echo $fetch['phone']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['payment']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['pname']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['category']; ?></td>
											<td class="d-md-table-cell"><?php echo $prow['gender']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['qty']; ?></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
                            
						 </div>
                        
                        
</div>

					
			</main>
  

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Denzys</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

    <?php
        $query = "SELECT SUM(stock) as qty FROM products WHERE gender = 'Male' or gender = 'male'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['qty'];
       
    ?>

    <?php
  $query2 = "SELECT SUM(stock) as qty FROM products WHERE gender = 'female' or gender = 'Female'";
  $result2 = mysqli_query($conn,$query2);
  $row2 = mysqli_fetch_assoc($result2); 
  $sum2 = $row2['qty'];
    ?>

    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut"), {
				type: "doughnut",
				data: {
					labels: ["Sold", "Available"],
					datasets: [{
						data: [0, <?php echo $sum; ?>],
						backgroundColor: [
							window.theme.primary,
							"#dee2e6"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					maintainAspectRatio: false,
					cutoutPercentage: 65,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
    <?php

    ?>
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut-2"), {
				type: "doughnut",
				data: {
                    labels: ["Sold", "Available"],
					datasets: [{
						data: [340,  <?php echo $sum2; ?>],
						backgroundColor: [
							"#FE3838",
							"#F2f453"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					maintainAspectRatio: false,
					cutoutPercentage: 65,
					legend: {
						display: false
					}
				}
			});
		});
	</script>

</body>

</html>
