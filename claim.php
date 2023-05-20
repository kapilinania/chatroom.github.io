<?php
include 'connection.php';
 $room = $_POST['chatInput'];
 if(strlen($room) > 20 or strlen($room) < 2)
 {
    $message = "Please Chose a name between 2 to 10 char";
    echo '<script language ="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://127.0.0.1/chatroom/";';
    echo '</script>';
 }
 elseif(!ctype_alnum($room))
 {
    $message = "Please chose an alphanumeric room name";
    echo '<script language ="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://127.0.0.1/chatroom/";';
    echo '</script>';

 }
 else{
    include 'connection.php';
 }
 echo "Lets chat now";

 //check room if already exits
 $sql = "SELECT * FROM `rooms` WHERE rooname = '$room'  ";
 $result  = mysqli_query($con, $sql);
 if($result){
    if(mysqli_num_rows($result) > 0){
        $resultData = "Please chose different room";
        echo '<script language ="javascript">';
        echo 'alert("'.$resultData.'");';
        echo 'window.location="http://127.0.0.1/chatroom/";';
        echo '</script>';
    }
    else{
        $sqlData= "INSERT INTO `rooms` ( `rooname`, `time`) VALUES ( '$room', current_timestamp());";
        if(mysqli_query($con, $sqlData )){
            $resultChat = "Room is ready chat now";
            echo '<script language ="javascript">';
            echo 'alert("'.$resultChat.'");';
            echo 'window.location="http://127.0.0.1/chatroom/rooms.php?roomname='.$room .'";';
            echo '</script>';
        }
    }
 }
 else{
    echo mysqli_error($con);
    
 }
 


?>