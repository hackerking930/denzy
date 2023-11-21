<?php

session_start();

include "dbconn.php";

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if($email == 'admin@gmail.com' && $password == 'admin') {
    $_SESSION['email'] = $email;
    header("location:index.php");
}
else {
    header("location:pages-sign-in.php?msg=1");
}

?>