<?php
session_start();
include "db.php";

// Agar pehle se login he to direct profile
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, name, username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $stored_uname, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['username'] = $stored_uname;
            header("Location: profile.php");
            exit;
        } else {
            $error = "❌ Wrong password!";
        }

    } else {
        $error = "⚠️ Username does not exist!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body { font-family:Poppins,Arial; background:#e6f7ff; margin:0; padding:0;}
.form-box {
    width:360px; margin:100px auto; background:#fff; padding:25px;
    border-radius:15px; text-align:center;
    box-shadow:0 0 18px rgba(0,0,0,0.1);
}
input {
    width:100%; padding:10px; margin:8px 0; border:1px solid #bbb;
    border-radius:6px; font-size:15px;
}
button {
    width:100%; padding:10px; margin-top:8px;
    background:#008c7a; color:white; font-size:16px;
    border:none; border-radius:6px; cursor:pointer;
}
button:hover { background:#016d5d; }
h2 { color:#008080; }
.error { color:red; font-size:14px; }
.success { color:green; font-size:14px; }
a { color:#007BFF; font-weight:bold; }
</style>
</head>

<body>
<div class="form-box">
    <h2>Login</h2>

    <?php 
        if(isset($_GET['success'])) echo "<p class='success'>🎉 Registration Successful! Login Now</p>";
        if(isset($error)) echo "<p class='error'>$error</p>"; 
    ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required />
        <input type="password" name="password" placeholder="Enter Password" required />
        <button type="submit">Login</button>
    </form>
    
    <p style="margin-top:10px;">
       New user? <a href="register.php">Create account</a>
    </p>
</div>
</body>
</html>
