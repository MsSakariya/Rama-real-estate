<?php
session_start();
include("connection.php");
include("header.php");
include("sidebar.php");

?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Contact Us</h1>
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
              <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">Message</th>
                

              </tr>
            </thead>
            <tbody>
                <?php
               
                  $query="SELECT * from contact ";
                
                $result=mysqli_query($con,$query);
           
                while ($rows = mysqli_fetch_assoc($result))
                {
                  echo' <tr>
                  <td>'.$rows["id"].'</td>
                  <td>'.$rows["name"].'</td>
                  <td>'.$rows["email"].'</td>
                  <td>'.$rows["subject"].'</td>
                  <td>'.$rows["message"].'</td>';
                  
                  echo '</tr>';
                }
                ?>
              
             
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->



    <?php
include("footer.php");
?>