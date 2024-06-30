<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: adminlogin.php");
}
?>

<html>

    <head>
        <title>Display</title>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <style>

body {
    background: #F1F1F2;
    margin: 0;
    font-family: Poppins, sans-serif; /* Set default font family */
}

div.header {
    background: #CADCFC;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 5%; /* Use percentage for responsive padding */
}

div.header h1 {
    color: #000000;
    font-size: 1.25rem; /* Adjust font size using rem for responsiveness */
    text-transform: uppercase;

}

div.header button {
    background-color: #f0f0f0;
    font-size: 0.8rem; /* Adjust button font size */
    font-weight: 550;
    padding: 8px 12px;
    border: 2px solid black;
    border-radius: 5px;
}

table {
    background: white;
    width: 100%; /* Ensure table is responsive within its container */
}

.update, .delete {
    background-color: #0b8457;
    color: white; /* Correct typo "while" to "white" */
    border: 0;
    outline: none;
    border-radius: 3px;
    height: 25px;
    width: 80px;
    cursor: pointer;
}

.delete {
    background-color: red;
}

.btn {
    background-color: #f7f7f7;
    color: #000000;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.7rem;
    display: inline-block; /* Ensure button behaves correctly */
}

.btn:hover {
    background-color: #0056b3;
}

/* Media queries for responsiveness */
@media (max-width: 768px) {
    div.header {
        padding: 0 3%; /* Adjust padding for smaller screens */
    }
    
    div.header h1 {
        font-size: 1rem; /* Decrease font size on smaller screens */
    }
    
    div.header button {
        font-size: 0.7rem; /* Decrease button font size */
        padding: 6px 10px; /* Adjust button padding */
    }
    
    .btn {
        padding: 8px 16px; /* Adjust button padding */
        font-size: 0.8rem; /* Adjust button font size */
    }
}
  
        </style>
    </head>
    <body>
        <div class="header">
        <a href="admin_pannel.php" class="btn">Go Back</a>
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

<?php
include("db_connection.php");
error_reporting(0);

$query= "SELECT * FROM FORM";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);
// $result = mysqli_fetch_assoc($data);


//echo $total;

if($total !=0)
{
    ?>
    <h2 align="center"  background-color: "transparent;"></h2>
     <center><table border="none" cellspacing="7" width="81%" style="background-color: transparent;">
        <tr>
        <th width="3%">ID</th>
        <th width="8%">First Name</th>
        <th width="8%">Last Name</th>
        <th width="10%">Course</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="12%">Address</th>
        <th width="10%">Operations</th>

        </tr>

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
       echo "<tr>
       <td>".$result['id']."</td>
       <td>".$result['fname']."</td>
       <td>".$result['lname']."</td>
       <td>".$result['course']."</td>
       <td>".$result['email']."</td>
       <td>".$result['phone']."</td>
       <td>".$result['address']."</td>

       <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
       <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a>


       </td>



       </tr>";

    }
}
else
{
    echo "No records found";
}

?>
</table>
</center>

<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this record ?');
    }
</script>





