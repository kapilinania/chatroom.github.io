<?php
error_reporting(0); 
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
    echo "Error is herer:".mysqli_error($con);
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
body {
  margin: 0 auto;
  max-width: 1000px;
  padding: 0 20px;
}
a{
  text-decoration:none;
  color:white;
}
.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  height:auto;
  overflow: scroll;
}

.time-right {
  float: right;
  color: #aaa;
}


.anyclass{
    height:500px;
    background:#ddd;
    border:0px solid red;
   
}
</style>
</head>
<body>

<h2>Chat Messages --  <?php echo $roomname; ?></h2>

<div class="container">
<div class="anyclass">

</div>
</div>



<input type="text" class="form-control mt-3" name="usermsg" id="usermsg" placeholder="add message"> <br>
<button type="button" class="btn btn-dark" name="submitmsg" id="submitmsg">Send</button>
<button type="submit" class="btn btn-dark" name=""> <a  href="index.php">Logout </a></button>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
    //check for new message 
    setInterval(runFunction, 1000); 
    function runFunction()
    {
        $.post("htcont.php", {room:'<?php  echo $roomname ?>'},
          function(data, status)
          {
            document.getElementsByClassName('anyclass')[0].innerHTML =data; 
          }
        )
    }

    //enter click then submit
    // Get the input field
    var input = document.getElementById("usermsg");

    // Execute a function when the user presses a key on the keyboard
    input.addEventListener("keypress", function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        document.getElementById("submitmsg").click();
    }
    });

    //enter is closed now
    //post request
    $("#submitmsg").click(function(){
        var clientMsg = $("#usermsg").val();
  $.post("postmsg.php", {text: clientMsg, room: '<?php  echo $roomname; ?>', ip:'<?php  echo $_SERVER['REMOTE_ADDR'] ?>'}),
  function(data, status) {
    document.getElementsByClassName('anyclass')[0].innerHTML = data;}
    $("#usermsg").val("");
    return false;   
});
</script>
<?php
session_destroy();  
exit();
?>

</body>
</html>
