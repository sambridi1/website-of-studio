<?php
session_start();
include("db_connection.php");

if(isset($_SESSION['AdminLoginId'])) {
    if(isset($_GET['id'])) {
        $course_id = $_GET['id'];

        $query = "SELECT * FROM course WHERE id = '$course_id'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0) {
            $course = mysqli_fetch_assoc($result);
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
    padding: 0 20px; /* Adjusted padding for responsiveness */
}

div.header h1 {
    color: #000000;
    font-size: 1.25rem; /* Adjusted font size for responsiveness */
    margin: 0;
    text-transform: uppercase;
}

div.header button {
    background-color: #f0f0f0;
    font-size: 0.8rem; /* Adjusted font size for responsiveness */
    font-weight: 550;
    padding: 8px 12px;
    border: 2px solid black;
    border-radius: 5px;
}

h2 {
    text-align: center;
    margin-top: 50px;
}

table {
    width: 60%; /* Adjusted table width for responsiveness */
    max-width: 600px; /* Limit maximum width of the table */
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
    max-width: 60%;
    height: auto;
    display: block; /* Ensure images are responsive and centered */
    margin: 0 auto;
}
.btn {
        font-size: 0.5rem; /* Further reduce button font size for smallest screens */
        padding: 6px 12px; /* Further adjust button padding for smallest screens */
    }

/* Media Queries for Responsive Design */

@media (max-width: 768px) {
    div.header {
        padding: 0 10px; /* Adjusted header padding for smaller screens */
    }

    div.header h1 {
        font-size: 1rem; /* Reduced font size for smaller screens */
    }

    div.header button {
        font-size: 0.7rem; /* Reduced font size for smaller screens */
        padding: 6px 10px; /* Adjusted button padding for smaller screens */
    }

    table {
        width: 100%; /* Full width for smaller screens */
        max-width: none; /* Remove maximum width restriction */
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 1.5rem; /* Adjusted heading font size for smaller screens */
    }

    th, td {
        padding: 10px; /* Reduced cell padding for smaller screens */
    }

    img {
        width: 100%; /* Ensure images fill the width on smaller screens */
    }
}

    </style>
    <!-- Add any additional CSS stylesheets or meta tags as needed -->
</head>
<body>
<div class="header">
    <a href="admin_course.php" class="btn">Go Back</a>
    <h1><?php echo $_SESSION['AdminLoginId']; ?></h1>
    <form method="POST">
        <button type="submit" name="Logout" class="btn">LOG OUT</button>
    </form>
</div>

<?php
            if(isset($_POST['Logout'])) {
                session_destroy();
                header("location: adminlogin.php");
                exit;
            }
?>


<h2>Course Details</h2>
<table>
    <tr>
        <th>Attribute</th>
        <th>Value</th>
    </tr>
    <tr>
    <td>Course Name</td>
    <td><?php echo isset($course['course_name']) ? $course['course_name'] : ''; ?></td>
    
    </tr>

    <tr>
        <td>Price</td>
        <td><?php echo isset($course['price']) ? $course['price'] : ''; ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="<?php echo $course['image']; ?>" alt="Course Image"></td>
    </tr>
    <!-- Add more rows for additional attributes if needed -->
</table>
    
</body>
</html>

<?php
        } else {
            echo "Course not found.";
        }
    } else {
        echo "Error: Course ID not provided.";
    }
} else {
    header("location: adminlogin.php");
    exit;
}
?>