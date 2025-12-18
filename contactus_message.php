<?php
session_start();

// --- Database connection ---
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Fetch messages from DB ---
$sql = "SELECT id, name, email, message, created_at FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Contact Messages</title>
  <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        display: flex;
    }
    /* Sidebar */
    .sidebar {
        width: 220px;
        background: #ff4500;
        color: white;
        height: 100vh;
        padding: 20px 0;
        position: fixed;
        top: 0;
        left: 0;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    .sidebar a {
        display: block;
        padding: 12px 20px;
        color: white;
        text-decoration: none;
    }
    .sidebar a:hover {
        background: #e63900;
    }

    /* Main Content */
    .main {
        margin-left: 220px;
        padding: 20px;
        width: calc(100% - 220px);
    }
    header {
        background: white;
        padding: 15px 20px;
        font-size: 22px;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        background: #ff4500;
        color: white;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    .no-data {
        text-align: center;
        margin-top: 50px;
        font-size: 18px;
        color: #555;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2>Pizza Admin</h2>
  <a href="admin.php">Dashboard</a>
  <a href="orders.php">Orders</a>
  <a href="add_item.php">Add Item</a>
  <a href="view_food.php">View Menu</a>
  <a href="add_offer.php">Add Offer</a>
  <a href="customers.php">Customers</a>
  <a href="contact_messages.php">Contact Messages</a>
  <a href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="main">
  <header>📩 Contact Messages</header>

  <?php
  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>".$row['id']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['message']."</td>
                  <td>".$row['created_at']."</td>
                </tr>";
      }
      echo "</table>";
  } else {
      echo "<p class='no-data'>No messages found!</p>";
  }
  $conn->close();
  ?>
</div>

</body>
</html>
