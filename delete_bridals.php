<?php
session_start();
require_once 'auth_validate.php';
// Include the configuration file
require_once 'config.php';

// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Escape any special characters to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare a delete statement
    $sql = "DELETE FROM leads WHERE id = '$id'";
    
    // Execute the delete statement
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the bridals page after deletion
        header("Location: bridals.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Redirect back to the bridals page if the ID parameter is not set
    header("Location: bridals.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
