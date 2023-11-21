<?php
session_start();

if($_SESSION['email'] == '') {
    header("location:pages-sign-in.php");
}

include "dbconn.php";
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

	<title>Dashboard</title>

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

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Products</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT * FROM products";
												$res = mysqli_query($conn,$sql);
												$row = mysqli_num_rows($res);
												?>
												<h1 class="mt-1 mb-3"><?php echo $row; ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Product Reviews</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT * FROM preview";
												$res = mysqli_query($conn,$sql);
												$row = mysqli_num_rows($res);
												?>
												<h1 class="mt-1 mb-3"><?php echo $row; ?></h1>
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
														<h5 class="card-title">Orders</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<?php
												$sql = "SELECT * FROM orders";
												$res = mysqli_query($conn,$sql);
												$row = mysqli_num_rows($res);
												?>
												<h1 class="mt-1 mb-3"><?php echo $row; ?></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-12 col-xxl-12">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Montly Wise Sold Units</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill tblu">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Orders Placed</h5>
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
										$query = "SELECT * FROM orders order by id DESC limit 15";
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
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
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
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sold Units",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							<?php
		$totalsale = "SELECT sale FROM s21";
		$tres = mysqli_query($conn,$totalsale);
		while($trow = mysqli_fetch_assoc($tres)) {
			echo $trow['sale'] . ",";
		}
	?>
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [	<?php
		$totalsale = "SELECT sale FROM s21";
		$tres = mysqli_query($conn,$totalsale);
		while($trow = mysqli_fetch_assoc($tres)) {
			echo $trow['sale'] . ",";
		}
	?>],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>

</body>

</html>