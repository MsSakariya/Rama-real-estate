<?php
include("connection.php");

include("header.php");
include("sidebar.php");



if(isset($_GET['add']))
{
 $category=ucfirst($_GET['category']);
 
 

 $squery="SELECT * from category where  subcat='$category'";
 $result=mysqli_query($con,$squery);
 if(mysqli_num_rows($result)>0)
 {
  echo"<script> alert('Category Alredy Exist $category')</script>";

 }
 else{
  $query="INSERT into category(maincat,subcat) values ('Resident','$category')";
  if(mysqli_query($con,$query))
  {
   echo"<script> alert('Inserted successfully $category')</script>";
  }
 
 }
 


}
                                                    // if(isset($_GET['maincat']))
                                                    // {
                                                    //  $state1=$_GET['state1'];
                                                    //  $squery1="SELECT state from city where state='$state1' ";
                                                    //  $result1=mysqli_query($con,$squery1);
                                                    //  if(mysqli_num_rows($result1)>0)
                                                    //  {
                                                    //   echo"<script> alert('State Alredy Exist $state1')</script>";

                                                    //  }
                                                    //  else{
                                                    //   $query1="INSERT into city(state) values ('$state1')";
                                                    //   if(mysqli_query($con,$query1))
                                                    //   {
                                                    //    echo"<script> alert('Inserted successfully $state1')</script>";
                                                    //   }
                                                    
                                                    //  }
                                                    // }


?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        
                                                                                                          <!-- ADD MAIN Category -->
                                                                          <!-- <div class="col-lg-6">
                                                                            <div class="card">
                                                                              <div class="card-body">
                                                                                <h5 class="card-title">ADD Main Category</h5>

                                                                                
                                                                                <form class="row g-3">
                                                                                
                                                                                  
                                                                                  <div class="col-md-6">
                                                                                    <label for="inputCity" class="form-label">State</label>
                                                                                    <input type="text" class="form-control" name="state1">
                                                                                  </div>
                                                                                  <div class="text-center">
                                                                                    <button type="submit" class="btn btn-primary" name="addstate">Submit</button>
                                                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                                                  </div>
                                                                                </form>

                                                                              </div>
                                                                            </div> -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD Category</h5>

              <!-- No Labels Form -->

             



              <form class="row g-3">
            
              <div class="col-md-4">
                
                  <!-- <select id="inputState" class="form-select" name="state" required>
                    <option selected value="">State</option>
                    <?php
                    $maincategory = "SELECT DISTINCT maincat FROM category";
                    $resultcategory = mysqli_query($con, $maincategory);

                  while ($row = mysqli_fetch_row($resultcategory)) {
                             echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    ?>

                     -->
                  </select>
                </div>
               
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Category" name="category" required>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div>

          
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include("footer.php");
  ?>