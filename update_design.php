<?php
include("db_connection.php");
session_start();
$id = $_GET['id'];
$query= "SELECT * FROM FORM WHERE id= '$id'";
$data = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($data);

?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
/* Base styles */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.registration .container {
    max-width: 500px;
    width: 60%; /* Adjust width for responsiveness */
    background-color: #f7f7f7;
    margin: 20px auto;
    padding: 90px;
    box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.125);
}

div.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: #CADCFC;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 1rem;
}

div.header h1 {
    color: #000000;
    font-size: 1.5rem;
    text-transform: uppercase;
}

div.header button {
    background-color: #f0f0f0;
    font-size: 0.8rem;
    font-weight: 550;
    padding: 8px 12px;
    border: 2px solid black;
    border-radius: 5px;
}

.registration .container .title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #000000;
    text-transform: uppercase;
    text-align: center;
}

.registration .container .form {
    background-color: #fff;
}

.registration .container .form .input_field {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.registration .container .form .input_field label {
    width: 200px;
    margin-right: 10px;
    font-size: 14px;
}

.registration .container .form .input_field .input,
.registration .container .form .input_field textarea {
    border: 1px solid #000000;
    width: 100%;
    outline: none;
    font-size: 15px;
    padding: 8px 10px;
    border-radius: 3px;
    transition: all 0.5s ease;
}

.registration .container .form .input_field .textarea {
    resize: none;
    height: 60px;
}

.registration .container .form .input_field .custom_select {
    position: relative;
    width: 100%;
    height: 37px;
}

.registration .container .form .input_field .custom_select select {
    -webkit-appearance: none;
    appearance: none;
    width: 100%;
    height: 100%;
    padding: 8px 10px;
    border-radius: 3px;
    outline: none;
}

.registration .container .form .input_field .custom_select:before {
    content: "";
    position: absolute;
    top: 12px;
    right: 10px;
    border: 8px solid rgb(0, 0, 0);
    border-color: gray transparent transparent transparent;
    pointer-events: none;
}

.registration .container .form .input_field .input:focus,
.registration .container .form .input_field .textarea:focus,
.registration .container .form .input_field select:focus {
    border: 2px solid pink;
}

.registration .container .form .input_field p {
    font-size: 14px;
    color: #000000;
}

.registration .container .form .input_field .btn {
    width: 100%;
    padding: 8px 10px;
    font-size: 15px;
    border: 0;
    background-color: #007bff;
    cursor: pointer;
    border-radius: 3px;
    outline: none;
}

.registration .container .form .input_field:last-child {
    margin-bottom: 0;
}

.registration .container .form .input_field .btn:hover {
    background: #0056b3;
}

.btn {
        background-color: #f7f7f7;
        color: #000000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: .7rem;
    }

    .btn:hover {
        background-color: #0056b3;
    }

/* Media queries for responsiveness */

@media (max-width: 768px) {
    .registration .container {
        width: 80%; /* Adjust container width for smaller screens */
    }
}

@media (max-width: 576px) {
    .registration .container {
        width: 90%; /* Further adjust container width for smaller screens */
    }

    div.header h1 {
        font-size: 1.2rem; /* Reduce header font size for smaller screens */
    }

    div.header button {
        font-size: 0.7rem; /* Reduce button font size for smaller screens */
    }

    .registration .container .title {
        font-size: 20px; /* Reduce title font size for smaller screens */
    }

    .registration .container .form .input_field label {
        width: 150px; /* Adjust label width for smaller screens */
    }
}

@media (max-width: 420px) {
    div.header h1 {
        font-size: 1rem; /* Further reduce header font size for smallest screens */
   
    }
}

    </style>
</head>
<body>

<div class="header">
<a href="admin_course.php" class="btn">Go Back</a>
         <h1><?php echo $_SESSION['AdminLoginId']?></h1>
         <!-- <form method="POST">
        <button name="Logout">LOG OUT</button>
        </form> -->

        </div>

        <?php
        if(isset($_POST['Logout']))
        {
            session_destroy();
            header("location: adminlogin.php");
        }
        ?>


    
<section class="registration" id="registration">

    <div class="container">
    <form name="registrationForm" action="#" method="POST" onsubmit="return validateForm()">
    <div class="title">
        Update Student Details
    </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
            </div>


             <div class="input_field">
                <label>Course</label>
                <div class="custom_select">

                  <select name="course" required>
                    <option value="">Select</option>

                    <option value="Hiphop Dance"
                    <?php
                    if($result['course']== 'Hiphop Dance')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >  
                    
                    Hiphop Dance</option>
                    <option value="Ballet Dance"
                    <?php
                    if($result['course']== 'Ballet Dance')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Ballet Dance</option>

                    <option value="nepali cultural dance"
                    <?php
                    if($result['course']== 'nepali cultural dance')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Nepali Cultural Dance</option>
                    <option value="kathak"
                    <?php
                    if($result['course']== 'kathak')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Kathak</option>

                    <option value="Bharatnatyam"
                    <?php
                    if($result['course']== 'bharatnatyam')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Bharatnatyam</option>

                    <option value="tap dance"
                    <?php
                    if($result['course']== 'tap dance')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Tap Dance</option>


                    <option value="flute music"
                    <?php
                    if($result['course']== 'flute music')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Flute Music</option>

                    <option value="guitar"
                    <?php
                    if($result['course']== 'guitar')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Guitar</option>

                    <option value="violin"
                    <?php
                    if($result['course']== 'violin')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Violin</option>

                    <option value="drum"
                    <?php
                    if($result['course']== 'drum')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Drum</option>
                    <option value="trumpet"
                    <?php
                    if($result['course']== 'trumpet')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Trumpet</option>

                    <option value="Harmoni"
                    <?php
                    if($result['course']== 'Harmoni')
                    {
                        echo "selected";
                    }
                    
                    ?>
                    >
                    Harmoni</option>


                  </select>
                </div>
            </div> 


            <div class="input_field">
                <label>Email Address</label>
                <input type="email" value="<?php echo $result['email']; ?>" class="input" name="email" required>
            </div>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone">
            </div>

            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required>
                <?php echo $result['address']; ?></textarea>
            </div>

            <div class="input_field">
                <input type="submit" value="Update Details" class="btn" name="update">
            </div>
        </div>
        </form>
    </div>


</section>  

<script>
function validateForm() {
    var fname = document.forms["registrationForm"]["fname"].value;
    var lname = document.forms["registrationForm"]["lname"].value;
    var course = document.forms["registrationForm"]["course"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var phone = document.forms["registrationForm"]["phone"].value;

    var nameRegex = /^[A-Za-z]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^\d{10}$/;

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
    } else if (!emailRegex.test(email)) {
        alert("Please enter a valid Email Address.");
        return false;
    }

    if (phone.trim() != "" && !phoneRegex.test(phone)) {
        alert("Please enter a valid Phone Number (10 digits).");
        return false;
    }

    return true;
}
</script>

</body>
</html>



<?php
if(isset($_POST['update']))

{
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $course   = $_POST['course'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];

    $query = "UPDATE FORM SET fname='$fname',lname='$lname',course='$course',email='$email',phone='$phone',address='$address' WHERE id='$id'";
    $data = mysqli_query($con,$query);

    if($data)
    {
        echo "<script>alert('Record Updated')</script>";
        ?>

         <meta http-equiv = "refresh" content = "0; url = http://localhost/pro4/display.php" />

        <?php

    }
    else
    {
        echo "Failed";
    }


}
?>


