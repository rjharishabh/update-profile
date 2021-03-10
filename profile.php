<?php
session_start();
require_once 'db.php';
if(isset($_POST['verify'])){
  if($_SESSION['code']==$_POST['verify']){
    $query="INSERT INTO user (username,email,password) VALUES (:un,:em,:pw)";
    $stmt=$db->prepare($query);
    $stmt->execute(array(
    ':un'=>hash('md5',$_SESSION['user']."root"),
    ':em'=>$_SESSION['email'],
    ':pw'=>hash('md5',$_SESSION['password']."root")
    ));
  }
  else{
    $_SUCCESS['error']="Incorrect code";
    header('Location:emailAuth.php');
  }
}
else {
  $_SESSION['error']="Please enter the code";
    header('Location:emailAuth.php');
}


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
<div class="container">
  <div class="text-center">
      <h2 >Welcome</h2>
      <a href="logout.php">Log out</a>
  </div>

</div>
  </body>
</html>
