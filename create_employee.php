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
    <title>Create Employee</title>
</head>

<body class="createEmp" >

    <div class="d-flex justify-content-center align-items-center ">


        <form class="validate-form create_emp_form text-center">

            <h3 class=" text-uppercase">Enter Information</h3>
            <div class=" mt-3 form-row ">

                <div class="  wrap-input100 form-group ">

                    <label for="cust-type">Employee User Type</label>
                    <select required class=" form-control input200" id="emp_type">
                        <option value="">Select User type</option>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </span>

                </div>

                <div class="  wrap-input100 form-group ">

                    <label for="cust-type">JobType</label>
                    <select required class=" form-control input200" id="emp_job_type">
                        <option value="">Select Job type</option>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin/IT</option>
                        <option value="cleaner">Cleaner</option>
                        <option value="sales">Sales Associate</option>
                        <option value="maintenance">Maintenance</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </span>

                </div>
                <div class=" wrap-input100  validate-input form-group" data-validate="Start Date is required">
                    <label for="" class="mt-2">Start Date (YYYY/DD/MM)</label>
                    <input class="input300 form-control" type="text" pattern="(?:19|20)[0-9]{2}/(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" name="emp_start_date" placeholder="YYYY/DD/MM">
                    <span class="focus-input100"></span>
                </div>

            </div>
            <hr class="cust_type_input" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group col-md-4" data-validate="SIN is required">
                    <label for="" class="mt-2">SIN </label>
                    <input class="input300 form-control" type="text" require pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="emp_sin" placeholder="999-999-999">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4" data-validate="Id is required">
                    <label for="" class="mt-2">Employee ID</label>
                    <input class="input300 form-control " type="number" min="1" max='32700' name="emp_id" placeholder="Value from 0-32700">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 form-group form-group col-md-4">
                    <label for="" class="mt-2">Gender</label>
                    <select required class=" form-control input200" id="emp_gender">
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
            <hr class="" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group col-md-4" data-validate="First name is required">
                    <label for="" class="mt-2">First Name</label>
                    <input class="input300 form-control" type="text" name="emp_f_name" placeholder="First Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4">
                    <label for="" class="mt-2">Middle Name</label>
                    <input class="input300 form-control " type="text" name="emp_middle_name" placeholder="Optional">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4" data-validate="Last Name is required">
                    <label for="" class="mt-2">Last Name</label>
                    <input class="input300 form-control " type="text" name="emp_l_name" placeholder="Last Name">
                    <span class="focus-input100"></span>
                </div>



            </div>
            <div class='form-row'>
                <div class=" wrap-input100  validate-input form-group" data-validate="Date of Birth is required">
                    <label for="" class="mt-2">Date Of Birth (YYYY/DD/MM)</label>
                    <input class="input300 form-control" type="text" pattern="(?:19|20)[0-9]{2}/(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" name="emp_birthDate" placeholder="YYYY/DD/MM">
                    <span class="focus-input100"></span>
                </div>
            </div>

            <hr class="" />

            <div class="form-row ">
                <div class="wrap-input100 validate-input form-group " data-validate="Username is required">
                    <label for="cust-type">Username</label>
                    <input class="input200 form-control" type="text" name="emp_user_name" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-check" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group " data-validate="Valid email is required: ex@abc.xyz">
                    <label for="cust-type">Email</label>
                    <input class="input200 form-control" type="text" name="emp_email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input form-group " data-validate="Password is required">
                    <label for="cust-type">Password</label>
                    <input class="input200 form-control" type="password" name="emp_pwd" placeholder="*********">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group" data-validate="Password is required">
                    <label for="cust-type">Confirm password</label>
                    <input class="input200 form-control" type="password" name="emp_pwd_Repeat" placeholder="*********">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

            </div>
            <hr class="" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group " data-validate="Phone is required">
                    <label for="cust-type">Phone Number (Format: 123-456-7890)</label>
                    <input class="input300 form-control " type="tel" name="emp_phone_num" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="587-451-6780">
                    <span class="focus-input100"></span>
                </div>
                <div class=" wrap-input100  validate-input form-group  " data-validate="Address is required">
                    <label for="cust-type">Address</label>
                    <input class="input300 form-control " type="text" name="emp_address" placeholder="1234 Main St">
                    <span class="focus-input100"></span>
                </div>


            </div>


            <div class="form-row">
                <div class=" wrap-input100  validate-input form-group col-md-6" data-validate="City is required">
                    <label for="cust-type">City</label>
                    <input class="input300 form-control " type="text" name="city" placeholder="Calgary">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input form-group col-md-6" data-validate="Postal Code is required">
                    <label for="cust-type">Postal Code (Format: A1A1A1)</label>
                    <input class=" input300 form-control " type="text" name="postal_code" pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" placeholder="T3K6Y7">
                    <span class="focus-input100"></span>
                </div>


            </div>
            <hr class="" />



            <button type="submit" id="create_emp_button" class="btn mt-4  btn-md btn-custom btn-block text-uppercase">
                Create Employee
            </button>
            <div class=" mt-4 text-center p-t-136">
                <a class="txt2" href="index.php">
                    Go Back
                </a>
            </div>




    </div>







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
    <!-- <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

        // show the company or residential inputs depending on slected customer type
        $('#cust_type').on('change', function() {
            if ($(this).val() === 'Company') {
                $('.cust_company').show();
                $('.cust_residential').hide();
                $("#gender").removeAttr("required");

            } else if ($(this).val() === 'Residential') {
                $('.cust_residential').show();
                $('.cust_company').hide();
                //   $("#gender").removeAttr("required");
                $("#gender").attr("required", "required")
            }

        });
    </script> -->
    <!--===============================================================================================-->
    <!-- <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/main3.js"></script> -->



</body>

</html>