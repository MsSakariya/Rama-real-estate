<?php
 session_start();
  //error_reporting(0);
include("connection.php");
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

	$query=mysqli_query($con,"SELECT pid FROM property_basicinfo ORDER BY pid DESC LIMIT 1");
	$result=mysqli_fetch_row($query);
    $folder="Admin";
	// $folder=$_SESSION['user'];
	$sfolder=$result[0]+1;
	

	function file_upload($folder,$sfol,$con,$pid) 
     {
		
		$file_name1 =array($_FILES['img1']['name'],$_FILES['img2']['name'],$_FILES['img3']['name'],$_FILES['img4']['name']);
		$file_tmp1 =array($_FILES['img1']['tmp_name'],$_FILES['img2']['tmp_name'],$_FILES['img3']['tmp_name'],$_FILES['img4']['tmp_name']);
	
		 if(!is_dir("property_image/$folder") )
			{
				mkdir("property_image/$folder");
			}

		  if(!is_dir("property_image/$folder/$sfol") )
				{
					mkdir("property_image/$folder/$sfol");
				}


		   $path ="property_image/$folder/$sfol/";
		   $upload=array(move_uploaded_file($file_tmp1[0],$path.$file_name1[0]),move_uploaded_file($file_tmp1[1],$path.$file_name1[1]),move_uploaded_file($file_tmp1[2],$path.$file_name1[2]),move_uploaded_file($file_tmp1[3],$path.$file_name1[3]));
		
		if($upload)
		 {
			$query = mysqli_query($con,"insert into property_img(pid,image1,image2,image3,image4) values ($pid,'admin/property_image/$folder/$sfol/$file_name1[0]','admin/property_image/$folder/$sfol/$file_name1[1]','admin/property_image/$folder/$sfol/$file_name1[2]','admin/property_image/$folder/$sfol/$file_name1[3]')");
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
	
}
	
?>

<?php
include("header.php");
include("sidebar.php");
?>

 <main id="main" class="main">
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
				   <td><input type="Text" name="title" placeholder=" Enetr title" size="40" required></td>
			   </tr>

			   <tr>
				 <td> Type </td>
				 <td>
				 <select name="ptype" style="width:210px;"  onchange="toggleInputField(this.value)">
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
			 <td><select name="sell_type">
			   <option value="new">New</option>
			   <option value="resell">Resell</option>
			 </select></td>

			 <td>Furnished</td>
			 <td><select name="furnished">
			   <option value="yes">Yes</option>
			   <option value="no">No</option>
			 </select></td>
			   </tr> 




			   <tr >
			   <td>Bedroom</td>
				 <td><input type="text" name="bed"  placeholder="Enter Bedroom" ></td>
			   <td>Bathroom</td>
				 <td><input type="text" name="bath"  placeholder="Enter Bathroom" ></td>
			   </tr>

			   <tr >
			   <td>Established Year</td>
				 <td><input type="number" name="year" min="1950" max="2023" placeholder=" Year" value="2022"></td>
				 </tr>

			   </table>

			 <h5 class="text-secondary">Price & Location</h5><hr>

			 <table>
				<tr>
				 <td> <label>Floor</label></td>
				 <td><input type="text" name="floor" placeholder="Enter Floor" ></td>
			   </tr>
			   
			   <tr><td>Price</td><td><input type="text" name="price" placeholder="Enter Price" ></td>
			   <td>Area</td><td><input type="text" name="area" placeholder="Enter Total Square Foot" ></td></tr>

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
			   <td>Location </td><td><input type="text" name="location" placeholder="Enter Location" ></td>
			   <td>Address</td><td><textarea rows="2" cols="30" name="address" placeholder="Enter Address"></textarea></td></tr>
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
		  
					 <input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">
			   </div>
		   </form>
		</div>            
   </div>
</div>

  </main>
  <?php
  include("footer.php");
  ?>
