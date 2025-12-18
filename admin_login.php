<?php
session_start();

// अगर पहले से लॉगिन है तो सीधे admin page पर भेज दो
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit();
}

// --- Fixed Admin Credentials ---
$admin_username = "admin";
$admin_password = "12345";  // आप यहाँ अपना password change कर सकते हैं

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $admin_username && $password === $admin_password) {
        // सुरक्षा: session fixation से बचने के लिए id regenerate करो
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        // वैकल्पिक: admin नाम भी रखें
        $_SESSION['admin_user'] = $admin_username;
        header("Location: admin.php");
        exit();
    } else {
        $error = "❌ Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
    width: 300px;
    text-align: center;
}
.login-box h2 {
    margin-bottom: 20px;
    color: #ff4500;
}
input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
}
button {
    background: #ff4500;
    color: white;
    border: none;
    padding: 10px 15px;
    width: 100%;
    border-radius: 6px;
    cursor: pointer;
}
button:hover {
    background: #e63900;
}
.error { color: red; margin-top: 10px; }
</style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="post" autocomplete="off">
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php if($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
    </div>
</body>
</html>
