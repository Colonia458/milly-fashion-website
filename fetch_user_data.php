<?php
// Include database connection
include 'connection.php';

// Assuming you have already started the session and stored the user's ID in $_SESSION['user_id']
// Retrieve user data from the database based on the user's ID
$user_id = $_SESSION['user_id']; // Assuming you stored user's ID in session
$sql = "SELECT uname, email, pnumber, profilepic FROM signup WHERE id = $user_id";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Fetch user data as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Prepare the user data to be sent as JSON
        $user_data = array(
            'uname' => $row['username'],
            'email' => $row['email'],
            'pnumber' => $row['pnumber'],
            'profilepic' => $row['profilepic']
        );

        // Set the content type header to application/json
        header('Content-Type: application/json');

        // Output the user data as JSON
        echo json_encode($user_data);
    } else {
        // No user found with the provided ID
        echo json_encode(array('error' => 'No user found'));
    }
} else {
    // Error executing the SQL query
    echo json_encode(array('error' => 'Failed to fetch user data'));
}

// Close database connection
$conn ->close();
?>
