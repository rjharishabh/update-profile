<?php
session_start();
require_once "db.php";
if(isset($_POST['verify'])){
  if($_SESSION['code']!=$_POST['verify']){
    $_SESSION['error']="Incorrect code";
    header('Location:fpemailAuth.php');
  }
}
if (isset($_POST['newpass'])&&isset($_POST['conpass'])) {
  if($_POST['newpass']===$_POST['conpass']){
$sql="UPDATE user SET password=:pass WHERE email=:em";
$stmt=$db->prepare($sql);
$stmt->execute(array(
  ':pass' => $_POST['newpass'],
  ':em' => $_SESSION['email']
 ));
$_SESSION['success']="Password changed successfully";
header('Location:login.php');
  }
  else {
    $_SESSION['error']="Confirm password should be same as the password.";
    header('Location:password_reset.php');
  }
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
        <h2 class="text-center ">Change your password </h2>
        <div class="card-body">
          <form  action="password_reset.php" method="post">
            <?php
            if(isset($_SESSION['error'])){
              echo ("<p class='text-danger'>".$_SESSION['error']."</p>");
              unset($_SESSION['error']);
            } ?>

<div class="form-group text-center">
<label for="newpass">New password</label>
  <input type="text" name="newpass" id="newpass" value="">
</div>

<div class="form-group text-center">
<label for="conpass">Confirm password</label>
  <input type="text" name="conpass" id="conpass" value="">
</div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>
        </div>
      </div>

    </div>
      </body>
</html>
