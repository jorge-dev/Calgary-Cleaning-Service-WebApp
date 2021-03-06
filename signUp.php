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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link rel="stylesheet" type="text/css" href="custom2.css" />
    <title>Sign Up</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center  ">


        <form class="validate-form signup_form text-center" action="include/signup_inc.php" method="POST">

            <h3 class=" text-uppercase">Sign Up</h3>
            <div class=" mt-3 form-row ">

                <div class="  wrap-input100 form-group ">

                    <label for="cust-type">Customer Type</label>
                    <select required class=" form-control input200" id="cust_type" name="cust_type" oninvalid="this.setCustomValidity('Please Select a Type')" oninput="this.setCustomValidity('')" autofocus>
                        <option value="">&nbsp;&nbsp;Select Customer type</option>
                        <option value="Residential">&nbsp;&nbsp;Residential</option>
                        <option value="Company">&nbsp;&nbsp;Commercial</option>
                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>

                </div>
            </div>
            <hr class="cust_type_input" />

            <div class="form-row cust_residential" style="display:none;">
                <div class=" wrap-input100  validate-input form-group col-md-4">
                    <label for="" class="mt-2">First Name</label>
                    <input class="input300 form-control resi" required type="text" name="f_name" placeholder="First Name" id="cust_type" oninvalid="this.setCustomValidity('First name is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-4">
                    <label for="" class="mt-2">Last Name</label>
                    <input class="input300 form-control resi" required type="text" name="l_name" placeholder="Last Name" id="cust_type" oninvalid="this.setCustomValidity('Last Name is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 form-group form-group col-md-4">
                    <label for="" class="mt-2">Gender</label>
                    <select required class=" form-control input200" id="gender" name="gender" oninvalid="this.setCustomValidity('Please Select a Gender')" oninput="this.setCustomValidity('')">
                        <option value="" hidden>&nbsp;Select Gender</option>
                        <option value="Male">&nbsp;Male</option>
                        <option value="Female">&nbsp;Female</option>
                        <option value="Other">&nbsp;Other</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </span>

                </div>

            </div>
            <hr class="cust_type_input cust_residential" style="display:none;" />

            <div class="form-row cust_company" style="display:none;">
                <div class=" wrap-input100  validate-input form-group col-md-6">
                    <label for="cust-type">Company Name</label>
                    <input class="input300 form-control comp" required type="text" name="company_name" placeholder="Company Name" oninvalid="this.setCustomValidity('Company Name is Required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100  validate-input col-md-6">
                    <label for="cust-type">Company Representative #</label>
                    <input class=" input300 form-control comp" required type="text" name="comp_Rep_num" maxlength="14" pattern="\d*" placeholder="Company Representative #" oninvalid="this.setCustomValidity('Company Rep# is required! Integers Only')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>

                </div>

            </div>
            <hr class="cust_company" style="display:none;" />

            <div class="form-row ">
                <div class="wrap-input100 validate-input form-group ">
                    <label for="cust-type">Username <span class="span_format">&nbsp;&nbsp;(Format: only letters, numbers and/or symbols "_ and ." are allowed!)</span></label>
                    <input class="input200 form-control" required type="text" name="username" placeholder="Username" pattern="[a-zA-Z][a-zA-Z0-9-_.]{1,20}" oninvalid="this.setCustomValidity('Valid Username is Required: User1_E')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-check" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group ">
                    <label for="cust-type">Email</label>
                    <input class="input200 form-control" type="text" name="email" placeholder="Email" oninvalid="this.setCustomValidity('Valid email is required: ex@abc.com')" oninput="this.setCustomValidity('')" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input form-group ">
                    <label for="cust-type">Password</label>
                    <input class="input200 form-control" required type="password" id ="pwd" name="pwd" placeholder="*********" oninvalid="this.setCustomValidity('Password is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group ">
                    <label for="cust-type">Confirm Password</label>
                    <input class="input200 form-control" required type="password" id ="confirm_pwd" name="pwd_Repeat" placeholder="*********" oninvalid="this.setCustomValidity('Confirm Password is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

            </div>
            <hr class="cust_type_input" />

            <div class="form-row ">
                <div class=" wrap-input100  validate-input form-group ">
                    <label for="cust-type">Phone Number <span class="span_format">&nbsp;&nbsp;(Format: 123-456-7890)</span></label>
                    <input class="input300 form-control " type="tel" name="phone_num" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="587-451-6780" oninvalid="this.setCustomValidity('Valid Phone Number is Required: 555-555-5555:')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>
                <div class=" wrap-input100  validate-input form-group ">
                    <label for="cust-type">Address</label>
                    <input class="input300 form-control " type="text" name="address" placeholder="1234 Main St" required oninvalid="this.setCustomValidity('Address is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>
                <!-- <div class=" wrap-input100 form-group ">
                    <label for="cust-type">Secondary/Business Address</label>
                    <input class="input300 form-control " type="text" name="Building_address" placeholder="4321 Maple Blvd">
                    <span class="focus-input100"></span>
                </div> -->
            </div>
            <hr class="cust_type_input" />

            <div class="form-row">
                <div class=" wrap-input100  validate-input form-group col-md-4">
                    <label for="cust-type">City</label>
                    <input class="input300 form-control " type="text" name="city" placeholder="Calgary" required oninvalid="this.setCustomValidity('City is required')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input form-group col-md-4">
                    <label for="cust-type">Postal Code</label>
                    <input class=" input300 form-control " type="text" name="postal_code" placeholder="T3k6R2" required oninvalid="this.setCustomValidity('Valid Postal Code is Required: A0A0A0')" oninput="this.setCustomValidity('')">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 form-group col-md-4">
                    <label for="cust-type">Province</label>
                    <select required class=" form-control input200" id="province" name="province" pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" oninvalid="this.setCustomValidity('Please Select a Province/Territory')" oninput="this.setCustomValidity('')">
                        <option hidden value="">&nbsp;Province</option>
                        <option value="AB">&nbsp;Alberta</option>
                        <option value="BC">&nbsp;British Columbia</option>
                        <option value="MB">&nbsp;Manitoba</option>
                        <option value="NB">&nbsp;New Brunswick</option>
                        <option value="NL">&nbsp;Newfoundland and Labrador</option>
                        <option value="NS">&nbsp;Nova Scotia</option>
                        <option value="ON">&nbsp;Ontario</option>
                        <option value="PE">&nbsp;Prince Edward Island</option>
                        <option value="QC">&nbsp;Quebec</option>
                        <option value="SK">&nbsp;Saskatchewan</option>
                        <option value="NT">&nbsp;Northwest Territories</option>
                        <option value="NU">&nbsp;Nunavut</option>
                        <option value="YT">&nbsp;Yukon</option>

                    </select>

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fab fa-canadian-maple-leaf" aria-hidden="true"></i>
                    </span>

                </div>

            </div>
            <hr class="cust_type_input" />



            <button type="submit" id ="submit" name="signUp_button" class="btn mt-2 rounded-pill btn-md btn-custom btn-block text-uppercase">
                Sign Up
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
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
       
        // show the company or residential inputs depending on slected customer type
        $('#cust_type').on('change', function() {
            if ($(this).val() === 'Company') {
                $('.cust_company').show();
                $('.cust_residential').hide();
                // $("#gender").removeAttr("required");
                // if ($(".comp").hasAttribute("disabled")) 
                $(".comp").removeAttr("disabled");
                $("#gender").attr("disabled", "disabled");
                $(".resi").attr("disabled", "disabled");
                $(".resi").removeAttr("required");
                $("#gender").removeAttr("required");
                // $(".comp").attr("required", "required");
            } else if ($(this).val() === 'Residential') {
                $('.cust_residential').show();
                $('.cust_company').hide();
                //   $("#gender").removeAttr("required");
                // $("#gender").attr("required", "required");
                // if ($(".resi").hasAttribute("disabled")) 
                $(".resi").removeAttr("disabled");
                $("#gender").removeAttr("disabled");
                $(".comp").attr("disabled", "disabled");
                $(".comp").removeAttr("required");
                // $(".resi").attr("required", "required");
            }else {
                $('.cust_company').hide();
                $('.cust_residential').hide();
            }
    //          // check for password mismatch
    //     // $('#pwd, #confirm_pwd').on('keyup', function () {
    //         function validatePassword(){
    //     if ($('#pwd').value == $('#confirm_pwd').value) {
    //         // $('#message').php('Password Match').css('color', 'green');
    //         $('#confirm_pwd').setCustomValidity("Passwords Don't Match");
    // }    else {
    //         $('#confirm_pwd').setCustomValidity("");
    //         // $('#message').php('Password Doesnt Match').css('color', 'red');
    //         // $('#submit').attr("disabled","disabled");
    //     }
    //     pwd.onchange = validatePassword;
    //     confirm_pwd.onkeyup = validatePassword;
    // }
    // });
        });
        // $(function () {
        $("#submit").click(function () {
            var pwd = $("#pwd").val();
            var confirm_pwd = $("#confirm_pwd").val();
            if (pwd != confirm_pwd && (confirm_pwd != '')) {
                $.alert({
                    title: 'Passwords dont match!',
                     content: 'Please try again',
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
    <!--===============================================================================================-->
    <!-- <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/main3.js"></script> -->



</body>

</html>