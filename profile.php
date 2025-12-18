<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$name = $_SESSION['user_name'];

$sql = "SELECT * FROM orders WHERE customer_name='$name' ORDER BY order_date DESC";
$result = mysqli_query($conn, $sql);

$orders = [];
while($r = mysqli_fetch_assoc($result)){
    $orders[$r['order_id']][] = $r;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Orders</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4fcff;
    padding: 20px;
}
.container{
    width: 90%;
    max-width: 850px;
    margin: auto;
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 25px rgba(0,0,0,0.12);
}
.top{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
}
.btn{
    background:#008c7a;
    color:white;
    padding:7px 14px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
}
.btn:hover{
    background:#016d5d;
}

.order-box{
    background:#e7fff9;
    padding:15px;
    margin-top:16px;
    border-radius:10px;
    border-left:6px solid #00a387;
}

.badge{
    padding:4px 10px;
    border-radius:5px;
    color:white;
}
.Pending{ background:orange; }
.Delivered{ background:green; }
.Cancelled{ background:#c20000; }

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
th,td{
    border:1px solid #d3d3d3;
    padding:10px;
    text-align:center;
}
th{ background:#00a387; color:white; }
</style>

</head>
<body>

<div class="container">

<div class="top">
    <a href="Home.php" class="btn">⬅ Home</a>
    <a href="logout.php" class="btn">Logout</a>
</div>

<h2>Hello, <?= $_SESSION['user_name']; ?> 👋</h2>
<hr>

<h3>📦 Order History</h3>

<?php
if(count($orders) > 0){
foreach($orders as $order_id => $items){
$first = $items[0];
?>
<div class="order-box">
    <p><strong>Order ID:</strong> <?= $order_id; ?></p>
    <p><strong>Date:</strong> <?= $first['order_date']; ?></p>
    <p><strong>Status:</strong> 
    <span class="badge <?= $first['status']; ?>"><?= $first['status']; ?></span></p>

    <table>
        <tr>
            <th>Pizza Name</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
        <?php foreach($items as $i){ ?>
        <tr>
            <td><?= $i['name']; ?></td>
            <td><?= $i['size']; ?></td>
            <td><?= $i['qty']; ?></td>
            <td>₹<?= $i['price']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Total: ₹<?= $first['grand_total']; ?></h3>

</div>
<?php }} else { echo "<p>No Orders Found!</p>"; } ?>

</div>

</body>
</html>
