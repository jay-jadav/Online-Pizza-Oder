<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Categories
$categories = ["Pizza", "Taco's", "Pasta", "Sides", "Drinks"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizza Planet - Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family: 'Segoe UI', sans-serif; background:#fffdf9; margin:0; }
    
    /* Navbar */
    header { background:#DC143C; }
    .navbar-brand { font-size:26px; font-weight:bold; color:#fff !important; }
    .nav-link { color:#fff !important; font-size:18px; margin:0 8px; }
    .nav-link:hover { color:#ffe066 !important; }

    /* Hero */
    .hero { text-align:center; padding:70px 20px; background:#ffe6e6; }
    .hero h1 { font-size:45px; font-weight:700; color:#222; }
    .hero p { font-size:18px; color:#555; max-width:600px; margin:15px auto; }

    /* Categories Tabs */
    .category-tabs { margin:30px auto; text-align:center; }
    .category-tabs button { margin:5px; border-radius:30px; padding:10px 25px; font-size:16px; border:none; background:#f1f1f1; }
    .category-tabs button.active, .category-tabs button:hover { background:#DC143C; color:#fff; }

    /* Cards */
    .menu-section { margin:50px auto; }
    .card { border:none; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.1); transition:.3s; }
    .card:hover { transform:translateY(-6px); }
    .card img { border-radius:15px 15px 0 0; height:200px; object-fit:cover; }
    .card-body { text-align:center; }
    .card-title { font-size:20px; font-weight:600; margin:10px 0; }
    .card-text { font-size:14px; color:#666; min-height:30px; }
    .price { font-size:18px; font-weight:bold; color:#DC143C; margin:10px 0; }
    .btn-add { background:#DC143C; border:none; color:#fff; border-radius:8px; padding:8px 20px; }
    .btn-add:hover { background:#a50f2d; }

    /* Footer */
    footer {
      background: #161212ff;
      color: #fff;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
    footer p { margin: 5px 0; font-size: 0.9rem; }
    
  </style>
</head>
<body>

<!-- ✅ Navbar -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark container">
    <a class="navbar-brand" href="#">🍕 Pizza Planet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="offer.php">Offers</a></li>
        <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
      </ul>
      <div>
        <a href="cart.php" class="btn btn-warning me-2">🛒 Cart</a>
        <a href="login.php"><img src="log.png" alt="Login" width="40"></a>
      </div>
    </div>
  </nav>
</header>

<!-- ✅ Hero Section -->
<section class="hero">
  <h1>Delicious Food, Freshly Made 🍴</h1>
  <p>Choose from our wide variety of pizzas, pastas, tacos, and more. Add your favorites to the cart and enjoy!</p>
</section>

<!-- ✅ Categories Tabs -->
<div class="category-tabs">
  <?php foreach ($categories as $i => $cat) { ?>
    <button class="cat-btn <?php echo $i==0?'active':''; ?>" data-target="#<?php echo strtolower($cat); ?>">
      <?php echo $cat; ?>
    </button>
  <?php } ?>
</div>

<!-- ✅ Menu Sections -->
<div class="container">
  <?php foreach ($categories as $i => $cat) { ?>
    <div class="menu-section" id="<?php echo strtolower($cat); ?>">
      <h2 class="text-center mb-4"><?php echo $cat; ?></h2>
      <div class="row g-4">
        <?php
          $cat_escaped = $conn->real_escape_string($cat);
          $result = $conn->query("SELECT * FROM menu WHERE category='$cat_escaped'");
          if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-3">
          <div class="card">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <?php if (!empty($row['description'])) { ?>
                <p class="card-text"><?php echo $row['description']; ?></p>
              <?php } ?>
              <p class="price">₹<?php echo $row['price']; ?></p>
              <form method="post" action="add_cart.php">
                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="img" value="<?php echo $row['image']; ?>">
                <input type="hidden" name="size" value="<?php echo $row['size']; ?>">
                <input type="hidden" name="qty" value="1">
                <button type="submit" class="btn-add">Add to Cart</button>
              </form>
            </div>
          </div>
        </div>
        <?php } } else { ?>
          <p class="text-center">No items available in <?php echo $cat; ?> category.</p>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</div>

<!-- ✅ Footer -->
<footer>
  <p>📍 Location: Ahmedabad, India</p>
  <p>📞 Contact: +91 98765 43210</p>
  <p>© 2025 Pizza Planet. All Rights Reserved.</p>
</footer>
<!-- ✅ Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Smooth scroll & active tab
  document.querySelectorAll('.cat-btn').forEach(btn=>{
    btn.addEventListener('click',()=>{
      document.querySelectorAll('.cat-btn').forEach(b=>b.classList.remove('active'));
      btn.classList.add('active');
      document.querySelector(btn.dataset.target).scrollIntoView({behavior:'smooth'});
    });
  });
</script>
</body>
</html>
