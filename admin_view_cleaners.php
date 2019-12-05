<?php
session_start();
if (!isset($_SESSION['admin_uId'])) {
    header('location: index.php?error=NeedtoLoginToseeAdminPage');
    include_once("admin_view_cleaners.php");

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
    <link rel="stylesheet" href="adminStyles.css">
    <title>Admin Page</title>
</head>

<body>


    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="admin.php">Admin </a>
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
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Modify Employee</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="admin_update_employee.php">Update</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_delete_employee.php">Delete</a>

                    </div>
                </li>
            </ul>
            <form action="include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>


    <main>

        <?php
        require 'include/db_connection_inc.php';
        $jtype = "cleaner";
        $sql = "SELECT * from employee where job_type=? ";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?error=sqlErrorSelectEmp");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $jtype);
            mysqli_stmt_execute($stmt);

            $response = mysqli_stmt_get_result($stmt); 
           
           
                if ($m = mysqli_fetch_assoc($response) ) { 
               echo' <div class=" text-center  container-fluid ">
                    <table class="table table-lg table-hover table-striped table-bordered table-dark admin_tables ">
                    <tr class="bg-success">
                        <th colspan="11" style="font-size:1.8em;font-weight:bold;">Cleaner Employees</th>
                    </tr>
                    <tr>
                        <th scope="col">SIN</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Start Date</th>
                       
                    </tr>';
                    mysqli_free_result($response);
                    mysqli_stmt_execute($stmt);

                    $response = mysqli_stmt_get_result($stmt); 
                   
            while($row = mysqli_fetch_assoc($response)){
                       echo '<tr>
                            <td>'.$row["SIN"].'</td>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["f_name"].'</td>
                            <td>'.$row["l_name"].'</td>
                            <td>'.$row["gender"].'</td>
                            <td>'.$row["street"].'</td>
                            <td>'.$row["city"].'</td>
                            <td>'.$row["postal_code"].'</td>
                            <td>'.$row["phone_num"].'</td>
                            <td>'.$row["start_date"].'</td>
                        </tr>';
                   }  
                
                     
                    echo '</table>   </div>';

        
              } else { 
                
                echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                          <tr class="bg-danger">
                              <th colspan="11">There are no Admins in database</th>
                          </tr>
                  </table></div>';
                    
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
            ?>




    </main>




    <!-- <footer class=" container">
            <p>&copy; Company 2017-2018</p>
            </footer> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
</body>

</html>