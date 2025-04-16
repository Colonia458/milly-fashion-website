<?php
session_start();
include ('connection.php');

$uname = $_POST['uname'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];

    // Check if a file was uploaded
    if(isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] == 0) {
        $file_name = $_FILES['profilepic']['name'];
        $file_tmp = $_FILES['profilepic']['tmp_name'];
        $file_destination = 'uploads/' . $file_name;

        // Move uploaded file to desired directory
        move_uploaded_file($file_tmp, $file_destination);
    }

    // Update user details in the database
    $sql = "UPDATE signup SET uname='$uname', email='$email', pnumber='$pnumber', password='$password', passwordc='$passwordc', profilepic='$file_destination' WHERE uname='$uname'";

    if ($conn->query($sql) === TRUE){
        echo "Records updated successfully.";
        header("Location: userprofileb.html"); // Redirect back to profile page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close connection
$conn->close();
?>
