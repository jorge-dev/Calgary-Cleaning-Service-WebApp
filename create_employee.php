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
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="custom2.css" />
    <title>Create Employee</title>
</head>

<body class="createEmp" >

    <div class="d-flex justify-content-center align-items-center ">


        <form class="validate-form create_emp_form text-center" action="include/create_emp_inc.php" method="POST" >

            <h3 class=" text-uppercase">Create Employee</h3>
            <div class=" mt-3 form-row ">

                <div class="  wrap-input100 form-group ">

                    <label for="cust-type">Employee User Type</label>
                    <select required class=" form-control input200" id="emp_user_type" name="emp_user_type" oninvalid="this.setCustomValidity('Please Select an Employee Type')" oninput="this.setCustomValidity('')" autofocus>
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
                    <select required class=" form-control input200" id="emp_job_type"  name="emp_job_type" required oninvalid="this.setCustomValidity('Please Select a Jobtype')" oninput="this.setCustomValidity('')">
                        <option value="">Select Job type</option>
                        <option class="job" value="employee">Employee</option>
                        <option id="emp_job_adm" value="admin">Admin/IT</option>
                        <option class="job" value="cleaner">Cleaner</option>
                        <option class="job" value="sales">Sales Associate</option>
                        <option class="job" value="maintenance">Maintenance</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </span>

                </div>
                <div class=" wrap-input100  validate-input form-group" data-validate="Start Date is required">
                    <label for="" class="mt-2">Start Date <span class="span_format"> &nbsp;&nbsp;(YYYY-MM-DD)</span>    </label>
                    <input class="input300 form-control" type="text" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="emp_start_date" placeholder="YYYY-DD-MM" required oninvalid="this.setCustomValidity('Valid Start Date is Required: YYYY-MM-DD')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

            </div>
            <hr class="cust_type_input" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group col-md-6" >
                    <label for="" class="mt-2">SIN </label>
                    <input class="input300 form-control" type="text" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="emp_sin" placeholder="999-999-999" oninvalid="this.setCustomValidity('Valid Sin Required: 000-000-000')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>
                

                <!-- <div class="wrap-input100  validate-input col-md-4" data-validate="Id is required">
                    <label for="" class="mt-2">Employee ID</label>
                    <input class="input300 form-control " type="number" min="1" max='32700' name="emp_id" placeholder="Value from 0-32700">
                    <span class="focus-input100"></span>
                </div> -->

                <div class="wrap-input100 form-group form-group col-md-6">
                    <label for="" class="mt-2">Gender</label>
                    <select required class=" form-control input200" name="emp_gender" oninvalid="this.setCustomValidity('Please Select a Gender')" oninput="this.setCustomValidity('')">
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
                <div class=" wrap-input100  validate-input form-group">
                    <label for="" class="mt-2">Date Of Birth<span class="span_format"> &nbsp;&nbsp;(YYYY-MM-DD)</span> </label>
                    <input class="input300 form-control" type="text" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="emp_birthDate" placeholder="YYYY-DD-MM" required oninvalid="this.setCustomValidity('Valid Date Of Birth is Required: YYYY-MM-DD')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

            </div>
            <hr class="" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group col-md-4" >
                    <label for="" class="mt-2">First Name</label>
                    <input class="input300 form-control" type="text" name="emp_f_name" placeholder="First Name" required oninvalid="this.setCustomValidity('First Name is Required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4">
                    <label for="" class="mt-2">Middle Name</label>
                    <input class="input300 form-control " type="text" name="emp_middle_name" placeholder="Optional" >
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4" data-validate="Last Name is required">
                    <label for="" class="mt-2">Last Name</label>
                    <input class="input300 form-control " type="text" name="emp_l_name" placeholder="Last Name" required oninvalid="this.setCustomValidity('Last Name is Required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>



            </div>

            <hr class="" />

            <div class="form-row ">
                <div class="wrap-input100 validate-input form-group " >
                    <label for="cust-type">Username</label>
                    <input class="input200 form-control" type="text" pattern="[a-zA-Z][a-zA-Z0-9-_]{1,20}" name="emp_username" placeholder="Username" required oninvalid="this.setCustomValidity('Valid Username is Required: User1_E')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-check" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group " >
                    <label for="cust-type">Email</label>
                    <input class="input200 form-control" type="text" name="emp_email" placeholder="Email" required oninvalid="this.setCustomValidity('Valid email is required: ex@abc.com')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input form-group " >
                    <label for="cust-type">Password</label>
                    <input class="input200 form-control" type="password" id="emp_pwd" name="emp_pwd" placeholder="*********" required oninvalid="this.setCustomValidity('Password is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group" >
                    <label for="cust-type">Confirm password</label>
                    <input class="input200 form-control" type="password" id="emp_confirm_pwd" name="emp_pwd_Repeat" placeholder="*********" required oninvalid="this.setCustomValidity('Please Confirm Password')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

            </div>
            <hr class="" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group " >
                    <label for="cust-type">Phone Number (Format: 123-456-7890)</label>
                    <input class="input300 form-control " type="tel" name="emp_phone_num" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="587-451-6780" required oninvalid="this.setCustomValidity('Valid Phone Number is Required: 555-555-5555:')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>
                <div class=" wrap-input100  validate-input form-group  " >
                    <label for="cust-type">Address</label>
                    <input class="input300 form-control " type="text" name="emp_address" placeholder="1234 Main St" required oninvalid="this.setCustomValidity('Address is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>


            </div>


            <div class="form-row">
                <div class=" wrap-input100  validate-input form-group col-md-6" >
                    <label for="cust-type">City</label>
                    <input class="input300 form-control " type="text" name="emp_city" placeholder="Calgary" required oninvalid="this.setCustomValidity('City is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input form-group col-md-6">
                    <label for="cust-type">Postal Code (Format: A1A1A1)</label>
                    <input class=" input300 form-control " type="text" name="emp_postal_code" pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" placeholder="T3K6Y7" required oninvalid="this.setCustomValidity('Valid Postal Code is Required: A0A0A0')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>


            </div>
            <hr class="" />



            <button type="submit" id="emp_submit" name="create_emp_submit" class="btn mt-4  btn-md btn-custom btn-block text-uppercase">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script> -->
    <script>
      
      $('#emp_user_type').on('change', function() {
            if ($(this).val() === 'admin') {
                 $('#emp_job_adm').attr('selected','true');
            
                 $('.job').attr("disabled","disabled");
               
            }
            else if ($(this).val() === 'employee') {
                 $('#emp_job_adm').attr('disabled','disabled');
            
                 $('.job').removeAttr("disabled");
               
            }
            else{
                $('#emp_job_adm').removeAttr('selected');
                $('.job').removeAttr("disabled","disabled");
            }
      });




        $("#emp_submit").click(function () {
            var pwd = $("#emp_pwd").val();
            var confirm_pwd = $("#emp_confirm_pwd").val();
            if (pwd != confirm_pwd && (confirm_pwd != '')) {
                $.alert({
                    title: 'Passwords dont match!',
                     content: 'Please try again!',
                     type:'purple',
                     theme: 'modern',
                     icon: 'fa fa-warning',
                     animationBounce:2.5,
                   
                    
                });
                
                return false;
            }
            return true;
        });
    </script>



</body>

</html>