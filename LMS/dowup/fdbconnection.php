<?php
//database connection details

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "arr";

 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

 //Fetch the uploaded files from the database

 $sql = "SELECT *FROM files";
 $result = $conn->query($sql);

?>