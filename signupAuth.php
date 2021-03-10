<?php
session_start();
require_once 'db.php';
if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
$query="INSERT INTO user (username,email,password) VALUES (:un,:em,:pw)";
$stmt=$db->prepare($query);
$stmt->execute(array(
':un'=>hash('md5',$_POST['username']."root"),
':em'=>$_POST['email'],
':pw'=>hash('md5',$_POST['password']."root")
));
$_SESSION['user']=$_POST['username'];
$_SESSION['email']=$_POST['email'];
header('Location:emailAuth.php');

}

 ?>
