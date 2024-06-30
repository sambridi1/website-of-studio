<?php include("db_connection.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    
</head>
<body>

<header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>Sangeet</span>Sadhana</a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="index.php">about</a>
            <a href="index.php">courses</a>
            
            <a href="index.php">gallery</a>
            <!-- <a href="#registration">Booking</a> -->
            <a href="index.php">contact</a>
            <!-- <a href="login.php" class="btn">Login</a> -->
            <?php  
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
        {
            // Display user info and logout link
            echo '<i class="fas fa-user"></i> <span>' . $_SESSION['username'] . '</span>';
            echo '<a class="menu_hover" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
        }
        else
        {
            // Display login link
            echo '<i class="fas fa-sign-in-alt"></i> <a class="menu_hover" href="login.php">Login</a>';
        }
        ?>

        </nav>
        </nav>
    <!-- PHP code for user session -->
    <?php  
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
        // User is logged in, hide admin login icon
    }
    else
    {
        // Display admin login icon
        echo '
        <div class="icons">
            <a href="adminlogin.php" class="icon">
                <i class="fas fa-user" id="login-btn"></i>
            </a>
        </div>';
    }
    ?>



    </header>

    <div class="container">
        <form name="admissionForm" action="#" method="POST" onsubmit="return validateForm()">
            <div class="title">
                Admission Form
            </div>
            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>

                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>

                <div class="input_field">
                    <label>Course</label>
                    <div class="custom_select">
                        <select name="course" required>
                            <option value="">Select</option>
                            <option value="Hiphop Dance">Hiphop Dance</option>
                            <option value="Ballet Dance">Ballet Dance</option>
                            <option value="Nepali Cultural Dance">Nepali Cultural Dance</option>
                            <option value="Kathak">Kathak</option>
                            <option value="Bharatnatyam">Bharatnatyam</option>
                            <option value="Tap Dance">Tap Dance</option>
                            <option value="Flute Music">Flute Music</option>
                            <option value="Guitar">Guitar</option>
                            <option value="Violin">Violin</option>
                            <option value="Drum">Drum</option>
                            <option value="Trumpet">Trumpet</option>
                            <option value="Harmoni">Harmoni</option>
                        </select>
                    </div>
                </div> 

                <div class="input_field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" required>
                </div>

                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone">
                </div>

                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address"></textarea>
                </div>

                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="submit">
                </div>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var fname = document.forms["admissionForm"]["fname"].value;
            var lname = document.forms["admissionForm"]["lname"].value;
            var course = document.forms["admissionForm"]["course"].value;
            var email = document.forms["admissionForm"]["email"].value;
            var phone = document.forms["admissionForm"]["phone"].value;

            var nameRegex = /^[A-Za-z]+$/;

            if (fname.trim() == "") {
                alert("Please enter your First Name.");
                return false;
            } else if (!nameRegex.test(fname)) {
                alert("First Name should contain only alphabetic characters.");
                return false;
            }

            if (lname.trim() == "") {
                alert("Please enter your Last Name.");
                return false;
            } else if (!nameRegex.test(lname)) {
                alert("Last Name should contain only alphabetic characters.");
                return false;
            }

            if (course.trim() == "") {
                alert("Please select a Course.");
                return false;
            }

            if (email.trim() == "") {
                alert("Please enter your Email Address.");
                return false;
            } else {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert("Please enter a valid Email Address.");
                    return false;
                }
            }

            if (phone.trim() != "") {
                var phoneRegex = /^\d{10}$/; // Assuming a 10-digit phone number
                if (!phoneRegex.test(phone)) {
                    alert("Please enter a valid Phone Number (10 digits).");
                    return false;
                }
            }

            return true;
        }
    </script>





</body>
</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "dance";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $fname = sanitize_input($_POST["fname"]);
    $lname = sanitize_input($_POST["lname"]);
    $course = sanitize_input($_POST["course"]);
    $email = sanitize_input($_POST["email"]);
    $phone = sanitize_input($_POST["phone"]);
    $address = sanitize_input($_POST["address"]);

    // Insert data into the database
    $sql = "INSERT INTO form (fname, lname, course, email, phone, address) VALUES ('$fname', '$lname', '$course', '$email', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        // Email confirmation
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shresthasambridi771@gmail.com';
            $mail->Password = 'jksy nlrw gkvg tnxr
            ';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Disable SSL certificate verification (for debugging)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $mail->setFrom('your_email@example.com', 'Sangeet Sadhana');
            $mail->addAddress($email, $fname . ' ' . $lname);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Booking Confirmation';
            $mail->Body = "
            <b>Dear $fname,</b><br>
            I hope this email finds you well.<br><br>
            Your registration details have been successfully received for $course. We are thrilled to have you onboard and look forward to your participation.<br><br>
            Should you have any further questions or require additional information, please don't hesitate to reach out to us. Our team is here to assist you every step of the way.<br><br>
            Thank you once again for choosing <b>Sangeet Sadhna Music and Dance Class</b>. We're excited about the journey ahead!<br><br>
            <b>Warm regards,</b><br>
            Sangeet Sadhna Music and Dance Class<br>
            Email: shresthasambridi771@gmail.com<br>
            Phone: 9810172164
        ";

            // Send email
            $mail->send();
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Booking Successful</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
            </head>
            <body style="font-family: Arial, sans-serif; background-image: url(\'images/wallpaperflare.com_wallpaper.jpg\'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
                <div style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); text-align: center;">
                    <p style="font-size: 24px; color: #4CAF50;">Booking successful.</p>
                    <p style="font-size: 18px; color: #333;">Confirmation email has been sent.</p>
                </div>
            </body>
            </html>';

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

