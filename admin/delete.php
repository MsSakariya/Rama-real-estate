<?php
include("connection.php");
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

$id=$_GET['id'];

$cid=$_GET['cid'];
$catid=$_GET['catid'];

if(isset($catid))
{
$query="DELETE from category where catid=$catid ";
mysqli_query($con,$query);
echo"<script>window.location.href='viewcategory.php'</script>";
}
else if(isset($cid))
{
$query="DELETE from city where cid=$cid ";
mysqli_query($con,$query);
echo"<script>window.location.href='viewcity.php'</script>";
}
else{
    mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');
$query="DELETE from property_basicinfo where pid='$id'";
mysqli_query($con,$query);
 header('Location:property.php');
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');
}

?>