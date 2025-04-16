<?php
// Define the root password
$rootUname = "admin";
$rootPassword = "milly"; // Change this to your desired root password

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    // Check if the entered password matches the root password
    if ( $rootUname === $uname && $password === $rootPassword) {
        // Redirect to the admin page
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed
    echo "<script> alert('Incorrect username or password'); </script>";
    echo '<script>window.location.href="admin-login.html";</script>';
        exit();
    }
}
?>
