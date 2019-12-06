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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <title>Supplies</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="supplies.php">
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
                    <a class="nav-link" href="supplies_add.php">
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
            <form action="maintenance.php" method="post">
                <button type="submit" class="btn btn-info mr-4">Go Back</button>
            </form>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">

                <?php
                $name = $_SESSION['maint_emp_name'];


                echo ' <h1 class="display-3 font-weight-bold">Ready to work ' . $name . '</h1>';

                if (@$_GET['update'] == 'success') {
                    // header_remove();
                    echo ' 
                            <br/>
                            <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                                <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Supplies was succesfully updated.</p>
                                <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                           </div>';
                }
                if (@$_GET['add'] == 'success') {
                    // header_remove();
                    echo ' 
                            <br/>
                            <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                                <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Supplies was succesfully updated.</p>
                                <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                           </div>';
                }
                if (@$_GET['delete'] == 'success') {
                    // header_remove();
                    echo ' 
                            <br/>
                            <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                                <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Supplies was succesfully deleted.</p>
                                <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                           </div>';
                }
                
                ?>

                <p>To make changes to any supplies or view a list of current stock, use navbar on the top</p>

            </div>
        </div>



    </main>


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
        window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies.php");
    </script>
</body>

</html>