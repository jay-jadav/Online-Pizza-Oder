<?php
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $discount = $_POST['discount'];
    $expiry = $_POST['expiry_date'];

    // Server-side validation to prevent past or today’s date
    $today = date('Y-m-d');
    if ($expiry <= $today) {
        $msg = "❌ Please select a future date (after today).";
    } else {
        // Image Upload
        $image = "";
        if (!empty($_FILES['image']['name'])) {
            $target = "uploads/" . time() . "_" . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $target;
            }
        }

        $stmt = $conn->prepare("INSERT INTO offers (title, description, discount, image, expiry_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $desc, $discount, $image, $expiry);
        if ($stmt->execute()) {
            $msg = "✅ Offer added successfully!";
        } else {
            $msg = "❌ Error: " . $stmt->error;
        }
    }
}

// ✅ Set minimum date = tomorrow
$tomorrow = date('Y-m-d', strtotime('+1 day'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Offer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2 class="mb-4 text-center">➕ Add New Offer</h2>
  <?php if($msg) echo "<div class='alert alert-info'>$msg</div>"; ?><?php
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $discount = $_POST['discount'];
    $expiry = $_POST['expiry_date'];

    // Server-side validation to prevent past or today’s date
    $today = date('Y-m-d');
    if ($expiry <= $today) {
        $msg = "❌ Please select a future date (after today).";
    } else {
        // Image Upload
        $image = "";
        if (!empty($_FILES['image']['name'])) {
            $target = "uploads/" . time() . "_" . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $target;
            }
        }

        $stmt = $conn->prepare("INSERT INTO offers (title, description, discount, image, expiry_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $desc, $discount, $image, $expiry);
        if ($stmt->execute()) {
            $msg = "✅ Offer added successfully!";
        } else {
            $msg = "❌ Error: " . $stmt->error;
        }
    }
}

// ✅ Set minimum date = tomorrow
$tomorrow = date('Y-m-d', strtotime('+1 day'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Offer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2 class="mb-4 text-center">➕ Add New Offer</h2>
  <?php if($msg) echo "<div class='alert alert-info'>$msg</div>"; ?>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Offer Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="text" name="discount" class="form-control" placeholder="e.g. 20% OFF">
    </div>
    <div class="mb-3">
      <label class="form-label">Offer Expiry Date</label>
      <!-- ✅ Min set to tomorrow -->
      <input type="date" name="expiry_date" class="form-control" required min="<?php echo $tomorrow; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save Offer</button>
    <a href="admin_offers.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Offer Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="text" name="discount" class="form-control" placeholder="e.g. 20% OFF">
    </div>
    <div class="mb-3">
      <label class="form-label">Offer Expiry Date</label>
      <!-- ✅ Min set to tomorrow -->
      <input type="date" name="expiry_date" class="form-control" required min="<?php echo $tomorrow; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save Offer</button>
    <a href="admin_offers.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
