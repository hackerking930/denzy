<?php
include "dbconn.php";

$pname = mysqli_real_escape_string($conn,$_POST['pname']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
$pdesc = mysqli_real_escape_string($conn,$_POST['pdesc']);
$brand = mysqli_real_escape_string($conn,$_POST['brand']);
$stock = mysqli_real_escape_string($conn,$_POST['stock']);
$cat = mysqli_real_escape_string($conn,$_POST['cat']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$psize = mysqli_real_escape_string($conn,$_POST['psize']);
$targetDir = "../upload/";
$fileName = basename($_FILES["pimg1"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["pimg1"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["pimg1"]["tmp_name"], $targetFilePath)){
            $sql = "INSERT INTO products (pname,price,pdesc,brand,stock,pimg,category,gender,psize) VALUES ('$pname','$price','$pdesc','$brand','$stock','$fileName','$cat','$gender','$psize')";
            $res = mysqli_query($conn,$sql);
            if($res == true) {
                header("location:productadd.php?msg=1");
            }
            else {
                header("location:productadd.php?msg=2");
            }
        }
    }
}
?>