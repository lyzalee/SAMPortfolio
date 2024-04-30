<?php
include_once('../config.php');

// Check if the id parameter is provided and it is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query to delete the message with the specified id
    $sql = "DELETE FROM socialmedia WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redirect back to the page displaying the messages
        header("Location: about.php");
        exit();
    } else {
        echo "Error deleting message: " . $con->error;
    }
} else {
    echo "Invalid id parameter";
}
?>