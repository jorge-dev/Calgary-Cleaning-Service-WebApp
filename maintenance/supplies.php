<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/supplies.php");

    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>supplies</title>
    <link href="StyleSheet1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="StyleSheet11.css" /> -->
    <link rel="stylesheet" type="text/css" href="custom3.css" />
</head>
<body class="createEmp">
<div class="bg-success pb-4 mt-5 mb-5"><h2 style="text-align:center; color : lightpink; font-size: 60px; ">Supplies</h2></div> 
    <div class="d-flex justify-content-center">
      <a href="supplies_search.php"> <button class="class=btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px;">Search Supplies</button></a>
      <a href="supplies_add.php"> <button class="class=btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px;">Add Supplies</button></a>
      <a href="supplies_delete.php"> <button class="class=btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px;">Delete Supplies</button></a>
      <a href="supplies_update.php"> <button class="class=btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px;">Update Supplies</button></a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="index.php">
        <button class="btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px;">BACK</button>
        </a>
    </div>

    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies.php");</script> 
</body>
</html>