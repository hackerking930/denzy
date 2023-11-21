<?php

include "dbconn.php";

$email = mysqli_real_escape_string($conn,$_POST['email']);


$sql = "SELECT * FROM users WHERE email = '{$email}'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if($count == 0) {
    header("location:frgpass.php?msg=1");
}
else {
    $select = "SELECT * FROM users WHERE email = '{$email}'";
    $sres = mysqli_query($conn,$select);
    $fetch = mysqli_fetch_assoc($sres);
    $uid = $fetch['id'];
    $uname = $fetch['fname'];
    $otp = rand(100000,999999);
    $query = "INSERT INTO passreset (uid,email,otp,expired) VALUES ('$uid','$email','$otp',0)";
    $qres = mysqli_query($conn,$query);
    $last_id = mysqli_insert_id($conn);
    $lid = base64_encode($last_id);

    $templatefile = "frgpassw.php";

    $arr = array(
        "{NAME}" => $uname,
        "{OTP}" => $otp
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
    $mail->setFrom('dataupload3103@gmail.com', 'Admin');
    $mail->addAddress($email);   // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    echo "<center><h1>Sending the OTP on your registered Email Address</h1></center>";
    $mail->Subject = 'Reset Password';
    $mail->Body    = $message;
    if(!$mail->send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      header("location:resetpass.php?lid=".$lid);
    }
}

?>