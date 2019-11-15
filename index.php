<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="custom2.css" />
    <title>Calgary Cleaners</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center login-container ">
       

        <form class="validate-form login-form text-center">
            <div class=" js-tilt" data-tilt>
                <img src="images/logo.png" alt="IMG">
            </div>
            <h3 class=" text-uppercase">Welcome!</h3>
            <p class=" mt-2 fill_text">Please login</p>

            <div class=" mt-2 wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <label for="cust-type">Email/Username</label>
                <input class="input100 form-control" type="text" name="email" placeholder="Email/Username">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
            <label for="cust-type">Password</label>
                <input class="input100 form-control" type="password" name="pass" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100  ">
            <label for="cust-type">User</label>
                <select required class=" form-control input100" id="selector">
                    <option value="">Select User</option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                    <option value="Employee">Employee</option>

                </select>

                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>



            </div>
           
            <button type="submit" id="login_button" class="btn mt-4  text-center btn-lg btn-custom btn-block text-uppercase">
                Log in
            </button>
            <p class=" fill_text mt-3 font-weight-normal">
                Don't have an account?
                <div class="text-center p-t-136">
                    <a class="txt2" href="createAccount.php">
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
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>



</body>

</html>