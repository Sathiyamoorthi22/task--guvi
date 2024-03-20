<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EmailId = $_POST["email"];
    $Password = $_POST["password"];

    // Query the database
    $sql = "SELECT * FROM registeraton WHERE EmailId='$EmailId' AND password='$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated, redirect to profile page
        header("Location: ../profile.html");
        exit();
    } else {
        echo "Invalid email or password";
    }
}

$conn->close();
?>
