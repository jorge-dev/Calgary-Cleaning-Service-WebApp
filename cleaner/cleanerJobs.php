<!-- If Not Logged in, exit -->
<?php
   session_start();
   if(!isset($_SESSION['cleaner_emp_uId'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("cleaner/cleanerJobs.php");

    exit;
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />

    <!---- =============================================================================== -->
    <title>Create Employee</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="cleaner.php">
            <h3>Cleaner</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-linkt text-success" href="cleanerJobs.php">
                        <h5>View Jobs</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>

            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>

        </div>
    </nav>
    <div class="text-center  container-fluid admin_tables">
        <?php
  require "../include/db_connection_inc.php";

// Create temporary table for residential customers  
$tempfname = "CREATE TEMPORARY TABLE tempfname
        SELECT c.ID, r.f_name FROM customers as c INNER JOIN residential as r ON c.ID = r.C_ID";
$stmt= mysqli_stmt_init($connect);
if (!mysqli_stmt_prepare($stmt,$tempfname)) {
  header("Location: cleanerJobs.php?error=sqlerrorEmpSELECT");
  exit();
}
mysqli_stmt_execute($stmt);

// Create temporary table for commercial customers
$tempcpname = "CREATE TEMPORARY TABLE tempcpname
        SELECT c.ID, cp.name FROM customers as c INNER JOIN company as cp ON c.ID = cp.C_ID";
if (!mysqli_stmt_prepare($stmt,$tempcpname)) {
  header("Location: cleanerJobs.php?error=sqlerrorEmpSELECT");
  exit();
}
mysqli_stmt_execute($stmt);

// Create temporary table to store all names 
$tempallname = "CREATE TEMPORARY TABLE tempallname 
                  (SELECT * FROM tempcpname) 
                  UNION 
                  (SELECT * FROM tempfname)";     
if (!mysqli_stmt_prepare($stmt,$tempallname)) {
  header("Location: cleanerJobs.php?error=sqlerrorEmpSELECT");
  exit();
}
mysqli_stmt_execute($stmt);

// Retrieve customer information 
$sql = "SELECT DISTINCT t.name, c.start_date, c.end_date, cu.street, cu.email, cu.phone_num, c.number 
        FROM contract as c, works_on as w, cleaners as cl, customers as cu, tempallname as t 
        WHERE ('{$_SESSION['cleaner_emp_id']}' = w.CL_SIN) AND w.Contr_num = c.number AND c.C_id  = cu.ID AND cu.ID = t.ID ";
  
  $stmt= mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: cleanerJobs.php?error=sqlerrorEmpSELECT");
      exit();
  }
  else {
    // mysqli_stmt_bind_param($stmt,"s",$cleanerSIN);
      mysqli_stmt_execute($stmt);
      
      $response = mysqli_stmt_get_result($stmt); ?>
        <?php if ($response !=NULL){?>
        <div class=" text-center  container-fluid admin_tables ">
            <table class="table table-lg table-hover table-striped table-bordered table-dark ">
                <tr class="bg-success">

                    <th colspan="7">Your Customers</th>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Customer Street</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Contract Number</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($response)){
                echo '<tr> 
                <td>'. $row['name'] .'</td> 
                <td>'. $row['start_date'] .'</td> 
                <td>'. $row['end_date'] .'</td>
                <td>'. $row['street'] .'</td>
                <td>'. $row['email'] .'</td>
                <td>'. $row['phone_num'] .'</td>
                <td>'. $row['number'] .'</td> 
                </tr>';
              } ?>
            </table>
        </div> <?php 
            } 
              else echo "\nNo Available Jobs!"; ?> <?php 
    }         
  
?>

    </div>
    <script>
    < script src = "../vendor/jquery/jquery-3.2.1.min.js" >
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0
    <script>
    window.history.replaceState({}, document.title, "/" + "471-Project/cleaner/cleaner.php" ); </script> </body>
        </html>