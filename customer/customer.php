<?php
session_start();
if (!isset($_SESSION['cust_id'])) {
    header('location: index.php?error=NeedtoLoginToseeAdminPage');
    include_once("customer/customer.php");

    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="customerStyles.css">
    <title>Admin Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="customer.php">Customer </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="create_employee.php">Create Employee <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">View Employees</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="admin_view_cleaners.php">Cleaner</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_view_maintains.php">Maintenance</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_view_admins.php">Admin</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_view_sales.php">Sales</a>

                    </div>
                </li>
               
            </ul>
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
                require '../include/db_connection_inc.php';
                $sql = "SELECT DISTINCT name, f_name from company as c, residential as r where (c.C_ID =? or r.C_ID!=?) and (c.C_ID !=? or r.C_ID=?);" ;
                $id= $_SESSION['cust_id'];
                $type =$_SESSION['cust_type'];
                
                $stmt= mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: customer?error=sqlErrorSelectEmp");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt,"ii",$id,$id);
                    mysqli_stmt_execute($stmt);
                
                    $response = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($response)){
                        $first= $row['f_name'];
                        $name= $row['name'];
                        if($type = "Company")
                            echo ' <h1 class="display-3 font-weight-bold">Welcome Back '.$name.'</h1>';
                        else
                            echo ' <h1 class="display-3 font-weight-bold">Welcome Back '.$first.'</h1>';
                    }
                    else {
                        header("Location: customer.php?error=adminWasDeleted");
                    exit();
                    }
                }
            ?>
               
                <p>To make changes to any account or view a list of current employees, use navbar on the top</p>

            </div>
        </div>

        

        

    </main>

 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>

    <script>  window.history.replaceState({}, document.title, "/" + "471-Project/customer/customer.php");</script>
</body>

</html>