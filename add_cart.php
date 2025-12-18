<?php
session_start();

// अगर cart session नहीं है तो बनाओ
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = intval($_POST['item_id']);
    $name    = $_POST['name'];
    $price   = floatval($_POST['price']);
    $qty     = intval($_POST['qty']);
    $size    = $_POST['size'];
    $img     = $_POST['img'];

    $total   = $price * $qty;

    // Unique cart id (item+size)
    $id = md5($item_id . $size);

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
        $_SESSION['cart'][$id]['grand_total'] = $_SESSION['cart'][$id]['qty'] * $price;
    } else {
        $_SESSION['cart'][$id] = [
            'id'          => $id,
            'item_id'     => $item_id,
            'name'        => $name,
            'price'       => $price,
            'qty'         => $qty,
            'size'        => $size,
            'img'         => $img,
            'grand_total' => $total
        ];
    }

    // ✅ Database में कुछ मत डालो यहाँ
    // DB में insert सिर्फ checkout.php में करो

    header("Location: cart.php");
    exit();
}
