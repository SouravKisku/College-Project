<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "client_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM login_data WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $email;
            echo "<script>alert('Login successful'); window.location.href='homepage.html';</script>";
        } else {
            echo "<script>alert('Invalid email or password'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='index.html';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='index.html';</script>";
}
?>
