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

	<title>Products</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/phosphor-icons"></script>
</head>

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

					<h1 class="h3 mb-3"><strong>Products</strong> </h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-8 d-flex">
							<div class="flex-fill w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Products</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT SUM(stock) as qty FROM products";
                                                $sql2 = "SELECT SUM(stock) as fqty FROM products where gender = 'Male' or gender = 'male'";
                                                $sql3 = "SELECT SUM(stock) as mqty FROM products where gender = 'female' or gender = 'Female'";
												$res = mysqli_query($conn,$sql);
                                                $res2 = mysqli_query($conn,$sql2);
                                                $res3 = mysqli_query($conn,$sql3);
												$row = mysqli_fetch_assoc($res);
												$mpss = $row['qty'];
                                                $row2 = mysqli_fetch_assoc($res2);
												$mps = $row2['fqty'];
												$row3 = mysqli_fetch_assoc($res3);
												$fps = $row3['mqty'];
												?>
												<h1 class="mt-1 mb-3"><?php echo $mpss; ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Male Products Stock</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $mps; ?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Sold Items</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<?php $quer = "SELECT SUM(qty) as cqty FROM orders"; 
												$qres = mysqli_query($conn,$quer); 
												$num = mysqli_num_rows($qres);
												$counts = mysqli_fetch_assoc($qres);
												$data = $counts['cqty'];
												if($data == 0) {
													$data = 0;
												}
												else {
												    $data = $counts['cqty'];
												
												} ?>
												<h1 class="mt-1 mb-3"><?php echo $data; ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Female Products Stock</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $fps; ?></h1>
											</div>
                                            
										</div>
                                        
                                        
									</div>
								</div>
							</div>
						</div>
                        <h1 class="h3 mb-3"><strong>Category Wise Products</strong> </h1>
                    	<div class="row">
						<div class="col-xl-6 col-xxl-6">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Male Stock</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
                                    <canvas id="chartjs-doughnut"></canvas>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-xl-6 col-xxl-6">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Female Stock</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
                                    <canvas id="chartjs-doughnut-2"></canvas>
									</div>
								</div>
							</div>
						</div>
</div>
<br><br>
<h1 class="h3 mb-3"><strong>Recently Added Products</strong> </h1>
<br><br>
<div class="row">
    <?php
        $sql = "SELECT * FROM products order by id DESC limit 6";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)) {
    ?>
<div class="col-12 col-md-4">
							<div class="card">
								<img class="card-img-top" src="../upload/<?php echo $row['pimg']; ?>" alt="Unsplash">
								<div class="card-header">
									<h5 class="card-title mb-0"><?php echo $row['pname']; ?></h5>
								</div>
							</div>
						</div>
                        <?php
        }
        ?>
</div>
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="flex-fill w-100">
								<div class="row">
							
									<div class="col-sm-6">
									<a href = "mproducts.php">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">View Male Products</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">View Male Products</h1>
											</div>
										</div>
										</a>
									</div>

	
									<div class="col-sm-6">
									<a href = "fproducts.php">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">View Female Products</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">View Female Products</h1>
											</div>
										</div>
										</a>
                                        
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill tblu">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Product Reviews</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
										<th class=" d-xl-table-cell">Product Name</th>
										<th class=" d-xl-table-cell">Review By</th>
										<th class=" d-xl-table-cell">Email Address</th>
										<th class=" d-xl-table-cell">Review</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT * FROM preview order by id DESC limit 15";
										$results = mysqli_query($conn,$query);
										while($fetch = mysqli_fetch_assoc($results)) {
											$pid = $fetch['pid'];
											$product = "SELECT * FROM products WHERE id = '{$pid}'";
											$pres = mysqli_query($conn,$product);
											$prow = mysqli_fetch_assoc($pres);
										?>
										<tr>
											<td class="d-md-table-cell"><?php echo $prow['pname']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['uname']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['email']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['review']; ?></td>
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
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

		<!-- male -->
		<?php

		$totalm = "SELECT SUM(stock) as mstock FROM products WHERE gender = 'Male'";
		$tres = mysqli_query($conn,$totalm);
		$tcount = mysqli_fetch_assoc($tres);


		$male = "SELECT SUM(qty) as msale FROM orders WHERE gender = 'Male'";
		$mres = mysqli_query($conn,$male);
		$mcount = mysqli_fetch_assoc($mres);
		?>






    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut"), {
				type: "doughnut",
				data: {
					labels: ["Sold", "Available"],
					datasets: [{
						data: [<?php echo $mcount['msale']; ?>, <?php echo $tcount['mstock']; ?>],
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

		$totalm = "SELECT SUM(stock) as mstock FROM products WHERE gender = 'Female'";
		$tres = mysqli_query($conn,$totalm);
		$tcount = mysqli_fetch_assoc($tres);


		$male = "SELECT SUM(qty) as msale FROM orders WHERE gender = 'Female'";
		$mres = mysqli_query($conn,$male);
		$mcount = mysqli_fetch_assoc($mres);
		?>
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut-2"), {
				type: "doughnut",
				data: {
                    labels: ["Sold", "Available"],
					datasets: [{
						data: [<?php echo $mcount['msale']; ?>, <?php echo $tcount['mstock']; ?>],
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