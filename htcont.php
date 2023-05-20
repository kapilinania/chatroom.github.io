<?php
 
error_reporting(0);
$roomPost  = $_POST['room'];
  include 'connection.php';
  $sqlHtcon  = "SELECT  `msg`, `room`, `ip`, `stimeData` FROM `msgsdata` WHERE `room` = '$roomPost' ";
  $htmlCon = "";
  $reultDatasee  = mysqli_query($con,  $sqlHtcon);
  if(mysqli_num_rows($reultDatasee)>0)
    {
        while($row = mysqli_fetch_assoc($reultDatasee))
        {
            
           $res = $res . '<div class="container" style="color:red;">';
           $res = $res . $row['ip'];
           $res = $res . " says <p>".$row['msg'];
           $res =   $res . '</p> <span class="time-right">'. $row["stimeData"].'</span></div>';
        }

  }
  echo $res;
?>