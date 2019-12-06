<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/supplies_add.php");

    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Supplies add</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="supplies.php" .php">
            <h3>Supplies</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="supplies_search.php">
                        <h5>View Supplies</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-success" href="supplies_add.php">
                        <h5>Add Supplies</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="supplies_update.php">
                        <h5> Update Supplies</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="supplies_delete.php">
                        <h5> Delete Supplies</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>


    <div class="d-flex justify-content-center align-items-center ">
        <form action=" ../include/supplies_add.db.php" class="create_emp_form  bg-dark pr-3 pl-4 pb-4 pt-4 pb-4 text-center" method="POST">
            <h1 class="d-flex justify-content-center mb-3 ">Add Supplies</h1>
            <div class="form-group">
                <label for="" class="mt-2">Name</label>
                <input class="input300 form-control" required type=" text" name="name" placeholder="Name " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Quantity</label>
                <input class="input300 form-control" type=" required text" name="qty" placeholder="Quantity " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">In Stock</label>
                <input class="input300 form-control" required type=" text" pattern="[0,1]" name="stock" placeholder="Only 0 or 1 " />
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Ordered Date<span class="span_format"> &nbsp;&nbsp;(YYYY-MM-DD)</span>
                </label>
                <input class="input300 form-control" type="text" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="o_date" placeholder="YYYY-DD-MM" required oninvalid="this.setCustomValidity('Valid Date is Required: YYYY-MM-DD')" oninput="this.setCustomValidity('')">
                
            </div>
            <div class="form-group">
                    <label for="" class="mt-2">Departmet</label>
                    <input class="input300 form-control" required type=" text" pattern="\d*" name="dep" placeholder="Deparment Number " />
                </div>
            <button type="submit" id="emp_submit" name="add_sup" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
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

    <script>
        window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies_add.php");
    </script>
</body>

</html>