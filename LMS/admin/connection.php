


<?php    

$db=mysqli_connect("localhost","root","","arr"); /*server name , username,password,databasename */


if(!$db)  /*is data base not connect properly*/
{

    die("Connection failed: ".mysqli_connect_error());
}

/*echo "Connected successfully.";*/

?>