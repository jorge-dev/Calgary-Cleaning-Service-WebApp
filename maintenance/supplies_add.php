<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/supplies_add.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang=" en">
<head>

     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Supplies add</title>
    <link href="StyleSheet1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="StyleSheet11.css" /> -->
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body class="createEmp">
    <div class="bg-success pb-4 mb-5"><h2 style="text-align:center; color : lightpink; font-size: 60px;"> Add Supplies</h2></div> 

    <form style="text-align:center;" action="../include/supplies_add.db.php" method="POST">

        <div class="form-group">
        <input style="text-align:center; font-size:35px; color:black;"  type="text" name="name" placeholder=" name for supplies" />
        </div>

        <div class="form-group">
        <input style="text-align:center; font-size:35px; color:black;"  type="text" name="qty" placeholder=" quantities for supplies" />
        </div>

        <div class="form-group">
        <input style="text-align:center; font-size:35px; color:black;"  type="text" name="in_stock" placeholder=" in stock for supplies " />
        </div>

        <div class="form-group">
        <input style="text-align:center; font-size:35px; color:black;"  type="text" name="ordered_date" placeholder=" YYYY-MM-DD" />
        </div>

        <div class="form-group">
        <input style="text-align:center; font-size:35px; color:black;"  type="text" name="D_num" placeholder=" D_num for supplies" />
        </div>

        <button class= "btn btn-custom mt-4 mb-2 mr-4 " type="submit" name="submit" style="font-size:25px;">ADD</button>


    </form>
    <br>
    <div style="text-align: center; font-size:25px; font-display:inherit; color:black;">
        <a href="supplies.php">
            <button class = "btn btn-custom mt-4 mb-2 mr-4 " style="font-size:30px;">BACK</button>
        </a>
    </div>

    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies_add.php");</script> 
</body>

</html>