<?php
include("db_connection.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $price = $_POST['price'];
    
    // File upload handling
    $target_dir = "images/"; // Specify the directory where you want to store uploaded files
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "
            <script>
              alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
              window.location.href='edit_course.php?id=$course_id';
            </script>
          ";
        } else {
            // Move uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Perform update operation in the database
                $query = "UPDATE course SET course_name = '$course_name', price = '$price', image = '$target_file' WHERE id = '$course_id'";
                if(mysqli_query($con, $query)) {
                    echo "
                    <script>
                      alert('Course Updated Successfully');
                      window.location.href='admin_course.php';
                    </script>
                  "; 
                    // Redirect to course list page or display success message
                } else {
                    // Redirect to course list page or display error message
                }
            } else {
                echo "
                <script>
                  alert('Sorry, there was an error uploading your file.');
                  window.location.href='edit_course.php?id=$course_id';
                </script>
              ";
            }
        }
    } else {
        echo "
        <script>
          alert('File is not an image.');
          window.location.href='edit_course.php?id=$course_id';
        </script>
      ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        div.header{
                top: 0; left: 0; right: 0;
                background:  #CADCFC;
                z-index: 1000;
               display: flex;
               align-items: center;
               justify-content: space-between;
               padding: 0rem 60px;
            }
            div.header h1{
                display: flex;
                text-align: center;
                color: #000000;
                font-size: 20px;
            }
            div.header button{
                background-color: #f0f0f0;
                font-size: 10px;
                font-weight:550;
                padding: 8px 12px;
                border: 2px solid black;
                border-radius: 5px;
            }
            
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <!-- Add any additional CSS stylesheets or meta tags as needed -->
</head>
<body>

<div class="header">
<a href="admin_pannel.php" class="btn">Go Back</a>
<h1><?php echo $_SESSION['AdminLoginId']?></h1>

        </body>
        </html>
