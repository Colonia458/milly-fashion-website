<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shoeid = $_POST['shoeid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $pnumber = $_POST['pnumber'];

    // Insert data into checkout table
    $sql = "INSERT INTO checkout (shoeid, name, price, pnumber) VALUES ('$shoeid', '$name', '$price', '$pnumber')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your order details have been submitted.'); window.location.href = 'displayshoe.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
