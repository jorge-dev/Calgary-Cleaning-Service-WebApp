<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="custom2.css" />
    <title>Calgary Cleaners</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center login-container ">


        <form action="include/login_inc.php" method="POST" class="validate-form login-form text-center">

            <div class=" js-tilt" data-tilt>
                <img src="images/logo.png" alt="IMG">
            </div>
            <h3 class=" text-uppercase">Welcome!</h3>
            <?php

            if (@$_GET['custSignup'] == 'success') {
                // header_remove();
                echo ' 
                <br/>
                <div class="alert bg-success mx-auto alert-dismissible fade show" role="alert">
                    <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Customer account created succesfully.</p>
                    <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
               </div>';
            }
            if (@$_GET['error'] == 'NeedtoLoginToseeAdminPage') {
                
                echo'<div class="  alert bg-danger mx-auto alert-dismissible fade show" role="alert"  ">
                    <p class=" font-weight-bold text-center alert-heading text-left" style ="width:340px;">Admin Log in is required!</p>
                    <button type="button"  class=" pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else if (@$_GET['error'] == 'NeedtoLoginToseeCustomerPage') {
                
                echo'<div class="  alert bg-danger mx-auto alert-dismissible fade show" role="alert"  ">
                    <p class=" font-weight-bold text-center alert-heading text-left" style ="width:340px;">Customer Log in is required!</p>
                    <button type="button"  class=" pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else if (@$_GET['error'] == 'NeedtoLoginToseeEmployeePage') {
                
                echo'<div class="  alert bg-danger mx-auto alert-dismissible fade show" role="alert"  ">
                    <p class=" font-weight-bold text-center alert-heading text-left" style ="width:340px;">Employee Log in is required!</p>
                    <button type="button"  class=" pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else {
                echo'';
            }

            // if (isset($_SESSION['admin_uId'])) {
            //     echo '<p>admin <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>admin loged out</p>';
            // }

            // if (isset($_SESSION['cust_uId'])) {
            //     echo '<p>customer <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>customer loged out</p>';
            // }

            // if (isset($_SESSION['other_emp_uId'])) {
            //     echo '<p>other employee <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>other employee loged out</p>';
            // }

            // if (isset($_SESSION['sales_emp_uId'])) {
            //     echo '<p>sales employee <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>sales employee loged out</p>';
            // }

            // if (isset($_SESSION['cleaner_emp_uId'])) {
            //     echo '<p>cleaner employee <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>cleaner employee loged out</p>';
            // }

            // if (isset($_SESSION['maint_emp_uId'])) {
            //     echo '<p>maintenance employee <span class="text-success">Logged In</span></p>';
            // } else {
            //     echo '<p>maintenance employee loged out</p>';
            // }


            ?>
            <p class=" mt-2 fill_text">Please login</p>

            <div class="wrap-input100  ">
                <label for="cust-type">User</label>
                <select required class=" form-control input100" name="user_type" id="usr_type" oninvalid="this.setCustomValidity('Please Select a User')" oninput="this.setCustomValidity('')">
                    <option value="">&nbsp;Select User
                    </option>
                    <option value="admin">&nbsp;Admin</option>
                    <option value="customer">&nbsp;Customer</option>
                    <option value="employee">&nbsp;Employee</option>

                </select>

                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>



            </div>
            <div class=" mt-2 wrap-input100 validate-input">
                <label for="cust-type">Email </label>
                <input class="input100 form-control" type="email" name="email_uid" placeholder="Email" id="cust_type" oninvalid="this.setCustomValidity('Valid email is required: ex@abc.com')" oninput="this.setCustomValidity('')" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input">
                <label for="cust-type">Password</label>
                <input required class="input100 form-control" type="password" name="pwd_login" placeholder="*********" id="cust_type" oninvalid="this.setCustomValidity('Password is required')" oninput="this.setCustomValidity('')">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>



            <button type="submit" name="login_submit" id="login_button" class="btn mt-4 mb-2  text-center btn-lg btn-custom btn-block text-uppercase">
                Log in
            </button>
            <p class=" fill_text mt-3 font-weight-normal create_account" style="display: none;">
                Don't have an account?
                <div class="text-center p-t-136 create_account" style="display: none;">
                    <a class="txt2" href="signUp.php">
                        Create your Account
                        <i class="fa fa-chevron-circle-right " aria-hidden="true"></i>
                    </a>
                </div>
            </p>
        </form>



    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        });

        $('#usr_type').on('change', function() {
            if ($(this).val() !== 'customer') {
                $('.create_account').hide();
            } else {

                $('.create_account').show();
            }

        });
        //if theres any weird bugs try commenting this line
        window.history.replaceState({}, document.title, "/" + "471-Project/index.php");
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>



</body>
<footer></footer>

</html>