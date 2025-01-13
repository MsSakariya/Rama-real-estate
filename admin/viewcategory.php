<?php
session_start();
include('connection.php');
include('header.php');
 include('sidebar.php');
?>

  <main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo "CITY" ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">

        <?php

     $query= "SELECT * from category";
     $result=mysqli_query($con,$query);
     echo '<table class="table table-hover datatable " style="width: 200%;">
     <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Maincat</th>
                    <th scope="col">Subcat</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                ';

     while($row=mysqli_fetch_row($result))
     {
                    echo"<tr>
                    <th scope='row'> $row[0]</th>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td><a href='delete.php ? catid=$row[0]'>Delete</a></td>
                    </tr>";
        }
?>
                </tbody>

            </table>
        </div>
      </div>
    </div>
  </div>


    </section>

  </main>
  <!--/ Property Grid End /-->

 
  <?php
  include('footer.php');
  ?>