<?php
session_start();

if(empty($_SESSION['user']))
{
 header("location:login.php");
}
include('connection.php');
include('header.php');

?>
 <!--/ Property Grid Star /-->
  <br><br>
   <section class="property-grid grid">
    <div class="container">
      <div class="row">
         <div class="col-sm-12">
          <div class="grid-option">
          
          <?php
          if($_SESSION['usertype']=="buyer")
          {
            ?>
            <br><br>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01" aria-expanded="false" name="search">
        
        <span class="fa fa-search" aria-hidden="true"></span>
        
      </button>
      <?php 
          }
        ?>
          </div>
        </div>  

        <?php
function add_property($pid,$pimage,$price,$city,$title,$area,$room)
{
  echo'<div class="col-md-4">';
  echo'<div class="card-box-a card-shadow">';
    echo'<div class="img-box-a">';
      echo'<a href="login.php" class="link-a"><img src='.$pimage.' height="50px" width="400px" alt="" class="img-a img-fluid"></a>';
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
           echo' <li>';
              echo'<a href="addwishlist.php?id='.$pid.' & img='.$pimage.' & page=0" style="background-color: #10c53a; color: #fff;"  name="wishlist">&#10084;</a>';
              //  echo'<span>4</span>';
              //  <button style="background-color: #10c53a; color: #fff; border: none; height: 40px; width: 40px;"  name="wishlist" >
              //  </button>
           echo'</li>';
          echo'</ul>';
        echo'</div>';
      echo'</div>';
    echo'</div>';
  echo'</div>';
echo'</div>';

}
?>
        <?php

        $SQL="SELECT property_basicinfo.pid,
        property_basicinfo.title AS title1,
        property_basicinfo.ptype AS ptype1,
        property_basicinfo.beds AS beds1,
        property_basicinfo.baths AS baths1,
        property_basicinfo.sell_type AS tsell1,
        property_basicinfo.esta_year AS eyear1,
        property_img.image1 AS img11,
        property_img.image2 AS img21,
        property_img.image3 AS img31,
        property_img.image4 AS img41,
        property_prc_loc.area AS area1,
        property_prc_loc.price AS price1,
        property_prc_loc.city AS city1,
        property_prc_loc.location AS location11


        FROM property_basicinfo
        JOIN property_img ON property_basicinfo.pid = property_img.pid
        JOIN property_prc_loc ON property_basicinfo.pid = property_prc_loc.pid";

          if (isset($_POST['filter'])) 
          {
                    $price_min = isset($_POST['minprice']) ? intval($_POST['minprice']) : 0;
                    $price_max = isset($_POST['maxprice']) ? intval($_POST['maxprice']) : PHP_INT_MAX;
                    // $location = isset($_POST['location']) ? $_POST['location'] : '';
                    $city = isset($_POST['city']) ? $_POST['city'] : '';
                    $ptype = isset($_POST['ptype']) ? $_POST['ptype'] : '';
                    if($price_max==6000001)
                    {

                        $price_max=PHP_INT_MAX;
                    }
                    if((isset($price_max)) && (empty($price_min)) && ($price_max==PHP_INT_MAX))
                    {
                        $price_min=6000000;
                    }
                    if ((!empty($city)) || (!empty($ptype))) {
                      $price_max=PHP_INT_MAX;

                    }
                    if ((empty($city)) && (empty($ptype)) && (empty($price_min)) && (empty($price_max))) {
                      echo"<script>window.location.href='property-grid.php'</script>";

                    }
                
                $query1="SELECT property_prc_loc.* , property_basicinfo.* 
                        FROM property_prc_loc 
                        join   property_basicinfo ON    property_basicinfo.pid=property_prc_loc.pid
                        WHERE (property_prc_loc.price >= $price_min AND property_prc_loc.price <= $price_max)";


                if (!empty($city)) {
                  $escapedCity = mysqli_real_escape_string($con, $city);
                  $query1 .= " AND property_prc_loc.city = '$escapedCity'";
                }
                if (!empty($ptype)) {
                  $escapedtype = mysqli_real_escape_string($con, $ptype);
                  $query1 .= " AND property_basicinfo.ptype = '$escapedtype'";
                }
          
                $result1 = mysqli_query($con, $query1);
                    

              while($r=mysqli_fetch_row($result1))
              {
                    $propid=$r[0];

                    $QUERY =" WHERE property_basicinfo.pid=$propid";
                    $sql1=$SQL . $QUERY;

                    $pro1=mysqli_query($con,$sql1);

                        if (mysqli_num_rows($pro1) > 0) 
                        {
                            $row1 = mysqli_fetch_assoc($pro1);
                              add_property($propid,$row1['img21'],$row1['price1'],$row1['city1'],$row1['title1'],$row1['area1'],$row1['beds1']);
                      } 
                        else {
                          echo "No results found.";
                        }
              }

          }


      else
          {
                  $pro=mysqli_query($con,$SQL);

                  if (mysqli_num_rows($pro) > 0)
                  {
                    while ($row = mysqli_fetch_assoc($pro)) {
                        add_property($row['pid'],$row['img21'],$row['price1'],$row['city1'],$row['title1'],$row['area1'],$row['beds1']);
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
  <!--/ Property Grid End /-->



  <!DOCTYPE html>
<html>
<head>
    <title>Filtered Results</title>
</head><body>
    <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="post">
        <div class="row">
        
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type" name="ptype">
                <option value=""> Type</option>

                <?php
              
                      // $category = mysqli_real_escape_string($con, $_GET['state']);
                      $categoryquery = "SELECT subcat FROM category ";
                      $resultcategory = mysqli_query($con, $categoryquery);

                          while ($row1 = mysqli_fetch_row($resultcategory)) {
                                    echo "<option value='$row1[0]'>$row1[0]</option>";
                            }
				         ?>

              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control form-control-lg form-control-a" id="city" name="city">
              <option selected value="">City</option>

                <?php

                    $state = mysqli_real_escape_string($con, $_GET['state']);
                    $cityquery = "SELECT DISTINCT city FROM city where city !='' ";
                    $resultcity = mysqli_query($con, $cityquery);

                        while ($row1 = mysqli_fetch_row($resultcity)) {
                             echo "<option value='$row1[0]'>$row1[0]</option>";
                         }
                 ?>

                  </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Bedrooms" name="beds" value="">
            </div>
          </div>
          
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Bedrooms" name="baths" value="">

            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="price" name="minprice">
                <option value="">Unlimite</option>
                <option value="1000000">10,00,000</option>
                <option value="1500000">15,00,000</option>
                <option value="2000000">20,00,000</option>
                <option value="4000000">40,00,000</option>
                <option value="6000000">60,00,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Max Price</label>
              <select class="form-control form-control-lg form-control-a" id="price" name="maxprice">
                <option value="">Unlimite</option>
                <option value="1000000">10,00,000</option>
                <option value="1500000">15,00,000</option>
                <option value="2000000">20,00,000</option>
                <option value="4000000">40,00,000</option>
                <option value="6000000">60,00,000</option>
                <option value="6000001" > Above 60,00,000</option>

              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b" name="filter">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

 
  <?php
  include('footer.php');
  ?>

  