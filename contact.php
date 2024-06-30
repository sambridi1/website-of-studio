<?php
include("db_connection.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    // Insert data into database
    $sql = "INSERT INTO CONTACT (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

    if ($con->query($sql) === TRUE) {
        echo '<div style="text-align: center;">';
        echo '<p style="font-size: 20px; color: #28a745; font-weight: bold;">New record created successfully</p>';
        echo '<p style="font-size: 16px; color: #333;">Thank you for contacting us. We will contact you back soon.</p>';
        echo '</div>';
    } else {
        echo '<div style="text-align: center;">';
        echo '<p style="font-size: 20px; color: #dc3545; font-weight: bold;">Error</p>';
        echo '<p style="font-size: 16px; color: #333;">There was an error processing your request. Please try again later.</p>';
        echo '</div>';
    }
    
    
}

$con->close();
?>