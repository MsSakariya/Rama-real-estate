<?php
 session_start();
include("connection.php");
// if(empty($_SESSION['user']))
// {
//  header("location:login.php");
// }
?>


  <?php
  include('header.php');
  ?>
 <!-- ==================================== -->


  

  <!--/ About Star /-->
  <section class="section-about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-img-box">
            <img src="img/slide-about-1.jpg" alt="" class="img-fluid">
          </div>
          <div class="sinse-box">
            <h3 class="sinse-title">EstateAgency
              <span></span>
              <br> Sinse 2017</h3>
            <p>Art & Creative</p>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="img/about-2.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2  d-none d-lg-block">
              <div class="title-vertical d-flex justify-content-start">
                <span>EstateAgency Exclusive Property</span>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">
                  <span class="color-d"></span> 
                  <br> </h3>
              </div>
              <p class="color-text-a">
              Welcome to Rama Real Estate, your premier destination for all your real estate needs. 
              We are more than just a real estate agency;
              we are your partners in making your property dreams come true.
              With a passion for excellence and a commitment to integrity, we have been serving the Your City or Region community for 7 years, and our reputation speaks for itself.
              </p>
              <!-- <p class="color-text-a">
                Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                Mauris blandit aliquet
                elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed,
                convallis at tellus.
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ About End /-->

  <!--/ Team Star /-->
  
  <!--/ footer Star /-->
  <?php
  include('footer.php');
  ?>
  <!--/ Footer End /-->

  