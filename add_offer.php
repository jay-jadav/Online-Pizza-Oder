<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error   = "";

// Step 1: Update Discount & Offer Expiry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    // ✅ Agar Remove Offer button dabaya gaya
    if (isset($_POST['remove_offer'])) {
        $stmt = $conn->prepare("UPDATE menu SET discount=0, offer_expiry=NULL WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $success = "✅ Offer removed successfully!";
        } else {
            $error = "❌ Error removing offer: " . $conn->error;
        }
    } else {
        // ✅ Normal update offer
        $discount = intval($_POST['discount']);
        $expiry   = !empty($_POST['expiry']) ? $_POST['expiry'] : NULL;

        $stmt = $conn->prepare("UPDATE menu SET discount=?, offer_expiry=? WHERE id=?");
        $stmt->bind_param("isi", $discount, $expiry, $id);

        if ($stmt->execute()) {
            $success = "✅ Offer updated successfully!";
        } else {
            $error = "❌ Error updating record: " . $conn->error;
        }
    }
}

// ✅ Step 2: Reset expired offers automatically
$conn->query("UPDATE menu 
              SET discount=0, offer_expiry=NULL 
              WHERE offer_expiry IS NOT NULL 
              AND offer_expiry < CURDATE()");

// Step 3: Fetch All Menu Items
$result = $conn->query("SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Offers - Admin</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; padding:0; }
    .container { width:90%; margin:30px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px #ccc; }
    h2 { text-align:center; color:#DC143C; margin-bottom:20px; }
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    th, td { padding:12px; text-align:center; border:1px solid #ddd; font-size:14px; }
    th { background:#DC143C; color:white; }
    tr:nth-child(even) { background:#f9f9f9; }
    img { width:80px; height:80px; object-fit:cover; border-radius:5px; }
    input[type="number"] { width:60px; padding:5px; }
    input[type="date"] { padding:5px; }
    button { padding:6px 12px; border:none; border-radius:5px; cursor:pointer; }
    .update-btn { background:#28a745; color:white; }
    .update-btn:hover { background:#218838; }
    .remove-btn { background:#dc3545; color:white; margin-top:5px; }
    .remove-btn:hover { background:#c82333; }
    .msg { text-align:center; margin-bottom:15px; font-weight:bold; }
    .success { color:green; }
    .error { color:red; }
    .back-btn {
        display:inline-block;
        margin-bottom:15px;
        padding:8px 15px;
        background:#007bff;
        color:#fff;
        border-radius:5px;
        text-decoration:none;
    }
    .back-btn:hover { background:#0056b3; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Manage Item Offers</h2>

    <?php if ($success): ?>
      <p class="msg success"><?php echo $success; ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
      <p class="msg error"><?php echo $error; ?></p>
    <?php endif; ?>

    <a href="admin.php" class="back-btn">⬅ Back to Admin</a>

    <table>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Current Discount (%)</th>
        <th>Offer Expiry</th>
        <th>Update / Remove Offer</th>
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
            <?php echo $row['offer_expiry'] ? $row['offer_expiry'] : '❌'; ?>
          </td>
          <td>
            <form method="post" style="margin-bottom:5px;">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="number" name="discount" value="<?php echo $row['discount']; ?>" min="0" max="100">
              <input type="date" name="expiry" value="<?php echo $row['offer_expiry']; ?>">
              <button type="submit" class="update-btn">Update</button>
            </form>
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="remove_offer" class="remove-btn" onclick="return confirm('Are you sure you want to remove this offer?');">Remove Offer</button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
