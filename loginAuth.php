<?php
session_start();
require_once "db.php";
if (isset($_POST['username'])&&isset($_POST['password'])) {
  $query="SELECT  username, password FROM user WHERE username=:un";
$stmt=$db->prepare($query);
$stmt->execute(array(":un"=>hash('md5',$_POST['username']."root")));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($row===false) {
  $_SESSION['error']="Incorrect Username";
  header('Location:login.php');
}
else {
  if ($row['password']===hash('md5',$_POST['password']."root")) {
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
