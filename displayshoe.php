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

    <p>SHOES PAGE</p>
    
        <div class="nav-icons">
            <a href="userprofile.html"><i class='bx bx-user'></i></a>
            <a href="#"><i class='bx bx-cart'></i></a>
        </div>
    </header>


<div class="shoe-container">
    <?php
   include('connection.php');

    // Fetch shoe products from the database
    $sql = "SELECT * FROM shoes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<link rel='stylesheet' href='displayshoe.css'>";
            echo "<div class='shoe'>";
            echo "<img src='" . $row['image'] . "' alt='Shoe Image'>";
            echo "<div class='shoe-details'>";
            echo "<h3>" . $row['brand'] . " " . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p >Size: " . " " . $row['size'] . "</p>";
            echo "<p>Color: " . " " . $row['color'] . "</p>";
            echo "<p class = 'price'>Ksh" . " " . $row['price'] . "</p>";
            echo "<a href='cartshoes.php'><button> ADD TO CART</button></a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
