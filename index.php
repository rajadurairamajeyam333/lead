<?php
 session_start();

// // Database connection
// require_once 'config.php';

// // Function to generate OTP
// function generateOTP() {
//     $otp = rand(1000, 9999);
//     return $otp;
// }

// // Function to check if emp_id exists in the database
// function empIdExists($emp_id, $conn) {
//     $sql = "SELECT * FROM admins WHERE emp_id = '$emp_id'";
//     $result = $conn->query($sql);
//     return $result->num_rows > 0;
// }

// User registration process
if(isset($_POST['submit'])) {

    // Set the session variable isLogin to "yes"
    $_SESSION['islogged_in'] = 'yes';
    header("Location: admins.php");
    $emp_id = $_POST['emp_id'];
    $phemail = $_POST['phemail'];
    $otp = $_POST['otp'];

    // // Check if emp_id already exists in the database
    // if (empIdExists($emp_id, $conn)) {
    //     echo '<script>alert("Employee ID already exists. Please choose a different one.");</script>';
    // } else {
    //     // Generate OTP
    //     $otp = generateOTP();

    //     // Store OTP in session
    //     session_start();
    //     $_SESSION['otp'] = $otp;
    //     $_SESSION['emp_id'] = $emp_id;
    //     $_SESSION['first_name'] = $first_name;
    //     $_SESSION['last_name'] = $last_name;

    //     // Send OTP to user (You can implement your own OTP sending mechanism here)

    //     // Redirect to verify.php for OTP verification
    //     header("Location: verify.php"); 
    //     exit();
    // }
}

// // Close connection
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<script>
    // Disable Back Button
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        window.history.pushState(null, "", window.location.href);
    };
</script>
<?php
  if (isset($_GET['loggedOut'])) {
    echo '<p class="alert alert-info">You have been successfully logged out.</p>';
  }
  ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="emp_id">Employee ID:</label>
                            <input type="text" id="emp_id" name="emp_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phemail">Phone or Email:</label>
                            <input type="text" id="phemail" name="phemail" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="otp">OTP:</label>
                            <input type="text" id="otp" name="otp" class="form-control" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-3 justify-content-center">
        <div class="col-md-6 text-center">
            <p>New User? <a href="index.php">Register Here</a></p>
        </div>
    </div> -->
</div>

<!-- <script type="text/javascript">

        // Disable back options
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script> -->

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



