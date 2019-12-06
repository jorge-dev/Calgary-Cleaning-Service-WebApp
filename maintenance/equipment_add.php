<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/equipment_add.php");

    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Equipment add</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="equipment.php".php">
            <h3>Equipment</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link" href="equipment_search.php"><h5>View Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link text-success" href="equipment_add.php"><h5>Add Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_update.php"><h5> Update Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_delete.php"><h5>  Delete Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>

    
    <div class="d-flex justify-content-center align-items-center ">
        <form action=" ../include/euipment_add.db.php" class="create_emp_form  bg-dark pr-3 pl-4 pb-4 pt-4 pb-4 text-center" method="POST">
            <h1 class="d-flex justify-content-center mb-3 ">Add Equipment</h1>
            <div class="form-group">
                <label for="" class="mt-2">Description</label>
                <input class="input300 form-control" type=" text" name="description" placeholder="Description " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Name</label>
                <input class="input300 form-control" type=" text" name="name" placeholder="Name " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Status</label>
                <input class="input300 form-control" type=" text" name="status" placeholder="Status " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Department</label>
                <input class="input300 form-control" type=" text" name="D_num" placeholder=" Department Number " />
            </div>
            <button type="submit" id="emp_submit" name="add_eq" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
                Add
            </button>
        </form>

        <br>
        <br>
       
    </div>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    
        <script >
            window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/equipment_add.php");
    </script>
</body>

</html>