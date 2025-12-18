<?php
session_start();
$conn = new mysqli("localhost", "root", "", "pizza");

$id = $_POST['id'];
$action = $_POST['action'];

if (isset($_SESSION['cart'][$id])) {
    if ($action == 'increase') {
        $_SESSION['cart'][$id]['qty']++;
    } elseif ($action == 'decrease' && $_SESSION['cart'][$id]['qty'] > 1) {
        $_SESSION['cart'][$id]['qty']--;
    }
    
    // Update database
    $qty = $_SESSION['cart'][$id]['qty'];
    $price = $_SESSION['cart'][$id]['price'];
    $total = $price * $qty;
    $sid = session_id();

   $stmt = $conn->prepare("UPDATE orders SET qty=? WHERE item_id=? AND session_id=?");
$stmt->bind_param("iss", $qty, $id, $sid);

    $stmt->execute();
}

header("Location: cart.php");
exit;
?>
