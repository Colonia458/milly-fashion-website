<?php
// Include the connection file
include('connection.php');

// Query to fetch all clothes
$sql = "SELECT * FROM clothes";
$result = $conn->query($sql);

// Array to store fetched data
$products = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='clothes-item'>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Brand: " . $row['brand'] . "</p>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Color: " . $row['color'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No clothes available.";
}

// Close the database connection
$conn->close();

// Output the products array as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>