<?php
session_start();

// Check if the shoe id is provided and if the user is logged in
if(isset($_GET['shoe_id']) && isset($_SESSION['user_id'])) {
    // Include database connection
    include 'connection.php';

    // Get shoe id from GET parameter
    $shoe_id = $_GET['shoe_id'];

    // Fetch shoe details from the database using the shoe id
    $sql = "SELECT * FROM shoes WHERE id = '$shoe_id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Get user id from session
        $user_id = $_SESSION['user_id'];

        // Extract shoe details
        $shoe_name = $row['name'];
        $quantity = 1; // Default quantity
        $price = $row['price'];
        $total_price = $price * $quantity;

        // Insert the selected shoe into the cart
        $insert_sql = "INSERT INTO cartshoes (userid, shoeid, quantity, price, totalprice) 
                       VALUES ('$user_id', '$shoe_id', '$quantity', '$price', '$total_price')";
        if($conn->query($insert_sql) === TRUE) {
            echo "Item added to cart successfully!";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    } else {
        echo "No shoe found with the provided ID.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Please log in to add items to cart.";
}
?>
