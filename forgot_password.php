<?php
session_start();
require_once 'db.php';
if(isset($_POST['fuser'])){
$sql="SELECT * FROM USER WHERE username=:un";
$stmt=$db->prepare($sql);
$stmt->execute(array(
  ':un' => $_POST['fpuser']
));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($row===false){
  $_SESSION['error']="Incorrect Username";
  header('Location:forgot_password.php');
}
else {
$_SESSION['email']=$row['email'];
header('Location:fpemailAuth.php');
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
<link rel="icon" href="imgs/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/script.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
    <div class="col-12 col-md-4">
      <a href="index.php"><h3 class="head text-white">Update Profile</h3></a>
    </div>
    <div class="col-12 col-md-4 text-center">
      <div class="time">
      <span id="hr">HH</span><span id="min">MM</span><span id="sec">SS</span>
      </div>
    </div>
    <div class="col-12 col-md-4">
    <p class="ip text-center">Your IP Address is <?=$_SERVER['REMOTE_ADDR']?></p>
    </div>
      </div>
      <div class="row">
        <div class="col justify-content-center">
          <div class="card mx-auto">
            <h1 class="text-center text-primary">Forgot Password</h1>
            <div class="card-body">
              <?php
              if(isset($_SESSION['error'])){
                echo ("<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>
    <strong>".$_SESSION['error']."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span></button></div>");
                unset($_SESSION['error']);
              }?>
              <form action="fpemailAuth.php" method="post">
               <div class="form-group">
                 <div class="row">
                   <div class="col-12">
                     <fieldset>
                       <legend><h5 class="text-primary">Enter the Username</h5></legend>
                         <input type="text" class="email-input form-control" name="fpuser" required placeholder="Username">
                          </fieldset>
                   </div>
                     </div>
               </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary">Next</button>
              </div>
                </form>
              <div class="form-group text-center">
                <a href="login.php" class="btn btn-lg btn-secondary">Go Back</a>
              </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </html>
