<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FurStyle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Collect data from the request
$userData = json_decode(file_get_contents('php://input'));

// Prepare and bind update statement
$stmt = $conn->prepare("UPDATE Client SET firstName=?, lastName=?, password=?, phone=?, email=?, isAdmin=?, balance=? WHERE id=?");
$stmt->bind_param("sssssiid", $userData->firstName, $userData->lastName, $userData->password, $userData->phone, $userData->email, $userData->isAdmin, $userData->balance, $userData->id);

// Execute the update
if ($stmt->execute()) {
  $response = ["success" => true];
} else {
  $response = ["success" => false, "error" => $conn->error];
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close connection
$stmt->close();
$conn->close();
?>