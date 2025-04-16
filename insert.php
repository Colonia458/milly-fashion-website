<?php
// Database connection
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if there are any errors in the form data
    $errors = array();

    if (empty($_POST['brand'])) {
        $errors['brand'] = 'Brand is required';
    }

    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    }

    if (empty($_POST['description'])) {
        $errors['description'] = 'Description is required';
    }

    if (empty($_POST['size'])) {
        $errors['size'] = 'Size is required';
    }

    if (empty($_POST['color'])) {
        $errors['color'] = 'Color is required';
    }

    if (empty($_POST['price'])) {
        $errors['price'] = 'Price is required';
    }

    if (empty($_FILES['image']['name'])) {
        $errors['image'] = 'Image is required';
    }

    // If there are noerrors, proceed with the form data processing
    if (empty($errors)) {
        // Process form data
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];

        // Upload image file
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Insert product details into the database
        $sql = "INSERT INTO shoes (brand, name, description, size, color, price, image)
                VALUES ($brand, $name, $description, $size, $color, $price, $target_file)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssisi", "'$brand'", "'$name'", "'$description'", $size, $color, $price, $target_file);

            if ($stmt->execute()) {
                echo "<script> alert('Data entered has been saved.');</script>";
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        }
    }

    // Close the database connection
    $conn->close();

    // Display form errors
    if (!empty($errors)) {
        echo "<div class='errors'>\n";
        foreach ($errors as $error) {
            echo "<p>$error</p>\n";
        }
        echo "</div>\n";
    }
}
?>