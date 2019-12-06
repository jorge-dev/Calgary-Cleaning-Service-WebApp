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
    <title>Cleaner</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />
    <link rel="stylesheet" type="text/css" href="custom3.css" />

    <!---- =============================================================================== -->
    <title>Create Employee</title>
</head>

<body class="createEmp">
    <div class="wrapper">
        <br>
        <h1>Your Jobs</h1>
        <br>
        <div class="btn-group">
            <form action="../include/logout_inc.php">
                <button type="submit" name="login_submit" id="login_button" class="btn mt-4 mb-2  ">
                    Log out
                </button>
            </form>
        </div>
    </div>
    <div class="wrapper">
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
        <div class="container">
            <table class="table table-hover table-striped table-dark">
                <tr>
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
    window.history.replaceState({}, document.title, "/" + "471-Project/cleaner/cleaner.php");
    </script>
</body>

</html>