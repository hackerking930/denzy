<?php

include "dbconn.php";

$prodid = $_POST['prodid'];
$revname = mysqli_real_escape_string($conn,$_POST['revname']);
$revemail = mysqli_real_escape_string($conn,$_POST['revemail']);
$comment = mysqli_real_escape_string($conn,$_POST['comment']);
$uid = mysqli_real_escape_string($conn,$_POST['uid']);

if (!filter_var($revemail, FILTER_VALIDATE_EMAIL)) {
    echo 3;
}
else {
    $sql = "SELECT * FROM preview WHERE email = '{$revemail}' AND uname = '{$revname}' AND review = '{$comment}'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count == 1) {
        echo 2;
    }
    else {
    $query = "INSERT INTO preview (uid,uname,email,review,pid) VALUES ('$uid','$revname','$revemail','$comment','$prodid')";
    $qres = mysqli_query($conn,$query);
        if($qres == true) {
            echo 1;
        }
        else {
            echo 0;
        }
    }
}
?>