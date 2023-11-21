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

					<h1 class="h3 mb-3"><strong>Male Products</strong> </h1>
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
											<th>Product Name</th>
											<th class=" d-xl-table-cell">Stock</th>
											
											<th class=" d-xl-table-cell">Price</th>
											<th class="d-md-table-cell">Product Type</th>
											<th class="d-md-table-cell">Product Brand</th>
											<th class="d-md-table-cell">Product Size</th>
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
										$results_per_page = 15;  

										$querys = "select * from products WHERE gender = 'Male'";  
										$result = mysqli_query($conn, $querys);  
										$number_of_result = mysqli_num_rows($result);  

										$number_of_page = ceil ($number_of_result / $results_per_page);  

										if (!isset ($_GET['page']) ) {  
											$page = 1;  
										} else {  
											$page = $_GET['page'];  
										}  

										$page_first_result = ($page-1) * $results_per_page;  

										$query = "SELECT * FROM products WHERE gender = 'Male' order by id DESC LIMIT " . $page_first_result . ',' . $results_per_page; 
										$results = mysqli_query($conn,$query);
										while($fetch = mysqli_fetch_assoc($results)) {
											
										?>
										<tr>
										<td class="d-xl-table-cell img"><img src = "../upload/<?php echo $fetch['pimg']; ?>"></td>
											<td><?php echo $fetch['pname']; ?></td>
											<td class="d-xl-table-cell"><?php echo $fetch['stock']; ?></td>
											
											<td class="d-xl-table-cell">Rs <?php echo $fetch['price']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['brand']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['category']; ?></td>
											<td class="d-md-table-cell"><?php echo $fetch['gender']; ?></td>
										</tr>
										<?php
										
										}
										
										?>
									</tbody>
									
								</table>
								
							</div>
                           
						 </div>
						 <style>
							 .pagi {
								 display:flex;
								gap:10px;
							 }
							 .pagi a{
								color:white;
								background-color:dodgerblue;
								padding:12px;
								border-radius:4px;
							 }
							 </style>
						 <div class = "pagi">
						 <?php
for($page = 1; $page<= $number_of_page; $page++) {  
	echo '<a class = "boxx" href = "mproducts.php?page=' . $page . '">' . $page . ' </a>';  
}  
							?>
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

</body>

</html>