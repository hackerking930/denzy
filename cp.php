<?php

session_start();

include "dbconn.php";

$fname = $_SESSION['fname'];

$pass = $_POST['pass'];

$sql = "UPDATE users SET password = '{$pass}' WHERE fname = '{$fname}'";
$res = mysqli_query($conn,$sql);
if($res == true) {
    echo 1;
}
else {
    echo 0;
}
?>