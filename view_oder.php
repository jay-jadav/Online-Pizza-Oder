<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['order_id'])) {
    header("Location: profile.php");
    exit;
}

$order_id = $_GET['order_id'];
$email = $_SESSION['user_email'];

// Fetch all items of this order
$sql = "SELECT * FROM orders 
        WHERE order_id = '$order_id' AND email = '$email'";
$result = mysqli_query($conn, $sql);

// If no items found
if(mysqli_num_rows($result) == 0) {
    echo "Invalid Order!";
    exit;
}

$orderItems = [];
while($row = mysqli_fetch_assoc($result)) {
    $orderItems[] = $row;
}

$firstItem = $orderItems[0]; // same order info
?>
<!DOCTYPE html>
<html>
<head>
<title>Order Details</title>
<style>
    body { font-family: Arial; background: #f1f3f4; padding: 40px; }
    .order-box {
        width: 650px;
        background: #fff;
        margin: auto;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    h2 { color: #2a9d8f; text-align: center; }
    .badge.Pending { background: orange; }
    .badge.Delivered { background: green; }
    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: #fff;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 10px;
    }
    th { background: #2a9d8f; color: #fff; }
    .btn{
        background: #2a9d8f;
        color: #fff;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 8px;
        float: right;
        margin-top: 15px;
    }
    img { width: 60px; border-radius: 6px; }
</style>
</head>

<body>

<div class="order-box">
    <h2>📦 Order Details</h2>

    <p><strong>Order ID:</strong> <?= $firstItem['order_id']; ?></p>
    <p><strong>Customer:</strong> <?= $firstItem['customer_name']; ?></p>
    <p><strong>Phone:</strong> <?= $firstItem['phone']; ?></p>
    <p><strong>Delivery Address:</strong> <?= $firstItem['address']; ?></p>
    <p><strong>Date:</strong> <?= $firstItem['order_date']; ?></p>
    <p><strong>Status:</strong> 
        <span class="badge <?= $firstItem['status']; ?>"><?= $firstItem['status']; ?></span>
    </p>

    <h3>🍕 Pizza Items</h3>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>

        <?php foreach($orderItems as $item) { ?>
        <tr>
            <td><img src="<?= $item['image']; ?>" alt="pizza"></td>
            <td><?= $item['name']; ?></td>
            <td><?= $item['size']; ?></td>
            <td><?= $item['qty']; ?></td>
            <td>₹<?= $item['price']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Total Amount: ₹<?= $firstItem['grand_total']; ?></h3>

    <a class="btn" href="profile.php">⬅ Back to Profile</a>
</div>

</body>
</html>
