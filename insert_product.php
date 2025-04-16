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

}

// Check if a file was uploaded and there is no error
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $fileTmp = $_FILES["image"]["tmp_name"];
    // Move uploaded file to desired directory
    move_uploaded_file($fileTmp, $targetFilePath);
}

    // Check if image file is a actual image or fake image
                // Insert product data into database
                $sql = "INSERT INTO shoes (brand, name, description, size, color, price, image) VALUES ('$brand', '$name', '$description', '$size', '$color', '$price', '$targetFilePath')";
                if(mysqli_query($conn, $sql)){
                    // Redirect to dashboard with success message
                    header("Location: dashboard.html?success=1");
                    exit();
                } else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
