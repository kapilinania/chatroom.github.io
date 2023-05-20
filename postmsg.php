<?php 

   include 'connection.php';
   $msg = $_POST['text'];
   $room = $_POST['room'];
   $ip = $_POST['ip'];
    $sqlQuery  ="INSERT INTO `msgsdata` ( `msg`, `room`, `ip`, `stimeData`) VALUES ( '$msg', '$room', '$ip', current_timestamp());";
    mysqli_query($con, $sqlQuery);
    mysqli_close($con);

?>