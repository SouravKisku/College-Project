<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "client_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $area = $conn->real_escape_string($_POST['area']);
    $requirement = $conn->real_escape_string($_POST['requirement']);
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $details = $conn->real_escape_string($_POST['details']);

    $stmt = $conn->prepare("INSERT INTO `client-data` (area, requirement, name, phone, email, details) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $area, $requirement, $name, $phone, $email, $details);

    if ($stmt->execute()) {
        echo "<script>alert('We will try to soon'); window.location.href='homepage.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='homepage.html';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
