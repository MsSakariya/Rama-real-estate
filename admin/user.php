<?php
session_start();

if(empty($_SESSION['user']))
{
 header("location:login.php");
}
include('connection.php');
include('header.php');
 include('sidebar.php');

$table= $_GET['id'];

?>



  

  
  <main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo $table ?></h1>
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

     $query= "SELECT * from $table";
     $result=mysqli_query($con,$query);
     echo '<table class="table table-hover datatable " style="width: 200%;">
     <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                ';

     while($row=mysqli_fetch_row($result))
     {
        // echo         $row[0];
        // echo         $row[1]. "<br>";
       

                
                  echo"<tr>
                    <th scope='row'> $row[0]</th>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    
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