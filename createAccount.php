<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="custom2.css" />
    <title>Create Account</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center login-container ">


        <form class="validate-form signup_form text-center">

            <h3 class=" text-uppercase">Sign Up</h3>
            <div class=" mt-3 form-row ">

                <div class="  wrap-input100 form-group ">

                    <label for="cust-type">Customer Type</label>
                    <select required class=" form-control input200" id="cust_type" >
                        <option value="">Select Customer type</option>
                        <option value="Residential">Residential</option>
                        <option value="Company">Commercial</option>
                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>

                </div>
            </div>
            <hr  class="cust_type_input"/>

            <div class="form-row cust_residential" style="display:none;">
                <div class=" wrap-input100  validate-input form-group col-md-4" data-validate="First name is required">
                    <label for="" class="mt-2">First Name</label>
                    <input class="input300 form-control" type="text" name="f_name" placeholder="First Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4" data-validate="Last Name is required">
                    <label for="" class="mt-2">Last Name</label>
                    <input class="input300 form-control " type="text" name="l_name" placeholder="Last Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 form-group form-group col-md-4">
                    <label for="" class="mt-2">Gender</label>
                    <select required class=" form-control input200" id="gender">
                        <option value="" hidden>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </span>

                </div>

            </div>
            <hr  class="cust_type_input cust_residential" style="display:none;"/>

            <div class="form-row cust_company" style="display:none;">
                <div class=" wrap-input100  validate-input form-group col-md-6" data-validate="Company Name is required" >
                    <label for="cust-type">Company Name</label>
                    <input class="input300 form-control " type="text" name="Company_name" placeholder="Company Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-6" data-validate="Rep# is required">
                    <label for="cust-type">Company Representative</label>
                    <input class=" input300 form-control " type="text" name="Comp_Rep_num" placeholder="Company Representative #">
                    <span class="focus-input100"></span>

                </div>

            </div>
            <hr  class="cust_company" style="display:none;"/>

            <div class="form-row ">
                <div class="wrap-input100 validate-input form-group " data-validate="Username is required">
                <label for="cust-type">Username</label>
                    <input class="input200 form-control" type="text" name="user_name" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-check" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group " data-validate="Valid email is required: ex@abc.xyz">
                <label for="cust-type">Email</label>
                    <input class="input200 form-control" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input form-group " data-validate="Password is required">
                <label for="cust-type">Password</label>
                    <input class="input200 form-control" type="password" name="pwd" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group" data-validate="Password is required">
                <label for="cust-type">Confirm password</label>
                    <input class="input200 form-control" type="password" name="pwd_Repeat" placeholder="Repeat Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

            </div>
            <hr  class="cust_type_input"/>

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group " data-validate="Address is required">
                <label for="cust-type">Address</label>
                    <input class="input300 form-control " type="text" name="address" placeholder="1234 Main St">
                    <span class="focus-input100"></span>
                </div>
                <div class=" wrap-input100 form-group ">
                <label for="cust-type">Secondary/Business Adrress</label>
                    <input class="input300 form-control " type="text" name="Building_address" placeholder="4321 Maple Blvd">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <hr  class="cust_type_input"/>

            <div class="form-row">
                <div class=" wrap-input100  validate-input form-group col-md-4" data-validate="City is required">
                <label for="cust-type">City</label>
                    <input class="input300 form-control " type="text" name="city" placeholder="Calgary">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input form-group col-md-4" data-validate="Postal Code is required">
                <label for="cust-type">Postal Code</label>
                    <input class=" input300 form-control " type="text" name="postal_code" placeholder="Postal Code">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 form-group col-md-4">
                <label for="cust-type">Province</label>
                    <select required class=" form-control input200" id="province">
                        <option hidden value="">Province</option>
                        <option value="AB">Alberta</option>
                        <option value="BC">British Columbia</option>
                        <option value="MB">Manitoba</option>
                        <option value="NB">New Brunswick</option>
                        <option value="NL">Newfoundland and Labrador</option>
                        <option value="NS">Nova Scotia</option>
                        <option value="ON">Ontario</option>
                        <option value="PE">Prince Edward Island</option>
                        <option value="QC">Quebec</option>
                        <option value="SK">Saskatchewan</option>
                        <option value="NT">Northwest Territories</option>
                        <option value="NU">Nunavut</option>
                        <option value="YT">Yukon</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fab fa-canadian-maple-leaf" aria-hidden="true"></i>
                    </span>

                </div>

            </div>
            <hr  class="cust_type_input"/>


            <button type="submit" id="login_button" class="btn mt-2 rounded-pill btn-md btn-custom btn-block text-uppercase">
                Create Account
            </button>






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

        // show the company or residential inputs depending on slected customer type
        $('#cust_type').on('change', function() {
        if ( $(this).val() === 'Company' ) {
          $('.cust_company').show();
          $("#gender").removeAttr("required");

        }
        else if( $(this).val() === 'Residential' ) {
          $('.cust_residential').show();
        }
        
      });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/main3.js"></script>



</body>

</html>