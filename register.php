<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST['name']);
    $username = strtolower(trim($_POST['username']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username exists
    $check = $conn->prepare("SELECT id FROM user WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "⚠️ Username already taken!";
    } else {
        $stmt = $conn->prepare("INSERT INTO user (name, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $username, $password);
        $stmt->execute();
        $stmt->close();

        header("Location: login.php?success=1");
        exit;
    }
    $check->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>
<style>
body { font-family: Poppins, Arial; background: #e6f7ff; margin:0; padding:0; }
.form-box {
    width: 360px; margin: 90px auto; background: #fff; padding: 25px;
    border-radius: 15px; box-shadow: 0 0 18px rgba(0,0,0,0.1); text-align:center;
}
h2 { color:#008080; }
input {
    width:100%; padding:10px; margin:8px 0; border:1px solid #ccc;
    border-radius:6px; font-size:15px;
}
button {
    width:100%; padding:10px; background:#008c7a;
    color:white; border:none; border-radius:6px; cursor:pointer; font-size:16px;
}
button:hover { background:#016d5d; }
a { color:#007BFF; }
.error { color:red; font-size:14px; }
</style>
</head>
<body>

<div class="form-box">
    <h2>Register</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required />
        <input type="text" name="username" placeholder="Username (unique)" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Sign Up</button>
    </form>

    <p style="margin-top:10px;">
        Already registered?  
        <a href="login.php">Login</a>
    </p>
</div>

</body>
</html>
