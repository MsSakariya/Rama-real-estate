<?php
 session_start();
 
if(empty($_SESSION['user']))
{
 header("location:login.php");
 
}
include("connection.php");
include('header.php');
$usertype=$_SESSION['usertype'];
?>
<!-- ********************************************************************************* -->
<br><br><br><br>
<section class="property-grid grid">
    <div class="container">
      <div class="row">
         <div class="col-sm-12">
          <div class="grid-option">
          
             
          </div>
        </div>  

        <?php
function add_property($uid,$pid,$pimage,$price,$city,$title,$area,$room,$ut)
{
  echo'<div class="col-md-4">';
  echo'<div class="card-box-a card-shadow">';
    echo'<div class="img-box-a">';
      echo'<a href="login.php" class="link-a"><img src='.$pimage.' alt="" class="img-a img-fluid"></a>';
    echo'</div>';
    echo'<div class="card-overlay">';
      echo'<div class="card-overlay-a-content">';
        echo'<div class="card-header-a">';
          echo'<h2 class="card-title-a">';
            echo'<a href="#">'.$title;
              echo'<br /> '.$city.'</a>';
          echo'</h2>';
       echo' </div>';
        echo'<div class="card-body-a">';
          echo'<div class="price-box d-flex">';
           echo' <span class="price-a">price | '.$price.'</span>';
         echo' </div>';
         echo "<a class='link-a' href='property-single.php?id=" . $pid . "'>Click here to view</a>";

           echo' <span class="ion-ios-arrow-forward"></span>';
         echo' </a>';
       echo' </div>';
        echo'<div class="card-footer-a">';
          echo'<ul class="card-info d-flex justify-content-around">';
            echo'<li>';
              echo'<h4 class="card-info-title">Area</h4>';

              echo'<span>'.$area.'m';
                echo'<sup>2</sup>';
              echo'</span>';
            echo'</li>';
            echo'<li>';
              echo'<h4 class="card-info-title">Beds</h4>';
             echo' <span>'.$room.'</span>';
            echo'</li>';
if($ut=="buyer")
{
            echo'<li>';
            echo "<a class='link-a' href='delete.php?pid=" . $pid . " & uid=" . $uid . "'>Remove</a>";
            echo'</li>';
}
else{
  // echo'<li>';
  // echo "<a class='link-a' href='edit.php?pid=" . $pid . " & uid=" . $uid . "'>Edit</a>";
  //   echo "<a class='link-a' href='edit.php?pid=" . $pid . " & uid=" . $uid . "'>Edit</a>";

  // echo'</li>';
  echo'<li>';
              // echo'<h4 class="card-info-title">Beds</h4>';
              echo "<a class='link-a ' href='edit.php?pid=" . $pid . " & uid=" . $uid . "'>Edit</a></li><li>";

             echo"<a class='link-a ' href='delete2.php?pid=" . $pid . " '>Delete</a>";
            echo'</li>';
}

          echo'</ul>';
        echo'</div>';
      echo'</div>';
    echo'</div>';
  echo'</div>';
echo'</div>';

}




  $uid=$_SESSION['uid'];
  if($usertype=="seller")
  {
    $squery="SELECT pid from property_basicinfo where sid=$uid";

  }
  else
  {
  $squery="SELECT pid from wishlist where bid=$uid";
  }
  $result=mysqli_query($con,$squery);

   while($r=mysqli_fetch_row($result))
   {

        $sql="SELECT property_basicinfo.pid,
        property_basicinfo.title AS title,
        property_basicinfo.beds AS beds,
        property_basicinfo.baths AS baths,
        property_img.image1 AS img1,

        property_prc_loc.area AS area,
        property_prc_loc.price AS price,
        property_prc_loc.city AS city,
        property_prc_loc.location AS location1


        FROM property_basicinfo
        JOIN property_img ON property_basicinfo.pid = property_img.pid
        JOIN property_prc_loc ON property_basicinfo.pid = property_prc_loc.pid
        WHERE property_basicinfo.pid = $r[0]";
        
        $pro=mysqli_query($con,$sql);

        if (mysqli_num_rows($pro) > 0)
         {
          while ($row = mysqli_fetch_assoc($pro))
           {
              
                add_property($uid,$row['pid'],$row['img1'],$row['price'],$row['city'],$row['title'],$row['area'],$row['beds'],$usertype);
              }
 
         } 
else {
  echo "No results found.";
}



   
  
   }
   ?>
  <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
<!-- ******************************************************************************************* -->


 

  <?php


  

 include('footer.php');
 ?>
 

  













  