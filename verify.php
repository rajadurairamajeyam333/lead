<?php
session_start();
require_once 'auth_validate.php';
require_once 'config.php';
echo $_SESSION['otp'];

if(isset($_POST['submit'])) {
    $entered_otp = $_POST['otp'];

    // Check if entered OTP matches stored OTP
    if($_SESSION['otp'] == $entered_otp) {
        $otp = $_SESSION['otp'];
        $emp_id = $_SESSION['emp_id'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $otp_method = $_SESSION['otp_method'];

        // Insert user data into database
        $sql = "INSERT INTO admins (emp_id, first_name, last_name, email, phone, otp_method, otp, is_verified) VALUES ('$emp_id', '$first_name', '$last_name', '$email', '$phone', '$otp_method', '$otp', 'yes')";

        if ($conn->query($sql) === TRUE) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'swal("OTP Verified Successfully!", "User Registered Sucessfully, Redirecting to Landing page...", "success").then(function() { window.location = "admins.php"; });';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'swal("Invalid OTP", "Please try again., Redirecting to Registration page...", "error").then(function() { window.location = "add_admins.php"; });';
            echo '</script>';
        // echo "Invalid OTP. Please try again.";
    }
}
?>

<?php
// Include the header
require_once 'header.php';
?>

<div class="page-body">
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
    <div class="container-fluid">
        <div class="row">
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">OTP Verification</h2>
                </div>
                <div>
                    <h2 class="text-center"><?php echo $_SESSION['otp'];?></h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group mb-3">
                            <label for="otp">Enter OTP:</label>
                            <input type="text" id="otp" name="otp" class="form-control" required>
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
require_once 'footer.php';
?>
