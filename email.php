<?php
session_start();
if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
  $_SESSION['user']=$_POST['username'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['password']=$_POST['password'];
  $code="123456";
  $to = $_SESSION['email'];
  $subject = "Verify email address";
  // for ($i=1; $i <=6 ; $i++) {
  //   $code=$code.rand(0,9);
  // }
    $_SESSION['code']=$code;
  $txt = $code." is your verification code for acoount creation.";
  $headers = "From: update@example.com";
  // mail($to,$subject,$txt,$headers);

}
else {
  if (!isset($_SESSION['email'])) {
    header('Location:signup.php');
  }
  $code="123456";
  $to = $_SESSION['email'];
  $subject = "Verify email address";
  // for ($i=1; $i <=6 ; $i++) {
  //   $code=$code.rand(0,9);
  // }
    $_SESSION['code']=$code;
  $txt = $code." is your verification code for account creation.";
  $headers = "From: update@example.com";
  // mail($to,$subject,$txt,$headers);
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify Your Email</title>
<link rel="icon" href="imgs/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
    <div class="col-6">
      <a href="index.php"><h3 class="head text-white">Update Profile</h3></a>
    </div>
    <div class="col-6">
    <p class="ip">Your IP Address is <?=$_SERVER['REMOTE_ADDR']?></p>
    </div>
      </div>
      <div class="row">
        <div class="col justify-content-center">
          <div class="card mx-auto">
            <h1 class="text-center text-primary">Verify Your Email</h1>
            <div class="card-body">
              <?php
              if(isset($_SESSION['error'])){
                echo ("<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>
    <strong>".$_SESSION['error']."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span></button></div>");
                unset($_SESSION['error']);
              }?>
              <form action="editprofile.php" method="post">
              <?php
              echo ("<h4 class='text-center text-success'>We have sent an email with your code to <strong>".$_SESSION['email']."</strong></h4>");
               ?>
               <div class="form-group">
                 <div class="row">
                   <div class="col-12">
                     <fieldset>
                       <legend><h4 class="text-primary">Enter the code</h4></legend>
                         <input type="text" class="email-input form-control" name="verify" required placeholder="123456">
                          </fieldset>
                   </div>
                     </div>
               </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary">Verify</button>
              </div>
              <div class="form-group text-center">
              <h5>Didn't receive an email?<a href="email.php">Resend</a></h5>
              </div>
                </form>
              <div class="form-group text-center">
                <a href="signup.php" class="btn btn-lg btn-secondary">Go Back</a>
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
