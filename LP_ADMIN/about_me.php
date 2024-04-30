<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $display_name = $_POST['name'];
    $des1 = $_POST['des1'];
    $des2 = $_POST['des2'];
    $des3 = $_POST['des3'];
    $user_id = 1; 

    // Prepare and execute the SQL query
    $stmt = $con->prepare("UPDATE about SET name=?, des1=?, des2=?, des3=? WHERE id=?");
    $stmt->bind_param("ssssi", $display_name, $des1, $des2, $des3, $user_id);
    $stmt->execute();

    // Redirect to the home.php page
    header("Location: about.php");
    exit();
}
?>