<?php

session_start();

include ('connection.php');
$errors = array(); 

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO shoes (brand, name, description, size, color, price, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $brand, $name, $description, $size, $color, $price, $image);

    // Set parameters and execute
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Upload image file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
?>