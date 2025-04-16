<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    h1 {
        text-align: center;
    }
    .shoe-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 20px;
    }
    .shoe {
        width: 45%;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
    }
    .shoe img {
        width: 100%;
        height: auto;
    }
    .shoe-details {
        padding: 10px;
    }
    .shoe-details h3 {
        margin: 0;
    }
    .shoe-details p {
        margin: 5px 0;
    }
    .price {
        font-weight: bold;
    }
    .add-to-cart {
        text-align: center;
    }
    .add-to-cart button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <div class="shoe-container">
        <?php
        include('connection.php');

        // Fetch shoe products from the database
        $sql = "SELECT * FROM shoes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='shoe'>";
                echo "<img src='" . $row['image'] . "' alt='Shoe Image'>";
                echo "<div class='shoe-details'>";
                echo "<h3>" . $row['brand'] . " " . $row['name'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p >Size: " . " " . $row['size'] . "</p>";
                echo "<p>Color: " . " " . $row['color'] . "</p>";
                echo "<p class='price'>Ksh" . " " . $row['price'] . "</p>";
                echo "<div class='add-to-cart'><a href='add_to_cart.php?id=" . $row['shoe_id'] . "'><button> ADD TO CART</button></a></div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
