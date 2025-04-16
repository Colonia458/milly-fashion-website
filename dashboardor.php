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
                <h2 class="stamp">MANAGE ORDERS</h2>

                    <div class="table-section">
                        <table>
                            <tr>
                                <th>SHOE ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Phone Number</th>
                            </tr>
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
                                }
                            // Include the file containing database connection code
                            include('connection.php');

                            // Fetch shoe products from the database
                            $sql = "SELECT * FROM checkout";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["shoeid"]."</td>";
                                    echo "<td>".$row["name"]."</td>";
                                    echo "<td>".$row["price"]."</td>";
                                    echo "<td>".$row["pnumber"]."</td>";
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