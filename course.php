<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link rel="stylesheet" href="course.css">
    <script>
        function validateForm() {
            var courseName = document.getElementById("course_name").value;
            var price = document.getElementById("price").value;
            var image = document.getElementById("image").value;

            if (courseName == "" || price == "" || image == "") {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }

        function showAlert() {
            alert("Course is inserted successfully");
        }
    </script>
</head>
<body>

    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="title">
                Add New Course
            </div>
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required><br><br>
        
        <!-- <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br> -->
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
include("db_connection.php");
session_start();

// Validate and sanitize input data
$course_name = isset($_POST['course_name']) ? mysqli_real_escape_string($con, $_POST['course_name']) : '';
$price = isset($_POST['price']) ? mysqli_real_escape_string($con, $_POST['price']) : '';

// File upload handling
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Upload the file if all checks pass
    if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        
        // Insert data into the database if upload was successful
        $query = "INSERT INTO course (course_name, price, image) VALUES ('$course_name', '$price', '$target_file')";

        if (mysqli_query($con, $query)) {
            echo "Course added successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "
        <script>
          alert('Sorry, there was an error uploading your file.');
          window.location.href='admin_course.php';
        </script>
      ";
    }
} else {
    echo "No file uploaded or an error occurred.";
}

// Close database connection
mysqli_close($con);
?>
