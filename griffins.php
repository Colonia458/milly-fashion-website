<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if delete button is clicked
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // Delete the record
    $sql = "DELETE FROM users WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Check if update form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_id = $_POST['id'];
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    
    // Update the record
    $sql = "UPDATE users SET name='$new_name', email='$new_email' WHERE id='$update_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><a href='?delete=" . $row["id"] . "'>Delete</a> | ";
        echo "<a href='javascript:void(0);' onclick='editRecord(" . $row["id"] . ", \"" . $row["name"] . "\", \"" . $row["email"] . "\");'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
function editRecord(id, name, email) {
    var newName = prompt("Enter new name", name);
    var newEmail = prompt("Enter new email", email);
    if (newName != null && newEmail != null) {
        window.location.href = "your_php_file.php", method: "post", id: id, name: newName, email: newEmail };
    }

</script>
