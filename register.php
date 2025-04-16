<?php
session_start();

include ('connection.php');
$errors = array(); 

// Retrieve user input from the HTML form
$uname = $_POST['uname'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];

// Validate input fields (add your validation rules here)

// Insert user data into the signup table
$sql = "INSERT INTO signup (uname, email, pnumber, password, passwordc) 
        VALUES ('$uname', '$email', '$pnumber', '$password', '$passwordc')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
    header("Location: login.html"); // Redirect back to login page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>