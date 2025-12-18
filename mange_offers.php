<?php
// ✅ Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Step 1: Update Discount if Form Submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $discount = intval($_POST['discount']); // only integer % allowed

    $stmt = $conn->prepare("UPDATE menu SET discount=? WHERE id=?");
    $stmt->bind_param("ii", $discount, $id);

    if ($stmt->execute()) {
        header("Location: manage_offers.php"); // refresh after update
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// ✅ Step 2: Fetch All Menu Items
$result = $conn->query("SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Offers - Admin</title>
  <style>
    body {
       font-family: Arial, sans-serif; 
      background:#f4f4f4; 
    }
    .container { 
      width:90%; margin:30px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px #ccc; }
    h2 { 
      text-align:center; color:#DC143C; margin-bottom:20px; }
    table {
       width:100%; border-collapse:collapse; }
    th, td {
       padding:10px; text-align:center; border:1px solid #ddd;
       }
    th {
       background:#DC143C; color:white; }
    tr:nth-child(even) { 
      background:#f9f9f9; 
    }
    img {
       width:80px; height:80px; object-fit:cover; border-radius:5px; 
      }
    input[type="number"] {
       width:70px; padding:5px; text-align:center; 
      }
    button { 
      padding:6px 12px; border:none; background:#28a745; color:white; border-radius:5px; cursor:pointer; }
    button:hover {
       background:#218838; }
  </style>
</head>
<body>
  <div class="container">
    <h2>📢 Manage Item Offers</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Current Discount (%)</th>
        <th>Update Offer</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td>
            <?php if (!empty($row['image'])): ?>
              <img src="<?php echo $row['image']; ?>" alt="food">
            <?php else: ?>
              ❌
            <?php endif; ?>
          </td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['category']); ?></td>
          <td>₹<?php echo number_format($row['price'],2); ?></td>
          <td><?php echo $row['discount']; ?>%</td>
          <td>
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="number" name="discount" value="<?php echo $row['discount']; ?>" min="0" max="100">
              <button type="submit">Save</button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
