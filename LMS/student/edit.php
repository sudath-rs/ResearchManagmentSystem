

<?php

include ("connection.php");
include ("nav.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:300px;
			height: 38px;
            margin: 0 auto;
		}
		.form1
		{
			margin: 0 auto;
            text-align: center;
		}
		label
		{
			color: white;
            margin-right: 200px;
           
		}
        body
        {
            background-image: url(img/login.jpg);
        }

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM student WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql);

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['firstname'];
			$last=$row['lastname'];
			$institute=$row['institute'];
			$username=$row['username'];
			$password=$row['password'];
			$department=$row['department'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

        <label><h4><b>Profile Pic: </b></h4></label>
		<input class="form-control" type="file" name="file">

		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="firstname" value="<?php echo $first; ?>">

		<label><h4><b>Last Name:</b></h4></label>
		<input class="form-control" type="text" name="lastname" value="<?php echo $last; ?>">



		<label><h4><b>Password:</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Institute:</b></h4></label>
		<input class="form-control" type="text" name="institute" value="<?php echo $institute; ?>">

		<label><h4><b>Department:</b></h4></label>
		<input class="form-control" type="text" name="department" value="<?php echo $department; ?>">

		<label><h4><b>Email:  </b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Contact No:</b></h4></label>
		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

		<br>
		<div style="width:80px; height:80px ; margin:0 auto;">
			<button class="btn btn-primary" type="submit" name="submit">save</button></div>
	</form>
</div>
	



<?php 

		if(isset($_POST['submit']))
		{
		
        move_uploaded_file($_FILES['file']['tmp_name'],"img/".$_FILES['file']['name']);  

         $firstname=$_POST['firstname'];
         $lastname=$_POST['lastname'];
         $password=$_POST['password'];
         $institute=$_POST['institute'];
         $department=$_POST['department'];
         $email=$_POST['email'];
         $contact=$_POST['contact'];
         $pic=$_FILES['file']['name'];


		

			$sql1= "UPDATE student SET 

            pic='$pic',
            firstname='$firstname' , 
            lastname='$lastname',     
            password='$password',
            institute='$institute',
            department='$department',
            email='$email',
            contact='$contact'




            WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>








</body>
</html>