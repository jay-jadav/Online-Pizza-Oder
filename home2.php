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
      background: #e63946;
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
    /* HERO with overlay */
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

/* the overlay */
.hero::after {
  content: "";
  position: absolute;
  inset: 0;
  /* solid dark overlay + subtle gradient for depth */
  background:
    linear-gradient(0deg, rgba(0,0,0,0.55), rgba(0,0,0,0.35));
}

/* ensure text is above overlay */
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

    /* ===== Categories ===== */
    .menu {
      padding: 60px 20px;
      text-align: center;
    }
    .pizza-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
      gap: 25px;
      margin-top: 40px;
    }
    .pizza-item {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .pizza-item:hover {
      transform: translateY(-6px);
    }
    .pizza-item img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 10px;
    }
    .pizza-item h2 {
      margin-top: 15px;
      font-size: 20px;
      color: #e63946;
    }
    .pizza-item p {
      font-size: 14px;
      color: #555;
      margin: 10px 0;
    }
    .pizza-item .btn {
      background: #ffb703;
      border: none;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 6px;
      color: #000;
    }
    .pizza-item .btn:hover {
      background: #fb8500;
    }

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
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .offer-card h3 {
      color: #06d6a0;
    }
    .offer-code {
      margin-top: 12px;
      display: inline-block;
      padding: 8px 15px;
      border: 2px dashed #06d6a0;
      border-radius: 8px;
      font-weight: bold;
    }

    /* ===== Footer ===== */
    footer {
      background: #222;
      color: #ccc;
      padding: 50px 20px;
      margin-top: 60px;
    }
    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(180px,1fr));
      gap: 30px;
    }
    .footer-column h3 {
      color: #fff;
      margin-bottom: 15px;
    }
    .footer-column a {
      text-decoration: none;
      color: #aaa;
      font-size: 14px;
    }
    .footer-column a:hover {
      color: #ffd166;
    }
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.1);
      text-align: center;
      margin-top: 30px;
      padding-top: 20px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- ===== Header ===== -->
<!-- ===== Header ===== -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background:#e63946;">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand fw-bold" href="home.php">🍕 Pizza Planet</a>

      <!-- Toggler (hamburger button) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu Links (centered) -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Offer</a></li>
          <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
        </ul>

        <!-- Right Side: Cart + Login -->
        <div class="d-flex align-items-center ms-lg-3 mt-2 mt-lg-0">
          <a href="cart.php" class="btn btn-warning btn-sm me-2">🛒 Cart</a>
          <a href="login.php"><img src="log.png" width="40" alt="Login"></a>
        </div>
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
      <img src="pp5.png" alt="Peri Peri Pizza">
      <h4>Peri Peri Veg Pizza</h4>
      <button>View</button>
    </div>
    <div class="slide">
      <img src="pp6.png" alt="Cheese Pizza">
      <h4>Cheese Overload</h4>
      <button>View</button>
    </div>
    <div class="slide">
      <img src="pp10.png" alt="Farm Villa Pizza">
      <h4>Farm Villa Pizza</h4>
      <button>View</button>
    </div>
  </div>
</div>

<!-- ===== Offers ===== -->
<div class="offers">
  <h2>🎁 Coupons & Offers</h2>
  <div class="offer-row">
    <div class="offer-card">
      <h3>₹50 OFF</h3>
      <p>Flat ₹50 OFF on min order ₹299</p>
      <span class="offer-code">LPN50</span>
    </div>
    <div class="offer-card">
      <h3>₹75 OFF</h3>
      <p>Flat ₹75 OFF on min order ₹399</p>
      <span class="offer-code">LPN75</span>
    </div>
    <div class="offer-card">
      <h3>₹100 OFF</h3>
      <p>Flat ₹100 OFF on min order ₹599</p>
      <span class="offer-code">LPN100</span>
    </div>
  </div>
</div>

<!-- ===== Categories ===== -->
<section id="menu" class="menu">
  <h2>🍴 Explore Categories</h2>
  <div class="pizza-grid">
    <div class="pizza-item">
      <img src="s1.png" alt="Sides">
      <h2>Sides</h2>
      <p>Freshly baked garlic bread stuffed with cheese, corn & jalapeños</p>
      <h3>₹250</h3>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="pizza.png" alt="Pizza">
      <h2>Pizza</h2>
      <p>Chunky paneer with crisp capsicum and spicy red pepper</p>
      <h3>₹320</h3>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="pasta.png" alt="Pasta">
      <h2>Pasta</h2>
      <p>Fusilli pasta in spicy red dressing with paneer & parsley</p>
      <h3>₹300</h3>
      <a href="menu.php" class="btn">View</a>
    </div>
    <div class="pizza-item">
      <img src="burger.png" alt="Burger">
      <h2>Burger</h2>
      <p>Cheesy burger pizza with paneer and red paprika</p>
      <h3>₹280</h3>
      <a href="menu.php" class="btn">View</a>
    </div>
  </div>
</section>

<!-- ===== Footer ===== -->
<footer>
  <div class="footer-content">
    <div class="footer-column">
      <h3>Menu</h3>
      <a href="#">Sides</a><br>
      <a href="#">Pizza</a><br>
      <a href="#">Pasta</a><br>
      <a href="#">Burger</a>
    </div>
    <div class="footer-column">
      <h3>Company</h3>
      <a href="#">About Us</a><br>
      <a href="#">Careers</a><br>
      <a href="#">Team</a>
    </div>
    <div class="footer-column">
      <h3>Contact</h3>
      <a href="#">Help & Support</a><br>
      <a href="#">Partner with Us</a>
    </div>
    <div class="footer-column">
      <h3>Legal</h3>
      <a href="#">Terms</a><br>
      <a href="#">Privacy Policy</a>
    </div>
  </div>
  <div class="footer-bottom mt-4">
    <p>&copy; 2025 Pizza Planet. All rights reserved.</p>
  </div>
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
