<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete Item
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM menu WHERE id=$id");
    header("Location: view_food.php"); // refresh after delete
    exit();
}

// Fetch all items
$result = $conn->query("SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - View Menu Items</title>
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
        padding: 10px;
        text-align: center;
    }
    th {
        background: #ff4500;
        color: white;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
    a.btn {
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
    }
    .edit { background: #007bff; }
    .delete { background: #dc3545; }
    .add {
        background: #28a745;
        padding: 8px 15px;
        margin-bottom: 10px;
        display: inline-block;
    }
    .back {
        background: #6c757d;
        padding: 8px 15px;
        margin-bottom: 10px;
        display: inline-block;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }
    .back:hover {
        background: #5a6268;
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
  <header>🍕 View Menu Items</header>

  <!-- Back & Add Buttons -->
  <a href="admin.php" class="back">⬅ Back to Admin</a>
  <a href="add_item.php" class="btn add">+ Add New Item</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Name</th>
      <th>Category</th>
      <th>Size</th>
      <th>Price</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td>
          <?php if (!empty($row['image'])): ?>
            <img src="<?php echo $row['image']; ?>" alt="food">
          <?php else: ?>
            ❌ No Image
          <?php endif; ?>
        </td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td><?php echo htmlspecialchars($row['size']); ?></td>
        <td>₹<?php echo number_format($row['price'], 2); ?></td>
        <td><?php echo htmlspecialchars($row['description']); ?></td>
        <td>
          <a href="edit_food.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
          <a href="view_food.php?delete=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>

</body>
</html>
