<?php
 session_start();
 include("connection.php");

 $uid=$_GET['uid'];
 $pid=$_GET['pid'];
 
 $query=" 

 SELECT property_basicinfo.*, property_prc_loc.*
 FROM property_basicinfo 
 JOIN property_prc_loc  ON property_basicinfo.pid = property_prc_loc.pid
 WHERE property_basicinfo.pid = $pid";
 
 $result=mysqli_query($con,$query);
$er=mysqli_fetch_assoc($result);

mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');
function file_upload($folder,$sfol,$con,$pid) 
     {
		
		$file_name1 =array($_FILES['img1']['name'],$_FILES['img2']['name'],$_FILES['img3']['name'],$_FILES['img4']['name']);
		$file_tmp1 =array($_FILES['img1']['tmp_name'],$_FILES['img2']['tmp_name'],$_FILES['img3']['tmp_name'],$_FILES['img4']['tmp_name']);
	
		 
		   $path ="admin/property_image/$folder/$sfol/";
		   $upload = array(
			move_uploaded_file($file_tmp1[0], $path . $file_name1[0]),
			move_uploaded_file($file_tmp1[1], $path . $file_name1[1]),
			move_uploaded_file($file_tmp1[2], $path . $file_name1[2]),
			move_uploaded_file($file_tmp1[3], $path . $file_name1[3])
		);
				
		if($upload)
		 {
			$query = mysqli_query($con, "INSERT INTO property_img (pid, image1, image2, image3, image4) VALUES ($pid, '$path$file_name1[0]', '$path$file_name1[1]', '$path$file_name1[2]', '$path$file_name1[3]')");

			
		 }
			
	 }


	 if(isset($_POST['edit']))
    {
		$title=$_POST['title'];
    	$uid=$_SESSION['uid'];
		$ptype=$_POST['ptype'];
		//$bhk=$_POST['bhk'];
		//$flatfloor=$_POST['flatfloor'];
    	$beds=$_POST['bed'];
		$baths=$_POST['bath'];
		$floor=$_POST['floor'];
		$sell_type=$_POST['sell_type'];
		$year=$_POST['year'];
	
		$area=$_POST['area'];
		$price=$_POST['price'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$location=$_POST['location'];
		$address=$_POST['address'];


	    $furnished=$_POST['furnished'];
	    
		$uquery="UPDATE property_basicinfo SET title='$title' , ptype='$ptype' , furnished='$furnished',beds='$beds',baths='$baths',floor='$floor',sell_type='$sell_type',esta_year='$year' WHERE pid='$pid' ";
		
		
		

    	  if(mysqli_query($con,$uquery))
			{
				$uquery2="UPDATE property_prc_loc SET area='$area',price='$price',state='$state',city='$city',location='$location',address='$address' WHERE pid ='$pid'  ";
				  if(mysqli_query($con,$uquery2))
				 	{
				// 		if($_FILES['img1'])
				// 				{
				// 					file_upload($folder,$sfolder,$con,$pid);
				// 					echo"<script>alert('Success fully inserted')</script>";

				// 				}
							 					echo"<script>alert('Successfully Updated ')</script>";

				 	}
			}
			
			
			mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');

}
	
?>

<!-- ==================================== -->
  <?php
   include('header.php');
 ?>
   <div class="full-row">
   <div class="container">
		   <div class="row">
			   <div class="col-lg-12">
				   <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
			   </div>
		   </div>
		   <div class="row p-5 bg-white">
			   <form method="post"  enctype="multipart/form-data" style=" padding: 20px;" >
					   <div class="description">
						   <h5 class="text-secondary">Basic Information</h5><hr>
						   
						   
		
			  <table>
			   <tr>
				 <td>Title</td> 
				   <td><input type="Text" name="title" placeholder=" Enetr title" size="40" value="<?php echo $er['title'];  ?> "required></td>
			   </tr>

			   <tr>
				 <td> Type </td>
				 <td>
				   <select name="ptype" style="width:210px;"  onchange="toggleInputField(this.value)">
					   <option>Select Type</option>
                       <option value="Villa" <?php if($er['ptype']=="Villa") {?> selected <?php } ?>>Villa</option>
					   <option value="Appartment" <?php if($er['ptype']=="Appartment") {echo 
                             "selected='selected'";} ?>>Apartment</option>
					   <option value="Bunglow" <?php if($er['ptype']=="Bunglow") {echo 
                             "selected='selected'"; } ?>>Bungalow</option>
					   <option value="Mansion" <?php if($er['ptype']=="Mansion") {?> selected <?php } ?>>Mansion</option>
					   
				   </select>
				   </td>

				   <td id="floor" hidden>Floor</td>
				   <td><input type='text' name='flatfloor' id='flatfloorInput' placeholder='Enter Flat Floor' hidden></td>

				
				
			 <td id="lbhk" hidden>BHK</td>
			 <td>
			   <select name="bhk" style="width: 210px;" id="bhk"  hidden="true">
			   <option value="1BHK">1BHK</option>
			   <option value="2BHK">2BHK</option>
			   <option value="3BHK">3BHK</option>
			   <option value="4BHK">4BHK</option>
			   <option value="5BHK">5BHK</option>
			   </select>
			 </td>
			   </tr>

			 <tr>
			  <td>Sell Type</td>
			 <td><select name="sell_type">
			   <option value="new" <?php if($er['sell_type']=="new") {?> selected <?php } ?>>New</option>
			   <option value="resell" <?php if($er['sell_type']=="resell") {?> selected <?php } ?>>Resell</option>
			 </select></td>

			 <td>Furnished</td>
			 <td><select name="furnished">
				<option value="">-</option>
			   <option value="yes" <?php if($er['furnished']=="yes") {?> selected <?php } ?>>Yes</option>
			   <option value="no" <?php if($er['furnished']=="no") {?> selected <?php } ?>>No</option>
			 </select></td>
			   </tr> 




			   <tr >
			   <td>Bedroom</td>
				 <td><input type="text" name="bed" value="<?php echo $er['beds'];  ?> " placeholder="Enter Bedroom" ></td>
			   <td>Bathroom</td>
				 <td><input type="text" name="bath" value="<?php echo $er['baths'];  ?> " placeholder="Enter Bathroom" ></td>
			   </tr>

			   <tr >
			   <td>Established Year</td>
				 <td><input type="number" name="year" min="1950" max="2023" placeholder="Year" value="<?php echo $er['esta_year'];  ?>"></td>
				 </tr>

			   </table>

			 <h5 class="text-secondary">Price & Location</h5><hr>

			 <table>
				<tr>
				 <td> <label>Floor</label></td>
				 <td><input type="text" name="floor" placeholder="Enter Floor" value="<?php echo $er['floor'];  ?> "></td>
			   </tr>
			   
			   <tr><td>Price</td><td><input type="text" name="price" placeholder="Enter Price" value="<?php echo $er['price'];  ?> "></td>
			   <td>Area</td><td><input type="text" name="area" placeholder="Enter Total Square Foot" value="<?php echo $er['area'];  ?> " ></td></tr>

			   <tr>
			   <td>State </td><td><input type="text" name="state" placeholder="Enter State" value="<?php echo $er['state'];  ?> "></td>

			   <td>City</td><td><input type="text" name="city" placeholder="Enter City" value="<?php echo $er['city'];  ?> "></td></tr>

			   <tr>
			   <td>Location </td><td><input type="text" name="location" placeholder="Enter Location" value="<?php echo $er['location'];  ?> "></td>
			   <td>Address</td><td><textarea rows="2" cols="30" name="address" placeholder="Enter Address" ><?php echo $er['address'];  ?></textarea></td></tr>
		   </table>


		   <h5 class="text-secondary">Image & Status</h5><hr>
			 <table>

			   <tr>
				   <td>Image1</td>
				   <td><input type="file" name="img1"></td>
				   <td>Image2</td>
				   <td><input type="file" name="img2" ></td>
			   </tr>

			   <tr>
			   <td>Image3</td>
				   <td><input type="file" name="img3" ></td>
				   <td>Image4</td>
				   <td><input type="file" name="img4"></t</tr>


			   <tr>
			   <td>Floor Plan Image
				   </td>
				   <td><input type="file" name="floor_plan_img"></td>
			   </tr>
			 </table>
		  
					 <input type="submit" value="Update" class="btn btn-primary" name="edit" style="margin-left:200px;">
			   </div>
		   </form>
		</div>            
   </div>
</div>
<script>

</script>
<?php
   include('footer.php');

  ?>

