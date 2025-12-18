<?php
session_start();
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User must login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['cart'])) {

    $order_id = rand(10000, 99999);
    $customer_name = $_SESSION['user_name']; // FIXED
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $status = "Pending";
    $order_date = date("Y-m-d H:i:s");

    $grand_total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $grand_total += $item['price'] * $item['qty'];
    }

    foreach ($_SESSION['cart'] as $item) {
        $stmt = $conn->prepare("
            INSERT INTO orders 
            (order_id, id, name, size, qty, price, grand_total, 
             customer_name, phone, address, order_date, status, payment_method) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param("iissidsssssss",
            $order_id,
            $item['item_id'],
            $item['name'],
            $item['size'],
            $item['qty'],
            $item['price'],
            $grand_total,
            $customer_name,
            $phone,
            $address,
            $order_date,
            $status,
            $payment_method
        );

        $stmt->execute();
    }

    unset($_SESSION['cart']);
    header("Location: success.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout - Pizza Planet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{ background:#fafafa; }
.card-header{ font-size:18px;font-weight:600; }
</style>
</head>
<body>

<div class="container mt-4 mb-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <!-- Order List -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">Your Order</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Pizza</th><th>Size</th><th>Qty</th><th>Price</th><th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $grand_total = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $total = $item['price'] * $item['qty'];
                    $grand_total += $total;
                    echo "<tr>
                        <td>{$item['name']}</td>
                        <td>{$item['size']}</td>
                        <td>{$item['qty']}</td>
                        <td>₹{$item['price']}</td>
                        <td><strong>₹{$total}</strong></td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
            <h4 class="text-end text-success">Grand Total: ₹<?= $grand_total ?></h4>
        </div>
    </div>

    <!-- Customer Form -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Confirm Order</div>
        <div class="card-body">
            <form method="post">
                
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required/>
                </div>

                <div class="mb-3">
                    <label>Delivery Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <label class="fw-bold">Payment Method</label><br>
                <div class="form-check">
                    <input type="radio" name="payment_method" value="COD" class="form-check-input" required>
                    <label class="form-check-label">Cash on Delivery</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="payment_method" value="UPI" class="form-check-input">
                    <label class="form-check-label">UPI / Net Banking</label>
                </div>

                <div class="form-check mb-3">
                    <input type="radio" name="payment_method" value="Card" class="form-check-input">
                    <label class="form-check-label">Debit / Credit Card</label>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    ✔ Place Order
                </button>

                <a href="cart.php" class="btn btn-secondary w-100 mt-2">← Back to Cart</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
