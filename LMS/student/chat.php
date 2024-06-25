
<?php
  include "connection.php";
  include "nav.php";
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">


  <style>

    .leftbox1{
    height: 600px;
    width: 300px;
    float: left;
    background-color:azure;
    border-radius: 10px;
    margin-left: 100px;

    width: 420px;
    background-color: purple;
    background: transparent;
    border: 2px solid rgba(255, 2555, 255, 0.2);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
    }

 
    .rightbox1
    {
      height: 600px;
 
    float: left;
    background-color:azure;
    border-radius: 10px;
    margin-left: 10px;

    width:900px;
    background-color: purple;
    background: transparent;
    border: 2px solid rgba(255, 2555, 255, 0.2);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;

    }


    tr:hover
  {
    background-color: #1e3f54;
    cursor: pointer;
  }
  .leftbox input
  {
   
    height: 1px;


  


   
    background-color: purple;
    background: transparent;
    border: 2px solid rgba(255, 2555, 255, 0.2);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 10px;
    padding: 18px 40px;
    
  }







  .form-control
{
  height: 47px;
  width: 78%;
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
  width: 500px;
  padding: 13px 10px;
  background-color: #821b69;
  color: white;
  border-radius: 10px;
}
.admin .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #423471;
  color: white;
  border-radius: 10px;
  order: -1;
}












  </style>







  </head>

  






<body style="background-color: aliceblue;background-image:url(img/login.jpg);">
<?php
  $sql1=mysqli_query($db,"SELECT student.pic,message.username FROM student INNER JOIN message ON student.username GROUP BY username ORDER BY status;");
?>
<!-----------------------Left box-------------------->
<div class="leftbox">
  <div class="leftbox1">
    <div style="color: #fff; " >
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="uname">
        <button style="background-color:#ceff00;margin-left:auto;" class="btn btn-default" type="submit" name="submit"  >
        <span style="margin-left:auto;" class="glyphicon glyphicon-search"></span>
        </button>
      </form>
    </div>

    <div class="list">
      <?php
        echo "<table id='table' class='table' >";
        while ($res1=mysqli_fetch_assoc($sql1)) 
        {
          echo "<tr>";
            echo "<td width=65>"; echo "<img class='img-circle profile_img' height=60 width=60 src='img/".$res1['pic']."'>";  echo "</td>";

            echo "<td style='padding-top:30px;'>"; echo $res1['username']; echo "</td>";

          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</div>




<!-----------------------Right box-------------------->
<div class="rightbox">
  <div class="rightbox1">
    <?php
    /*--------------if submit is pressed-----------*/
      if(isset($_POST['submit']))
      {
        $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]' ;");
        mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]' ;");

        if($_POST['username'] != ''){$_SESSION['username']=$_POST['username'];}

    ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>



  <!---------show message----------->
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
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='img/".$_SESSION['pic']."'>";
                  ?>
                  
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
        
          <div style="height: 50px; padding-top:-5px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>
      <?php
      }
     /*--------------if submit is not pressed-----------*/
     else
     {
      if($_SESSION['username']=='')
      {
        ?>
          <img style="margin: 100px 80px; border-radius: 50%;" src="img/plogo.png" alt="animated">
        <?php
      }
      else
      {
        if(isset($_POST['submit1']))
        {
          mysqli_query($db,"INSERT into `arr`.`message` VALUES ('', '$_SESSION[username]','$_POST[message]','no','admin');");

          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        else
        {
          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
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
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="img/plogo.png">&nbsp
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
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='img/".$_SESSION['pic']."'>";
                  ?>
                  
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
          <div style="height: 50px; padding-top:-5px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>

        <?php

      }
     }
    ?>
  </div>
</div>

<script>
  var table = document.getElementById('table'),eIndex;
  for(var i=0; i< table.rows.length; i++)
  {
    table.rows[i].onclick =function()
    {
      rIndex = this.rowIndex;
      document.getElementById("uname").value = this.cells[1].innerHTML;
    }
  }
</script>
</body>
</html>


