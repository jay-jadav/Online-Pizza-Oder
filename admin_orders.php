<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update status
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $status   = $_POST['status'];
    $conn->query("UPDATE orders SET status='$status' WHERE id='$order_id'");
}

// Fetch orders
$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza Admin - Orders</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; }

/* Header */
header { background: white; padding: 15px; border-radius: 8px; margin: 20px; box-shadow: 0 1px 5px rgba(0,0,0,0.1); display:flex; justify-content:space-between; align-items:center; }

/* Back Button */
.back-btn {
  background: #ff4500;
  color: white;
  padding: 8px 15px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: bold;
}
.back-btn:hover { background:#e03e00; }

/* Orders Table */
table { 
  width: 96%; 
  margin: 20px auto; 
  border-collapse: collapse; 
  background: white; 
  border-radius: 8px; 
  overflow: hidden;
}
th, td { 
  padding: 12px; 
  text-align: center; 
  border-bottom: 1px solid #ddd; 
}
th { 
  background: #ff6347; 
  color: white; 
  text-transform: uppercase;
}
tr:nth-child(even) { background: #f9f9f9; }
tr:hover { background: #ffe5db; transition: 0.3s; }

/* Status Badges */
.status-badge {
  padding: 5px 10px;
  border-radius: 20px;
  font-size: 13px;
  font-weight: bold;
  color: white;
}
.status-pending { background: orange; }
.status-completed { background: green; }
.status-delivered { background: dodgerblue; }

select, button {
  padding: 5px 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
}
button {
  background: #ff4500;
  color: white;
  cursor: pointer;
}
button:hover { background: #e03e00; }
</style>
</head>
<body>

<header>
  <h1>📦 All Customer Orders</h1>
  <a href="admin.php" class="back-btn">⬅ Back</a>
</header>

<table>
  <tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Item</th>
    <th>Size</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php while($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['size']; ?></td>
    <td>₹<?php echo $row['price']; ?></td>
    <td><?php echo $row['qty']; ?></td>
    <td>₹<?php echo $row['grand_total']; ?></td>
    <td>
      <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
        <?php echo ucfirst($row['status']); ?>
      </span>
    </td>
    <td><?php echo $row['order_date']; ?></td>
    <td>
      <form method="post" style="display:inline;">
          <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
          <select name="status">
              <option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
              <option value="Completed" <?php if($row['status']=="Completed") echo "selected"; ?>>Completed</option>
              <option value="Delivered" <?php if($row['status']=="Delivered") echo "selected"; ?>>Delivered</option>
          </select>
          <button type="submit" name="update_status">✔</button>
      </form>
    </td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
