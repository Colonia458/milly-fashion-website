<?php

include ('connection.php');
$errors = array(); 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];

// Check if a file was uploaded and there is no error
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $fileTmp = $_FILES["image"]["tmp_name"];
    $file_name = $_FILES["image"]["name"]; // Define $file_name
    $file_destination = 'Pictures/Shoes/' . $file_name;

    // Move uploaded file to desired directory
    move_uploaded_file($fileTmp, $file_destination);
}


    // Insert product details into the database
    $sql = "INSERT INTO shoes (brand, name, description, size, color, price, image)
            VALUES ('$brand', '$name', '$description', '$size', '$color', '$price', '$file_destination')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Data entered has been saved.');</script>";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

// Select data from the 'shoes' table
$sql = "SELECT * FROM shoes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["brand"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td>".$row["size"]."</td>";
        echo "<td>".$row["color"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td><img src='uploads/".$row["image"]."' height='100'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>0 results</td></tr>";
}
}
?>
