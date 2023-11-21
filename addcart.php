<?php

include "dbconn.php";
/* Escaping the string. */

$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$pid = mysqli_real_escape_string($conn,$_POST['id']);
$qty = mysqli_real_escape_string($conn,$_POST['qty']);
/* Checking if the product is already in the cart. If it is, it will update the quantity. If not, it
will insert the product into the cart. */

$sql = "SELECT * FROM cart WHERE uid = '{$uid}' AND pid = '{$pid}'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if($count == 0) {
    $query = "INSERT INTO cart (uid,pid,qty) VALUES ('$uid','$pid','$qty')";
    $result = mysqli_query($conn,$query);
    if($result == true) {
        echo 1;
    }
    else {
        echo 0;
    }
}
/* Updating the quantity of the product in the cart. */
else {
    $update = "UPDATE cart SET qty = qty + '{$qty}' WHERE uid = '{$uid}' AND pid = '{$pid}'";
    $final = mysqli_query($conn,$update);
    if($final == true) {
        echo 2;
    }
    else {
        echo 0;
    }
}