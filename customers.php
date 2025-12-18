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

// Users fetch
$result = $conn->query("SELECT * FROM user ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza Admin - Customers</title>
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

/* Users Table */
table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
th { background: #ff6347; color: white; }
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
    <li><a href="add_offer.php">Add Offer</a></li>
    <li><a href="customers.php">Customers</a></li>
    <li><a href="contactus_message.php">Contact Messages</a></li>
    <li><a href="admin_logout.php">Logout</a></li>
  </ul>
</div>

<!-- Main Content -->
<div class="main-content">
  <header>
    <h1>All Customers</h1>
  </header>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Joined On</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo isset($row['created_at']) ? $row['created_at'] : (isset($row['reg_date']) ? $row['reg_date'] : 'N/A'); ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
