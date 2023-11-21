<?php
session_start();

include "dbconn.php";

if($_SESSION['email'] == '') {
    header("location:pages-sign-in.php");
}

if(!isset($_GET['msg'])) {
    $msg = '';
    $val = '';
}
else {
    $msg = $_GET['msg'];
    if($msg == 1) {
        $val = "Product Added Succesfully";
    }
    else {
        $val = "Internal Server Error";
    }
}
?>
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

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>

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
                    <center><h4><?php echo $val ;?></h4></center>
					<h1 class="h3 mb-3"><strong>Add</strong> Prodcut</h1>
                </div>
                <form action = "addp.php" method = "POST" enctype='multipart/form-data'>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form6Example1">Product Name</label>
        <input type="text" id="form6Example1" class="form-control" required name = "pname"/>
       
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form6Example2">Price</label>
        <input type="number" id="form6Example2" class="form-control" required name = "price"/>
        
      </div>
    </div>
    
  </div>
  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example3">Product Desctiption</label>
    <input type="text" id="form6Example3" class="form-control" required name = "pdesc"/>
    
  </div>
  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Product Brand</label>
    <input type="text" id="form6Example4" class="form-control" required name = "brand"/>
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Product Size</label>
    <input type="text" id="form6Example4" class="form-control" required name = "psize"/>
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Stock</label>
    <input type="number" id="form6Example4" class="form-control" required name = "stock"/>
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Product Type </label>
  <select class="form-select" aria-label="Default select example" name = "cat">
  <option selected>----</option>
  <?php
  $sql = "SELECT * FROM `category`";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($res)) {
      ?>
      
      <option value = '<?php echo $row["cat_name"]; ?>'><?php echo $row["cat_name"]; ?></option>
      <?php
  }
  ?>
</select>
</div>
<div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Product For </label>
<select class="form-select" aria-label="Default select example" name = "gender">
  <option selected>----</option>
  <option value = "Male">Male</option>
  <option value = "Female">Female</option>
</select>
  </div>
 
  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example3">Product Image </label>
    <input type="file" name = "pimg1" class="form-control" required/>
  </div> 

  
  <input type="submit" class="btn btn-primary btn-block mb-4" value = "Add Product">

</form>


</main>   
        </div>    
    </div>  
</body>

<script src="js/app.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>
</html>      