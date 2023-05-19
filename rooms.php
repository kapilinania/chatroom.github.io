<?php
include 'connection.php';
$roomname = $_GET['roomname'];
//room exitts or not 
$check  = "SELECT * FROM `rooms` WHERE rooname = '$roomname' ";
$resultDatavalue = mysqli_query($con, $check);   
if($resultDatavalue)
{
    if(mysqli_num_rows($resultDatavalue) == 0){
        $resultexits = "This room does not exits";
        echo '<script language ="javascript">';
        echo 'alert("'.$resultexits.'");';
        echo 'window.location="http://127.0.0.1/chatroom/";';
        echo '</script>';

    }
    

}
else{
    echo "Error is herer    ";
}
echo "let do a chat";

?>