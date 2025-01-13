<section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            
            
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com</li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234</li>
              </ul>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="about.php">About</a>
              </li>
              <li class="list-inline-item">
                <a href="">Property</a>
              </li>
              
              <li class="list-inline-item">
                <a href="contact.php">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/search/top/?q=tarak%20mehta%20ka%20ooltah%20chashma">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              
              <li class="list-inline-item">
                <a href="https://www.instagram.com/_parth_sakariya_/">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
             
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script>
  function toggleInputField(selectedValue) {

    var flatFloorInput = document.getElementById('flatfloorInput');
	var bhk = document.getElementById('bhk');
	var lbhk = document.getElementById('lbhk');
	var floor = document.getElementById('floor');

    if (!(selectedValue === "Appartment")) {
		flatFloorInput.hidden = true;
	  bhk.hidden=true;
	  floor.hidden=true;
	  lbhk.hidden=true;
    } else {
     

	  flatFloorInput.hidden = false;
	  bhk.hidden=false;
	  floor.hidden=false;
	  lbhk.hidden=false;
    }
  }
</script>




<!-- footer section starts  -->

     <script src="./mail.js"></script>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
<?php
include('connection.php');
 mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');
?>
