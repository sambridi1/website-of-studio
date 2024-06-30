<?php
include("db_connection.php");
session_start();

if(isset($_GET['id'])) {
    $course_id = $_GET['id'];
    
    $query = "SELECT * FROM course WHERE id = '$course_id'";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $course = mysqli_fetch_assoc($result);
    } else {
        // Redirect or display an error message if course not found
    }
} else {
    // Redirect or display an error message if course ID is not provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <style>
    /* CSS styles for the form */
/* Base styles */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
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
    padding: 0.5rem 1rem; /* Adjust header padding for smaller screens */
}

div.header h1 {
    color: #000000;
    font-size: 1rem; /* Adjust header font size for smaller screens */
    text-transform: uppercase;
    
}

div.header button {
    font-size: 0.8rem; /* Adjust button font size for smaller screens */
    padding: 0.5rem 1rem;
    border-radius: 5px;
}

h2 {
    text-align: center;
    margin-top: 110px;
    margin-bottom: 10px; /* Add a bottom margin to create space */
    font-size: 1.5rem; 
    
}

form {
    width: 90%; /* Set form width to 80% for responsiveness */
    max-width: 350px; /* Limit form width on larger screens */
    margin: 20px auto; /* Center the form */
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
}

img {
    max-width: 70%;
    height: auto;
    margin-bottom: 20px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.btn {
    background-color: #f7f7f7;
    color: #000000;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.7rem;
}

.btn:hover {
    background-color: #0056b3;
}

/* Media queries for responsiveness */

@media (max-width: 768px) {
    div.header {
        padding: 0.5rem; /* Adjust header padding for smaller screens */
    }

    div.header h1 {
        font-size: 1.2rem; /* Reduce header font size for smaller screens */
    }

    div.header button {
        font-size: 0.7rem; /* Reduce button font size for smaller screens */
        padding: 0.4rem 0.8rem;
    }

    form {
        width: 30%; /* Adjust form width for smaller screens */
    }

    input[type="text"],
    input[type="file"] {
        font-size: 0.9rem; /* Reduce input font size for smaller screens */
    }

    img {
        max-width: 70%; /* Ensure images are responsive */
    }
}

@media (max-width: 480px) {
    div.header {
        padding: 0.3rem; /* Further adjust header padding for smallest screens */
    }

    div.header h1 {
        font-size: 1rem; /* Further reduce header font size for smallest screens */
    }

    div.header button {
        font-size: 0.6rem; /* Further reduce button font size for smallest screens */
        padding: 0.3rem 0.6rem;
    }

    form {
        width: 100%; /* Adjust form width to full width for smallest screens */
    }

    input[type="text"],
    input[type="file"] {
        font-size: 0.8rem; /* Further reduce input font size for smallest screens */
        padding: 8px;
    }

    input[type="submit"] {
        font-size: 0.8rem; /* Reduce submit button font size for smallest screens */
        padding: 8px 16px; /* Adjust submit button padding for smallest screens */
    }

    .btn {
        font-size: 0.6rem; /* Further reduce button font size for smallest screens */
        padding: 8px 16px; /* Adjust button padding for smallest screens */
    }
}





</style>

    <script>
        function validateForm() {
            var courseName = document.getElementById("course_name").value;

            // Regular expression to match only alphabetical characters
            var regex = /^[a-zA-Z ]+$/;

            if (!regex.test(courseName)) {
                alert("Course name should contain only alphabetical characters.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<!-- Your existing HTML code -->
<div class="header">
    <a href="admin_pannel.php" class="btn">Go Back</a>
    <h1><?php echo $_SESSION['AdminLoginId']?></h1>

        <!-- <button name="Logout">LOG OUT</button> -->

</div>

<h2>Edit Course</h2>
<form action="update_course.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
    
    <label for="course_name">Course Name:</label>
    <input type="text" id="course_name" name="course_name" value="<?php echo $course['course_name']; ?>" required>
    
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="<?php echo $course['price']; ?>" required>
    
    <label for="image">Image:</label>
    <img src="<?php echo $course['image']; ?>" alt="Course Image">
    <input type="file" id="image" name="image">
    
    <input type="submit" value="Update">
</form>
</body>
</html>





