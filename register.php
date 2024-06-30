<?php
require('db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login & Signup</title>
<link rel="stylesheet" href="register.css">
</head>
<body>
<div class="background">
    <div class="box">
        <div class="container" id="signupForm">
            <form method="POST" action="login_register.php" onsubmit="return validateForm()">
                <h2>Signup</h2>
                <input type="text" placeholder="Full Name" id="name" name="fullname">
                <span id="name-error" class="error"></span>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="E-mail" id="email" name="email" required>
                <span id="email-error" class="error"></span>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="register-btn" name="register">REGISTER</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</div>
<script>
function validateForm() {
    var nameInput = document.getElementById('name').value;
    var emailInput = document.getElementById('email').value;

    // Reset error messages
    document.getElementById('name-error').innerText = "";
    document.getElementById('email-error').innerText = "";

    // Validate Name
    if (!nameInput.match(/^[a-zA-Z ]+$/)) {
        document.getElementById('name-error').innerText = "Please enter alphabetical characters only.";
        return false;
    }

    // Validate Email
    if (!emailInput.match(/^\S+@\S+\.\S+$/)) {
        document.getElementById('email-error').innerText = "Please enter a valid email address.";
        return false;
    }

    return true; // Form submission allowed
}
</script>

</body>
</html>


</body>
</html>
