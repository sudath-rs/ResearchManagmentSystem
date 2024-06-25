

<?php include("connection.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registraion</title>
    <link rel="stylesheet" href="S_Reg.css">
    <link rel="stylesheet" href="style.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="login-b">

<?php include("nav.php");?>
    <div style="margin-top:-20.5px" class="form">

        <div class="wrapper1">
            <form action="" method="post">
                
            
            <h1>Registraion</h1>
                <div class="input-box">
                    <input class="form-control" type="text" name="username"  placeholder="StudentID" required="" >
                    <i class='bx bxs-user'></i>
                   
                </div> 

                <div class="input-box">
                   <input class="form-control" type="text" name="firstname" placeholder="First Name" required="">
                   <i class='bx bx-rename' ></i>
                </div>

                <div class="input-box">
                   <input class="form-control" type="text" name="lastname" placeholder="Last Name" required="">
                   <i class='bx bx-rename' ></i>
                  
                </div>


                <div class="input-box">
                    <input class="form-control" type="text" name="institute" placeholder="Institute" required>
                    <i class='bx bx-rename'></i>
                </div>
                <div class="input-box">
                    <input class="form-control" type="text" name="department" placeholder="Department" required>
                    <i class='bx bx-rename'></i>
                </div>

                <div class="input-box">
                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>

                <div class="input-box">
                    <input class="form-control" type="text" name="contact" placeholder="Contact" required>
                    <i class='bx bx-envelope'></i>
                </div>

                <div class="input-box"><input class="form-control" type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
                </div>

                
        <button type="submit" name="submit" class="btn">Sign Up</button>
        <div class="register-link"><p><br>Already have an account ? <a href="student_login.php">Login</a></p></div>        
            </form>
        </div>



        <?php
                    if(isset($_POST['submit'])) /*check if the button is press or not*/ 
                    {   
                        $count=0;
                        $sql="SELECT username from student";
                        $res=mysqli_query($db,$sql);
                        while($row=mysqli_fetch_assoc($res))
                        {
                           if($row['username']==$_POST['username']) 
                           $count =$count+1;
                        }

                        if($count==0)
                        {
                        mysqli_query($db,"INSERT INTO `STUDENT` 
                        VALUES('','$_POST[username]','$_POST[firstname]',
                        '$_POST[lastname]','$_POST[institute]','$_POST[department]','$_POST[email]','$_POST[contact]',
                        '$_POST[password]','plogo.png');");
                        ?><script type="text/javascript">alert("Registraion Succsessful");</script><?php
                        
                        }
                        else
                        {
                        ?><script type="text/javascript">alert("The user already registered");</script><?php
                        }

                    }

                    
        ?>





</body>                              
</html>