<?php
include("connection.php");
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

$pid=$_GET['pid'];

$query="DELETE from property_basicinfo where pid='$pid'";
mysqli_query($con,$query);
 header('Location:myproperty.php');
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');


?>