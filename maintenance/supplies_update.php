<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/supplies_update.php");

    exit;
}
?>


<!DOCTYPE html>
<html lang=" en">
<head>

     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Supplies update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="StyleSheet11.css" /> -->
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body class="createEmp">
<div class="bg-success pb-4 mt-5 mb-5"><h2 style="text-align:center; color : lightpink; font-size: 60px; ">Update Supplies</h2></div>

    <form style="text-align:center;" action="includes/supplies_update.db.php" method="POST">
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="SID" placeholder=" ID for supplies" />
        </div>
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="name" placeholder=" update name for supplies" />
        </div>
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="qty" placeholder=" update quantities for supplies" />
        </div>
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="in_stock" placeholder=" update in stock for supplies " />
        </div>
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="ordered_date" placeholder=" update YYYY-MM-DD" />
        </div>
        <div class="form-group">
        <input style="text-align:center; font-size:35px;" type="text" name="D_num" placeholder=" update D_num for supplies" />
        </div>
        <button class = "btn btn-custom mt-4 mb-2 mr-4 " type=" submit" name="submit" style="font-size:30px;">UPDATE</button>



    </form>
    <div style="text-align: center; font-size:50px; font-display:inherit; color:black;">
        <a href="supplies.php">
            <button class = "btn btn-custom mt-4 mb-2 mr-4 " style="font-size:30px;">BACK</button>
        </a>
    </div>

    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies_update.php");</script> 
</body>

</html>