<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "pizza");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Planet | Online Pizza Order</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* ===== Global ===== */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #fff8f5;
      color: #333;
      margin: 0;
      padding: 0;
    }

    h1,h2,h3,h4 {
      font-weight: 700;
    }

    /* ===== Header ===== */
    header {
      background:#DC143C;
      padding: 15px 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .logo h2 {
      color: #fff;
      font-weight: bold;
      font-size: 28px;
    }
    .navbar-nav a {
      font-size: 18px;
      margin: 0 12px;
      color: white;
      text-decoration: none;
      transition: 0.3s;
    }
    .navbar-nav a:hover {
      color: #ffd166;
    }

    /* ===== Hero Section ===== */
    .hero {
      position: relative;
      min-height: 80vh;
      display: grid;
      place-items: center;
      text-align: center;
      color: #fff;
      background: url("pizza1.png") center/cover no-repeat;
      overflow: hidden;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(0deg, rgba(0,0,0,0.55), rgba(0,0,0,0.35));
    }
    .hero-content {
      position: relative;
      z-index: 1;
      padding: 0 1rem;
      max-width: 900px;
    }
    .hero-content h1 {
      font-size: clamp(2rem, 4vw + 1rem, 3.5rem);
      line-height: 1.15;
      margin-bottom: 12px;
      font-weight: 800;
    }
    .hero-content p {
      font-size: clamp(1rem, 1.2vw + .5rem, 1.25rem);
      opacity: .95;
    }
    .btn-hero {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 22px;
      border-radius: 10px;
      background: #ffd166;
      color: #222;
      font-weight: 700;
      text-decoration: none;
      transition: transform .15s ease, background .2s ease;
    }
    .btn-hero:hover { background: #ffb703; transform: translateY(-2px); }

    /* ===== Best Sellers Slider ===== */
    .slider-container {
      max-width: 1100px;
      margin: 50px auto;
      overflow: hidden;
      position: relative;
    }
    .slider-track {
      display: flex;
      gap: 20px;
      transition: transform 0.5s ease-in-out;
    }
    .slide {
      min-width: 280px;
      background: white;
      border-radius: 12px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
    .slide img {
      width: 100%;
      height: 180px;
      border-radius: 10px;
      object-fit: cover;
    }
    .slide h4 {
      margin: 15px 0;
      font-size: 18px;
    }
    .slide button {
      background: #e63946;
      border: none;
      color: #fff;
      padding: 8px 15px;
      border-radius: 6px;
      cursor: pointer;
    }
    .slide button a{
      color:white;
    }
    /* ===== Categories ===== */
    .menu {
      text-align: center;
      padding: 50px 20px;
      background: #fff;
    }
    .menu h2 {
      font-size: 2rem;
      color: #d32f2f;
      margin-bottom: 30px;
    }
    .pizza-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .pizza-item {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s ease;
    }
    .pizza-item:hover { transform: translateY(-5px); }
    .pizza-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .pizza-item h3 { margin: 10px 0; color: #333; }
    .pizza-item p { font-size: 0.9rem; color: #666; flex-grow: 1; }
    .pizza-item h4 { margin: 15px 0; color: #d32f2f; }
    .pizza-item .btn {
      display: inline-block;
      padding: 8px 16px;
      background: #d32f2f;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .pizza-item .btn:hover { background: #b71c1c; }
    
    /* ===== Offers ===== */
    .offers {
      margin: 60px auto;
      text-align: center;
      max-width: 1000px;
    }
    .offer-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .offer-card {
      flex: 1 1 250px;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .offer-card h3 { color: #06d6a0; margin-bottom: 8px; }
    .offer-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }
    .offer-card p { margin: 5px 0; }
    .offer-card .btn { background:#e63946; color:white; padding:6px 12px; border-radius:6px; text-decoration:none; }
    .offer-card .btn:hover { background:#b71c1c; }

    /* ===== Footer ===== */
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

<!-- ===== Header ===== -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark container">
    <h2>🍕 Pizza Planet</h2>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="offer.php">Offers</a></li>
        <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
      </ul>
      <div>
        <a href="cart.php" class="btn btn-warning me-2">🛒 Cart</a>
        <a href="profile.php"><img src="log.png" alt="Login" width="40"></a>
      </div>
    </div>
  </nav>
</header>

<!-- ===== Hero ===== -->
<section class="hero">
  <div class="hero-content">
    <h1>Fresh. Hot. Delicious.</h1>
    <p>Order your favorite pizza in just a few clicks</p>
    <a href="menu.php" class="btn-hero">Explore Menu</a>
  </div>
</section>

<!-- ===== Best Sellers ===== -->
<h2 class="text-center mt-5">🔥 Best Sellers</h2>
<div class="slider-container">
  <div class="slider-track" id="sliderTrack">
    <div class="slide">
      <img src="pp3.png" alt="">
      <h4>Paneer Tikka Butter Masala Pizza</h4>
      <button><a href="menu.php">view</a></button>
    </div>
    <div class="slide">
      <img src="pi2.png" alt="">
      <h4>English Retreat Pizza</h4>
     <button><a href="menu.php">view</a></button>
    </div>
    <div class="slide">
      <img src="farm.png" alt="">
      <h4>Farm Villa Pizza</h4>
      <button><a href="menu.php">view</a></button>
    </div>
    <div class="slide">
      <img src="pi4.png" alt="">
      <h4>Spring Fling Pizza</h4>
      <button><a href="menu.php">view</a></button>
    </div>
  </div>
</div>

<!-- ===== Dynamic Offers ===== -->
<div class="offers">
  <h2>🎁 Our Special Offers</h2>
  <div class="offer-row">
    <?php
    $offers = $conn->query("SELECT * FROM menu WHERE discount > 0 AND (offer_expiry IS NULL OR offer_expiry >= CURDATE()) ORDER BY id DESC LIMIT 6");
    if ($offers->num_rows > 0):
      while($row = $offers->fetch_assoc()): ?>
        <div class="offer-card">
          <img src="<?php echo $row['image']; ?>" alt="pizza">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p><strong><?php echo $row['discount']; ?>% OFF</strong> on ₹<?php echo number_format($row['price'],2); ?></p>
          <?php if ($row['offer_expiry']): ?>
            <p style="color:#888; font-size:0.9rem;">Valid till: <?php echo $row['offer_expiry']; ?></p>
          <?php endif; ?>
          <a href="menu.php" class="btn mt-2">Order Now</a>
        </div>
    <?php endwhile; else: ?>
      <p>❌ No active offers available.</p>
    <?php endif; ?>
  </div>
</div>

<!-- ===== Categories ===== -->
<section id="menu" class="menu">
  <h2>🍴 Explore Categories</h2>
  <div class="pizza-grid">
    <div class="pizza-item">
      <img src="pi1.png" alt="">
      <h3>Pizza</h3>
      <p>Freshly baked garlic bread stuffed with cheese, corn & jalapeños</p>
      <h4>₹250</h4>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="t2.png" alt="">
      <h3>Taco's</h3>
      <p>Freshly baked garlic bread stuffed with cheese, corn & jalapeños</p>
      <h4>₹250</h4>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="p1.png" alt="">
      <h3>Pasta</h3>
      <p>Freshly baked garlic bread stuffed with cheese, corn & jalapeños</p>
      <h4>₹250</h4>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="t2.png" alt="">
      <h3>Sides</h3>
      <p>Freshly baked garlic bread stuffed with cheese, corn & jalapeños</p>
      <h4>₹250</h4>
      <a href="menu.php" class="btn">View</a>
    </div>
  </div>
</section>

<!-- ===== Footer ===== -->
<footer>
  <p>📍 Location: Ahmedabad, India</p>
  <p>📞 Contact: +91 98765 43210</p>
  <p>© 2025 Pizza Planet. All Rights Reserved.</p>
</footer>

<script>
  const track = document.getElementById('sliderTrack');
  let index = 0;
  function moveSlider() {
    index++;
    if (index > 2) index = 0;
    track.style.transform = `translateX(-${index * 300}px)`;
  }
  setInterval(moveSlider, 3000);
</script>

</body>
</html>
