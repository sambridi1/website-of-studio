<?php
require('db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login & Signup</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="background">
    <div class="box">
        <div class="container" id="loginForm">
            <form method="POST" action="login_register.php">
                <h2>User Login</h2>
                <input type="text" placeholder="E-mail or Username" name="email_username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</div>

</body>
</html>
