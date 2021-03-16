 <?php
require_once "db.php";
if (isset($_POST['name'])&&isset($_POST['about'])&&isset($_POST['loc'])) {


  $target_dir = "imgs/";
  $target_file = $target_dir . basename($_FILES["picFile"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES["picFile"]["tmp_name"], $target_file);


  $dom=new DOMDocument();
if($dom->getElementById('tfa')){
$query="INSERT INTO DET(name,about,location,tfa) VALUES (:name,:about,:loc,:tfa)";
$stmt=$db->prepare($query);
$stmt->execute(array(':name' => $_POST['name'],
':about'=>$_POST['about'],
':loc'=>$_POST['loc'],
":tfa"=>2
 ));
}
else {
$query="INSERT INTO DET(name,about,location,tfa) VALUES (:name,:about,:loc,:tfa)";
$stmt=$db->prepare($query);
$stmt->execute(array(':name' => $_POST['name'],
':about'=>$_POST['about'],
':loc'=>$_POST['loc'],
":tfa"=>1
 ));
}


}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
<div class="container">
  <?php echo "<p style='float:right';>Your ip address is ".$_SERVER['REMOTE_ADDR']."</p>" ?>
  <!-- <button style='float:right;'  class="btn btn-sm btn-primary">Edit</button> -->
  <div class="profile">
     <img src="imgs/blank.png" alt="profile-pic">

<form action="pr.php" enctype="multipart/form-data" method="post">
     <input type="file" name="picFile" value="">
  <input type="text" name="name" placeholder="Full Name">
  </div>
  <div class="details">
  <div class="row">
  <h5>About me</h5>
  </div>
  <div class="row">
   <textarea name="about" rows="4" cols="800"></textarea>
  </div>


  <div class="row">
  <div class="col-md-6">
  <h5>Username</h5>
  </div>
  <div class="col-md-6">
  <h5>Password</h5>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
  <input type="text" name="username" value="">
  </div>
  <div class="col-md-6">
  <input type="text" name="password" value="">
  </div>
  </div>

  <div class="row">
  <div class="col-md-6">
  <h5>Email</h5>
  </div>
  <div class="col-md-6">
  <h5>Location</h5>
  </div>
  </div>

  <div class="row">
  <div class="col-md-6">
  <input type="text" name="email" value="">
  </div>
  <div class="col-md-6">
  <input type="text" name="loc" value="">
  </div>
  </div>

  <div class="row">
  <label for="tfa">Two Factor Authentication</label>
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="tfa">
  <label class="custom-control-label" for="tfa"></label>
  </div>
  </div>


  </div>
<input type="submit" value="Submit">

</form>





  </div>

  </body>
</html>
