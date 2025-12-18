<?php
session_start();
include "db.php";

if(isset($_GET['order_id'])){
$order_id = $_GET['order_id'];
$email = $_SESSION['user_email'];

mysqli_query($conn,
"UPDATE orders SET status='Cancelled'
 WHERE order_id='$order_id' AND email='$email' AND status='Pending'");
}
header("Location: profile.php");
?>
