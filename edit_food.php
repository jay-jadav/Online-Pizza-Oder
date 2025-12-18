<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM menu WHERE id=$id");
$item = $result->fetch_assoc();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = $_POST['name'];
    $category    = $_POST['category'];
    $size        = $_POST['size'];
    $price       = $_POST['price'];
    $description = $_POST['description'];

    // old image by default
    $image = $item['image'];

    // if new image uploaded
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $targetFile;
        } else {
            $msg = "❌ Image upload failed.";
        }
    }

    // Update query
    $stmt = $conn->prepare("UPDATE menu SET name=?, category=?, size=?, price=?, description=?, image=? WHERE id=?");

    // ⚡ अगर price आपके DB में INT है
    $stmt->bind_param("sssissi", $name, $category, $size, $price, $description, $image, $id);

    // ⚡ अगर price DECIMAL है (10,2) तो ऊपर वाली लाइन comment करके ये use करो:
    // $stmt->bind_param("sssdssi", $name, $category, $size, $price, $description, $image, $id);

    if ($stmt->execute()) {
        header("Location: view_food.php");
        exit();
    } else {
        $msg = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Item</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f9f9f9; }
    .container { width: 500px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px #ccc; }
    h2 { text-align: center; color: #DC143C; }
    input, select, textarea { width: 100%; padding: 8px; margin: 8px 0; }
    button { background: #DC143C; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background: #a30f2d; }
    .msg { text-align: center; color: red; }
    img { max-width: 150px; margin: 10px 0; display: block; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Item</h2>
    <?php if ($msg != "") echo "<p class='msg'>$msg</p>"; ?>
    <form method="post" enctype="multipart/form-data">
      <label>Name:</label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>

      <label>Category:</label>
      <select name="category" required>
        <option value="Pizza"   <?php if ($item['category']=="Pizza") echo "selected"; ?>>Pizza</option>
        <option value="Taco's"  <?php if ($item['category']=="Taco's") echo "selected"; ?>>Taco's</option>
        <option value="Sides"   <?php if ($item['category']=="Sides") echo "selected"; ?>>Sides</option>
        <option value="Pasta"   <?php if ($item['category']=="Pasta") echo "selected"; ?>>Pasta</option>
        <option value="Drinks"  <?php if ($item['category']=="Drinks") echo "selected"; ?>>Drinks</option>
      </select>

      <label>Size:</label>
      <select name="size" required>
        <option value="Small"  <?php if ($item['size']=="Small") echo "selected"; ?>>Small</option>
        <option value="Medium" <?php if ($item['size']=="Medium") echo "selected"; ?>>Medium</option>
        <option value="Large"  <?php if ($item['size']=="Large") echo "selected"; ?>>Large</option>
      </select>

      <label>Price:</label>
      <input type="number" name="price" value="<?php echo $item['price']; ?>" required>

      <label>Description:</label>
      <textarea name="description"><?php echo htmlspecialchars($item['description']); ?></textarea>

      <label>Current Image:</label>
      <?php if (!empty($item['image'])): ?>
        <img src="<?php echo $item['image']; ?>" alt="Item Image">
      <?php else: ?>
        <p>No image uploaded</p>
      <?php endif; ?>

      <label>Change Image:</label>
      <input type="file" name="image" accept="image/*">

      <button type="submit">Update Item</button>
    </form>
  </div>
</body>
</html>
