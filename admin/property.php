<?php
session_start();
include("header.php");
include("sidebar.php");
include("connection.php");
?>


 
 <main id="main" class="main">

 <section class="property-grid grid">
    <div class="container">
      <div class="row">
         <div class="col-sm-12">
          <div class="grid-option">
          
             
          </div>
        </div>  


 
 <?php
function add_property($pid,$pimage,$price,$city,$location,$area,$room)
{
  echo'<div class="col-md-4">';
  echo'<div class="card-box-a card-shadow">';
    echo'<div class="img-box-a">';
     $pimage=substr($pimage,6);
      echo'<img src='.$pimage.' alt="image" class="img-a img-fluid">';
    echo'</div>';
    echo'<div class="card-overlay">';
      echo'<div class="card-overlay-a-content">';
        echo'<div class="card-header-a">';
          echo'<h2 class="card-title-a">';
            echo'<a href="#">'.$location;
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
           echo' <li>';
           if($_SESSION['usertype']=="buyer")
           {
              echo'<a href="addwishlist.php?id='.$pid.' & img='.$pimage.' & page=0" style="background-color: #10c53a; color: #fff;"  name="wishlist">&#10084;</a>';
           }
           else
           {
            echo'<a href="delete.php?id='.$pid.' name="delete">Delete</a>';

           }
              
            
           echo'</li>';
          echo'</ul>';
        echo'</div>';
      echo'</div>';
    echo'</div>';
  echo'</div>';
echo'</div>';

}





$sql="SELECT property_basicinfo.pid,
property_basicinfo.title AS title,
property_basicinfo.ptype AS ptype,
property_basicinfo.beds AS beds,
property_basicinfo.baths AS baths,
property_basicinfo.sell_type AS tsell,
property_basicinfo.esta_year AS eyear,
property_img.image1 AS img1,
property_img.image2 AS img2,
property_img.image3 AS img3,
property_img.image4 AS img4,
property_prc_loc.area AS area,
property_prc_loc.price AS price,
property_prc_loc.city AS city,
property_prc_loc.location AS location1


FROM property_basicinfo
JOIN property_img ON property_basicinfo.pid = property_img.pid
JOIN property_prc_loc ON property_basicinfo.pid = property_prc_loc.pid";
$pro=mysqli_query($con,$sql);

if (mysqli_num_rows($pro) > 0) {
   while ($row = mysqli_fetch_assoc($pro)) {
        add_property($row['pid'],$row['img2'],$row['price'],$row['city'],$row['location1'],$row['area'],$row['beds']);
      }
 
} else {
  echo "No results found.";
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
  </main>
  <?php
  include("footer.php");
  ?>
