<?php
// Database connection
require_once 'config.php';

// Function to generate OTP
function generateOTP() {
    $otp = rand(1000, 9999);
    return $otp;
}


// User registration process
if (isset($_POST['submit'])) {
    session_start();
    
    // Retrieve form field data
    $marital_status = $_POST['marital_status'] ?? "";
    $mother_tongue = $_POST['mother_tongue'] ?? "";
    $caste = $_POST['caste'] ?? "";
    $denomination = $_POST['denomination'] ?? "";
    $height = $_POST['height'] ?? "";
    $height_unit = $_POST['height_unit'] ?? "";
    $weight = $_POST['weight'] ?? "";
    $weight_unit = $_POST['weight_unit'] ?? "";
    $complexion = $_POST['complexion'] ?? "";
    $education = $_POST['education'] ?? "";
    $occupation = $_POST['occupation'] ?? "";
    $company_name = $_POST['company_name'] ?? "";
    $annual_income = $_POST['annual_income'] ?? "";
    $work_location = $_POST['work_location'] ?? "";
    $father_name = $_POST['father_name'] ?? "";
    $father_occupation = $_POST['father_occupation'] ?? "";
    $mother_name = $_POST['mother_name'] ?? "";
    $mother_occupation = $_POST['mother_occupation'] ?? "";
    $family_status = $_POST['family_status'] ?? "";
    $siblings = $_POST['siblings'] ?? "";
    $citizen_of = $_POST['citizen_of'] ?? "";
    $current_address = $_POST['current_address'] ?? "";
    $permanent_address = $_POST['permanent_address'] ?? "";
    
    // Handle photo upload
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Directory where you want to store the uploaded photos
        $uploadDir = 'uploads/';

        // Get the temporary name of the photo file
        $photoTmpName = $_FILES['photo']['tmp_name'];

        // Generate a unique name for the photo
        $photoName = uniqid() . '_' . basename($_FILES['photo']['name']);

        // Set the file path where the photo will be stored
        $photoPath = $uploadDir . $photoName;

        // Move the uploaded photo to the specified directory
        if (move_uploaded_file($photoTmpName, $photoPath)) {
            // Store the photo path in the session
            $_SESSION['l_photo'] = $photoPath;
        } else {
            echo "Error uploading photo.";
            exit();
        }
    } elseif ($_FILES['photo']['error'] === UPLOAD_ERR_NO_FILE) {
        // No file selected, set session to empty string
        $_SESSION['l_photo'] = "";
    } else {
        echo "Error: " . $_FILES['photo']['error'];
        exit();
    }
    
    // Set other form field data in session
    $_SESSION['l_marital_status'] = $marital_status;
    $_SESSION['l_mother_tongue'] = $mother_tongue;
    $_SESSION['l_caste'] = $caste;
    $_SESSION['l_denomination'] = $denomination;
    $_SESSION['l_height'] = $height;
    $_SESSION['l_height_unit'] = $height_unit;
    $_SESSION['l_weight'] = $weight;
    $_SESSION['l_weight_unit'] = $weight_unit;
    $_SESSION['l_complexion'] = $complexion;
    $_SESSION['l_education'] = $education;
    $_SESSION['l_occupation'] = $occupation;
    $_SESSION['l_company_name'] = $company_name;
    $_SESSION['l_annual_income'] = $annual_income;
    $_SESSION['l_work_location'] = $work_location;
    $_SESSION['l_father_name'] = $father_name;
    $_SESSION['l_father_occupation'] = $father_occupation;
    $_SESSION['l_mother_name'] = $mother_name;
    $_SESSION['l_mother_occupation'] = $mother_occupation;
    $_SESSION['l_family_status'] = $family_status;
    $_SESSION['l_siblings'] = $siblings;
    $_SESSION['l_citizen_of'] = $citizen_of;
    $_SESSION['l_current_address'] = $current_address;
    $_SESSION['l_permanent_address'] = $permanent_address;
    $_SESSION['l_detailed_form'] = "1";

    // Redirect to verify.php for OTP verification
    header("Location: lead_verify.php"); 
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
                    <h4>Detailed Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="horizontal-wizard-wrapper">
                      <div class="row g-3">
                        <div class="col-12"> 
                          <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                            <div class="tab-pane fade show active" id="wizard-info" role="tabpanel" aria-labelledby="wizard-info-tab">
                              <form class="row g-3 needs-validation" novalidate="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                              <legend>Basic Information</legend>
                              <div class="col-xl-3 col-sm-6">
                                  <label class="form-label" for="marital_status">Marital Status</label>
                                  <select class="form-select" id="marital_status" name="marital_status" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Unmarried">Unmarried</option>
                                    <option value="Married">Married</option>
                                  </select>
                                  <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                  <label class="form-label" for="mother_tongue">Mother Tongue</label>
                                  <input class="form-control" id="mother_tongue" name="mother_tongue" type="text" placeholder="Enter your mother tongue" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                  <label class="form-label" for="caste">Caste</label>
                                  <input class="form-control" id="caste" name="caste" type="text" placeholder="Enter your caste" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                  <label class="form-label" for="denomination">Denomination</label>
                                  <input class="form-control" id="denomination" type="text" name="denomination" placeholder="Enter your denomination" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <label class="form-label" for="height">Height</label>
                                    <div class="input-group">
                                        <input class="form-control" name="height" id="height" type="number" placeholder="Enter your height" required="">
                                        <select class="form-select" id="height_unit" name="height_unit">
                                            <option value="cm">cm</option>
                                            <option value="ft">ft</option>
                                            <option value="inches">inches</option>
                                        </select>
                                    </div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <label class="form-label" for="weight">Weight</label>
                                    <div class="input-group">
                                        <input class="form-control" name="weight" id="weight" type="number" placeholder="Enter your weight" required="">
                                        <select class="form-select" id="weight_unit" name="weight_unit">
                                            <option value="kg">kg</option>
                                            <option value="pound">pound</option>
                                        </select>
                                    </div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="complexion">Complexion</label>
                                  <input class="form-control" name="complexion" id="complexion" type="text" placeholder="Enter your complexion" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>

                                <legend>Professional Details</legend>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="education">Last level of Education</label>
                                  <input class="form-control" name="education" id="education" type="text" placeholder="Enter your education" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="occupation">Occupation</label>
                                  <input class="form-control" name="occupation" id="occupation" type="text" placeholder="Enter your occupation" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="company_name">Company Name</label>
                                  <input class="form-control" name="company_name" id="company_name" type="text" placeholder="Enter your company name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="annual_income">Annual Income in INR</label>
                                  <input class="form-control" id="annual_income" name="annual_income" type="text" placeholder="Eg.300000" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="work_location">Work Location</label>
                                  <input class="form-control" id="work_location" name="work_location" type="text" placeholder="Enter your work location" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>

                                <legend>Family Details</legend>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="father_name">Father Name</label>
                                  <input class="form-control" name="father_name" id="father_name" type="text" placeholder="Enter your father's name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="father_occupation">Father Occupation</label>
                                  <input class="form-control" id="father_occupation" name="father_occupation" type="text" placeholder="Enter your Father's occupation" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="mother_name">Mother Name</label>
                                  <input class="form-control" name="mother_name" id="mother_name" type="text" placeholder="Enter your Mother's name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="mother_occupation">Mother Occupation</label>
                                  <input class="form-control" id="mother_occupation" name="mother_occupation" type="text" placeholder="Enter your Mother's occupation" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="family_status">Family Status</label>
                                  <input class="form-control" id="family_status" name="family_status" type="text" placeholder="Enter your Family status" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                  <label class="form-label" for="siblings">Siblings</label>
                                  <input class="form-control" name="siblings" id="siblings" type="text" placeholder="Enter your number siblings" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>

                                <legend>Contact Information</legend>
                                <div class="col-xl-6 col-sm-6">
                                    <label class="form-label" for="photo">Upload Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                  <label class="form-label" for="citizen_of">Citizen of</label>
                                  <input class="form-control" id="citizen_of" type="text" name="citizen_of" placeholder="Enter your Citizen of" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-xl-6 col-sm-6">
                                    <label class="form-label" for="current_address">Current Address</label>
                                    <textarea class="form-control" id="current_address" name="current_address" placeholder="Enter your current address" required=""></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <label class="form-label" for="permanent_address">Permanent Address</label>
                                    <textarea class="form-control" id="permanent_address" name="permanent_address" placeholder="Enter your permanent address" required=""></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                

                                
                                
                                <!-- <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" id="invalid-check-wizard" type="checkbox" value="" required="">
                                    <label class="form-check-label mb-0 d-block" for="invalid-check-wizard">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                  </div>
                                </div> -->
                                <div class="col-12 text-end">
                                    <!-- <button class="btn btn-primary">Previous</button> -->
                                    <!-- <a href="success.php" class="btn btn-primary">Submit</a> -->
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
