<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Menu</title>
  <style>.pizza-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  padding: 20px;
}

.pizza-item {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  text-align: center;
}

.pizza-item input, .pizza-item select, .pizza-item textarea {
  width: 100%;
  margin: 8px 0;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.pizza-item button {
  background: #ff4500;
  color: white;
  padding: 12px;
  border: none;
  width: 100%;
  border-radius: 5px;
  font-size: 16px;
}
</style>
</head>
<body>

  <header>
    <h1>🍕 Pizza Planet - Menu</h1>
  </header>

  <section class="menu">
    <h2>Choose Your Pizza</h2>
    <form action="order.php" method="POST" class="pizza-grid">

      <!-- Pizza 1 -->
      <div class="pizza-item">
        <img src="https://via.placeholder.com/200" alt="Margherita">
        <h3>Margherita</h3>
        <p>Select Size:</p>
        <select name="pizza_size">
          <option value="Margherita-Regular">Regular - ₹250</option>
          <option value="Margherita-Medium">Medium - ₹350</option>
          <option value="Margherita-Large">Large - ₹450</option>
        </select>
        <input type="hidden" name="pizza" value="Margherita">
        <input type="number" name="quantity" min="1" value="1" required>
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Delivery Address" required></textarea>
        <button type="submit">Order Now</button>
      </div>

      <!-- Add more pizzas similarly below -->
      <div class="pizza-item">
        <img src="https://via.placeholder.com/200" alt="Farmhouse">
        <h3>Farmhouse</h3>
        <p>Select Size:</p>
        <select name="pizza_size">
          <option value="Farmhouse-Regular">Regular - ₹300</option>
          <option value="Farmhouse-Medium">Medium - ₹400</option>
          <option value="Farmhouse-Large">Large - ₹500</option>
        </select>
        <input type="hidden" name="pizza" value="Farmhouse">
        <input type="number" name="quantity" min="1" value="1" required>
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Delivery Address" required></textarea>
        <button type="submit">Order Now</button>
      </div>

    </form>
  </section>

</body>
</html>
