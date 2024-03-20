<?php
require '../vendor/autoload.php'; // Include Composer's autoloader

// Create a MongoDB client
$client = new MongoDB\Client('mongodb://localhost:27017');

// Select the database and collection
$db = $client->selectDatabase('profile');
$collection = $db->selectCollection('details');

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST["fname"];
    $LastName = $_POST["lname"];
    $EmailId = $_POST["email"];
    $Password = $_POST["password"];

    // Insert data into the collection
    $result = $collection->insertOne([
        'FirstName' => $FirstName,
        'LastName' => $LastName,
        'EmailId' => $EmailId,
        'Password' => $Password
    ]);

    if ($result->getInsertedCount() > 0) {
        echo "Registration successful";
    } else {
        echo "Error registering user";
    }
}
?>
