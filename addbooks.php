<?php 

include("connection.php");
include("nav.php");

?>

<!DOCTYPE html>
<head>
  <title>Books</title>
<meta name="viewport" content="width=device-width, initial-scale=1">  
 

<style>


body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-color:azure;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 50px;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  opacity: 0.8;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



.book{
   width: 600px; 
   margin: 0 auto;
}

.btn-primary
{
    width: 200px;
    height: 50px;
    font-size: large;
    font-weight: 600;
}



</style>













</head>


































<body class="books-new">




<!--____________________________________________SideNav-->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


  
  <div style="color: white; margin-left:60px;"> 
  <?php
  if(isset($_SESSION['login_user']))
  {
    echo "<img class='img-circle profile_img' hieght=120px width=120px src='img/".$_SESSION['pic']."' >";
    echo "</br></br>";
    echo "Welcome ". $_SESSION['login_user'];
  }


  ?> 
  </div>




  <a href="profile.php">Profile</a>
  <a href="#">Books</a>
  <a href="#">Add Books</a>
  <a href="#">Delete Books</a>
</div>

<div id="main">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

  <div class="container">
    <h2 style="text-align:center"><b>Add New Documents</b></h2>

    <form class="book" action="" method="post" style="text-align:center">

    <input type="text" name="bid" class="form-control" placeholder="Document Id" required=""><br>
    <input type="text" name="name" class="form-control" placeholder="Document Name" required=""><br>
    <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
    <input type="text" name="edition" class="form-control" placeholder="Edition" required="" ><br>
    <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
    <input type="text" name="category" class="form-control" placeholder="Category" required=""><br>
    <input type="text" name="download" class="form-control" placeholder="Documnet Link (https://..." required=""><br>
    <button class="btn btn-primary" type="submit" name="submit">ADD DOCUMENT</button>

    </form>


  </div>

  <?php 
    if(isset($_POST['submit']))
    {
        if(isset($_SESSION['login_user']))
        {
            /*main q for inserting the <books></books>*/
            mysqli_query($db,"INSERT INTO `books`  VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[department]','$_POST[category]','$_POST[download]');");
            ?><script type="text/javascript">alert("Added Successfully");</script><?php
        }
        else
        {
            ?><script type="text/javascript">alert("Please Sign In First!");</script><?php
        }
    }
  ?>


  </div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>


<!--_____________________________________________________-->


</body>
</html>