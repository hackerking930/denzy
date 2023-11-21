<?php

include "dbconn.php";

$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$phno = mysqli_real_escape_string($conn,$_POST['phno']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$tc = mysqli_real_escape_string($conn,$_POST['tc']);
$state = mysqli_real_escape_string($conn,$_POST['states']);
$zip = mysqli_real_escape_string($conn,$_POST['zip']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);

$sql = "SELECT * FROM users WHERE email = '{$email}' or fname = '{$fname}'";
$res = mysqli_query($conn,$sql);
$row = mysqli_num_rows($res);
if($row == 1) {
    echo 2;
}
else {
    $insert = "INSERT INTO users (fname,lname,email,phno,addres,tc,state,zipcode,password) VALUES ('$fname','$lname','$email','$phno','$address','$tc','$state','$zip','$pass')";
    $result = mysqli_query($conn,$insert);
    if($result == true) {
        echo 1;
    }
    else {
        echo mysqli_error($conn);
    }
}

?>