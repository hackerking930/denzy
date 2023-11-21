<?php

$oid = $_GET['oid'];

include "dbconn.php";

$sql = "SELECT * FROM orders WHERE id = '{$oid}'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

$pid = $row['pid'];

$product = "SELECT * FROM products WHERE id = '{$pid}'";
$pres = mysqli_query($conn,$product);
$prow = mysqli_fetch_assoc($pres);

$cid = $row['cid'];

if($cid == '') {
    $no = "No";
}
else {
    $no = "Yes";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel = "stylesheet" href = "invoice.css">
    <script>
        window.onload = function() {
    document.getElementById("download").addEventListener("click",()=>{
        const invoice = this.document.getElementById("invoice");
        var opt = {
            filename: <?php echo $oid; ?>,
        };
        html2pdf().from(invoice).set(opt).save();
       
    })
}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <button id = "download">Download as PDF</button>
    <div class = "invoice" id = "invoice">
        <img src = "img/logo/2.png" height = "80" width = "80">
        <h2>Invoice Id - <?php echo $oid; ?></h2>
        <h4>Customer Details</h4>
        <div class = "box">
            <div class = "left">
                <span>Customer Name</span>
                <span>Email Address</span>
                <span>Customer Phone Number</span>
                <span>Customer Address</span>
                <span>Zip Code</span>
</div>
<div class = "right">
                <span><?php echo $row['fname']; ?></span>
                <span><?php echo $row['email']; ?></span>
                <span><?php echo $row['phone']; ?></span>
                <span><?php echo $row['addr']; ?></span>
                <span><?php echo $row['zip']; ?></span>
</div>
</div>

<h4>Order Details</h4>
<table>
  <tr>
    <th>Product Name</th>
    <th>Product Quantity</th>
    <th>Is from Cart?</th>
    <th>Total</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo $prow['pname']; ?></td>
    <td><?php echo $row['qty']; ?></td>
    <td><?php echo $no; ?></td>
    <td>Rs <?php echo $row['price']; ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>Sub-Total</td>
    <td>Rs <?php echo $row['price']; ?></td>
  </tr>
</table>
<br>
<center><span>Thanks For Shopping with denzys hope you will shop more. See you back here soon!. This Invoice is only used for security purpose, Do not make any false use of it.</span></center>
    </div>
</body>
</html>