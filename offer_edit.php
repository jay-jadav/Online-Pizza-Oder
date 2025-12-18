<?php
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM offers WHERE id=$id");
$offer = $result->fetch_assoc();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $discount = $_POST['discount'];

    $image = $offer['image'];
    if (!empty($_FILES['image']['name'])) {
        $target = "uploads/" . time() . "_" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image = $target;
        }
    }

    $stmt = $conn->prepare("UPDATE offers SET title=?, description=?, discount=?, image=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $desc, $discount, $image, $id);
    if ($stmt->execute()) {
        $msg = "✅ Offer updated successfully!";
        $offer['title'] = $title;
        $offer['description'] = $desc;
        $offer['discount'] = $discount;
        $offer['image'] = $image;
    } else {
        $msg = "❌ Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Offer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2 class="mb-4 text-center">✏️ Edit Offer</h2>
  <?php if($msg) echo "<div class='alert alert-info'>$msg</div>"; ?>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Offer Title</label>
      <input type="text" name="title" class="form-control" value="<?php echo $offer['title']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control"><?php echo $offer['description']; ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="text" name="discount" class="form-control" value="<?php echo $offer['discount']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Image</label><br>
      <img src="<?php echo $offer['image']; ?>" width="100" class="mb-2"><br>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update Offer</button>
    <a href="admin_offers.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
