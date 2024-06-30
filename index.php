<?php
require('db_connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance and Music class website </title>
    <!---Cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!---css link-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <!---header section ends---->
 <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>Sangeet</span>Sadhana</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#courses">courses</a>
            
            <a href="#gallery">gallery</a>
            <a href="#contact">contact</a>
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

    <!--header section ends-->



    <!--  home section starts -->

    <section class="home" id="home">
    <div class="content">
            <h3>Enhance your Passion</h3>
            <p>For Dance and Music</p>
            <!-- "Join Us" button with onclick event -->
            <button class="btn" onclick="joinUs()">Join Us</button>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/twogirls.mp4"></span>
            <span class="vid-btn" data-src="images/black.mp4"></span>
            <span class="vid-btn" data-src="images/love.mp4"></span>
            <span class="vid-btn" data-src="images/boy.mp4"></span>


            <span class="vid-btn" data-src="images/pink.mp4"></span>

        </div>

        <div class="video-container">
            <video src="images/twogirls.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>


    <script>
        // Function to handle "Join Us" button click
        function joinUs() {
            // Check if user is logged in
            <?php  
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
                // If logged in, redirect to booking.php
                echo "window.location.href = 'booking.php';";
            }
            else
            {
                // If not logged in, display alert and redirect to login.php
                echo "alert('You have to login first.');";
                echo "window.location.href = 'login.php';";
            }
            ?>
        }
    </script>

    
<!--  home section ends  -->


<!--  about section starts  -->
<section class="about" id="about">

    <h1 class="heading"> 
        <span> a </span>
        <span> b </span>
        <span> o </span>
        <span> u </span>
        <span> t </span>
        <span class="space"> </span>
        <span> u </span>
        <span> s </span>
    </h1>

    <div class="row">
        <div class="video-container">
            <video src="images/boy.mp4" loop autoplay muted></video>
            <video src="images/curl.mp4" loop autoplay muted></video>

            <h3>Only in Dance and Music</h3>

        </div>
        <div class="content">
            <h3>Why choose us?</h3>
           <br>
           <br>
           <br>
           <br>
            <p>At Sangeet Sadhana , we aim to bring  music & dance to the 21st century, <br><br>by making the art accessible to anyone, anywhere. <br><br>Our  music classes and dance classes are designed to impart skill and <br><br>training from masters in the industry, in a way that’s fun and engaging. </p>
            <br>
            <br>
            <br>
             <h2>Learn musical & dance concepts</h2>
             <h2>Spend half the time as a traditional class!</h2>
             <h2>Have fun. Lots of it. Promise!</h2>
        </div>
    </div>
</section>

<!---about section ends-->

<!---Courses section starts-->
<section class="courses" id="courses">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>u</span>
        <span>r</span>
        <span>s</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

    <?php
// Include database connection file
include("db_connection.php");

// Retrieve course details from the database
$query = "SELECT * FROM course";
$result = mysqli_query($con, $query);

// Check for errors in the query execution
if (!$result) {
    die("Error fetching courses: " . mysqli_error($con));
}

// Check if there are any courses available
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Display course information with options to update or delete
        echo "<div class='box'>";
        echo "<img src='" . $row['image'] . "' alt='Course Image'>";
        echo "<div class='content'>";
        echo "<h3>" . $row['course_name'] . "</h3>";
        echo "<div class='price'>Rs. " . $row['price'] . "</div>";
        echo "<a href='booking.php' class='btn'>Join Us</a>";
        echo "</div></div>";
    }
} else {
    // Display message if no courses are available
    echo "No courses found.";
}

// Close database connection
mysqli_close($con);
?>
        
    </div>
</section>

<!---Courses section ends-->


<!--Gallery section starts-->
<section class="gallery" id="gallery">
    
    
    
      <h1 class="heading"> 
        <span> G</span>
        <span> A</span>
        <span> L </span>
        <span> L </span>
        <span> E </span>
        <span> R </span>
        <span> Y </span>
      </h1>
    
       
    <div class="box2-container">    
        <div class="box">
          <a href="images/1.jpg"><img  id="img-gal" src="images/1.jpg" alt=""></a>    
       </div>

       <div class="box">
         <a href="images/2.jpg"><img  id="img-gal" src="images/2.jpg" alt=""></a>    
       </div>
       <div class="box">
         <a href="images/3.jpg"><img  id="img-gal" src="images/3.jpg" alt=""></a>
        </div>
        <div class="box">
            <a href="images/4.jpg"><img  id="img-gal" src="images/4.jpg" alt=""></a>   
        </div>
       
        <div class="box">
            <a href="images/5.webp"><img id="img-gal" src="images/5.webp" alt=""></a>   
        </div>
        <div class="box">
            <a href="images/6.jpg"><img id="img-gal" src="images/6.jpg" alt=""></a>   
        </div>
        <div class="box">
            <a href="images/7.webp"><img id="img-gal" src="images/7.webp" alt=""></a>   
        </div>
        <div class="box">
            <a href="images/12.webp"><img id="img-gal" src="images/12.webp" alt=""></a>   
        </div>
        <div class="box">
            <a href="images/9.avif"><img id="img-gal" src="images/9.avif" alt=""></a>   
        </div>
      
    </div>    
</section>
<!--Gallery section ends-->



<!---contact section starts-->
<section class="contact" id="contact">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
        <span class="space"></span>
        <span>u</span>
        <span>s</span>
    </h1>
    <div class="row">
        <div class="image">
            <img src="images/sss.jpg" alt="Contact Us">
        </div>
        <form action="contact.php" method="post" class="contact-form" onsubmit="return validateForm()">
            <div class="inputBox">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <span id="name-error" class="error-message"></span>
            </div>
            <div class="inputBox">
                <input type="email" id="email" name="email" placeholder="Your Email" required>
                <span id="email-error" class="error-message"></span>
            </div>
            <div class="inputBox">
                <input type="tel" id="number" name="number" placeholder="Your Phone Number" required>
                <span id="number-error" class="error-message"></span>
            </div>
            <div class="inputBox">
                <textarea id="message" name="message" placeholder="Message" cols="45" rows="5" required></textarea>
                <span id="message-error" class="error-message"></span>
            </div>
            <input type="submit" class="btn" value="Send Message">
        </form>
    </div>
</section>

<script>
function validateForm() {
    var nameInput = document.getElementById('name').value;
    var emailInput = document.getElementById('email').value;
    var numberInput = document.getElementById('number').value;

    // Reset error messages
    document.getElementById('name-error').innerText = "";
    document.getElementById('email-error').innerText = "";
    document.getElementById('number-error').innerText = "";

    // Validate Name
    if (!/^[a-zA-Z]+$/.test(nameInput)) {
        document.getElementById('name-error').innerText = "Please enter alphabetical characters only.";
        return false;
    }

    // Validate Email
    if (!/^\S+@\S+\.\S+$/.test(emailInput)) {
        document.getElementById('email-error').innerText = "Please enter a valid email address.";
        return false;
    }

    // Validate Number
    if (!/^\d{10}$/.test(numberInput)) {
        document.getElementById('number-error').innerText = "Phone number must be exactly 10 digits and must be numerical character only";
        return false;
    }

    return true; // Form submission allowed
}
</script>





<!---contact section ends-->




<!------->

<!---footer section starts-->
<section class="footer">
 
    <div class="box-container">
        <div class="box">
            <h3>Services </h3>
            <p>Dance</p>
            <p>Music</p>
            
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about </a>
            <a href="#">courses</a>
            <a href="#">gallery</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>contact us</h3>
            <a href="#">Kalanki,Kathmandu</a>
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=new">Email : shresthasambridi771@gmail.com,
                njha@gmail.com,
                sangeetsadhana1@gmail.com</a>
            <a href="#">telephone: 9810172164</a>
        </div>


    </div>

    <h1 class="credit">created by <span>Sambridi Shrestha</span>|all rights reserved|</h1>
    
</section>
<!----footer section ends-->

<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true) 
{
    echo"<h1>$_SESSION[username]</h1>";
}
?>    

























<script src="script.js"></script>

</body>
</html>
