<?php
session_start();

// अगर admin logged in नहीं है तो login page पर भेज दो
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// === Dashboard Counts ===
$total_users    = $conn->query("SELECT COUNT(*) AS total FROM user")->fetch_assoc()['total'];
$total_items    = $conn->query("SELECT COUNT(*) AS total FROM menu")->fetch_assoc()['total'];
$total_orders   = $conn->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];
$total_messages = $conn->query("SELECT COUNT(*) AS total FROM contact_messages")->fetch_assoc()['total']; // ✅ Contact Messages count
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza Admin Panel</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Segoe UI', sans-serif; display: flex; background: #f4f4f4; }

/* Sidebar */
.sidebar {
  width: 220px;
  background: #ff4500;
  color: white;
  min-height: 100vh;
  padding: 20px;
}
.sidebar h2 { text-align: center; margin-bottom: 30px; }
.sidebar ul { list-style: none; }
.sidebar ul li { padding: 15px 10px; }
.sidebar ul li a { color: white; text-decoration: none; display: block; transition: 0.3s; }
.sidebar ul li a:hover { background: #e03e00; border-radius: 4px; padding-left: 15px; }

/* Main Content */
.main-content { flex: 1; padding: 20px; }
header { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 1px 5px rgba(0,0,0,0.1); }

/* Dashboard Cards */
.dashboard {
  display: flex;
  gap: 20px;
  margin-top: 20px;
  flex-wrap: wrap;
}
.card {
  flex: 1;
  min-width: 220px;
  background: white;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 1px 6px rgba(0,0,0,0.1);
  text-align: center;
  transition: transform 0.2s;
  cursor: pointer;
}
.card:hover { transform: translateY(-5px); }
.card h3 { margin-bottom: 15px; color: #333; font-size: 20px; }
.card p { font-size: 28px; font-weight: bold; color: #ff4500; }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2>Pizza Admin</h2>
  <ul>
    <li><a href="admin.php">Dashboard</a></li>
    <li><a href="admin_orders.php">Orders</a></li>
    <li><a href="add_item.php">Add Item</a></li>
    <li><a href="view_food.php">view menu</a></li>
    <li><a href="add_offer.php">Add Offer</a></li>
    <li><a href="customers.php">Customers</a></li>
    <li><a href="contactus_message.php">Contact Messages</a></li>
    <li><a href="admin_logout.php">Logout</a></li>
  </ul>
</div>

<!-- Main Content -->
<div class="main-content">
  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <!-- Dashboard Cards -->
  <div class="dashboard">
    <div class="card" onclick="window.location.href='customers.php'">
      <h3>Total Users</h3>
      <p><?php echo $total_users; ?></p>
    </div>
    <div class="card" onclick="window.location.href='view_food.php'">
      <h3>Total Items</h3>
      <p><?php echo $total_items; ?></p>
    </div>
    <div class="card" onclick="window.location.href='admin_orders.php'">
      <h3>Total Orders</h3>
      <p><?php echo $total_orders; ?></p>
    </div>
    <div class="card" onclick="window.location.href='contactus_message.php'">
      <h3>Total Messages</h3>
      <p><?php echo $total_messages; ?></p>
    </div>
  </div>
</div>

</body>
</html>
