<?php
session_start();

// सभी session variables साफ करो
$_SESSION = [];

// session cookie भी हटाओ (अगर exist करे)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// session destroy करो
session_destroy();

// login page पर redirect करो
header("Location: admin_login.php");
exit();
?>
