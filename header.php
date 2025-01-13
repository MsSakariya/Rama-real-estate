<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EstateAgency Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <script src="https://smtpjs.com/v3/smtp.js"></script>


  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <style>
    td{
      padding: 20px;
    }
   /* Apply styles to all input and select elements */
/* Apply these styles to all input and select elements */
input, select , table,textarea{
  width: 300px; /* Adjust the width to your desired size */
  padding: 10px; /* Add padding for better aesthetics */
  margin: 10px 0; /* Add margin for spacing between input elements */
  border: 1px solid #ccc; /* Add a default border color */
  border-radius: 5px; /* Add rounded corners */
  font-size: 16px; /* Adjust the font size */
  background-color: #f9f9f9; /* Add a light background color */
  transition: border-color 0.3s, background-color 0.3s; /* Add smooth transition effects */
}

/* Change border color on hover */
input:hover, select:hover {
  border-color: #007BFF; /* Change the border color to blue on hover */
}

/* Apply some additional styles for focus state */
input:focus, select:focus {
  border-color: #007BFF; /* Change the border color when focused */
  background-color: #fff; /* Change the background color when focused */
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow when focused */
}

/* body {
  background: linear-gradient(135deg, #FF5733, #FFD700, #00FF00, #007BFF, #8A2BE2);
  background-size: 400% 400%;
  animation: gradientAnimation 15s infinite alternate;
}

@keyframes gradientAnimation {
  0% {
    background-position: 0% 0%;
  }
  100% {
    background-position: 100% 100%;
  }
} */

/* nav ,section {
  background: radial-gradient(ellipse at center, #007BFF 0%, #00FF00 100%);
  background-size: cover;
  padding: 20px;  /*Add padding for spacing 
  text-align: center; /* Center-align text content 
  color: #fff; Text color
}

/* Style the navigation text 
nav h1 {
  font-size: 36px;
  font-weight: bold;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

nav p {
  font-size: 18px;
}

/* Add a border and rounded corners to the navigation 
nav {
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}


 */
    </style>
</head>

<body>

  <div class="click-closed"></div>

<?php
include('connection.php');
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

?>
 <br><br><br><br>
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">

      <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
       
      </button>   -->

     <?php
      if(isset($_SESSION['user']))
      {
echo "<h6> Hello  " .$_SESSION['user'] ."</h6>";
      }
?> 
      <a class="navbar-brand text-brand" href="index.php"><img src="logo2.png" alt="Rama Real Estate" width="200" height="100"></a>
      <!-- <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> -->
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">About</a>
          </li>
          <?php
          if($_SESSION['usertype']=="seller")
          {
            ?>
            <li class="nav-item">
            <a class="nav-link" href="add-property.php">Add Property</a>
          </li>
          <?php
          }
          else{?>
            <li class="nav-item">
            <a class="nav-link" href="property-grid.php">Property</a>
          </li>
          <?php
          }
          ?>

          
          
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <!-- <?php
          if($_SESSION['usertype']=="buyer")
          {?>
          <li class="nav-item">
            <a class="nav-link" href="wishlist.php">❤️</a>
          </li>
          <?php
          }?> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">My Profile</a>
              <a class="dropdown-item" href="update_password.php">Update Password</a>
              <a class="dropdown-item" href="appointment.php">Appointment</a>


              <?php
                 if($_SESSION['usertype']=="buyer")
               {?>
                 <a class="dropdown-item" href="myproperty.php">Wishlist❤️</a>
                <?php
              }
              else
                {
              ?>
                <a class="dropdown-item" href="myproperty.php">Your Property</a>
              <?php } ?>

              <!-- <a class="dropdown-item" href="wishlist.php">Property</a> -->
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
          
        </ul>
      </div>
      
    </div>
    
  </nav>
  
 