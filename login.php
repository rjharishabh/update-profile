<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
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
        <h1 class="text-center text-primary">Log In</h1>
        <div class="card-body">
          <form action="loginAuth.php" method="post">
            <?php
            if(isset($_SESSION['error'])){
              echo ("<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>
  <strong>".$_SESSION['error']."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button></div>");
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo ("<div class='alert text-center alert-success alert-dismissible fade show' role='alert'>
  <strong>".$_SESSION['success']."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button></div>");
              unset($_SESSION['success']);
            } ?>
            <div class="form-group">
              <div class="row">
<div class="col-3">
    <label for="username"><h4>Username</h4></label>
</div>
<div class="col-8">
    <input type="text" name="username" class="form-control" required placeholder="Username" id="username">
    <a href="#" class="forgot">forgot username</a>
</div>
      </div>
            </div>
            <div class="form-group">
              <div class="row">
        <div class="col-3">
        <label for="password"><h4>Password</h4></label>
        </div>
        <div class="col-8">
    <input  class="form-control" type="password" name="password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password">
      <a href="fpass.php" class="forgot">forgot password</a>
</div>
<div class="col-1"  onclick="change()">
    <img class="eye" id="pass" src="imgs/eye-slash.svg" alt="i-slash">
</div>
        </div>
        </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-lg btn-primary">Log In</button>
          </div>
              <div class="form-group text-center">
              <h5>Don't have an account?<a href="signup.php">Sign Up</a></h5>
              </div>
          </form>
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
