<?php
session_start();  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatroom";
 
// Create connection in mysqli
 
$con = mysqli_connect($servername, $username, $password, $dbname);
 
//Check connection in mysqli
if(!$con){
die("Error on the connection" .mysqli_error());
}
else
{
//echo "Hay kapil Connected Sucessfully ";
}
?>