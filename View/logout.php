<?php
$connect =mysqli_connect("localhost","root","","music");
session_start();
session_unset();
session_destroy();
header("location:login.php");
?>