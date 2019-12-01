<?php
   session_start();
   if(!isset($_SESSION['maint_emp_uId'])) {
    header('location: index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance.php");

    exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance</title>
</head>
<body>
    <h1>Welcome Maintenance</h1>
    <form action="include/logout_inc.php" method="post">
        <button type="submit" class="btn btn-success">Logout</button>
    </form>
</body>
</html>