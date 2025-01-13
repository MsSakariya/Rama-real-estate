<?php
include("connection.php");

include("header.php");
include("sidebar.php");



if(isset($_GET['add']))
{
 $state=ucfirst($_GET['state']);
 $city=ucfirst($_GET['city']);
 
 

 $squery="SELECT * from city where state='$state' and city='$city'";
 $result=mysqli_query($con,$squery);
 if(mysqli_num_rows($result)>0)
 {
  echo"<script> alert('City Alredy Exist $city')</script>";

 }
 else{
  $query="INSERT into city(state,city) values ('$state','$city')";
  if(mysqli_query($con,$query))
  {
   echo"<script> alert('Inserted successfully $city')</script>";
  }
 
 }
 


}
if(isset($_GET['addstate']))
{
 $state1=$_GET['state1'];
 $squery1="SELECT state from city where state='$state1' ";
 $result1=mysqli_query($con,$squery1);
 if(mysqli_num_rows($result1)>0)
 {
  echo"<script> alert('State Alredy Exist $state1')</script>";

 }
 else{
  $query1="INSERT into city(state) values ('$state1')";
  if(mysqli_query($con,$query1))
  {
   echo"<script> alert('Inserted successfully $state1')</script>";
  }
 
 }
 


}


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
        
 
        <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD STATE</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
               
                
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">State</label>
                  <input type="text" class="form-control" name="state1" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="addstate">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD CITY</h5>

              <!-- No Labels Form -->

             



              <form class="row g-3">
            
              <div class="col-md-4">
                
                  <select id="inputState" class="form-select" name="state" required>
                    <option selected value="">State</option>
                    <?php
                    $statequery = "SELECT DISTINCT state FROM city";
                    $resultstate = mysqli_query($con, $statequery);

                  while ($row = mysqli_fetch_row($resultstate)) {
                             echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    ?>

                    
                  </select>
                </div>
               
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City" name="city" required>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add">Submit</button>
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