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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Add Category</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/phosphor-icons"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
					<h1 class="h3 mb-3"><strong>Add</strong> Category</h1>
                </div>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form6Example1">Category Name</label>
        <input type="text" class="form-control" id = "cname"/>
       
      </div>
    </div>
</div>
  <input type="submit" class="btn btn-primary btn-block mb-4" value = "Add Product" id = "submit">


<script>
    $("#submit").on("click",function() {
        var cname = $("#cname").val();
        if(cname == "") {
            swal("Error","Add A Category Name Please!","error");
        }
        else {
            $.ajax({
                url:"addc.php",
                type:"POST",
                data:{cname:cname},
                success:function(data) {
                    if(data == 1) {
                        swal("Success","Category Added","success");
                    }
                    else {  
                        swal("Error","Internal Server Error","error");
                    }
                }
            })
        }
    });
</script>

</main>   
        </div>    
    </div>  
</body>

<script src="js/app.js"></script>

</html>      