<?php
include("connection.php");
$pid=$_GET['pid'];
$uid=$_GET['uid'];
$query="Delete from wishlist where pid=$pid AND bid=$uid";
mysqli_query($con,$query);
echo"<script>window.location.href='property-grid.php'</script>";
?>
