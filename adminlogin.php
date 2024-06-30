<?php
require("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login & Signup</title>
<link rel="stylesheet" href="admin.css">
</head>
<body class="background">

<div class="box">
    <div class="container" id="loginForm">
              <form method="POST">
                <h2>Admin Login</h2>
                <input type="text" placeholder="Admin Name" name="AdminName">
                <input type="password" placeholder="Password" name="AdminPassword">
                <button type="submit" name="Signin">Sign In</button>
              </form>
    </div>
</div>

</body>
</html>


<?php
if(isset($_POST['Signin']))
{
    $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result))
    {
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminName'];
        header("location: admin_pannel.php");
    }
    else{
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>
</body>
</html>