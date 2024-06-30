<?php
// Fetch course list from the database
include("db_connection.php");
session_start();
$query = "SELECT * FROM course";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>

        /* Base styles */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

div.header {
    font-family: 'Poppins', sans-serif;
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
}

table {
    width: 100%; /* Make table width 100% for responsiveness */
    max-width: 800px; /* Set maximum width for the table */
    margin: 15px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

thead {
    background-color: #f7f7f7;
    color: #000000;
}

tbody tr:hover {
    background-color: #ddd;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

.course-image {
    max-width: 100px;
    max-height: 100px;
}

.btn {
    background-color: #f7f7f7;
    color: #000000;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.7rem;
    margin-bottom: 10px;
    margin-top: 10px;
    margin-right: 10px; /* Adjust margin-right for spacing */
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

    table {
        max-width: 100%; /* Adjust table width for smaller screens */
    }

    th, td {
        font-size: 0.9rem; /* Reduce font size of table cells for smaller screens */
        padding: 10px; /* Adjust padding of table cells for smaller screens */
    }

    .course-image {
        max-width: 80px;
        max-height: 80px;
    }

    .btn {
        font-size: 0.6rem; /* Reduce button font size for smaller screens */
        padding: 8px 16px; /* Adjust button padding for smaller screens */
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

    table {
        max-width: 100%; /* Adjust table width to full width for smallest screens */
    }

    th, td {
        font-size: 0.8rem; /* Further reduce font size of table cells for smallest screens */
        padding: 8px; /* Further adjust padding of table cells for smallest screens */
    }

    .course-image {
        max-width: 60px;
        max-height: 60px;
    }

    .btn {
        font-size: 0.5rem; /* Further reduce button font size for smallest screens */
        padding: 6px 12px; /* Further adjust button padding for smallest screens */
    }
}










    </style>

</head>
<body>

<div class="header">
<a href="admin_pannel.php" class="btn">Go Back</a>
<h1><?php echo $_SESSION['AdminLoginId']?></h1>

 
        <form method="POST">
        <a href="course.php" class="btn">Insert</a>
        <!-- <button name="Logout">LOG OUT</button> -->


        </form>
        </div>

        <?php
        if(isset($_POST['Logout']))
        {
            session_destroy();
            header("location: adminlogin.php");
        }
        ?>
    <h2>Course List</h2>

    <table>
        <thead>
            
            <tr>
                <th>Course Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><img src="<?php echo $row['image']; ?>" alt="Course Image" class="course-image"></td>
                <td><a href="edit_course.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a href="view_course.php?id=<?php echo $row['id']; ?>">View</a></td>
                <td><a href="delete_course.php?id=<?php echo $row['id']; ?>">Delete</a></td>

            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>
