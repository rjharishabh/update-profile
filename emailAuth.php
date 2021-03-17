<?php
session_start();

if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
  $_SESSION['user']=$_POST['username'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['password']=$_POST['password'];
  $code="123456";
  $to = $_SESSION['email'];
  $subject = "Verify email address";
  // for ($i=1; $i <=8 ; $i++) {
  //   $code=$code.rand(0,9);
  // }
    $_SESSION['code']=$code;
  $txt = $code." is the verification code.";
  $headers = "From: update@example.com";
  // mail($to,$subject,$txt,$headers);

}
else {
  $code="123456";
  $to = $_SESSION['email'];
  $subject = "Verify email address";
  // for ($i=1; $i <=8 ; $i++) {
  //   $code=$code.rand(0,9);
  // }
    $_SESSION['code']=$code;
  $txt = $code." is the verification code.";
  $headers = "From: update@example.com";
  // mail($to,$subject,$txt,$headers);
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Email Verification</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="card mx-auto">
        <h2 class="text-center ">Enter the verification code: </h2>
        <div class="card-body">
          <form  action="editprofile.php" method="post">
            <?php
if (isset($_SESSION['error'])) {
echo("<p class='text-center text-danger'>".$_SESSION['error']."</p>");
unset($_SESSION['error']);
}  ?>
<p class="text-center text-danger">An email will be sent to <?=$_SESSION['email']?> <br>with 8-digit verification code to ensure that you
   have the right ot use this email address.</p>

<div class="form-group text-center">
<label for="email-verify">Verification code</label>
  <input type="text" name="verify" required id="email-verify" value="">

</div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Verify</button>
          </div>

          </form>
        </div>
      </div>

    </div>
      </body>
</html>
