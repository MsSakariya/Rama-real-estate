<?php
include("connection.php")
?>  
 <?php
     $randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
?>  

<?php
if(isset($_POST['register']))
{

    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $user =$_POST["user"];
    $password = $_POST["password"];
     $cpassword = $_POST["cpassword"];


     function register($user,$email,$contact,$password,$cpassword,$con,$table)
     {

      

         // Store the user details in a database or perform any other necessary operations
         // For simplicity, we'll just print the user details here
        
         $sel=mysqli_query($con,"select * from $table");
         $row=mysqli_num_rows($sel);
        
         $insert=true;
     
                        if($password!=$cpassword)
                            {
                                $msg='Both Password are not same';
                                $insert=false;
                            }
\ while($result=mysqli_fetch_array($sel))
         {
            if($result['username']==$user)
            {
                $msg='Username already exist';
                $insert=false;
                break;
            }
             if($result['contact']==$contact)
             {
                 $msg='contact already exist';
                 $insert=false;
                 break;
             }
             if($result['email']==$email)
             {
                 $msg='Email already exist';
                 $insert=false;
                 break;
             }
            
         }
                if($insert)
                        {
                            $res=mysqli_query($con,"insert into $table(username,email,contact,password)values('$user','$email','$contact','$password')");
                            // header("location:login.php");
                            echo "<script>alert('Registration Successful!');</script>";

                        }
                        else{
                            echo"<script>";
                            echo"alert('$msg');";
                            echo"</script>";
                          }
     }

    

     if($user=="buyer")
     {

            register($name,$email,$contact,$password,$cpassword,$con,"buyer");
     }
     else{

        register($name,$email,$contact,$password,$cpassword,$con,"seller");
     }

 
    }

?>

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

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Register Form</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form  method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="emailInput" required oninput="validateEmail(this)">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="contact" class="form-label">Contact Num</label>
                      <input type="text" name="contact" class="form-control" id="contact" maxlength="10" minlength="10" required>
                      <div class="invalid-feedback">Please enter a valid Contact Number!</div>
                    </div>

                    <!-- <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                      <div class="invalid-feedback"> Re enter your password!</div>
                    </div>

                    <div class="col-12"></div>
                  <br>
                    <div class="col-12">
                    <label  class="form-label">Sign in AS: </label>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="user" value="selelr"checked >Seller
                        <input class="form-radio-input" type="radio" name="user" value="buyer" >Buyer
                      </div>
                    </div>
                    <div class="col-12"></div>
                  <br>
                 

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="register">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
