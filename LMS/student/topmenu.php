
<?php 
include("connection.php");
session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylenav.css">

</head>
<body>

<header>


     <?php 
	 if(isset($_SESSION['login_user']))
	 {
	?>

<nav class="navbar">
		<div class="navdiv">
            
            <div class="logoimg"><img src="img/logo.png"></div>
            <div class="logo" ><a href="index.php"><h1 style="color: white;">ONLINE ACADEMIC RESEARCH REPOSITORY.</h1></a> </div>
			<ul>
            <li><a href="index.php">HOME</a></li>
					<li><a href="book.php">RESOURCES</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
			</ul>
		</div>
	</nav>

	<?php
	 }
	 else{?>
		<nav class="navbar">
		<div class="navdiv">
          

		
            <div class="logoimg"><img src="img/logo.png"></div>
            <div class="logo" ><a href="index.php"><h1 style="color: white;">ONLINE ACADEMIC RESEARCH REPOSITORY.</h1></a> </div>
			<ul>
            <li><a href="index.php">HOME</a></li>
					<li><a href="book.php">RESOURCES</a></li>
					<li><a href="student_login.php">STUDENT-LOGIN</a></li>
					<li><a href="http://localhost/LMS/admin/admin_login.php">ADMIN-LOGIN</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
			</ul>
		</div>
	</nav> <?php
	 }
	 
	 ?>

	 






</header>





</body>
</html>