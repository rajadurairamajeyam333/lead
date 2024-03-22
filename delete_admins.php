<?php
// Include the configuration file
require_once 'config.php';

// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Escape any special characters to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare a delete statement
    $sql = "DELETE FROM admins WHERE id = '$id'";
    
    // Execute the delete statement
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the admins page after deletion
        header("Location: admins.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Redirect back to the admins page if the ID parameter is not set
    header("Location: admins.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
