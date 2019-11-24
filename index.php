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


        <form action="include/login_inc.php" method="POST" class="validate-form login-form text-center">

            <div class=" js-tilt" data-tilt>
                <img src="images/logo.png" alt="IMG">
            </div>
            <h3 class=" text-uppercase">Welcome!</h3>
            <p class=" mt-2 fill_text">Please login</p>

            <div class="wrap-input100  ">
                <label for="cust-type">User</label>
                <select required class=" form-control input100" name="user_type" id="usr_type"
                    oninvalid="this.setCustomValidity('Please Select a User')" oninput="this.setCustomValidity('')">
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
                <label for="cust-type">Email / Username</label>
                <input class="input100 form-control" type="email" name="email_uid" placeholder="Email/Username"
                    id="cust_type" oninvalid="this.setCustomValidity('Valid email is required: ex@abc.com')"
                    oninput="this.setCustomValidity('')" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input">
                <label for="cust-type">Password</label>
                <input required class="input100 form-control" type="password" name="pwd_login" placeholder="*********"
                    id="cust_type" oninvalid="this.setCustomValidity('Password is required')"
                    oninput="this.setCustomValidity('')">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>



            <button type="submit" name="login_submit" id="login_button"
                class="btn mt-4  text-center btn-lg btn-custom btn-block text-uppercase">
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
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

        $('#usr_type').on('change', function () {
            if ($(this).val() !== 'customer') {
                $('.create_account').hide();
            } else {

                $('.create_account').show();
            }

        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>



</body>
<footer></footer>

</html>