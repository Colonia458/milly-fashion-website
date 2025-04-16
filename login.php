<?php

include("connection.php");

// Get credentials from form submission (assuming POST method)
$uname = $_POST['uname'];
$password = $_POST['password'];

// Prepare SQL query to prevent SQL injection
$sql = "SELECT * FROM signup WHERE uname = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $uname, $password); // Bind parameters for security

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login successful
    session_start(); // Start a session to store user data
    $_SESSION['uname'] = $uname; 
    echo "<script>alert('Login Successful!');</script>";
    echo '<script>window.location.href="menu.html";</script>';
    exit();
    exit(); // Prevent further code execution
} else {
    // Login failed
    echo "<script> alert('Invalid username or password'); </script>";
    echo '<script>window.location.href="login.html";</script>';
    exit();
    }
    

// Close statement and connection
$stmt->close();
$conn->close();
?>