<?php

include "dbconn.php";

$lid = $_GET['lid'];
$lid2 = base64_encode($lid);
$eotp = mysqli_real_escape_string($conn,$_POST['otp']);


$sql = "SELECT * FROM passreset WHERE id = '{$lid}'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

function generateRandomString($length = 120) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$otp = $row['otp'];
$uid = $row['uid'];
if($eotp == $otp) {
    header("location:passreset.php?plr=".generateRandomString()."&&uid=".$uid."&&lid=".$lid);
}
else {
    echo $eotp;
    echo $row['otp'];
    header("location:resetpass.php?msg=1&&lid=".$lid2);
}

?>