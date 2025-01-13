<?php
 session_start();
  //error_reporting(0);
include("connection.php");
if(empty($_SESSION['user']))
{
 header("location:login.php");
}

include('header.php');

if(isset($_POST['add']))

   {  
    $uid=$_SESSION['uid'];
    $query="SELECT password from buyer where bid=$uid";
    $result=mysqli_fetch_row(mysqli_query($con,$query));
    $cupassword = $_POST["pass"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

     
   if($result[0]==$cupassword)

    {
        if($password!=$cpassword)
        {
            $msg='Both Password are not same';
        }
        else
        {
            $uquery="UPDATE buyer set password='$password' where bid='$uid'";
            mysqli_query($con, $uquery);
            $msg="Password successfully update ";
        }
    }
    else
    {
        $msg="Current Password is not match";
    }
    echo"<script>alert('$msg')</script>";


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
						   
						   
   
			  <table>
			   <tr>
				 <td>Current Password</td> 
				   <td><input type="password" name="pass"   required></td>
			   </tr>
               <tr>
				 <td>New Password</td> 
				   <td><input type="password" name="password" required ></td>
			   </tr>
               <tr>
				 <td>Confirm Password</td> 
				   <td><input type="password" name="cpassword"   required></td>
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