<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us - Pizza Planet</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #fff8f0;
      color: #333;
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }
     header { background:#DC143C; }
    .navbar-brand { font-size:26px; font-weight:bold; color:#fff !important; }
    .nav-link { color:#fff !important; font-size:18px; margin:0 8px; }
    .nav-link:hover { color:#ffe066 !important; }


    /* Hero About Section */
    .about-section {
      padding: 80px 20px;
      text-align: center;
      background: linear-gradient(rgba(220,20,60,0.7), rgba(220,20,60,0.7)),
                  url('pizza-bg.jpg') center/cover no-repeat;
      color: white;
    }
    .about-section h1 {
      font-size: 42px;
      margin-bottom: 20px;
      font-weight: 800;
    }
    .about-section p {
      max-width: 850px;
      margin: auto;
      font-size: 18px;
      opacity: 0.95;
    }

    /* Mission Section */
    .mission {
      padding: 60px 20px;
      background: #fff;
      text-align: center;
    }
    .mission h2 {
      color: #DC143C;
      margin-bottom: 15px;
      font-size: 32px;
    }
    .mission p {
      max-width: 750px;
      margin: auto;
      font-size: 18px;
      color: #444;
    }

    /* Team Section */
    .team {
      padding: 70px 20px;
      background: #ffe6e6;
      text-align: center;
    }
    .team h2 {
      color: #DC143C;
      margin-bottom: 40px;
      font-size: 32px;
    }
    .team-members {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 30px;
      max-width: 1000px;
      margin: auto;
    }
    .member {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .member:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 18px rgba(0,0,0,0.15);
    }
    .member img {
      width: 100%;
      border-radius: 12px;
      height: 220px;
      object-fit: cover;
    }
    .member h3 {
      margin: 15px 0 5px;
      font-size: 20px;
      color: #333;
    }
    .member p {
      color: #777;
      font-size: 16px;
    }

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

<!-- ✅ Navbar (same as Contact page) -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background:#DC143C;">
    <div class="container">
      <a class="navbar-brand" href="#">🍕 Pizza Planet</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="offer.php">Offers</a></li>
          <li class="nav-item"><a class="nav-link active" href="aboutus.php">About Us</a></li>
        </ul>
        <div>
          <a href="cart.php" class="btn btn-warning me-2">🛒 Cart</a>
          <a href="login.php"><img src="log.png" alt="Login" width="40"></a>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- ✅ About Section with Hero BG -->
<section class="about-section">
  <h1>About Pizza Planet</h1>
  <p>
    Welcome to <b>Pizza Planet</b> – the ultimate destination for delicious, freshly baked pizzas, 
    sides, pasta and more! Since our journey began, we’ve been committed to serving happiness in every slice. 
    With high-quality ingredients, authentic recipes, and lots of love, Pizza Planet has become a go-to 
    choice for pizza lovers.
  </p>
</section>

<!-- ✅ Mission -->
<section class="mission">
  <h2>Our Mission</h2>
  <p>
    To deliver mouth-watering pizzas at affordable prices, while maintaining top-notch quality 
    and customer satisfaction. We believe good food has the power to bring people together, 
    and that’s exactly what we strive for.
  </p>
</section>

<!-- ✅ Team -->
<section class="team">
  <h2>Meet Our Team</h2>
  <div class="team-members">
    <div class="member">
      <img src="chef1.png" alt="Chef">
      <h3>Rajesh Kumar</h3>
      <p>Head Chef</p>
    </div>
    <div class="member">
      <img src="chef2.png" alt="Manager">
      <h3>Anita Sharma</h3>
      <p>Restaurant Manager</p>
    </div>
    <div class="member">
      <img src="chef3.png" alt="Delivery">
      <h3>Vikram Singh</h3>
      <p>Delivery Lead</p>
    </div>
  </div>
</section>

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
