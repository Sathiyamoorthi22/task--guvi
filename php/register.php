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
    $FirstName = $_POST["fname"];
    $LastName = $_POST["lname"];
    $EmailId = $_POST["email"];
    $Password = $_POST["password"];

    // Insert data into database
    $sql = "INSERT INTO registeraton (FirstName,LastName,EmailId,password) VALUES('$FirstName', '$LastName', '$EmailId', '$Password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<a href='..//login.html'> login </a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
