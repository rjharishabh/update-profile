   <?php
session_start();
require_once 'db.php';
if(isset($_POST['verify'])){
  if($_SESSION['code']==$_POST['verify']){
    $query="INSERT INTO user (username,email,password) VALUES (:un,:em,:pw)";
    $stmt=$db->prepare($query);
    $stmt->execute(array(
    ':un'=>$_SESSION['user'],
    ':em'=>$_SESSION['email'],
    ':pw'=>$_SESSION['password'],
    ));
  }
  else{
    $_SESSION['error']="Incorrect code";
    header('Location:email.php');
  }
}
else {
  $_SESSION['error']="Please enter the code";
    header('Location:email.php');
}

if (isset($_POST['name'])&&isset($_POST['about'])&&isset($_POST['loc'])) {
  $target_dir = "imgs/";
  $target_file = $target_dir . basename($_FILES["picFile"]["name"]);
$_SESSION['img']=$target_file;
  move_uploaded_file($_FILES["picFile"]["tmp_name"], $target_file);


$query="INSERT INTO DETA(name,about,location,image) VALUES (:name,:about,:loc,:im)";
$stmt=$db->prepare($query);
$stmt->execute(array(':name' => $_POST['name'],
':about'=>$_POST['about'],
':loc'=>$_POST['loc'],
':im'=>$target_file
 ));

header('Location:viewprofile.php');
}

  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Your Profile</title>
    <link rel="icon" href="imgs/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/script.js"></script>
  </head>
  <body>
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
    <div class="row  sticky-top justify-content-end">
    <a class="ip logout" href="logout.php">Log out</a>
    </div>


    <div class="row">
      <div class="col justify-content-center">
        <div class="card mx-auto">
          <h1 class="text-center text-primary">Edit Your Profile</h1>
          <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <div class="row">
  <img src="imgs/blank.png" id="profile_pic" class="img-thumbnail img-fluid" alt="profile-pic">
</div>
<div class="row justify-content-center">
  <div class="p-pic text-center">
    <label for="pic"><img src="imgs/camera.svg" class="pic" alt="camera"></label>
        <h6  id="file_name">Change Profile Picture</h6>
  </div>
</div>
<div class="row">
    <input type="file" id="pic" onchange="replace_file_name()" name="picFile">
</div>
      </div>
<div class="form-group">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2">
      <input type="text" class="text-center form-control" onblur="upper()" class="edit_val" id="fname" name="name" size="20" placeholder="Please Enter Your Full Name">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <label for="about"><h5 class="text-primary">About me</h5></label>
  </div>
  <div class="row">
   <textarea name="about" id="about" rows="4" class="form-control" cols="100"></textarea>
  </div>
</div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 text-center">
              <label for="uname"><h5 class="text-primary">Username</h5></label>
            </div>
            <div class="col-md-6 text-center">
              <label for="pass"><h5 class="text-primary">Password</h5></label>
            </div>
          </div>
        </div>

<div class="form-group">
  <div class="row">
  <div class="col-md-6">
  <input type="text" disabled id="uname" value="&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;" class="form-control" >
  </div>
  <div class="col-md-6">
  <input type="text" class="form-control" id="pass" disabled value="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
  </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
  <div class="col-md-6 text-center">
    <label for="email"><h5 class="text-primary">Email</h5></label>
  </div>
  <div class="col-md-6 text-center">
    <label for="loc"><h5 class="text-primary">Location</h5></label>
  </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
  <div class="col-md-6">
  <input type="text" id="email" disabled class="form-control" value="me@example.com">
  </div>
  <div class="col-md-6">
  <input type="text" name="loc" id="loc" class="form-control" placeholder="e.g. New Delhi">
  </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <div class="col-12 col-sm-6 form-group text-center">
<button value="cancel" class="btn btn-lg btn-danger">Cancel</button>
    </div>
    <div class="col-12 col-sm-6 form-group text-center">
<button type="submit" class="btn btn-lg btn-success">Save</button>
    </div>
  </div>
</div>
    </form>
    </div>
      </div>
        </div>
          </div>
  </div>
</body>
</html>
