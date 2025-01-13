<?php
 session_start();
  //error_reporting(0);
include("connection.php");
if(empty($_SESSION['user']))
{
 header("location:login.php");
}
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');
      

	$query=mysqli_query($con,"SELECT pid FROM property_basicinfo ORDER BY pid DESC LIMIT 1");
	$result=mysqli_fetch_row($query);
	$folder=$_SESSION['user'];
	$sfolder=$result[0]+1;
	

	function file_upload($folder,$sfol,$con,$pid) 
     {
		
		$file_nam =array($_FILES['img1']['name'],$_FILES['img2']['name'],$_FILES['img3']['name'],$_FILES['img4']['name']);
		$file_tmp1 =array($_FILES['img1']['tmp_name'],$_FILES['img2']['tmp_name'],$_FILES['img3']['tmp_name'],$_FILES['img4']['tmp_name']);
		$file_name1 =array(preg_replace('/\s+/', '', $_FILES['img1']['name']),
							preg_replace('/\s+/', '', $_FILES['img2']['name']),
							preg_replace('/\s+/', '', $_FILES['img3']['name']),
							preg_replace('/\s+/', '', $_FILES['img4']['name']));
							
		 if(!is_dir("admin/property_image/$folder") )
			{
				mkdir("admin/property_image/$folder");
			}

		  if(!is_dir("admin/property_image/$folder/$sfol") )
				{
					mkdir("admin/property_image/$folder/$sfol");
				}


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


	 if(isset($_POST['add']))
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
	    $iquery="INSERT into property_basicinfo(sid,title,ptype,furnished,beds,baths,floor,sell_type,esta_year) values($uid,'$title','$ptype','$furnished','$beds','$baths','$floor','$sell_type','$year')";
	    $squery="SELECT pid from property_basicinfo  ORDER BY pid DESC LIMIT 1";
		
		$select1=mysqli_query($con,$squery);
		$sresult=mysqli_fetch_row($select1);
		$pid=$sresult[0]+1;

		

    	  if(mysqli_query($con,$iquery))
			{
				$iquery2="INSERT into property_prc_loc(pid,area,price,state,city,location,address) values($pid,$area,$price,'$state','$city','$location','$address')";
				
				 if(mysqli_query($con,$iquery2))
					{
						if($_FILES['img1'])
								{
									file_upload($folder,$sfolder,$con,$pid);
									echo"<script>alert('Success fully inserted')</script>";

								}
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
			   <form method="post" action="add-property.php" enctype="multipart/form-data" style=" padding: 20px;" >
					   <div class="description">
						   <h5 class="text-secondary">Basic Information</h5><hr>
						   
						   
		
			  <table>
			   <tr>
				 <td>Title</td> 
				   <td><input type="Text" name="title" placeholder=" Enetr title" size="40" required></td>
			   </tr>

			   <tr>
				 <td> Type </td>
				 <td>
				   <select name="ptype"   onchange="toggleInputField(this.value)">
					   <option>Select Type</option>
					   <?php
                    
						 
							// $category = mysqli_real_escape_string($con, $_GET['state']);
							$categoryquery = "SELECT subcat FROM category ";
							$resultcategory = mysqli_query($con, $categoryquery);

                  while ($row1 = mysqli_fetch_row($resultcategory)) {
                             echo "<option value='$row1[0]'>$row1[0]</option>";
                    }
				
                    ?>
 <!-- <option value="Office">Office</option> -->
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
			 <td><select name="sell_type" required>
			   <option value="new">New</option>
			   <option value="resell">Resell</option>
			 </select></td>

			 <td>Furnished</td>
			 <td><select name="furnished" required>
			   <option value="yes">Yes</option>
			   <option value="no">No</option>
			 </select></td>
			   </tr> 




			   <tr >
			   <td>Bedroom</td>
				 <td><input type="text" name="bed"  placeholder="Enter Bedroom" required></td>
			   <td>Bathroom</td>
				 <td><input type="text" name="bath"  placeholder="Enter Bathroom" required></td>
			   </tr>

			   <tr >
			   <td>Established Year</td>
				 <td><input type="number" name="year" min="1950" max="2023" placeholder=" Year" value="2022" required></td>
				 </tr>

			   </table>

			 <h5 class="text-secondary">Price & Location</h5><hr>

			 <table>
				<tr>
				 <td> <label>Floor</label></td>
				 <td><input type="text" name="floor" placeholder="Enter Floor" required></td>
			   </tr>
			   
			   <tr><td>Price</td><td><input type="text" name="price" placeholder="Enter Price" required></td>
			   <td>Area</td><td><input type="text" name="area" placeholder="Enter Total Square Foot" required></td></tr>

			   <tr>
			   <td>State</td>
				<td>
			   <select  name="state" required>
                    <option selected value="">State</option>
                    <?php
                    $statequery = "SELECT DISTINCT state FROM city";
                    $resultstate = mysqli_query($con, $statequery);

                  while ($row = mysqli_fetch_row($resultstate)) {
                             echo "<option value='$row[0]'>$row[0]</option>";
                    }
					echo'  </select></td>
					<td>City</td><td><select  name="city" required>
						 <option selected value="">City</option>';
                    
						 
							$state = mysqli_real_escape_string($con, $_GET['state']);
							$cityquery = "SELECT DISTINCT city FROM city ";
							$resultcity = mysqli_query($con, $cityquery);

                  while ($row1 = mysqli_fetch_row($resultcity)) {
                             echo "<option value='$row1[0]'>$row1[0]</option>";
                    }
				
                    ?>

                    
                  </select></td></tr>

			   <tr>
			   <td>Location </td><td><input type="text" name="location" placeholder="Enter Location" required></td>
			   <td>Address</td><td><textarea rows="2" cols="30" name="address" placeholder="Enter Address" required></textarea></td></tr>
		   </table>


		   <h5 class="text-secondary">Image & Status</h5><hr>
			 <table>

			   <tr>
				   <td>Image1</td>
				   <td><input type="file" name="img1" required></td>
				   <td>Image2</td>
				   <td><input type="file" name="img2" required></td>
			   </tr>

			   <tr>
			   <td>Image3</td>
				   <td><input type="file" name="img3" required></td>
				   <td>Image4</td>
				   <td><input type="file" name="img4" required></t</tr>


			   <tr>
			   <td>Floor Plan Image
				   </td>
				   <td><input type="file" name="floor_plan_img"></td>
			   </tr>
			 </table>
		  
					 <input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">
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

 


























  
  <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>


  <script>
  function toggleInputField(selectedValue) {

    var flatFloorInput = document.getElementById('flatfloorInput');
	var bhk = document.getElementById('bhk');
	var lbhk = document.getElementById('lbhk');
	var floor = document.getElementById('floor');


    if (!(selectedValue === "Flat")) {
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
</script> -->

  
<!-- <div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Enter City">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Enter State">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Total Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Select Floor</option>
															<option value="1 Floor">1 Floor</option>
															<option value="2 Floor">2 Floor</option>
															<option value="3 Floor">3 Floor</option>
															<option value="4 Floor">4 Floor</option>
															<option value="5 Floor">5 Floor</option>
															<option value="6 Floor">6 Floor</option>
															<option value="7 Floor">7 Floor</option>
															<option value="8 Floor">8 Floor</option>
															<option value="9 Floor">9 Floor</option>
															<option value="10 Floor">10 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
													</div>
												</div>
												
											</div>
										</div>
 -->

                    
										<!-- <div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												-feature area start- -->
												<!-- <div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Appartment</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Temple  : </span>Yes</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Alivator : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
														</ul>
													</div> -->
												<!-- -feature area end--
											</textarea>
											</div>
										</div> -->
												
										<!-- <h5 class="text-secondary">Image & Status</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div> -->