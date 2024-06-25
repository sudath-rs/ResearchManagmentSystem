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
  <a href="#">Document</a>
  <a href="addbooks.php">Add Document</a>
  
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
  <!--<label for="department">Choose a Department</label>
  <select name="department" id="">
    <optgroup label="Eduactional">
      <option value="">FACULTY OF ARTS</option>
 
      <option value="">Faculty of Computing</option>
      <option value="">Faculty of Computing</option>
      
      

    </optgroup>
    <optgroup label="Entertainment">
      <option value="">Action</option>
      <option value="">Comedy</option>
      <option value="">Traveling</option>
      <option value="">Horror</option>
    </optgroup>
  </select>-->
   <div>
   <input style="width:200px"  class="form-control" type="text" name="search" placeholder="What are you looking for?">
      
      <button style="background-color:#ceff00;margin-left:auto;" class="btn btn-default" type="submit" name="submit"  >
      <span style="margin-left:auto;" class="glyphicon glyphicon-search"></span>
      </button>
   </div>
      
  </form>

  <form action="" class="navbar-form" method="post" name="form1">

<div>
<input style="width:200px"  class="form-control" type="text" name="bid" placeholder="Enter Document Id..">
   
   <button style="background-color:#ceff00;margin-left:auto;" class="btn btn-default" type="submit" name="submit1"  >
   <span style="margin-left:auto;" class="glyphicon glyphicon-trash"></span>
   </button>
</div>
   
</form>



</div>


<div>

  <?php

  if(isset($_POST['submit']))
  {
    $q=mysqli_query($db,"SELECT * from `books` where 
    `name` like '%$_POST[search]%' 
   
    OR `name` like '%$_POST[search]%' 
    OR `authors` like '%$_POST[search]%' 
    OR `category` like '%$_POST[search]%' 
    OR `department` like '%$_POST[search]%' 
    
    
    
    
    ");
    if(mysqli_num_rows($q)==0)
    {
      echo "Sorry! No Book Found. Try searching again.";
    }
    else
    {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:#ceff00;'>";
      echo "<th>"; echo "ID"; echo "</th>";
      echo "<th>"; echo "Document-Name"; echo "</th>";
      echo "<th>"; echo "Authors Name"; echo "</th>";
      echo "<th>"; echo "Edition"; echo "</th>";
      echo "<th>"; echo "Department"; echo "</th>";
      echo "<th>"; echo "Download"; echo "</th>";
      echo "</tr>";
    
      while($row=mysqli_fetch_assoc($q))
      {
        ?>
         <tr>
          <td>  <?php echo $row['bid']; ?> </td>
          <td>  <?php echo $row['name']; ?> </td>
          <td>  <?php echo $row['authors']; ?> </td>
          <td>  <?php echo $row['edition']; ?> </td>
          <td>  <?php echo $row['department']; ?> </td>
      
          
          <?php

if(isset($_SESSION['login_user']))
{
  ?><td><a href="<?php  echo $row['download']  ?>" class="btn btn-primary" download>Download</a></td> <?php
}

else
{ 
  ?><td><button class="btn btn-primary" onclick="location.href = 'admin_login.php';">Login</button></td> <?php
  
}

?>
   
          
          
    
         </tr>
            
              
        <?php
    
    
    
      }
    
    }



  }


else
{
  $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC");
  echo "<table class='table table-bordered table-hover'>";
  echo "<tr style='background-color:#ceff00;'>";
  echo "<th>"; echo "ID"; echo "</th>";
  echo "<th>"; echo "Document-Name"; echo "</th>";
  echo "<th>"; echo "Authors Name"; echo "</th>";
  echo "<th>"; echo "Edition"; echo "</th>";
  echo "<th>"; echo "Department"; echo "</th>";
  echo "<th>"; echo "Download"; echo "</th>";
  echo "</tr>";

  while($row=mysqli_fetch_assoc($res))
  {
    ?>
     <tr>
      <td>  <?php echo $row['bid']; ?> </td>
      <td>  <?php echo $row['name']; ?> </td>
      <td>  <?php echo $row['authors']; ?> </td>
      <td>  <?php echo $row['edition']; ?> </td>
      <td>  <?php echo $row['department']; ?> </td>
      

      <?php

      if(isset($_SESSION['login_user']))
      {
        ?><td><a href="<?php  echo $row['download']  ?>" class="btn btn-primary" download>Download</a></td> <?php
      }

      else
      { 
        ?><td><button class="btn btn-primary" onclick="location.href = 'admin_login.php';">Login</button></td> <?php
        
      }

      ?>

  
 
      
  






      

     </tr>
        
          
    <?php



  }

  


}

if(isset($_POST['submit1']))
{
  if(isset($_SESSION['login_user']))
  {
    mysqli_query($db,"DELETE FROM `books` WHERE bid='$_POST[bid]';");
    ?><script type="text/javascript">alert("Delete Successful.");</script><?php
  }
  else
  {
    ?><script type="text/javascript">alert("Please Login First.");</script><?php
  }
}




  

  ?>
</div>


</div>

</body>


</html>