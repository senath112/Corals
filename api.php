<?php
$servername = "localhost";
$username = "root";
$password = "";  // No password set for the root user by default
$dbname = "corals";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->errorInfo());
}

// Prepare SQL statement to insert data
$stmt = $conn->prepare("INSERT INTO sensor_data (temperature) VALUES (:temperature)");

// Bind parameters
$stmt->bindParam(':temperature', $_POST['temperature']);

// Execute the statement
if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $stmt->errorInfo();
}
?>
