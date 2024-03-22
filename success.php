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
                  <!-- <div class="card-header">
                    <h4>Lead Form</h4>
                  </div> -->
                  <div class="card-body">
                    <div class="horizontal-wizard-wrapper">
                      <div class="row g-3">
                        
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
