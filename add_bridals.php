<?php
// Database connection
// require_once 'config.php';

// Function to generate OTP
function generateOTP() {
    $otp = rand(1000, 9999);
    return $otp;
}


// lead registration process
if(isset($_POST['submit'])) {
    $created_for = $_POST['created_for'];
    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $phone_country_code = $_POST['phone_country_code'];
    $phone_number = $_POST['phone_number'];
    $whatsapp_country_code = $_POST['whatsapp_country_code'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $communication = $_POST['communication'];
    $verification_code = $_POST['verification_code'];

        // Generate OTP
        $phone_otp = generateOTP();
        $email_otp = generateOTP();
        // Store OTP in session
        session_start();
        $_SESSION['l_phone_otp'] = $phone_otp;
        $_SESSION['l_email_otp'] = $email_otp;
        $_SESSION['l_created_for'] = $created_for;
        $_SESSION['l_gender'] = $gender;
        $_SESSION['l_first_name'] = $first_name;
        $_SESSION['l_middle_name'] = $middle_name;
        $_SESSION['l_last_name'] = $last_name;
        $_SESSION['l_date'] = $date;
        $_SESSION['l_country'] = $country;
        $_SESSION['l_state'] = $state;
        $_SESSION['l_email'] = $email;
        $_SESSION['l_phone_country_code'] = $phone_country_code;
        $_SESSION['l_phone_number'] = $phone_number;
        $_SESSION['l_whatsapp_country_code'] = $whatsapp_country_code;
        $_SESSION['l_whatsapp_number'] = $whatsapp_number;
        $_SESSION['l_communication'] = $communication;
        $_SESSION['l_verification_code'] = $verification_code;
        $_SESSION['l_detailed_form'] = "";

        // Send OTP to user (You can implement your own OTP sending mechanism here)

        // Redirect to verify.php for OTP verification
        header("Location: lead_verify.php"); 
        exit();
}

// lead registration process
if(isset($_POST['submitt'])) {
    $created_for = $_POST['created_for'];
    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $phone_country_code = $_POST['phone_country_code'];
    $phone_number = $_POST['phone_number'];
    $whatsapp_country_code = $_POST['whatsapp_country_code'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $communication = $_POST['communication'];
    $verification_code = $_POST['verification_code'];

        // Generate OTP
        $phone_otp = generateOTP();
        $email_otp = generateOTP();
        // Store OTP in session
        session_start();
        $_SESSION['l_phone_otp'] = $phone_otp;
        $_SESSION['l_email_otp'] = $email_otp;
        $_SESSION['l_created_for'] = $created_for;
        $_SESSION['l_gender'] = $gender;
        $_SESSION['l_first_name'] = $first_name;
        $_SESSION['l_middle_name'] = $middle_name;
        $_SESSION['l_last_name'] = $last_name;
        $_SESSION['l_date'] = $date;
        $_SESSION['l_country'] = $country;
        $_SESSION['l_state'] = $state;
        $_SESSION['l_email'] = $email;
        $_SESSION['l_phone_country_code'] = $phone_country_code;
        $_SESSION['l_phone_number'] = $phone_number;
        $_SESSION['l_whatsapp_country_code'] = $whatsapp_country_code;
        $_SESSION['l_whatsapp_number'] = $whatsapp_number;
        $_SESSION['l_communication'] = $communication;
        $_SESSION['l_verification_code'] = $verification_code;
        $_SESSION['l_detailed_form'] = "";

        // Send OTP to user (You can implement your own OTP sending mechanism here)

        // Redirect to verify.php for OTP verification
        header("Location: add_bridals_d_form.php"); 
        exit();
}

// Include the header
require_once 'header1.php';
?>

<!-- <div class="page-body"> -->
<div class="m-3">
    <!-- <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 ps-0">
                    <h3>Admin Registration</h3>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Container-fluid starts-->
    <!-- <div class="container-fluid"> -->
        <div class="row">
        <div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header text-center">
                    <h4>Lead Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="horizontal-wizard-wrapper">
                      <div class="row g-3">
                        <div class="col-12"> 
                          <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                            <div class="tab-pane fade show active" id="wizard-info" role="tabpanel" aria-labelledby="wizard-info-tab">
                              <form class="row g-3 needs-validation" validate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              <div class="col-xl-6 col-sm-4">
                                  <label class="form-label" for="created_for">Created For<span class="txt-danger">*</span></label>
                                  <select class="form-select" id="created_for" name="created_for" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Myself">Myself</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Relative">Relative</option>
                                    <option value="Friend">Friend</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid Created For.</div>
                                </div>
                                <div class="col-xl-6 col-sm-4">
                                  <label class="form-label" for="gender">Gender<span class="txt-danger">*</span></label>
                                  <select class="form-select" id="gender" name="gender" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid gender.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="first_name">First Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Enter first name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="middle_name">Middle Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="middle_name" id="middle_name" type="text" placeholder="Enter Middle name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="last_name">Last Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="last_name" id="last_name" type="text" placeholder="Enter last name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label class="form-label" for="date">Date<span class="txt-danger">*</span></label>
                                    <input class="form-control" name="date" id="date" type="date" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="country">Country/Location<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="country" id="country" type="text" placeholder="Currently Residing Country" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="state">State<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="state" id="state" type="text" placeholder="Currently Residing State" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="email">Email<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="email" id="email" type="email" required="" placeholder="lead@example.com">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label for="phone_country_code" class="form-label">Phone Number<span class="txt-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="tel" style="max-width: 100px;" class="form-control" id="phone_country_code" name="phone_country_code" placeholder="Eg. +91" required="">
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" required="">
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label for="whatsapp_country_code" class="form-label">WhatsApp Number<span class="txt-danger">*</span></label>
                                    <div class="input-group mb-2">
                                        <input type="tel" style="max-width: 100px;" class="form-control" id="whatsapp_country_code" name="whatsapp_country_code" placeholder="Eg. +91" required="">
                                        <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="Enter WhatsApp number" required="">
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="sameAsPhoneNumber">
                                        <label class="form-check-label" for="sameAsPhoneNumber">
                                            Use same number for WhatsApp
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="communication">Prefered Means of Communication<span class="txt-danger">*</span></label>
                                  <select class="form-select" id="communication" name="communication" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Primary Contact Number">Primary Contact Number</option>
                                    <option value="Whatsapp Number">Whatsapp Number</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="verification_code">Verification Code<span class="txt-danger">*</span></label>
                                  <select class="form-select" name="verification_code" id="verification_code" required="">
                                    <option selected="" disabled="" value="">Choose to send verification code...</option>
                                    <option value="Primary Contact Number">Primary Contact Number</option>
                                    <option value="Whatsapp Number">Whatsapp Number</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                
                                <!-- <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" id="invalid-check-wizard" type="checkbox" value="" required="">
                                    <label class="form-check-label mb-0 d-block" for="invalid-check-wizard">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                  </div>
                                </div> -->
                                <div class="col-12 text-end">
                                <button name="submitt" class="btn btn-primary">Add Additional Details</button>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
    Help-Desk? Contact Admin : 9500058852/ 53/ 4261 2323
 <!-- <a href="helpdesk_link">Helpdesk</a>. -->
  </div>
              </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sameAsPhoneCheckbox = document.getElementById('sameAsPhoneNumber');
    const phoneCountryCode = document.getElementById('phone_country_code');
    const phoneNumber = document.getElementById('phone_number');
    const whatsappCountryCode = document.getElementById('whatsapp_country_code');
    const whatsappNumber = document.getElementById('whatsapp_number');

    sameAsPhoneCheckbox.addEventListener('change', function () {
        if (this.checked) {
            whatsappCountryCode.value = phoneCountryCode.value;
            whatsappNumber.value = phoneNumber.value;
            whatsappCountryCode.disabled = false;
            whatsappNumber.disabled = false;
        } else {
            whatsappCountryCode.disabled = false;
            whatsappNumber.disabled = false;
            // Optional: Clear WhatsApp fields when unchecked
            // whatsappCountryCode.value = '';
            // whatsappNumber.value = '';
        }
    });
});
</script>


<?php
// Include the footer
require_once 'footer1.php';
// Close connection
// $conn->close();
?>
