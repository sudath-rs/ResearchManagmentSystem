

<?php 


include("connection.php");
include("nav.php");




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    
    
    
    <style type="text/css">
        
        .wrapper
        {
        width: 400px;
        height: 400px;
        margin: 0 auto;  /* <!-- automatically in the midle postion -->*/ 
       
        color: white;
        }
        .btn-primary
        {
            margin-left:1000px;
            width: 120px;
         
        }
    </style>




</head>
<body style="background-color:black">

<div class="container">
<button class="btn btn-primary" name="submit1" onclick="location.href = 'edit.php';">Edit</button>
    <form action="" method="post">
   


    </form>

    <div class="wrapper">




        <?php
        $q=mysqli_query($db,"SELECT * FROM `admin` WHERE username=  '$_SESSION[login_user]' ");
        ?>
        <h2 style="text-align:center">My Profile</h2>

        <?php
            $row=mysqli_fetch_assoc($q);

            echo "<div style='text-align:center'><img class='img-circle profile-img' hieght=110 width=110 src='img/".$_SESSION['pic']."'></div>";
        ?>

        <div style="text-align:center">
        <b>Welcome</b>
        <h4>
            <?php
            echo $_SESSION['login_user']; 
            ?>
        </h4>
        </div>

        <?php 

            echo "<b>";
            echo "<table class='table table-bordered'>";

            echo "<tr>";
            echo "<td>";
            echo "<b> First Name:  </b>";
            echo "</td>";
            echo "<td>";
            echo $row['firstname'];
            echo "</td>";

            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo "<b> Last Name:  </b>";
            echo "</td>";
            echo "<td>";
            echo $row['lastname'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo "<b> Institute:</b>";
            echo "</td>";
            echo "<td>";
            echo $row['institute'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo "<b> Department:</b>";
            echo "</td>";
            echo "<td>";
            echo $row['department'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo "<b> Email:</b>";
            echo "</td>";
            echo "<td>";
            echo $row['email'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo "<b> Contact:</b>";
            echo "</td>";
            echo "<td>";
            echo $row['contact'];
            echo "</td>";
            echo "</tr>";


            echo "</table>";
            echo "</b>";
        ?>




    </div>


</div>
    
</body>
</html>