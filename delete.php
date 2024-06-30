<?php
include("db_connection.php");
$id = $_GET['id'];
$query = "DELETE FROM FORM WHERE id='$id'";

$data = mysqli_query($con,$query);

if($data)
{
     echo "<script>alert('Record Deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/project 4sem/display.php" />
    <?php
}
else{
    echo "<script>alert('Failed To Delete')</script>";
}
?>

<html>

    <head>
        <title>Display</title>
        <link rel="stylesheet" href="style.css">
        <style>

            div.header{
                font-family: poppins;
                /* display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0px 60px;
                background-color: #ffa500;
                text-align: center; */

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

        
        </style>
    </head>
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

    </body>
    </html>