
<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $skillname = $_POST['skillname'];
    $skillper = $_POST['skillper'];
   


    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO skill (skillname, skillper) VALUES (?, ?)");
    $stmt->bind_param("si", $skillname, $skillper);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: about.php");
    exit();
}
?>