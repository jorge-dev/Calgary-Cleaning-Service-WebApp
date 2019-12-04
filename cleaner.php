<?php
   session_start();
   if(!isset($_SESSION['cleaner_emp_uId'])) {
    header('location: index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("cleaner.php");

    exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cleaner</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <title>Create Employee</title>
</head>
<body class="createEmp">
    <div class="wrapper">
    <?php 
        require "include/db_connection_inc.php";
         $sql = "SELECT e.f_name from employee as e, cleaners as c WHERE e.SIN = '{$_SESSION['cleaner_emp_id']}';";
         $stmt= mysqli_stmt_init($connect);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
               header("Location: ../cleanerJobs.php?error=sqlerrorEmpSELECT");
               exit();
           }
           else {
             
             // mysqli_stmt_bind_param($stmt,"s",$cleanerSIN);
               mysqli_stmt_execute($stmt);
               
               $response = mysqli_stmt_get_result($stmt);
               $row = mysqli_fetch_assoc($response);
        }      
        ?>
      <?php echo '<h1>Welcome back '.$row['f_name'].' !</h>' ?> 
      <br><br>
      <div class="btn-group">
        <a href="./cleanerJobs.php"><button>View Jobs</button></a>
        
        <form action="include/logout_inc.php">
            <button type="submit" name="login_submit" id="login_button">
                Log Out
            </button>
        </form>
      </div>
    </div>
  </body>
</html>