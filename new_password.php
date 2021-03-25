<?php
session_start();
require_once "db.php";
if (!isset($_SESSION['email'])) {
  header('Location:login.php');
  return;
}
if (isset($_POST['submit'])) {
  if($_SESSION['code']!==$_POST['verify']){
    $_SESSION['error']="Incorrect Code";
    unset($_SESSION['code']);
    header('Location:email.php');
    return;
  }
}

if (isset($_POST['cngpass'])) {
  if ($_POST['password']!==$_POST['cpassword']) {
    $_SESSION['error']="Password and Confirm Password should be same.";
    header('location:new_password.php');
    return;
  }
  else {
    $query="UPDATE USER SET password=:pass WHERE email=:em";
    $stmt=$db->prepare($query);
    $stmt->execute(array(
      ':pass'=>$_POST['password'],
      ':em'=>$_SESSION['email']
    ));
    unset($_SESSION['email']);
    unset($_SESSION['code']);
    unset($_SESSION['action']);
    $_SESSION['success']="Password changed successfully";
    header('Location:login.php');
    return;
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create New Password</title>
    <link rel="icon" href="imgs/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/angular.min.js"></script>
<script src="js/app.js"></script>
<script src="js/script.js"></script>
  </head>
  <body ng-app="signup">
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
            <h3 class="text-center text-primary">Create New Password</h3>
            <div class="card-body">
              <form action="" method="post" ng-controller="signup_form as signup">
                <?php
                if(isset($_SESSION['error'])){
                  echo ("<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>
      <strong>".$_SESSION['error']."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>");
                  unset($_SESSION['error']);
                }
                ?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="password"><h4>Create New Password</h4></label>
                    </div>
                    <div class="col-10">
                      <input  class="form-control" type="password" ng-change="signup.check()" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" ng-model="signup.pass" name="password" required id="password">
                    </div>
                    <div class="col-1"  onclick="change()">
                        <img id="pass" class="eye" src="imgs/eye-slash.svg" alt="i-slash">
                    </div>
                    <div class="col-1" id="tick"></div>
                      </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="cpassword"><h4>Confirm New Password</h4></label>
                    </div>
                    <div class="col-10">
                      <input  class="form-control" type="password" ng-change="signup.check()" ng-model="signup.cpass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="cpassword" required id="cpassword">
                    </div>
                    <div class="col-1"  onclick="cchange()">
                        <img  id="cpass" class="eye" src="imgs/eye-slash.svg" alt="i-slash">
                    </div>
                      <div class="col-1" id="ctick"></div>
                      </div>
                </div>

              <div class="form-group text-center">
                <button type="submit" name="cngpass" class="btn btn-lg btn-primary">Change Password</button>
              </div>

              </form>
              <div class="form-group text-center">
                <a href='email.php' class='btn btn-lg btn-secondary'>Go Back</a>
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
