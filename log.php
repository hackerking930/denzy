<?php

session_start();

include "dbconn.php";

$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);


$sql = "SELECT * FROM users WHERE email = '{$email}' AND  password = '{$pass}'";
$res = mysqli_query($conn,$sql);
$row = mysqli_num_rows($res);
$fetch = mysqli_fetch_assoc($res);
$username = $fetch['fname'];
$emailu = $fetch['email'];
if($row == 0) {
    header("location:login.php?msg=1");
}
else {
    $_SESISON['email'] = $emailu;
    $_SESSION['fname'] = $username;
    header("location:index.php");
}
?>