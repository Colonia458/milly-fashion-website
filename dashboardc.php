<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 

    <title>Admin Dashboard</title>
</head>
<body>
    <div class="sidebar">
        <img class="logo" src="Milly logo white.png" alt="logo">
        <ul class="menu">               
            <li><a href="dashboard.php"><i class="fas fa-shoe-prints"></i>
                <span>Shoes</span>
            </a></li>

            <li><a href="dashboarda.php"><i class='bx bx-diamond' ></i>
                <span>Accessories</span>
            </a></li>

            <li><a href="dashboardc.php"><i class='bx bxs-t-shirt' ></i>
                <span>Clothes</span>
            </a></li>

            <li><a href="dashboardor.php"><i class='bx bxs-purchase-tag'></i>
                <span>Orders</span>
            </a></li>

            <li class="logout"><a href="admin-login.html"><i class='bx bx-log-out'></i>
                <span>Log Out</span>
            </a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>Milly's Collections Admin Page</span>
                <h2>DASHBOARD</h2>
            </div>
            <div class="user-info">
                <i class='bx bx-search-alt-2'></i>
                <input class="search-box" type="text" placeholder="search">
            </div>
            <img class="profileimg" src="Pictures/martin-de-arriba-uf_IDewI6iQ-unsplash.jpg" alt="#profile">
        </div>

            <div id="section1">
                <h2 class="stamp">MANAGE CLOTHING PRODUCTS</h2>

                <div class="container">
                    <div class="form-section">
                        <form id="addclothesform" action="addclothes.php" method="post" enctype="multipart/form-data">
            
                            <h3>Add New Clothing Product</h3>
                            <input type="text" placeholder="Brand" name="brand" class="box" required><br>
                            <input type="text" placeholder="Name" name = "name" class="box" required><br>
                            <input type="text" placeholder="Description" name = "description" class="box" required><br>
                            <input type="text" placeholder="Size" name = "size" class="box" required><br>
                            <input type="text" placeholder="Color" name = "color" class="box" required><br>
                            <input type="text" placeholder="Price" name = "price" class="box" required><br>
                            <input type="file" placeholder="Upload Image" name="image" accept="image/*" class="box" required><br>
                            <button type="submit">Add Product</button>
                        </form>
                    </div>
                    <div class="table-section">
                        <table>
                            <tr>
                                <th>Brand</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                            <?php
                            // Include the file containing database connection code
                            include('connection.php');

                            // Fetch shoe products from the database
                            $sql = "SELECT * FROM clothes";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["brand"]."</td>";
                                    echo "<td>".$row["name"]."</td>";
                                    echo "<td>".$row["description"]."</td>";
                                    echo "<td>".$row["size"]."</td>";
                                    echo "<td>".$row["color"]."</td>";
                                    echo "<td>".$row["price"]."</td>";
                                    echo "<td><img src='Pictures/Clothes/MELLO_JJK_POSTER_TEE_1080X1350_1.webp' ".$row["image"]."' height='100'></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>0 results</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>