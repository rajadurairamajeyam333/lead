<?php
session_start();
require_once 'auth_validate.php';

// Database connection
require_once 'config.php';

// Check if id is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch admin user data based on id
    $sql = "SELECT * FROM admins WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Handle case where admin user with provided id is not found
        echo "Admin user not found.";
        exit();
    }
} else {
    // Handle case where id is not provided in the URL
    echo "ID not provided.";
    exit();
}

// Handle form submission for updating admin user data
if(isset($_POST['update'])) {
    // Retrieve updated data from the form
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];

    // Update the admin user data in the database
    $update_sql = "UPDATE admins SET first_name = '$new_first_name', last_name = '$new_last_name', email = '$new_email', phone = '$new_phone' WHERE id = $id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Admin user data updated successfully.";
        // Redirect to verify.php for OTP verification
        header("Location: admins.php"); 
    } else {
        echo "Error updating admin user data: " . $conn->error;
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
                    <h3>Edit Admin</h3>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Display the form for editing admin user data -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Edit Admin</h2>
                    <form method="post">
                        <div class="form-group mb-1">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
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
