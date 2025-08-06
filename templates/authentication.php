<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "Medali03";
$dbname = "pfe";

// Retrieve form data
$clientID = $_POST['client_id'];
$pwd = $_POST['pwd'];

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database to validate client ID and password
$sql = "SELECT first_name FROM pfe.clients WHERE client_id = ? AND pwd = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $clientID, $pwd);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Check if the client ID and password match a record in the database
if ($row) {
    // Store first name in session or cookie for subsequent interactions
    session_start();
    $_SESSION['first_name'] = $row['first_name'];

    // Greet the user by first name
    echo "Welcome " . $row['first_name'] . ", how can I help you today?";
} else {
    // Invalid client ID or password, show an error message
    echo "Invalid credentials. Please try again.";
}

// Close database connection
$stmt->close();
$conn->close();
?>