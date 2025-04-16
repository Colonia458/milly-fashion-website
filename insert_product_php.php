<?php
// Include the file containing the database connection
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    // File upload handling
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        $allowedTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowedTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                // Insert product data into database
                $sql = "INSERT INTO shoes (brand, name, description, size, color, price, image) VALUES ('$brand', '$name', '$description', '$size', '$color', '$price', '$targetFilePath')";
                if(mysqli_query($conn, $sql)){
                    // Redirect to dashboard with success message
                    header("Location: dashboard.html?success=1");
                    exit();
                } else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else{
                echo "Error uploading file.";
            }
        } else{
            echo "Invalid file format.";
        }
    } else{
        echo "File is not an image.";
    }
}

// Fetch products from database and display in table
$sql = "SELECT * FROM shoes";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["brand"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td>".$row["size"]."</td>";
        echo "<td>".$row["color"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td><img src='".$row["image"]."' height='50'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No products found.</td></tr>";
}

mysqli_close($conn);
?>
