<?php
session_start();
include('connection.php');
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');

session_destroy();
header("location:login.php");
exit();
?>