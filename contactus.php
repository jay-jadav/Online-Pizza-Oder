<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contactus.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Pizza Planet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family:'Segoe UI', sans-serif; background:#fffdf9; margin:0; }

    /* Navbar */
    header { background:#DC143C; }
    .navbar-brand { font-size:26px; font-weight:bold; color:#fff !important; }
    .nav-link { color:#fff !important; font-size:18px; margin:0 8px; }
    .nav-link:hover { color:#ffe066 !important; }

    /* Page Header */
    .hero { text-align:center; padding:60px 20px; background:#ffe6e6; }
    .hero h1 { font-size:42px; font-weight:700; color:#222; }
    .hero p { font-size:18px; color:#555; max-width:600px; margin:15px auto; }

    /* Contact Section */
    .contact-container { display:flex; flex-wrap:wrap; justify-content:space-around; padding:40px 20px; }
    .contact-form, .contact-info { background:white; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.1); border-radius:10px; width:100%; max-width:450px; margin:20px; }
    .contact-form h2, .contact-info h2 { margin-bottom:20px; color:#e63946; }
    .contact-form input, .contact-form textarea { width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:6px; font-size:16px; }
    .contact-form button { background:#e63946; color:white; padding:10px 20px; font-size:16px; border:none; border-radius:6px; cursor:pointer; }
    .contact-form button:hover { background:#d62828; }
    .contact-info p { margin:10px 0; font-size:15px; line-height:1.6; }

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
        <li class="nav-item"><a class="nav-link active" href="contactus.php">Contact Us</a></li>
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

<!-- ✅ Page Header -->
<section class="hero">
  <h1>Contact Us 📞</h1>
  <p>We’d love to hear from you! Send us a message and we’ll respond quickly.</p>
</section>

<!-- ✅ Contact Section -->
<main class="contact-container">
  <section class="contact-form">
    <h2>Send us a Message</h2>
    <form action="contactus.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </section>

  <section class="contact-info">
    <h2>Get in Touch</h2>
    <p><strong>Address:</strong><br> Pizza Planet HQ,<br> 123 Cheese Street, Foodville</p>
    <p><strong>Phone:</strong> +91 98765 43210</p>
    <p><strong>Email:</strong> support@pizzaplanet.com</p>
    <p><strong>Hours:</strong><br> Mon-Sun: 10:00 AM - 11:00 PM</p>
  </section>
</main>

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
