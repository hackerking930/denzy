<?php
session_start();
session_unset();
session_destroy();
header("location:pages-sign-in.php");
?>