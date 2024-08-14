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
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO login_data (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.html';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='index.html';</script>";
}
?>
