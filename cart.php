<?php
session_start();
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Remove item
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    $sid = session_id();
    $conn->query("DELETE FROM orders WHERE id='$id' AND session_id='$sid'");
}

// Fetch cart from session
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Cart</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body { 
        font-family: Arial, sans-serif; 
        background: #fff8f0; 
        padding: 10px; 
    }

    h2 { text-align: center; }

    table { 
        width: 100%; 
        border-collapse: collapse; 
        background: white; 
        margin-top: 15px;
        font-size: 16px;
    }

    th, td { 
        border: 1px solid #ddd; 
        padding: 10px; 
        text-align: center; 
    }

    th { 
        background: #ff6347; 
        color: white; 
        font-size: 18px;
    }

    img { 
        width: 60px; 
        height: 60px; 
        border-radius: 5px; 
        object-fit: cover; 
    }

    button { 
        padding: 5px 10px; 
        font-size: 16px; 
        cursor: pointer; 
    }

    .remove-btn {
        background: red;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
    }

    .checkout-btn, .continue-btn {
        display: inline-block;
        padding: 12px 20px;
        margin: 10px 5px;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 18px;
    }

    .checkout-btn {
         background: green; 
        }
    .checkout-btn:hover { 
        background: darkgreen;
     }
    .continue-btn { 
        background: #ff6347; 
    }
    .continue-btn:hover {
         background: #cc4b36; 
        }

   
    @media (max-width: 768px) {

        table, th, td {
            font-size: 14px;
        }

        th { font-size: 15px; }

        img {
            width: 50px;
            height: 50px;
        }

        button {
            padding: 3px 8px;
            font-size: 14px;
        }

        .remove-btn {
            padding: 5px 10px;
            font-size: 12px;
        }

        .checkout-btn, .continue-btn {
            width: 90%;
            font-size: 16px;
            display: block;
            margin: 8px auto;
        }
    }

    @media (max-width: 500px) {

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>
</head>

<body>

<h2>🛒 Your Cart</h2>

<table>
<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Item</th>
    <th>Size</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php
$grandTotal = 0;
foreach ($cart as $id => $item) {
    $total = $item['price'] * $item['qty'];
    $grandTotal += $total;

    $imagePath = !empty($item['img']) ? $item['img'] : "images/noimage.png";

    echo "<tr>
        <td>{$id}</td>
        <td><img src='{$imagePath}' alt='{$item['name']}'></td>
        <td>{$item['name']}</td>
        <td>{$item['size']}</td>
        <td>{$item['price']}</td>
        <td>
            <form action='update_cart.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' name='action' value='decrease'>-</button>
            </form>

            {$item['qty']}

            <form action='update_cart.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' name='action' value='increase'>+</button>
            </form>
        </td>
        <td>$total</td>
        <td><a href='cart.php?remove=$id' class='remove-btn'>Remove</a></td>
    </tr>";
}
?>

<tr>
    <td colspan="6" align="right"><b>Grand Total:</b></td>
    <td colspan="2"><b><?php echo $grandTotal; ?></b></td>
</tr>

</table>

<div style="text-align:center;">
    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
    <a href="menu.php" class="continue-btn">Continue Shopping</a>
</div>

</body>
</html>
