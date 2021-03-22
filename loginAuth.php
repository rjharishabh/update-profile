<?php
session_start();


require_once "db.php";
if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['g-recaptcha-response'])) {
  $query="SELECT  username, password FROM user WHERE username=:un";
$stmt=$db->prepare($query);
$stmt->execute(array(":un"=>$_POST['username']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($row===false) {
  $_SESSION['error']="Incorrect Username";
  header('Location:login.php');
}
else {
  if ($row['password']===$_POST['password']) {
    $_SESSION['user']=$_POST['username'];
header('Location:loginprofile.php');
  }
  else {
    $_SESSION['error']="Incorrect Password";
      header('Location:login.php');
  }
}
}
 ?>
