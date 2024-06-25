
<?php
	include "connection.php";
	include "nav.php";
?>

<!DOCTYPE html>

<br>
<html>
<head>
	<title>Message</title>
</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	body
	{
			background-image: url("img/login.jpg");
			background-repeat: no-repeat;
	}
.wrapper
{
   
    height: 600px;
	width: 600px;
    margin: -20px auto;
    background-color: purple;
    background: transparent;
    border: 2px solid rgba(255, 2555, 255, 0.2);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
}
.form-control
{
	height: 47px;
	width: 76%;
}
.msg
{
	height: 450px;
	overflow-y: scroll;
}
.btn-info
{
	background-color: #02c5b6;
}
.chat
{
	display: flex;
	flex-flow:row wrap;
}
.user .chatbox
{
	height: 50px;
	width: 400px;
	padding: 13px 10px;
	background-color: #821b69;
	color: white;
	border-radius: 10px;
	order: -1;
}
.admin .chatbox
{
	height: 50px;
	width: 400px;
	padding: 13px 10px;
	background-color: #423471;
	color: white;
	border-radius: 10px;
}

.admin-h{
    text-align: center;
}
</style>

<body>
<?php
	if(isset($_POST['submit']))
	{
		mysqli_query($db,"INSERT into `arr`.`message` VALUES ('', '$_SESSION[login_user]','$_POST[message]','no','student');");

		$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' ;");

	}
	else
	{
		$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' ;");
	}
	mysqli_query($db,"UPDATE message set status='yes' where sender='admin' and username='$_SESSION[login_user]' ;");
?>

<div class="wrapper">
	<div class="admin-h">
		<h3 style="margin-top: -5px; padding-top: 10px;">Admin</h3>
	</div>
	<div class="msg">
	<?php
	  while ($row=mysqli_fetch_assoc($res))
		{
			if($row['sender']=='student')
			{
	?>
		<!-------student---------------->
		<br><div class="chat user">
			<div style="float: left; padding-top: 5px;">
				&nbsp
				<?php
                echo "<img class='img-circle profile_img' height=40 width=40 src='img/".$_SESSION['pic']."'>";
                ?>&nbsp
			</div>
			<div style="float: left;" class="chatbox">
				<?php
					echo $row['message'];
				?>
			</div>
		</div>

<?php
	}
	else
	{
?>
		<!-------admin---------------->

		<br><div class="chat admin">
			<div style="float: left; padding-top: 5px;">
				&nbsp
				<img style="height: 40px; width: 40px; border-radius: 50%;" src="img/plogo.png">
				&nbsp
			</div>
			<div style="float: left;" class="chatbox">
				<?php
					echo $row['message'];
				?>
			</div>
		</div>

		<?php
	}
	}
		?>
	</div>

	<div style="height: 100px; padding-top: 10px;" >
		<form action="" method="post">
			<input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp
			<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
		</form>
	</div>
</div>

</body>
</html>