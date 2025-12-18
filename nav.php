<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Planet</title>
  <style>
    /* Basic Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #fff8f0;
}

/* Header and Navbar */
header {
  background-color: #e61919;
  padding: 15px 20px;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.logo {
  color: white;
  font-size: 28px;
  font-weight: bold;
}

nav a {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-size: 20px;
  transition: color 0.3s ease;
}

nav a:hover {
  color: #ffd2d2;
}

  </style>
</head>
<body>

  <header>
    <div class="navbar">
      <div class="logo">🍕 Pizza Planet</div>
      <nav>
        <a href="#">Home</a>
        <a href="menu.php">Menu</a>
        <a href="contactus.php">Contact Us</a>
        <a href="order.php">Order Now</a>
        <a href="login.php">Login</a>
      </nav>
    </div>
  </header>

</body>
</html>
