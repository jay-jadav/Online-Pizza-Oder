<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = $_POST['name'];
    $category    = $_POST['category'];
    $size        = $_POST['size'];
    $price       = $_POST['price'];
    $description = $_POST['description'];

    // Image Upload
    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "images/"; // images folder same directory me hona chahiye
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $filename = time() . "_" . basename($_FILES["image"]["name"]);
        $image = $target_dir . $filename;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
            $msg = "❌ Image upload failed!";
            $image = "";
        }
    }

    if ($image != "") {
        $stmt = $conn->prepare("INSERT INTO menu (name, category, size, price, description, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $name, $category, $size, $price, $description, $image);
    } else {
        $stmt = $conn->prepare("INSERT INTO menu (name, category, size, price, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $name, $category, $size, $price, $description);
    }

    if ($stmt->execute()) {
        $msg = "✅ Item added successfully!";
    } else {
        $msg = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Menu Item</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f9f9f9; }
    .container { width: 500px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px #ccc; }
    h2 { text-align: center; color: #DC143C; }
    label { font-weight: bold; }
    input, select, textarea { width: 100%; padding: 8px; margin: 8px 0; }
    button, a.btn { display: inline-block; margin: 5px 2px; text-align: center; background: #DC143C; color: white; padding: 5px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; }
    button:hover, a.btn:hover { background: #a30f2d; }
    .msg { text-align: center; margin: 10px; font-weight: bold; }
    .success { color: green; }
    .error { color: red; }
    .actions { text-align: center; margin-top: 15px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add Menu Item</h2>

    <?php if ($msg != ""): ?>
      <p class="msg <?php echo (strpos($msg, '✅') !== false) ? 'success' : 'error'; ?>">
        <?php echo $msg; ?>
      </p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
      <label>Name:</label>
      <input type="text" name="name" required>

      <label>Category:</label>
      <select name="category" required>
        <option value="Pizza">Pizza</option>
        <option value="Taco's">Taco's</option>
        <option value="Sides">Sides</option>
        <option value="Pasta">Pasta</option>
        <option value="Drinks">Drinks</option>
      </select>

      <label>Size:</label>
      <select name="size" required>
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
      </select>

      <label>Price:</label>
      <input type="number" name="price" required>

      <label>Description:</label>
      <textarea name="description" rows="3"></textarea>

      <label>Image:</label>
      <input type="file" name="image">

      <div class="actions">
        <button type="submit">Add Item</button>
        <a href="view_food.php" class="btn">View Items</a>
        <!-- Option 1: Fixed page -->
        <a href="admin.php" class="btn">⬅ Back</a>
        <!-- Option 2: Previous page -->
        <!-- <a href="javascript:history.back()" class="btn">⬅ Back</a> -->
      </div>
    </form>
  </div>
</body>
</html>
