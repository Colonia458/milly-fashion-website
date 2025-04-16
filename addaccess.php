<?php

include('connection.php');
$errors = array();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    // Check if a file was uploaded and there is no error
    if (isset($_FILES['image']) && $_FILES["image"]["error"] == 0) {
        $fileTmp = $_FILES["image"]["tmp_name"];
        $file_name = $_FILES["image"]["name"];
        $file_destination = 'Pictures/Accessories/' . $file_name;

        // Move uploaded file to desired directory
        move_uploaded_file($fileTmp, $file_destination);
    }

    // Escape special characters in the file name
    $escaped_file_destination = $conn->real_escape_string($file_destination);

    // Insert product details into the database
    $sql = "INSERT INTO accessories (name, description, color, price, image)
            VALUES ('$name', '$description', '$color', '$price', '$escaped_file_destination')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Data entered has been saved.');</script>";
        header("Location: dashboarda.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
