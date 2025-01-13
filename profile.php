<?php
 session_start();
  //error_reporting(0);
include("connection.php");


   include('header.php');

    $uid=$_SESSION['uid'];
   $utype=$_SESSION['usertype'];
   if($utype=="buyer")
   {
    
   $query="SELECT * from buyer where bid=$uid";
   }
   else{
    $query="SELECT * from seller where sid=$uid";
   }
  // $result=mysqli_query($con,$query);
   $result=mysqli_fetch_assoc(mysqli_query($con,$query));

   if(isset($_POST['add']))
   {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
if($utype=="buyer")
{
    $uquery = "UPDATE buyer
    SET username = '$name', email = '$email', contact = '$contact'
    WHERE bid = $uid";
}
else
{
  $uquery = "UPDATE seller
    SET username = '$name', email = '$email', contact = '$contact'
    WHERE sid = $uid";
}
    mysqli_query($con,$uquery);
    if($utype=="buyer")
   {
   $query="SELECT * from buyer where bid=$uid";
   }
   else{
    $query="SELECT * from seller where sid=$uid";
   }
  // $result=mysqli_query($con,$query);
   $result=mysqli_fetch_array(mysqli_query($con,$query));
   }


 ?>
   <div class="full-row">
   <div class="container">
		   <div class="row">
			   <div class="col-lg-12">
				   <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
			   </div>
		   </div>
		   <div class="row p-5 bg-white">
			   <form method="post" enctype="multipart/form-data" style=" padding: 20px;" >
					   <div class="description">
						   <h5 class="text-secondary">Basic Information</h5><hr>
						   
						   
    <script>
        function validateEmail(input) 
        {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            const isValid = emailRegex.test(input.value);

            if (isValid) {
                input.setCustomValidity(''); // Clear any previous validation message
            } else {
                input.setCustomValidity('Please enter a valid email address.');
            }
        }
    </script>
			  <table>
			   <tr>
				 <td>Name</td> 
				   <td><input type="Text" name="name"  size="40" value=<?php echo $result['username'] ?> required></td>
			   </tr>
               <tr>
				 <td>Email</td> 
				   <td><input type="email" name="email" id="emailInput" size="40" value="<?php echo $result['email']; ?>" required oninput="validateEmail(this)"></td>
			   </tr>
               <tr>
				 <td>Contact</td> 
				   <td><input type="Text" name="contact"  size="40" minlength="10" maxlength="10" value=<?php echo $result['contact']; ?> required></td>
			   </tr>
               
            </table>
         
                    <input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">

			
				 


		   
			   </div>
		   </form>
		</div>            
   </div>
</div>

<?php
   include('footer.php');

  ?>