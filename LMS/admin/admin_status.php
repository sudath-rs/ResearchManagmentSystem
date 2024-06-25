<?php
  include "connection.php";
  include "nav.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">   
 <title>Student Information</title>




 <style>


body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
  <a href="#">Documents</a>
  <a href="message.php">Document Request</a>
 
</div>

<div id="main">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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




















<!--Search Bar-->
<div style="margin-left:1200px;">
  <form action="" class="navbar-form" method="post" name="form1">

   <div>
   <input style="width:200px"  class="form-control" type="text" name="search" placeholder="Search StudentId..">
      
      <button style="background-color:#ceff00;margin-left:auto;" class="btn btn-default" type="submit" name="submit"  >
      <span style="margin-left:auto;" class="glyphicon glyphicon-search"></span>
      </button>
   </div>
      
  </form>
</div>

<h1>New Request</h1>
<div>

  <?php
if(isset($_SESSION['login_user']))
{


  if(isset($_POST['submit']))
  {
    $q=mysqli_query($db,"SELECT id,username,firstname,lastname,institute,department,email,contact FROM `admin` where status=''");
    if(mysqli_num_rows($q)==0)
    {
      echo "Sorry! No request found with that user name. Try searching again.";
    }
    else
    {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:#ceff00;'>";
      echo "<th>"; echo "No"; echo "</th>";
      echo "<th>"; echo "StudentID"; echo "</th>";
      echo "<th>"; echo "FirstName"; echo "</th>";
      echo "<th>"; echo "LastName"; echo "</th>";
      echo "<th>"; echo "Institute"; echo "</th>";
      echo "<th>"; echo "Department"; echo "</th>";
      echo "<th>"; echo "Email"; echo "</th>";
      echo "<th>"; echo "Phone No"; echo "</th>";
    
      echo "</tr>";
    
      while($row=mysqli_fetch_assoc($q))
      {
        $_SESSION['test_name']=$row['username'];
        ?>
         <tr>
         <td>  <?php echo $row['id']; ?> </td>
         <td>  <?php echo $row['username']; ?> </td>
         <td>  <?php echo $row['firstname']; ?> </td>
         <td>  <?php echo $row['lastname']; ?> </td>
         <td>  <?php echo $row['institute']; ?> </td>
         <td>  <?php echo $row['department']; ?> </td>
         <td>  <?php echo $row['email']; ?> </td>
         <td>  <?php echo $row['contact']; ?> </td>
          
    
         </tr>
            
              
        <?php
    
    
    
      }
    
      echo "</table>";
      ?>
      
      <form method="post">
      <button  name="submit1" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-remove-sign"> </span></button>
      <button  name="submit2" type="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"> </span> </span></button>
      
      </form>

      
      <?php

        if(isset($_POST['submit1']))
        {
            echo "sufahhhh";
        }
        if(isset($_POST['submit2']))
        {
         
            mysqli_query($db,"UPDATE `admin` SET `status` = 'yes' WHERE username='$_SESSION[test_name]';");
            
        }
     
    }
  }


else
{
  $res=mysqli_query($db,"SELECT id,username,firstname,lastname,institute,department,email,contact FROM `admin` where status=''");
  echo "<table class='table table-bordered table-hover'>";
  echo "<tr style='background-color:#ceff00;'>";
  echo "<th>"; echo "No"; echo "</th>";
  echo "<th>"; echo "StudentID"; echo "</th>";
  echo "<th>"; echo "FirstName"; echo "</th>";
  echo "<th>"; echo "LastName"; echo "</th>";
  echo "<th>"; echo "Institute"; echo "</th>";
  echo "<th>"; echo "Department"; echo "</th>";
  echo "<th>"; echo "Email"; echo "</th>";
  echo "<th>"; echo "Phone No"; echo "</th>";
  echo "</tr>";

  while($row=mysqli_fetch_assoc($res))
  {
    ?>
     <tr>
      <td>  <?php echo $row['id']; ?> </td>
      <td>  <?php echo $row['username']; ?> </td>
      <td>  <?php echo $row['firstname']; ?> </td>
      <td>  <?php echo $row['lastname']; ?> </td>
      <td>  <?php echo $row['institute']; ?> </td>
      <td>  <?php echo $row['department']; ?> </td>
      <td>  <?php echo $row['email']; ?> </td>
      <td>  <?php echo $row['contact']; ?> </td>
      

     </tr>
        
          
    <?php



  }

  


}

}
else{
  ?><script type="text/javascript">alert("To see the information login first!");</script><?php
  header("location:admin_login.php");
}

if(isset($_POST['submit1']))
        {
            mysqli_query($db,"DELETE FROM `admin`  WHERE username='$_SESSION[test_name]' and status='';");
        }
        if(isset($_POST['submit2']))
        {
         
            mysqli_query($db,"UPDATE `admin` SET `status` = 'yes' WHERE username='$_SESSION[test_name]';");
            unset($_SESSION['test_name']);
            
        }
  

  ?>
</div>


</div>

</body>


</html>