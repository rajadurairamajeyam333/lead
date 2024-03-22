<?php
// Database connection
session_start();
require_once 'auth_validate.php';
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
require_once 'header.php';
?>

<div class="page-body">
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
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-header">
                    <h2 class="text-center">Admin Registration</h2>
                </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="form-group">
                                        <label for="emp_id">Employee ID:</label>
                                        <input type="text" id="emp_id" name="emp_id" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email ID:</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" id="phone" name="phone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Select to Send OTP:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="phone_option" name="otp_method" value="phone" checked>
                                            <label class="form-check-label" for="phone_option">Phone</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="email_option" name="otp_method" value="email" >
                                            <label class="form-check-label" for="email_option">Email</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
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
// Close connection
$conn->close();
?>
