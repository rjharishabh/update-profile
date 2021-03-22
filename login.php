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
    <?php
    if(isset($_SESSION['error'])){
      echo ("<p class='text-danger'>".$_SESSION['error']."</p>");
      unset($_SESSION['error']);
    } ?>
    <?php
    if(isset($_SESSION['success'])){
      echo ("<p class='text-success'>".$_SESSION['success']."</p>");
      unset($_SESSION['success']);
    } ?>
<div class="container">
    <a href="index.php"><h3 class="head text-white">Update Profile</h3></a>
  <div class="row">
    <div class="col justify-content-center">
      <div class="card mx-auto">
        <h1 class="text-center text-primary">Log In</h1>
        <div class="card-body">
          <form id="login" action="loginAuth.php" method="post">
            <div class="form-group">
              <div class="row">
<div class="col-3">
    <label for="username"><h4>Username</h4></label>
</div>
<div class="col-8">
    <input type="text" name="username" class="form-control" required id="username">
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
    <input  class="form-control" type="password" name="password" required id="password">
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
</div>
  </body>
</html>
