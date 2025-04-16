<?php
// Fetch data from the database
$select = mysqli_query($conn, "SELECT * FROM shoes");

// Output the table
if ($select->num_rows > 0) {
    while($row = mysqli_fetch_assoc($select)) {
       echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["brand"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["description"]."</td>
        <td>".$row["size"]."</td>
        <td>".$row["color"]."</td>
        <td>".$row["price"]."</td>
        <td><img src='uploads/".$row["image"]."' height='100'></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data available.</td></tr>";
}

// Close the database connection
$conn->close();
?>