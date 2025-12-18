<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Slides - Pizzeria Restaurant</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: #fff;
  color: #333;
}

.top-bar {
  background: #111;
  color: white;
  padding: 8px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
}

.top-bar .order-btn {
  background: red;
  color: white;
  padding: 6px 12px;
  border-radius: 4px;
  text-decoration: none;
}

.nav-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 30px;
  border-bottom: 1px solid #eee;
}

.logo {
  font-size: 24px;
  font-weight: bold;
}

.logo span {
  display: block;
  font-size: 12px;
  color: gray;
}

nav a {
  margin: 0 12px;
  text-decoration: none;
  color: #333;
  font-weight: 500;
}

.icons {
  font-size: 18px;
}



.hero {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 50px;
}

.hero-text {
  max-width: 500px;
}

.hero-text h2 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 10px;
}

.hero-text h3 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 10px;
}

.hero-text p {
  margin-bottom: 15px;
  color: gray;
}

.details span {
  display: inline-block;
  margin-right: 20px;
  font-size: 14px;
}

.price-order {
  margin-top: 20px;
  display: flex;
  align-items: center;
  gap: 20px;
}

.price-order button {
  background: red;
  color: white;
  padding: 10px 20px;
  border: none;
  font-weight: bold;
  border-radius: 20px;
  cursor: pointer;
}

.hero-img img {
  width: 400px;
  height: auto;
}

.menu-section {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin: 40px;
}

.menu-card {
  text-align: center;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  width: 200px;
}

.menu-card img {
  width: 100%;
  height: auto;
}

.menu-card h4 {
  margin-top: 10px;
  font-size: 18px;
}

.menu-card p {
  margin-top: 5px;
  font-weight: bold;
}

.menu-card.yellow {
  background: #ffe875;
}

.menu-card.offer::after {
  content: "Offer";
  position: absolute;
  background: #000;
  color: #fff;
  padding: 3px 6px;
  font-size: 12px;
  top: 10px;
  right: 10px;
  border-radius: 4px;
}

.old-price {
  text-decoration: line-through;
  color: #999;
  margin-right: 6px;
}

  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

  <header>
    <div class="top-bar">
      <span>📞 +123 456 789</span>
      <a href="#" class="order-btn">Order Online</a>
    </div>
    <div class="nav-bar">
      <h1 class="logo">Slides <span>Pizzeria Restaurant</span></h1>
      <nav>
        <a href="#">Home Pages</a>
        <a href="#">Blog</a>
        <a href="#">Pages</a>
        <a href="#">Menu</a>
        <a href="#">Locations</a>
        <a href="#">Contact Us</a>
      </nav>
      <div class="icons">
        🛒 <span>0</span>
        🔍
      </div>
    </div>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h2>TRULY ITALIAN</h2>
      <h3>Pepperoni Pizza With Thin Crust</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      <div class="details">
        <span>🍕 480 Calories</span>
        <span>🧀 120g Mozarella</span>
      </div>
      <div class="price-order">
        <button>ORDER</button>
        <span>$10.99</span>
      </div>
    </div>
    <div class="hero-img">
      <img src="p24.png.jpeg" alt="Pizza Image">
    </div>
  </section>

  <section class="menu-section">
    <div class="menu-card yellow">
      <img src="pp4.png" alt="Specialty">
      <h4>Specialty</h4>
      <p>$10.99</p>
    </div>
    <div class="menu-card">
      <img src="pp2.png" alt="Ham & Cheese">
      <h4>Ham & Cheese</h4>
      <p>$17.99</p>
    </div>
    <div class="menu-card offer">
      <img src="pp3.png" alt="Vegetarian">
      <h4>Vegetarian</h4>
      <p><span class="old-price">$9.99</span> $6.99</p>
    </div>
  </section>

</body>
</html>
