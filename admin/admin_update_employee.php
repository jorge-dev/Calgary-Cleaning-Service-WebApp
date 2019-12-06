<?php
session_start();
if (!isset($_SESSION['admin_uId'])) {
    header('location: ../index.php?error=NeedtoLoginToseeAdminPage');
    include_once("admin/admin_update_employee.php");

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
    <link rel="stylesheet" href="adminStyles.css">
    <title>Update Employee</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="admin.php">Admin </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="create_employee.php">Create Employee <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Employees</a>
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
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modify Employee</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="admin_update_employee.php">Update</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_delete_employee.php">Delete</a>

                    </div>
                </li>
            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>

    <main>


        <div class="d-flex justify-content-center align-items-center ">

            <form name="myform" class="validate-form delete_emp_form text-center" method="POST">
                <h1 class="d-flex justify-content-center ">Search Employee </h1>

                <?php

                if (@$_GET['updated'] == 'success') {

                    echo ' 
            <br/>
            <div class="alert bg-success mx-auto alert-dismissible fade show" role="alert">
                <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Employee was succesfully updated.</p>
                <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
           </div>';
                }
                ?>
                <div class="form-row ">
                    <div class=" wrap-input100   form-group">
                        <label class=" font-weight-bold justify-content-center mt-2">Enter Employees SIN </label>
                        <input class="input300 form-control" type="text" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="up_sin" placeholder="999-999-999" oninvalid="this.setCustomValidity('Valid Sin Required: 000-000-000')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                    </div>

                </div>



                <button type="submit" id="emp_submit" name="search_emp_submit" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
                    Search
                </button>

            </form>
        </div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require '../include/db_connection_inc.php';
 
            $up_SIN = mysqli_real_escape_string($connect, $_POST['up_sin']);
            $sql = "SELECT * from employee where SIN=? ";

            $stmt = mysqli_stmt_init($connect);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: admin_update_employee.php?error=sqlErrorSelectEmp");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $up_SIN);
                mysqli_stmt_execute($stmt);

                $response = mysqli_stmt_get_result($stmt);


                if ($m = mysqli_fetch_assoc($response)) {
                    echo ' <div class=" text-center  container-fluid ">
                    <table class="table table-lg table-hover table-striped table-bordered table-dark " style="border-radius:10px;">
                    <tr class="bg-success">
                        <th colspan="12" style="font-size:1.8em;font-weight:bold;">Employee</th>
                    </tr>
                    <tr>
                     
                        <th scope="col">SIN</th>
                        <th scope="col">Job Type</th>
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

                    while ($row = mysqli_fetch_assoc($response)) {
                        $sin = $row['SIN'];
                        $j_type =$row['job_type'];
                        $username=$row["username"];
                        $email=$row["email"];
                        $first= $row["f_name"];
                        $last= $row["l_name"];
                        $address= $row["street"] ;
                        $city= $row["city"];
                        $postal_code= $row["postal_code"];
                        $phone=$row["phone_num"] ;
                        
                       
                        
                        
                        echo '
                      
                        <tr>
                            <td >' . $sin . '</td>
                            <td>' . $j_type . '</td>
                            <td>' . $username . '</td>
                            <td>' . $email . '</td>
                            <td>' . $first . '</td>
                            <td>' . $last . '</td>
                            <td>' . $row["gender"] . '</td>
                            <td>' . $address . '</td>
                            <td>' . $city . '</td>
                            <td>' . $postal_code . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $row["start_date"] . '</td>
                        </tr>';
                    }


                    echo '</table>   </div>';

                  


                    echo ' <div class="d-flex justify-content-center align-items-center " ">
                    

                    <form class=" create_emp_form text-center" action="../include/update_emp_inc.php" method="POST" style="margin-top:20px;">
        
                        <h2 class=" text-uppercase">Update Employee</h2>
                        <input type="hidden" name="emp_sin" value="'.$sin.'">
        
                    
                      
                      
                        <div class="form-row ">
                            <div class=" wrap-input100   form-group col-md-6">
                                <label for="" class="mt-2">First Name</label>
                                <input class="input300 form-control" type="text" name="emp_f_name" value="'.$first.'" placeholder="First Name" required oninvalid="this.setCustomValidity(&apos;First Name is Required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
        
        
                            <div class="wrap-input100   col-md-6" data-validate="Last Name is required">
                                <label for="" class="mt-2">Last Name</label>
                                <input class="input300 form-control " type="text" name="emp_l_name" value="'.$last.'" placeholder="Last Name" required oninvalid="this.setCustomValidity(&apos;Last Name is Required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
        
        
        
                        </div>
        
                        <hr class="" />

                      
                        <div class="form-row ">
                            <div class=" wrap-input100   form-group col-md-6 ">
                                <label for="cust-type">Phone Number (123-456-7890)</label>
                                <input class="input300 form-control " type="tel" name="emp_phone_num" value="'.$phone.'" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="587-451-6780" required oninvalid="this.setCustomValidity(&apos;Valid Phone Number is Required: 555-555-5555:&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
                            <div class=" wrap-input100   form-group col-md-6 ">
                                <label for="cust-type">Address</label>
                                <input class="input300 form-control " type="text" name="emp_address" value="'.$address.'"placeholder="1234 Main St" required oninvalid="this.setCustomValidity(&apos;Address is required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
        
        
                        </div>
        
        
                        <div class="form-row">
                            <div class=" wrap-input100   form-group col-md-6">
                                <label for="cust-type">City</label>
                                <input class="input300 form-control " type="text" name="emp_city" value="'.$city.'" placeholder="Calgary" required oninvalid="this.setCustomValidity(&apos;City is required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
        
                            <div class="wrap-input100  form-group col-md-6">
                                <label for="cust-type">Postal Code (Format: A1A1A1)</label>
                                <input class=" input300 form-control " type="text" name="emp_postal_code" value="'.$postal_code.'"  pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" placeholder="T3K6Y7" required oninvalid="this.setCustomValidity(&apos;Valid Postal Code is Required: A0A0A0&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                                <span class="focus-input100"></span>
                            </div>
        
        
                        </div>
                        <hr class="" />
        
        
        
                        <button type="submit" id="update_emp_submit" name="update_emp_submit" class="btn mt-4  btn-md btn-custom btn-block text-uppercase">
                            Update Employee
                        </button>
        
        
                    </form>
        
                </div>
    
        
        ';

                    exit();
                } else {

                    echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                          <tr class="bg-danger">
                              <th colspan="11">There is no Employee with that SIN in database</th>
                          </tr>
                  </table></div>';

                    exit();
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
        }
        ?>

       


    </main>

    <!-- <footer class="container">
        <p>&copy; Company 2017-2018</p>
        </footer> -->

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

    <script>
        $('.dropdown-toggle').dropdown();
        window.history.replaceState({}, document.title, "/" + "471-Project/admin/admin_update_employee.php");
    </script>


</body>

</html>