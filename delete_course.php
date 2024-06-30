<?php
include("db_connection.php");

if(isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $query = "DELETE FROM course WHERE id = '$course_id'";

    if(mysqli_query($con, $query)) {
        
        echo "
        <script>
          if(confirm('Are you sure you want to delete this course?')) {
            alert('Course Deleted Successfully');
            window.location.href='admin_course.php';
          }
        </script>
      "; 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Error: Course ID not provided.";
}

mysqli_close($con);
?>
