<?php

session_start();
require_once 'auth_validate.php';
require_once 'config.php';
echo $_SESSION['l_phone_otp'];
echo $_SESSION['l_email_otp'];

if(isset($_POST['submit'])) {
    $entered_phone_otp = $_POST['phone_otp'];
    $entered_email_otp = $_POST['email_otp'];

    // Check if entered OTP matches stored OTP
    if($_SESSION['l_phone_otp'] == $entered_phone_otp && $_SESSION['l_email_otp'] == $entered_email_otp && $_SESSION['l_detailed_form'] == "") {
        $phone_otp = $_SESSION['l_phone_otp'];
        $email_otp = $_SESSION['l_email_otp'];
        $created_for = $_SESSION['l_created_for'];
        $gender = $_SESSION['l_gender'];
        $first_name = $_SESSION['l_first_name'];
        $middle_name = $_SESSION['l_middle_name'];
        $last_name = $_SESSION['l_last_name'];
        $date = $_SESSION['l_date'];
        $country = $_SESSION['l_country'];
        $state = $_SESSION['l_state'];
        $email = $_SESSION['l_email'];
        $phone_country_code = $_SESSION['l_phone_country_code'];
        $phone_number = $_SESSION['l_phone_number'];
        $whatsapp_country_code = $_SESSION['l_whatsapp_country_code'];
        $whatsapp_number = $_SESSION['l_whatsapp_number'];
        $communication = $_SESSION['l_communication'];
        $verification_code = $_SESSION['l_verification_code'];

        // Insert user data into database
        $sql = "INSERT INTO leads (created_for, gender, first_name, middle_name, last_name, datee, country, statee, email, phone_country_code, phone_number, whatsapp_country_code, whatsapp_number, communication, verification_code) VALUES ('$created_for', '$gender', '$first_name', '$middle_name', '$last_name', '$date', '$country', '$state', '$email', '$phone_country_code', '$phone_number', '$whatsapp_country_code', '$whatsapp_number', '$communication', '$verification_code')";

        if ($conn->query($sql) === TRUE) {
            // echo "valid OTP";
            session_destroy();
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'swal("OTP Verified Successfully!", "User Registered Sucessfully, Redirecting to success page...", "success").then(function() { window.location = "success.php"; });';
            echo '</script>';
            
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_SESSION['l_phone_otp'] == $entered_phone_otp && $_SESSION['l_email_otp'] == $entered_email_otp && $_SESSION['l_detailed_form'] == "1") {
        $phone_otp = $_SESSION['l_phone_otp'];
        $email_otp = $_SESSION['l_email_otp'];
        $created_for = $_SESSION['l_created_for'];
        $gender = $_SESSION['l_gender'];
        $first_name = $_SESSION['l_first_name'];
        $middle_name = $_SESSION['l_middle_name'];
        $last_name = $_SESSION['l_last_name'];
        $date = $_SESSION['l_date'];
        $country = $_SESSION['l_country'];
        $state = $_SESSION['l_state'];
        $email = $_SESSION['l_email'];
        $phone_country_code = $_SESSION['l_phone_country_code'];
        $phone_number = $_SESSION['l_phone_number'];
        $whatsapp_country_code = $_SESSION['l_whatsapp_country_code'];
        $whatsapp_number = $_SESSION['l_whatsapp_number'];
        $communication = $_SESSION['l_communication'];
        $verification_code = $_SESSION['l_verification_code'];

        $marital_status = $_SESSION['l_marital_status'];
        $mother_tongue = $_SESSION['l_mother_tongue'];
        $caste = $_SESSION['l_caste'];
        $denomination = $_SESSION['l_denomination'];
        $height = $_SESSION['l_height'];
        $height_unit = $_SESSION['l_height_unit'];
        $weight = $_SESSION['l_weight'];
        $weight_unit = $_SESSION['l_weight_unit'];
        $complexion = $_SESSION['l_complexion'];
        $education = $_SESSION['l_education'];
        $occupation = $_SESSION['l_occupation'];
        $company_name = $_SESSION['l_company_name'];
        $annual_income = $_SESSION['l_annual_income'];
        $work_location = $_SESSION['l_work_location'];
        $father_name = $_SESSION['l_father_name'];
        $father_occupation = $_SESSION['l_father_occupation'];
        $mother_name = $_SESSION['l_mother_name'];
        $mother_occupation = $_SESSION['l_mother_occupation'];
        $family_status = $_SESSION['l_family_status'];
        $siblings = $_SESSION['l_siblings'];
        $citizen_of = $_SESSION['l_citizen_of'];
        $current_address = $_SESSION['l_current_address'];
        $permanent_address = $_SESSION['l_permanent_address'];
        $photo = $_SESSION['l_photo'];

        // Insert user data into database
        $sql = "INSERT INTO leads (created_for, gender, first_name, middle_name, last_name, datee, country, statee, email, phone_country_code, phone_number, whatsapp_country_code, whatsapp_number, communication, verification_code, marital_status, mother_tongue, caste, denomination, height, height_unit, weight, weight_unit, complexion, education, occupation, company_name, annual_income, work_location, father_name, father_occupation, mother_name, mother_occupation, family_status, siblings, citizen_of, current_address, permanent_address, photo) VALUES ('$created_for', '$gender', '$first_name', '$middle_name', '$last_name', '$date', '$country', '$state', '$email', '$phone_country_code', '$phone_number', '$whatsapp_country_code', '$whatsapp_number', '$communication', '$verification_code', '$marital_status', '$mother_tongue', '$caste', '$denomination', '$height', '$height_unit', '$weight', '$weight_unit', '$complexion', '$education', '$occupation', '$company_name', '$annual_income', '$work_location', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation', '$family_status', '$siblings', '$citizen_of', '$current_address', '$permanent_address', '$photo')";

        if ($conn->query($sql) === TRUE) {
            // echo "valid OTP";
            // session_destroy();
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'swal("OTP Verified Successfully!", "User Registered Sucessfully, Redirecting to success page...", "success").then(function() { window.location = "success.php"; });';
            echo '</script>';
            
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        // session_destroy();
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'swal("Invalid OTP", "Please try again., Redirecting to Registration page...", "error").then(function() { window.location = "add_bridals.php"; });';
            echo '</script>';
        // echo "Invalid OTP. Please try again.";
    }
}
?>

<?php
// Include the header
require_once 'header1.php';
?>
<div class="m-3">

<!-- <div class="page-body"> -->
    <!-- <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 ps-0">
                    <h3>OTP Verification</h3>
                </div>
                <div class="col-sm-6 pe-0 text-end">
                    <a href="logout.php" class="btn btn-primary"><i class="bi bi-plus"></i>Add Admin</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Container-fluid starts-->
    <!-- <div class="container-fluid"> -->
        <div class="row">
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">OTP Verification</h2>
                </div>
                <!-- <div>
                    <h2 class="text-center"><?php echo $_SESSION['otp'];?></h2>
                </div> -->
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group mb-3">
                            <label for="phone_otp">Enter Phone OTP:</label>
                            <input type="text" id="phone_otp" name="phone_otp" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email_otp">Enter Email OTP:</label>
                            <input type="text" id="email_otp" name="email_otp" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<?php
// Include the footer
require_once 'footer1.php';
?>
