<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dance";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    
if($con)
{
    // echo "Connection ok";
}
else
{
    echo "Connection failed".mysqli_connect_error();
}
?>