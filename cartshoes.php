<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- FONT LINKS ARE HERE BELOW -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Archivo:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Shoes Catalog</title>
    <link rel="stylesheet" href="displayshoe.css">
</head>
<body>

    <header>
    <a href="menu.html" class="logo"><img src="Milly logo pink.png" alt="Logo"></a>

    <p>SHOES CART</p>
    
        <div class="nav-icons">
            <a href="userprofile.html"><i class='bx bx-user'></i></a>
            <a href="#"><i class='bx bx-cart'></i></a>
        </div>
    </header>
    
    <?php
// Include database connection
include('connection.php');

    $shoe_id = mt_rand(1, 7);
    // Query to fetch shoe details from the shoes table based on the provided shoe ID
    $shoe_query = "SELECT * FROM shoes WHERE shoe_id = $shoe_id";
    $shoe_result = $conn->query($shoe_query);

    // Check if shoe details are found
    if ($shoe_result->num_rows > 0){
        // Fetch shoe details
        $shoe_row = $shoe_result->fetch_assoc();

        // Shoe details section
        echo "<link rel='stylesheet' href='displayshoe.css'>";
        echo "<div class='shoe-details'>";
        echo "<h2>Shoe Details</h2>";
        echo "<img class = 'shoepic' src='" . $shoe_row['image'] . "' alt='Shoe Image'>";
        echo "<p>Brand: " . $shoe_row['brand'] . "</p>";
        echo "<p>Name: " . $shoe_row['name'] . "</p>";
        echo "<p>Description: " . $shoe_row['description'] . "</p>";
        echo "<p>Size: " . $shoe_row['size'] . "</p>";
        echo "<p>Color: " . $shoe_row['color'] . "</p>";
        echo "<p>Price: $" . $shoe_row['price'] . "</p>";

        // Add to cart form
        echo "<link rel='stylesheet' href='login.css'>";
        echo "<h3>Add to Cart</h3>";
        echo "<form class='login' action='checkout.php' method='POST'>";
        echo "<label for= 'shoeid' type='visible' name='shoe_id' value='" . $shoe_row['shoe_id'] . "'> ";
        echo "<input type='number' id='quantity' name='quantity'placeholder='Quantity' value='1' min='1'>";
        echo "<input type='text' id='shoeid' name='shoeid'placeholder='Shoe ID' required>";
        echo "<input type='text' id='name' name='name' placeholder='Name of Product'required>";
        echo "<input type='text' id='price' name='price' placeholder='Product Price' required>";
        echo "<input type='text' id='pnumber' name='pnumber' placeholder='Phone Number' required> <br>";

        echo "<input type='submit' value='Submit Order'>";
        echo "</form>";
        echo "</div>"; // End of shoe-details div
        echo "</body>";
        echo "</html>";
    } else {
        echo "Shoe not found.";
    }
// Close database connection
$conn->close();
?>
</body>
</html>
