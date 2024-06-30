<?php include("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <style>
body {
    background: #F1F1F2;
    margin: 0px;
}

div.header {
    font-family: poppins;
    top: 0;
    left: 0;
    right: 0;
    background: #CADCFC;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0rem 60px;
}

div.header h1 {
    display: flex;
    text-align: center;
    color: #000000;
    font-size: 1rem;
    text-transform: uppercase;
}

div.header button {
    background-color: #f0f0f0;
    font-size: 10px;
    font-weight: 550;
    padding: 8px 12px;
    border: 2px solid black;
    border-radius: 5px;
}

.content {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.content h3, .content p {
    margin: 0;
    font-size: 2rem;
}

.content .btn {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.content .btn:hover {
    background-color: #0056b3;
}






@media (max-width: 768px) {
    div.header {
        padding: 0.8rem 1rem; /* Adjust header padding for smaller screens */
    }

    div.header h1 {
        font-size: 1.2rem; /* Adjust header font size for smaller screens */
    }

    div.header button {
        font-size: 0.3rem; /* Adjust button font size for smaller screens */
        padding: 0.4rem 0.8rem; /* Adjust button padding for smaller screens */
    }

    .content {
        padding: 1.5rem; /* Adjust content padding for smaller screens */
    }

    .content h3 {
        font-size: 1.5rem; /* Adjust heading font size for smaller screens */
    }

    .content p {
        font-size: .5rem; /* Adjust paragraph font size for smaller screens */
    }

    .content .btn {
        padding: 0.6rem 1rem;
        font-size: .7rem;
          /* Adjust button padding for smaller screens */
    }
}

@media (max-width: 480px) {
    .content h3 {
        font-size: 1.2rem; /* Further reduce heading font size for smaller screens */
    }

    .content p {
        font-size: 1rem; /* Further reduce paragraph font size for smaller screens */
    }
}
    </style>

</head>
<body>

    
    <body>
        <div class="header">
        <h1><?php echo $_SESSION['AdminLoginId']?></h1>
        <form method="POST">
        <button name="Logout">LOG OUT</button>
        </form>
        </div>

        <?php
        if(isset($_POST['Logout']))
        {
            session_destroy();
            header("location: adminlogin.php");
        }
        ?>

<div class="content">
            <h3>WELCOME</h3>
            <p>TO</p>
            <h3>ADMIN PANEL</h3>
            <a href="display.php" class="btn">Registration Data</a>
            <a href="admin_course.php" class="btn">Course Data</a>
    </div>            

    </body>
    </html>
