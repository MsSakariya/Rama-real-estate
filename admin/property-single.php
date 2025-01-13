
<?php
session_start();

if(empty($_SESSION['user']))
{
 header("location:login.php");
}
include('connection.php');
$pid = $_GET['id'];

include('header.php');
include('sidebar.php');

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
                $sql = "SELECT property_basicinfo.pid,
                property_basicinfo.title AS title,
                property_basicinfo.sid AS sid1,

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
                JOIN property_prc_loc ON property_basicinfo.pid = property_prc_loc.pid
                WHERE property_basicinfo.pid = ?";

// Prepare the statement
$stmt = mysqli_prepare($con, $sql);
if ($stmt) {
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $pid);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $pro = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($pro) > 0)
 {
  while ($row = mysqli_fetch_assoc($pro)) 
  {
    echo'<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">'.$row["title"].'</h1>
          <span class="color-text-a">'.$row["city"].'</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="property-grid.php">Properties</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
             '.$row["title"].'
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 1"></button>

          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src='.substr($row["img1"],6).' class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src='.substr($row["img2"],6).' class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src='.substr($row["img3"],6).' class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src='.substr($row["img4"],6).' class="d-block w-100" alt="...">
          </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div><!-- End Slides with indicators -->


        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-4">
            
            <div class="property-summary">
              
              <div class="summary-list">
                <ul class="list">
                <br><br>
                <li class="d-flex justify-content-between">
                    <strong>Property ID:</strong>
                    <span>'.$pid.'</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Title:</strong>
                    <span>'.$row["title"].'</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Price </strong>
                    <span>'.$row["price"].'</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span>'.$row["location1"].'</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Property Type:</strong>
                    <span>'.$row["ptype"].'</span>
                  </li>
                 
                  <li class="d-flex justify-content-between">
                    <strong>Area:</strong>
                    <span>'.$row["area"].'m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Beds:</strong>
                    <span>'.$row["beds"].'</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Baths:</strong>
                    <span>'.$row["baths"].'</span>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-7 section-md-t3">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Property Description</h3>
                </div>
              </div>
            </div>
            <div class="property-description">
              <p class="description color-text-a">
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                neque, auctor sit amet
                aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta.
                Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt
                nibh pulvinar quam id dui posuere blandit.
              </p>
              <p class="description color-text-a no-margin">
                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                malesuada. Quisque velit nisi,
                pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
              </p>
            </div>
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Amenities</h3>
                </div>
              </div>
            </div>
            <div class="amenities-list color-text-a">
              <ul class="list-a no-margin">
                <li>Balcony</li>
                <li>Outdoor Kitchen</li>
                <li>Cable Tv</li>
                <li>Deck</li>
                <li>Tennis Courts</li>
                <li>Internet</li>
                <li>Parking</li>
                <li>Sun Room</li>
                <li>Concrete Flooring</li>
              </ul>
          </div>
        </div>
      </div>


      
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';
       
      }

}
mysqli_stmt_close($stmt);
}

 include('footer.php');
 ?>

 
