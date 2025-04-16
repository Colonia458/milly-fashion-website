<?php
// Include the connection file
include('connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    // Upload image file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert product details into the database
    $sql = "INSERT INTO clothes (brand, name, description, color, price, image)
            VALUES ('$brand', '$name', '$description', '$color', '$price', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Clothes added successfully.'); window.location.href = 'add_clothes.html'; </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
