<?php
include "dbconn.php";

$cname = mysqli_real_escape_string($conn,$_POST['cname']);
$sql = "INSERT INTO coupons (code) VALUES ('$cname')";
$res = mysqli_query($conn,$sql);
if($res == true) {
    echo 1;
}
else {
    echo 0;
}
?>