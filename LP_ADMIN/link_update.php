
<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $logo = $_POST['logo'];
    $link = $_POST['link'];

    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO socialmedia (logo, link) VALUES (?, ?)");
    $stmt->bind_param("ss", $logo, $link);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: about.php");
    exit();
}
?>
<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $logo = $_POST['logo'];
    $link = $_POST['link'];

    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO socialmedia (logo, link) VALUES (?, ?)");
    $stmt->bind_param("ss", $logo, $link);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: about.php");
    exit();
}
?>