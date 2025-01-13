

<?php
session_start();
include("connection.php");

if (empty($_SESSION['user'])) {
    header("location:login.php");
}

$pid = $_GET['id'];

include('header.php');





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
        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
          <div class="carousel-item-b">
            <img src='.$row["img1"].' alt='.$row["img1"].'>
          </div>
          <div class="carousel-item-b">
          <img src='.$row["img2"].' alt='.$row["img2"].'>
          </div>
          <div class="carousel-item-b">
          <img src='.$row["img3"].' alt='.$row["img3"].'>
          </div>
          <div class="carousel-item-b">
          <img src='.$row["img4"].' alt='.$row["img4"].'>
          </div>
        </div>
        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="ion-money">₹</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c">'.$row["price"].'</h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">'.$row["title"].'</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex justify-content-between">
                    <strong>Property ID:</strong>
                    <span>'.$pid.'</span>
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

';
if($_SESSION['usertype']=="buyer")
{
echo'<div class="row section-t3">

<div class="col-sm-12">
  <div class="title-box-d">
    <h3 class="title-d">Book Appointment</h3>
  </div>
</div>
</div>


<div class="property-contact">
<form class="form-a" action="mail.php" >
  <div class="row">
    <div class="col-md-12 mb-1">
      <div class="form-group">
        <input type="text" class="form-control form-control-lg form-control-a" id="name" name="name"
          placeholder="Name *" required>
      </div>
    </div>
    <div class="col-md-12 mb-1">
      <div class="form-group">
        <input type="email" class="form-control form-control-lg form-control-a" id="email" name="email"
          placeholder="Email *" required>
      </div>
    </div>
    <div class="col-md-12 mb-1">
      <div class="form-group">
      <input type="date"  class="form-control form-control-lg form-control-a" placeholder="Date" name="adate" id="adate" required="true">
       </div>
    </div>
    <div class="col-md-12 mb-1">
      <div class="form-group">
        <input type="text" class="form-control form-control-lg form-control-a" id="phone" name="phone" placeholder="WhatsApp Number" required="true" maxlength="10" >
        <input  value='.$pid.' name="pid" hidden>
        <input  value='.$row["sid1"].' name="sid" hidden>

      </div>
    </div>
    <div class="col-md-12 mb-1">
      <div class="form-group">
        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
          rows="8" required></textarea>
      </div>
    </div>
    <div class="col-md-12">
    <button name="submit1" class="btn btn-primary">Make an appointment</button>

    </div>
  </div>
</form>
</div>';
}
echo'
      
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

  <script>
        document.addEventListener("DOMContentLoaded", function() {
            const email = document.getElementById("email");
            const ano = document.getElementById("ano");
            const submit = document.getElementById("submit");

            submit.addEventListener("submit", function(e) {
                e.preventDefault();
                
                let ebody = `Your Appointment Request is Successfully Sent<br>Appointment no. is ${ano.value}`;

                Email.send({
                    SecureToken : "e72e473c-0cb1-4887-8b3e-87590bcc8888", // Add your token here
                    To : email.value,
                    From : "meetsakariya111@gmail.com",
                    Subject : "Appointment Request",
                    Body : ebody
                }).then(message => {
                    alert(message);
                });
            });
        });
    </script>

