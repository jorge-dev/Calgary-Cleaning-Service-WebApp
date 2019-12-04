<?php
   session_start();
   if(!isset($_SESSION['cleaner_emp_uId'])) {
    header('location: index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("cleanerJobs.php");

    exit;
   }
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cleaner</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"
    />
    <link rel="stylesheet" type="text/css" href="custom3.css" />

    <!---- =============================================================================== -->
    <!-- Code Begins Here -->
    <title>Create Employee</title>
  </head>
  <body class="createEmp">
    <!-- <div class="wrapper">
      <h1>Welcome Cleaner</h>
      <br><br>
      <div class="btn-group">
        <a href="./cleanerJobs.html"><button>View Jobs</button></a>
        <button>Logout</button>  
      </div>
    </div> -->
      <br>
      <br>
      <div class="btn-group">
      <form action="include/logout_inc.php">
        <button type="submit" name="login_submit" id="login_button" class="btn mt-4 mb-2  ">
                Log out
            </button>
    </form>
    </div>

 <?php
  require "include/db_connection_inc.php";
  // Retrieve Database info for current cleaner
  echo $_SESSION['cleaner_emp_id'];
  
  //$sql = "SELECT w.hours from works_on where ($_SESSION[cleaner_emp_id] = w.CL_SIN)";
  $sql = "SELECT c.number, cu.street FROM contract as c, works_on as w, cleaners as cl, customers as cu WHERE ('{$_SESSION['cleaner_emp_id']}' = w.CL_SIN) AND w.Contr_num = c.number AND c.C_id  = cu.ID";
  //$sql = "SELECT DISTINCT c.number FROM contract as c, works_on as w, cleaners as cl WHERE ($_SESSION[cleaner_emp_id] = w.CL_SIN) AND w.Contr_num = c.number";
  //$sql="Select * from employee where f_name = '$_SESSION[\"cleaner_emp_id\"]";
  // $sql="Select * from employee where f_name IS NOT NULL";
  $stmt= mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../cleanerJobs.php?error=sqlerrorEmpSELECT");
      exit();
  }
  else {
    
    // mysqli_stmt_bind_param($stmt,"s",$cleanerSIN);
      mysqli_stmt_execute($stmt);
      
      $response = mysqli_stmt_get_result($stmt);?>
      <?php if ($row = mysqli_fetch_assoc($response)){?>    
          <div class="container">  
            <table class="table table-hover table-striped table-dark">
                <tr>
                  <th colspan="5">Your Customers</th>
                </tr> 
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>SIN</th>
                  <th>email</th>
                  <th>user_type</th>
                </tr> 
              <?php while($row = mysqli_fetch_assoc($response)){
              
                echo '<tr> 
                <td>'. $row['number'] .'</td> 
                <td>'. $row['street'] .'</td> 
                <td>'. $row['SIN'] .'</td>
                <td>'. $row['email'] .'</td>
                <td>'. $row['user_type'] .'</td>
                </tr>';
              } ?> 
            </table> </div> <?php 
            }
              else  echo "No Available Jobs!"; ?> <?php 
    }
     
  
?> 
    
    
    
  </body>
</html>
