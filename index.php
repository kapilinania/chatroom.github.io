<?php
 session_start();  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .container1{
            width:450px;
            margin:auto;
        }
    </style>
  </head>
  <body>
    
    <div class="container-fluid">
        <div class="container1">

            <div class="row mt-5 shadow p-5 mb-5 bg-body-tertiary rounded">
            <form method="POST" action="claim.php"> 
                <div class="mb-3">
                    <label for="chatID" class="form-label">Enter Chat Room Name</label>
                    <input type="text" class="form-control" id="chatID" aria-describedby="emailHelp" name="chatInput" required>
                    
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required >
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-dark" name="chatSubmit">Claim Room</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>