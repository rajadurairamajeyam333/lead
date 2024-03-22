<?php
// Database connection
require_once 'config.php';

// Function to generate OTP
function generateOTP() {
    $otp = rand(1000, 9999);
    return $otp;
}

// Function to check if emp_id exists in the database
function empIdExists($emp_id, $conn) {
    $sql = "SELECT * FROM admins WHERE emp_id = '$emp_id'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// User registration process
if(isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $otp_method = $_POST['otp_method'];

    // Check if emp_id already exists in the database
    if (empIdExists($emp_id, $conn)) {
        echo '<script>alert("Employee ID already exists. Please choose a different one.");</script>';
    } else {
        // Generate OTP
        $otp = generateOTP();

        // Store OTP in session
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['otp_method'] = $otp_method;

        // Send OTP to user (You can implement your own OTP sending mechanism here)

        // Redirect to verify.php for OTP verification
        header("Location: verify.php"); 
        exit();
    }
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
                  <div class="card-header">
                    <h4>Lead Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="horizontal-wizard-wrapper">
                      <div class="row g-3">
                        <div class="col-12 main-horizontal-header">
                          <div class="nav nav-pills horizontal-options" id="horizontal-wizard-tab" role="tablist" aria-orientation="vertical"><a class="nav-link active" id="wizard-info-tab" data-bs-toggle="pill" href="#wizard-info" role="tab" aria-controls="wizard-info" aria-selected="true"> 
                              <div class="horizontal-wizard">
                                <div class="stroke-icon-wizard"><i class="bi bi-ticket-detailed"></i></div>
                                <div class="horizontal-wizard-content"> 
                                  <h6>Manditory Details</h6>
                                </div>
                              </div></a><a class="nav-link" id="bank-wizard-tab" data-bs-toggle="pill" href="#bank-wizard" role="tab" aria-controls="bank-wizard" aria-selected="false"> 
                              <div class="horizontal-wizard">
                                <div class="stroke-icon-wizard"><i class="bi bi-view-stacked"></i></div>
                                <div class="horizontal-wizard-content"> 
                                  <h6>Detailed Form</h6>
                                </div>
                              </div></a><a class="nav-link" id="inquiry-wizard-tab" data-bs-toggle="pill" href="#inquiry-wizard" role="tab" aria-controls="inquiry-wizard" aria-selected="false"> 
                              <div class="horizontal-wizard">
                                <div class="stroke-icon-wizard"><i class="bi bi-view-list"></i></div>
                                <div class="horizontal-wizard-content"> 
                                  <h6>Inquiries</h6>
                                </div>
                              </div></a><a class="nav-link" id="successful-wizard-tab" data-bs-toggle="pill" href="#successful-wizard" role="tab" aria-controls="successful-wizard" aria-selected="false"> 
                              <div class="horizontal-wizard">
                                <div class="stroke-icon-wizard"><i class="bi bi-check-circle"></i></div>
                                <div class="horizontal-wizard-content"> 
                                  <h6>Completed </h6>
                                </div>
                              </div></a></div>
                        </div>
                        <div class="col-12"> 
                          <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                            <div class="tab-pane fade show active" id="wizard-info" role="tabpanel" aria-labelledby="wizard-info-tab">
                              <form class="row g-3 needs-validation" novalidate="">
                              <div class="col-xl-6 col-sm-4">
                                  <label class="form-label" for="created_for">Created For</label>
                                  <select class="form-select" id="created_for" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Myself</option>
                                    <option>Son</option>
                                    <option>Daughter</option>
                                    <option>Sister</option>
                                    <option>Brother</option>
                                    <option>Relative</option>
                                    <option>Friend</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-6 col-sm-4">
                                  <label class="form-label" for="gender">Gender</label>
                                  <select class="form-select" id="gender" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="first_name">First Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="first_name" type="text" placeholder="Enter first name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="middle_name">Middle Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="middle_name" type="text" placeholder="Enter Middle name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="last_name">Last Name of Bride/Groom<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="last_name" type="text" placeholder="Enter last name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label class="form-label" for="date">Date<span class="txt-danger">*</span></label>
                                    <input class="form-control" id="date" type="date" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="country">Country/Location<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="country" type="text" placeholder="Currently Residing Country" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="state">State<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="state" type="text" placeholder="Currently Residing State" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="email">Email<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="email" type="email" required="" placeholder="lead@example.com">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label for="phone_country_code" class="form-label">Phone Number<span class="txt-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="tel" style="max-width: 100px;" class="form-control" id="phone_country_code" placeholder="Eg. +91" required="">
                                        <input type="tel" class="form-control" id="phone_number" placeholder="Enter phone number" required="">
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <label for="whatsapp_country_code" class="form-label">WhatsApp Number<span class="txt-danger">*</span></label>
                                    <div class="input-group mb-2">
                                        <input type="tel" style="max-width: 100px;" class="form-control" id="whatsapp_country_code" placeholder="Eg. +91" required="">
                                        <input type="tel" class="form-control" id="whatsapp_number" placeholder="Enter WhatsApp number" required="">
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="sameAsPhoneNumber">
                                        <label class="form-check-label" for="sameAsPhoneNumber">
                                            Use same number for WhatsApp
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="communication">Prefered Means of Communication</label>
                                  <select class="form-select" id="communication" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Primary Contact Number">Primary Contact Number</option>
                                    <option value="Whatsapp Number">Whatsapp Number</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="communication">Verification Code</label>
                                  <select class="form-select" id="communication" required="">
                                    <option selected="" disabled="" value="">Choose to send verification code...</option>
                                    <option value="phone_number">Primary Contact Number</option>
                                    <option value="whatsapp_number">Whatsapp Number</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-4 col-sm-4">
                                  <label class="form-label" for="custom-zipcode">Zip Code</label>
                                  <input class="form-control" id="custom-zipcode" type="text" required="">
                                  <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <!-- <div class="col-sm-4">
                                  <label class="form-label" for="customContact1">Contact Number</label>
                                  <input class="form-control" id="customContact1" type="number" placeholder="Enter number" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div> -->
                                <!-- <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" id="invalid-check-wizard" type="checkbox" value="" required="">
                                    <label class="form-check-label mb-0 d-block" for="invalid-check-wizard">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                  </div>
                                </div> -->
                                <div class="col-12 text-end">
                                  <button class="btn btn-primary">Continue</button>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="bank-wizard" role="tabpanel" aria-labelledby="bank-wizard-tab">
                              <form class="row g-3 needs-validation" novalidate="">
                                <div class="col-sm-6 bank-search">
                                  <label class="form-label" for="aadharnumber-wizard">Aadhaar Number<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="aadharnumber-wizard" type="Search" placeholder="xxxx xxxx xxxx xxxx" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-sm-6 bank-search">
                                  <label class="form-label" for="pan-wizard">PAN<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="pan-wizard" type="Search" placeholder="xxxxxxxxxx" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-12"> 
                                  <h6>Choose from these popular banks</h6>
                                  <div class="bank-selection">
                                    <div class="form-check radio radio-primary ps-0">
                                      <ul class="radio-wrapper">
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-1" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-1"><img src="./assets/images/forms/hdfc.png" alt="HDFC"><span>ABC BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-2" type="radio" name="radio2" value="option2" checked="">
                                          <label class="form-check-label" for="radio-wizard-2"><img src="./assets/images/forms/Bank-of-Baroda.png" alt="Bank-of-Baroda"><span>XYZ BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-3" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-3"><img src="./assets/images/forms/idbi.png" alt="IDBI"><span>PQR BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-4" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-4"><img src="./assets/images/forms/rbl.png" alt="RBL"><span>DEF BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-5" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-5"><img src="./assets/images/forms/us-bank.png" alt="US"><span>MNO BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-6" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-6"><img src="./assets/images/forms/axis.png" alt="Axis"><span>WXY BANK</span></label>
                                        </li>
                                        <li> 
                                          <input class="form-check-input" id="radio-wizard-7" type="radio" name="radio2" value="option2">
                                          <label class="form-check-label" for="radio-wizard-7"><img src="./assets/images/forms/SCB.png" alt="SCB"><span>STD BANK</span></label>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 text-end"> 
                                  <button class="btn btn-primary">Previous</button>
                                  <button class="btn btn-primary">Continue</button>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="inquiry-wizard" role="tabpanel" aria-labelledby="inquiry-wizard-tab">
                              <form class="row g-3 needs-validation" novalidate="">
                                <div class="col-12 inquiries-form">
                                  <div class="row"> 
                                    <div class="col-md-6">
                                      <p class="f-w-500">Select the option how you want to receive important notifications.</p>
                                      <div class="choose-option">
                                        <div class="form-check radio radio-primary">
                                          <input class="form-check-input me-2" id="notification1" type="radio" name="inlineRadioOptions" value="option1">
                                          <label class="form-check-label" for="notification1">Featured Items</label>
                                        </div>
                                        <div class="form-check radio radio-primary">
                                          <input class="form-check-input me-2" id="notification2" type="radio" name="inlineRadioOptions" value="option2">
                                          <label class="form-check-label" for="notification2">Newsletters</label>
                                        </div>
                                        <div class="form-check radio radio-primary">
                                          <input class="form-check-input me-2" id="notification3" type="radio" name="inlineRadioOptions" value="option3">
                                          <label class="form-check-label" for="notification3">Notifications</label>
                                        </div>
                                        <div class="form-check radio radio-primary">
                                          <input class="form-check-input me-2" id="notification4" type="radio" name="inlineRadioOptions" value="option3">
                                          <label class="form-check-label" for="notification4">Blogs</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="row g-3">
                                        <div class="col-12">
                                          <label class="form-label">Email<span class="txt-danger">*</span></label>
                                          <input class="form-control" type="text" placeholder="org@support.com" required="required">
                                        </div>
                                        <div class="col-12">
                                          <label class="form-label" for="customContact2">Contact Number</label>
                                          <input class="form-control" id="customContact2" type="number" placeholder="Enter number" required="">
                                          <div class="valid-feedback">Looks good!</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12"> 
                                  <label class="form-label f-w-500" for="FormControlTextarea2">If no, could you please describe?</label>
                                  <textarea class="form-control" id="FormControlTextarea2" rows="3"></textarea>
                                </div>
                                <div class="col-12 text-end"> 
                                  <button class="btn btn-primary">Previous</button>
                                  <button class="btn btn-primary">Continue </button>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="successful-wizard" role="tabpanel" aria-labelledby="successful-wizard-tab">
                              <div class="form-completed"><img src="./assets/images/gif/dashboard-8/successful.gif" alt="successful">
                                <h6>Successfully Completed</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
            whatsappCountryCode.disabled = true;
            whatsappNumber.disabled = true;
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
$conn->close();
?>
