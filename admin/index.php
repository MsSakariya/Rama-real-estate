<?php
session_start();
if(empty($_SESSION['uid']))
{
  header("location:pages-login.php");
}
include("connection.php");

include("header.php");
include("sidebar.php");
?>

   
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <?php
            function card($title,$info){
              echo "
              <div class='col-xxl-4 col-md-6'>
                <div class='card info-card sales-card' style='background-color: #FF5733;'>
                  <div class='card-body'>
                    <h5 class='card-title' style='color: #FFF;'>$title</h5>
                    <div class='d-flex align-items-center'>
                      <div class='ps-3'>
                        <h6 class='mb-0' style='color: #000;'>$info</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Add some design elements -->
                  
                </div>
              </div>
              <!-- End Sales Card -->
              ";
               }
            $sellerquery=mysqli_query($con,"SELECT * from seller");
            $sellerresult=mysqli_num_rows($sellerquery);
            card("SELLER",$sellerresult);

            $buyerquery=mysqli_query($con,"SELECT * from buyer");
            $buyerresult=mysqli_num_rows($buyerquery);
            card("BUYER",$buyerresult);

            $totalproperty=mysqli_query($con,"SELECT * from property_basicinfo");
            $propertyresult=mysqli_num_rows($totalproperty);
            card("Total PROPERTY",$propertyresult);

            $totalcity = mysqli_query($con, "SELECT DISTINCT city FROM city WHERE city !='' ");
            $cityresult = mysqli_num_rows($totalcity);
            
            card("Total City",$cityresult);

            $totalcategory = mysqli_query($con, "SELECT  subcat FROM category ");
            $categoryresult = mysqli_num_rows($totalcategory);
            
            card("Total Category",$categoryresult);


            $totalappointment=mysqli_query($con,"SELECT * from appointment");
            $appointmentresult=mysqli_num_rows($totalappointment);
            card("Total Book Appointment",$appointmentresult);

            $totalappointment=mysqli_query($con,"SELECT * from appointment WHERE status='accept'");
            $appointmentresult=mysqli_num_rows($totalappointment);
            card("Accepted APPOINTMENT",$appointmentresult);

            $totalappointment=mysqli_query($con,"SELECT * from appointment WHERE status='reject'");
            $appointmentresult=mysqli_num_rows($totalappointment);
            card("REJECTED APPOINTMENT",$appointmentresult);

            $totalappointment=mysqli_query($con,"SELECT * from appointment WHERE status='pending'");
            $appointmentresult=mysqli_num_rows($totalappointment);
            card("PENDING APPOINTMENT",$appointmentresult);
            ?>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

         

                
      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include("footer.php");
  ?>