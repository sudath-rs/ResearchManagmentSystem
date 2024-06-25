
<?php
session_start();

?>



<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<?php
if(isset($_SESSION['login_user']))
{
  $r=mysqli_query($db,"SELECT COUNT(status) AS total FROM message WHERE status='no' AND username='$_SESSION[login_user]' AND sender='admin';");

 $c= mysqli_fetch_assoc($r);
?>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE ACADEMIC RESEARCH REPOSITORY.</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="book.php">RESOURCES</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
        
<?php
if(isset($_SESSION['login_user']))
{
?>

<ul class="nav navbar-nav">
<li><a href="profile.php">PROFILE</a></li>
</ul>
 


<ul class="nav navbar-nav navbar-right">

<li>
    <a href="message.php"><span class="glyphicon glyphicon-envelope"> </span>&nbsp
    <span class="badge bg-green">
     <?php echo $c['total'] ?>
    </span></a>
    
  </li>

  <li><a href="profile.php">

  <li><a href="profile.php">
  <div style="color: white;"> 



  <?php

  echo "<img class='img-circle profile_img' hieght=30px width=30px src='img/".$_SESSION['pic']."' >";
  echo " ". $_SESSION['login_user'];
  ?>




</div>
  </a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
<?php

}

else
{
?>
<ul class="nav navbar-nav navbar-right">

<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
</ul>
<?php
}

}
else
{
  ?>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE ACADEMIC RESEARCH REPOSITORY.</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="book.php">RESOURCES</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
</ul>
        
<?php
}
?>




          

      </div>
    </nav>


</body>
</html>