<?php
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$result = $conn->query("SELECT * FROM menu WHERE discount > 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Special Offers - Pizza Planet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background:#fffdf9; font-family:'Segoe UI',sans-serif; margin:0; }

    /* Navbar */
    header { background:#DC143C; }
    .navbar-brand { font-size:26px; font-weight:bold; color:#fff !important; }
    .nav-link { color:#fff !important; font-size:18px; margin:0 8px; }
    .nav-link:hover { color:#ffe066 !important; }

    /* Hero */
    .hero { text-align:center; padding:60px 20px; background:#ffe6e6; }
    .hero h1 { font-size:42px; font-weight:700; color:#222; }
    .hero p { font-size:18px; color:#555; max-width:600px; margin:15px auto; }

    /* Cards */
    .card { border:none; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,.1); }
    .card img { border-radius:15px 15px 0 0; height:200px; object-fit:cover; }
    .price { font-size:18px; font-weight:bold; color:#DC143C; }
    .old-price { text-decoration:line-through; color:#888; margin-right:8px; }

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
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link active" href="offer.php">Offers</a></li>
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
  <h1>🔥 Special Offers 🔥</h1>
  <p>Enjoy our limited-time discounts on your favorite pizzas, pastas, sides and more!</p>
</section>

<!-- ✅ Offers Section -->
<div class="container my-5">
  <div class="row g-4">
    <?php while ($row = $result->fetch_assoc()): 
      $original = $row['price'];
      $final = $original - ($original * $row['discount'] / 100);
    ?>
      <div class="col-md-3">
        <div class="card">
          <img src="<?php echo $row['image']; ?>" alt="">
          <div class="card-body text-center">
            <h5><?php echo $row['name']; ?></h5>
            <p>
              <span class="old-price">₹<?php echo number_format($original,2); ?></span>
              <span class="price">₹<?php echo number_format($final,2); ?></span>
            </p>
            <form method="post" action="add_cart.php">
              <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
              <input type="hidden" name="price" value="<?php echo $final; ?>">
              <input type="hidden" name="img" value="<?php echo $row['image']; ?>">
              <input type="hidden" name="size" value="<?php echo $row['size']; ?>">
              <input type="hidden" name="qty" value="1">
              <button type="submit" class="btn btn-danger">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- ✅ Footer -->
<footer>
  <p>📍 Location: Ahmedabad, India</p>
  <p>📞 Contact: +91 98765 43210</p>
  <p>© 2025 Pizza Planet. All Rights Reserved.</p>
</footer>


<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
