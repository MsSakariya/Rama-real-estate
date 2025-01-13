<?php
 session_start();
 
include("connection.php");
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

  $pid=$_GET['id'];
  $pimage=$_GET['img'];
  $uid=$_SESSION['uid'];
    
  $insert=true;
  $squery="SELECT * from wishlist";
  $result=mysqli_query($con,$squery);
  while($r=mysqli_fetch_row($result))
  {
    if($r[1]==$pid && $r[2]==$uid)
    {
     $insert=false;
     echo'<script>alert("you already add to wishlist")</script>';
     header("location:property-grid.php");


    }
  }
  if($insert)
  {
  $query="INSERT into wishlist(pid,bid) values('$pid','$uid')";
  mysqli_query($con,$query);
  echo'<script>alert(" add to wishlist")';
         header("location:property-grid.php");
         echo"</script>";

  }
  mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');


  ?>
 









 
 

  