<?php
session_start();
include("connection.php");
include("header.php");
$ano=$_GET['a_no'];
   
if(isset($_GET['submit']))
{
  $ano=$_GET['ano'];

  $status=$_GET['status'];
  $remark=$_GET['remark'];

  $query = "UPDATE appointment SET status='$status', remark='$remark' WHERE appointment_no='$ano'";

  if(mysqli_query($con,$query))
  {
    echo "<script>alert('Successfully Updated $ano');
      window.location.href = 'appointment.php';
      </script>";

  }
  else{
    echo"<script>alert('Not Update')</script>";

  }
}

?>
<br><br><br><br><br><br><br>
<main id="main" class="main">
<form method="GET" action="">

<div class="pagetitle">
  <h1>Appoinment</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <!-- <h5 class="card-title">Appointment</h5> -->

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">contact</th>
                <th scope="col">Appointment No.</th>

                <th scope="col">Date</th>
                <th scope="col">Comment</th>
                <th scope="col">Remark</th>

                <th scope="col">Status</th>
               
              </tr>
            </thead>
            <tbody>
                <?php
                $uid=$_SESSION['uid'];
                
                  $query="SELECT * from appointment where appointment_no='$ano' ";
                
                $result=mysqli_query($con,$query);
                $rows = mysqli_fetch_assoc($result);
                
                 echo' <tr>
                  <td>'.$rows["name"].'</td>
                  <td>'.$rows["email"].'</td>
                  <td>'.$rows["contact"].'</td>
                  <td>'.$rows["appointment_no"].'</td>

                  <td>'.$rows["date"].'</td>
                  <td>'.$rows["comment"].'</td>


           
                    <td><textarea row=5 cols=5 name="remark"></textarea></td>
                    <td><select name="status">
                    <option value="">Pending</option>
                    <option value="accept">Accept</option>
                    <option value="reject">Reject</option>
                    </select></td>
                    <td><input name="ano" value='.$ano.' hidden></td>

                    <td><input type="submit" name="submit"></td>';

                    
                     
                     


                echo '</tr>';
                
                ?>
              
             
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
</form>
</main><!-- End #main -->

<?php
include("footer.php");
?>






