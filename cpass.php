<?php

include "dbconn.php";

$lid = $_GET['lid'];

$uid = $_GET['uid'];

$pass = mysqli_real_escape_string($conn,$_POST['pass']);
$cpass = mysqli_real_escape_string($conn,$_POST['cpass']);

if($cpass == $pass) {
    $query = "UPDATE users SET password = '{$pass}' WHERE id = '{$uid}'";
    $qres = mysqli_query($conn,$query);
    if($qres == true) {
        $expire = "UPDATE passreset SET expired = 1 WHERE id = '{$lid}' AND uid = '{$uid}'";
        $eres = mysqli_query($conn,$expire);
        if($eres == true) {
            header("location:successreset.php");
        }
    }
}
else {
    header("location:passreset.php?msg=1");
}


?>