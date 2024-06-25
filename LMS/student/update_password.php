

<?php
include("connection.php");
include("nav.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Change Password</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="login.css">







    </head>









<body class="login-b">
 
 <div class="form">

     <div class="wrapper1">
         <form action="" method="post" name="login">
             <h1>Update Password</h1>
     
             <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user' ></i>
             </div>
             <div class="input-box">
                <input type="text"  name="email" placeholder="Email" required>
                <i class='bx bxs-lock-alt' ></i>
               
             </div>

             <div class="input-box">
                <input type="text"  name="password" placeholder="New Password" required>
                <i class='bx bxs-lock-alt' ></i>
               
             </div>

             <button type="submit" name="submit" class="btn">Update</button>
             <br><br>
             <button type="submit" name="submit" class="btn" onclick="location.href = 'admin_login.php';">Login</button>
     

    
 
    
     <div class="register-link">
         <p><br>Don't have an account ? <a href="registration.php">Register</a></p>
     </div>
     </form>
     </div>

     


    <?php
    if(isset($_POST['submit']))
    {
       if(mysqli_query($db,"UPDATE `student` SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
       {
        ?><script type="text/javascript">alert("Password Updated Successfully");</script><?php
       }

    }

    ?>





</body>













</html>