<?php

include "dbconn.php";

$id = $_POST['id'];
$sql = "DELETE FROM cart WHERE id = '{$id}'";
$res = mysqli_query($conn,$sql);
if($res == true) {
    echo 1;
}
else {
    echo 0;
}
?>