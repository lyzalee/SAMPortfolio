<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $display_name = $_POST['display_name'];
    $display_skill_1 = $_POST['display_skill_1'];
    $descriptions = $_POST['descriptions'];
    $user_id = 1; 

    // Prepare and execute the SQL query
    $stmt = $con->prepare("UPDATE displaycontent SET display_name=?, display_skill_1=?, descriptions=? WHERE id=?");
    $stmt->bind_param("sssi", $display_name, $display_skill_1, $descriptions, $user_id);
    $stmt->execute();

    // Redirect to the home.php page
    header("Location: about.php");
    exit();
}
?>