<?php

$pid = $_GET['pid'];
$uid = $_GET['uid'];

include "dbconn.php";

$month =  date('F');

$months = "UPDATE s21 set sale = sale + 1 WHERE  month = '{$month}'";
$monthhres = mysqli_query($conn,$months);

$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$addr = mysqli_real_escape_string($conn,$_POST['addr']);
$tc = mysqli_real_escape_string($conn,$_POST['tc']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$zip = mysqli_real_escape_string($conn,$_POST['zip']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$payment = mysqli_real_escape_string($conn,$_POST['payment']);

if($payment == "Cash On Delivery") {

$query = "SELECT * FROM products WHERE id = '{$pid}'";
$result = mysqli_query($conn,$query);
$fetch = mysqli_fetch_assoc($result);
$price = $fetch['price'];
$pname = $fetch['pname'];
$pimg = $fetch['pimg'];

$gender = $fetch['gender'];

$update = "UPDATE products SET stock = stock - 1 WHERE id = '{$pid}'";
$ures = mysqli_query($conn,$update);



$sql = "INSERT INTO orders (pid,fname,lname,addr,tc,state,zip,email,phone,payment,cid,uid,coupon,qty,price,gender) VALUES ('$pid','$fname','$lname','$addr','$tc','$state','$zip','$email','$phone','$payment','','$uid','0',1,'$price','$gender')";
$res = mysqli_query($conn,$sql);
if($res == true) {
    $lid = $conn->insert_id;
    $templatefile = "email2.php";
    $arr = array(
        "{{oname}}" => $pname,
        "{ID}" => $lid,
        "{Product Name}" => $pname,
        "{Qty}" => 1,
        "{Price}" => "Rs ".$price,
        "{Addr}" => $addr,
        "{State}" => $state,
        "{Payment Type}" => $payment,
        "{Product Price}" => "Rs ".$price,
        "{pimg}" => $pimg,
        "{tc}" => $tc,
        "{zip}" => $zip

    );

    $message = file_get_contents($templatefile);

    foreach(array_keys($arr) as $key) {
        $message = str_replace($key,$arr[$key],$message);
    }

    require "phpmailer/PHPMailerAutoload.php";

    $mail = new PHPMailer;
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'boltatebhai@gmail.com'; // your email id
    $mail->Password = 'Lallas@122'; // your password
    $mail->SMTPSecure = 'tls';                  
    $mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
    $mail->setFrom('boltatebhai@gmail.com', 'Admin');
    $mail->addAddress($email);   // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Order Confirmed';
    $mail->Body    = $message;
    if(!$mail->send()) {
     echo 'Message was not sent.';
     echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {  
        header("location:thank.php?pid=".$pid);
    }    
}else {
    echo 1;
}
}
else {
 $query = "SELECT * FROM products WHERE id = '{$pid}'";
$result = mysqli_query($conn,$query);
$fetch = mysqli_fetch_assoc($result);
$price = $fetch['price'];
$pname = $fetch['pname'];
$pimg = $fetch['pimg'];

$gender = $fetch['gender'];

$update = "UPDATE products SET stock = stock - 1 WHERE id = '{$pid}'";
$ures = mysqli_query($conn,$update);



$sql = "INSERT INTO orders (pid,fname,lname,addr,tc,state,zip,email,phone,payment,cid,uid,coupon,qty,price,gender) VALUES ('$pid','$fname','$lname','$addr','$tc','$state','$zip','$email','$phone','$payment','','$uid','0',1,'$price','$gender')";
$res = mysqli_query($conn,$sql);
if($res == true) {
    $lid = $conn->insert_id;
    $templatefile = "email2.php";
    $arr = array(
        "{{oname}}" => $pname,
        "{ID}" => $lid,
        "{Product Name}" => $pname,
        "{Qty}" => 1,
        "{Price}" => "Rs ".$price,
        "{Addr}" => $addr,
        "{State}" => $state,
        "{Payment Type}" =>'Cashfree Online Payment',
        "{Product Price}" => "Rs ".$price,
        "{pimg}" => $pimg,
        "{tc}" => $tc,
        "{zip}" => $zip

    );

    $message = file_get_contents($templatefile);

    foreach(array_keys($arr) as $key) {
        $message = str_replace($key,$arr[$key],$message);
    }

    require "phpmailer/PHPMailerAutoload.php";

    // $mail = new PHPMailer;
    // $mail->isSMTP();                            // Set mailer to use SMTP
    // $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                     // Enable SMTP authentication
    // $mail->Username = 'boltatebhai@gmail.com'; // your email id
    // $mail->Password = 'Lallas@122'; // your password
    // $mail->SMTPSecure = 'tls';                  
    // $mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
    // $mail->setFrom('boltatebhai@gmail.com', 'Admin');
    // $mail->addAddress($email);   // Add a recipient
    // $mail->isHTML(true);  // Set email format to HTML
    // $mail->Subject = 'Order Confirmed';
    // $mail->Body    = $message;
    // if(!$mail->send()) {
    //  echo 'Message was not sent.';
    //  echo 'Mailer error: ' . $mail->ErrorInfo;
    // } else {  
       header("location:checkout/request.php?oid=".$lid."&amt=".$price."&curr=INR&cname=".$fname."&phone=".$phone."&email=".$email."&pid=".$pid);  
}else {
    echo 1;
}
}
