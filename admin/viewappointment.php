<?php
session_start();
include("connection.php");
include("header.php");
include("sidebar.php");

?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Appointment</h1>
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
              <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">contact</th>
                <th scope="col">Date</th>
                <th scope="col">Comment</th>
                <th scope="col">Status</th>
                <th scope="col">Remark</th>

              </tr>
            </thead>
            <tbody>
                <?php
               
                  $query="SELECT * from appointment ";
                
                $result=mysqli_query($con,$query);
                $i=0;
                while ($rows = mysqli_fetch_assoc($result))
                {
                 echo' <tr>
                   <th scope="row">'.++$i.'</th>
                  <td>'.$rows["name"].'</td>
                  <td>'.$rows["email"].'</td>
                  <td>'.$rows["contact"].'</td>
                  <td>'.$rows["date"].'</td>
                  <td>'.$rows["comment"].'</td>';
                  echo' <td>'.$rows["status"].'</td>';
                  echo' <td>'.$rows["remark"].'</td>';

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