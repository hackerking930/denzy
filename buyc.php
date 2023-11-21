<?php

$date = date('m/d/Y', time());

$cid = $_GET['cid'];
$cdone = $_GET['cdone'];
$uid = $_GET['uid'];

include "dbconn.php";

$month =  date('F');



$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$addr = mysqli_real_escape_string($conn,$_POST['addr']);
$tc = mysqli_real_escape_string($conn,$_POST['tc']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$zip = mysqli_real_escape_string($conn,$_POST['zip']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$payment = mysqli_real_escape_string($conn,$_POST['payment']);

$sql = "SELECT * FROM cart WHERE uid = '{$cid}'";
$res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)) {
        $pid = $row['pid'];
        $qty = $row['qty'];

        $get = "SELECT * FROM products WHERE id = '{$pid}'";
        $gres = mysqli_query($conn,$get);
        $grow = mysqli_fetch_assoc($gres);

        $gender = $grow['gender'];

        $price = $qty * $grow['price'];

        $update = "UPDATE products SET stock = stock - '{$qty}' WHERE id = '{$pid}'";
        $ures = mysqli_query($conn,$update);

        $months = "UPDATE s21 set sale = sale + 1 WHERE  month = '{$month}'";
        $monthhres = mysqli_query($conn,$months);


        $query = "INSERT INTO orders (pid,fname,lname,addr,tc,state,zip,email,phone,payment,cid,uid,coupon,qty,price,gender) VALUES ('$pid','$fname','$lname','$addr','$tc','$state','$zip','$email','$phone','$payment','$cid','$uid','$cdone','$qty','$price','$gender')";
        $result = mysqli_query($conn,$query);
        if($result == true) {
            $delete = "DELETE FROM cart WHERE uid = '{$uid}'";
            $rdel = mysqli_query($conn,$delete);
        }
        if($rdel == true) {
            header("location:thanks.php?cid=".$cid);
        }
    }



?>