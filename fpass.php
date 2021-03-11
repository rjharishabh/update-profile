<?php
session_start();
require_once 'db.php';
if(isset($_POST['fuser'])){
$sql="SELECT * FROM USER WHERE username=:un";
$stmt=$db->prepare($sql);
$stmt->execute(array(
  ':un' => $_POST['fuser']
));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($row===false){
  $_SESSION['error']="Incorrect Username";
  header('Location:fpass.php');
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
    <title>Email Verification</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="card mx-auto">
        <h2 class="text-center ">Forgot Password</h2>
        <div class="card-body">
          <form  action="" method="post">
            <?php
if (isset($_SESSION['error'])) {
echo("<p class='text-center text-danger'>".$_SESSION['error']."</p>");
unset($_SESSION['error']);
}  ?>
<div class="form-group text-center">
<label for="email-verify">Enter the username</label>
  <input type="text" name="fuser" required id="email-verify" value="">
</div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Send Code to Email</button>
          </div>

          </form>
        </div>
      </div>

    </div>
      </body>
</html>
