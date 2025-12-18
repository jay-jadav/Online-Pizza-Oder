<?php
session_start();

// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $phone         = $_POST['phone'];
    $name          = $_POST['item_name'];
    $size          = $_POST['size'];
    $price         = $_POST['price'];
    $qty           = $_POST['qty'];

    // Total calculation
    $total = $price * $qty;

    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders 
        (customer_name, phone, name, size, price, qty, total, status, order_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending', NOW())");
    $stmt->bind_param("ssssdid", $customer_name, $phone, $name, $size, $price, $qty, $total);

    if ($stmt->execute()) {
        echo "✅ Order placed successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>
