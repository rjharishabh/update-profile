   <?php
session_start();
require_once 'db.php';
  $img='imgs/blank.png';
  $name="";
  $abt="Please write about yourself.";
  $loc="";
  if (isset($_POST['submit'])) {
    if($_SESSION['code']!=$_POST['verify']){
      $_SESSION['error']="Incorrect Code";
      unset($_SESSION['code']);
      header('Location:email.php');
      return;
    }
    else {
      $query="INSERT INTO USER(username,email,password) VALUES (:u,:e,:p)";
      $stmt=$db->prepare($query);
      $stmt->execute(array(':u' => $_SESSION['user'],
      ':e'=>$_SESSION['email'],
      ':p'=>$_SESSION['password']
       ));
       unset($_SESSION['user']);
       // unset($_SESSION['email']);
       unset($_SESSION['password']);
       unset($_SESSION['action']);
       unset($_SESSION['code']);
       $sql="SELECT * FROM USER WHERE email=:e";
       $s=$db->prepare($sql);
       $s->execute(array(
         ':e'=>$_SESSION['email']
       ));
       $row=$s->fetch(PDO::FETCH_ASSOC);
       $_SESSION['id']=$row['id'];
       unset($_SESSION['email']);
       $c="INSERT INTO DETAA(id) VALUES(:id)";
       $st=$db->prepare($c);
       $st->execute(array(
         ':id'=>$_SESSION['id']
     ));
    }
  }




if (isset($_POST['cancel'])) {
  header('Location:profile.php');
  return;
}

else if (isset($_POST['save'])) {
  $query="UPDATE DETAA SET name=:name, about=:abt, location=:loc WHERE id=:id";
  $stmt=$db->prepare($query);
  $stmt->execute(array(
    ':name'=>$_POST['name'],
    ':abt'=>$_POST['about'],
    ':loc'=>$_POST['loc'],
    ':id'=>$_SESSION['id']
));

    $target_dir = "imgs/";
    $basename=basename($_FILES["pic"]["name"]);
    $target_file = $target_dir . $basename;
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    $q="UPDATE DETAA SET image=:im WHERE id=:id";
    $s=$db->prepare($q);
    $s->execute(array(
      ':im'=>$basename,
      ':id'=>$_SESSION['id']
  ));

header('Location:profile.php');
return;
}
else {
  $query="SELECT * FROM USER WHERE id=:id";
  $stmt=$db->prepare($query);
  $stmt->execute(array(':id'=>$_SESSION['id']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  $sql="SELECT * FROM DETAA WHERE id=:id";
  $det=$db->prepare($sql);
  $det->execute(array(':id'=>$_SESSION['id']));
  $row2=$det->fetch(PDO::FETCH_ASSOC);
  if($row2['image']!==NULL)
  $img="imgs/".$row2['image'];
  if($row2['name']!==NULL)
  $name=$row2['name'];
  if($row2['about']!==NULL)
  $abt=$row2['about'];
  if($row2['location']!==NULL)
  $loc=$row2['location'];
}

if (!isset($_SESSION['id'])) {
  header('Location:login.php');
  return;
}

//
// if (isset($_POST['name'])&&isset($_POST['about'])&&isset($_POST['loc'])) {
//   $target_dir = "imgs/";
//   $target_file = $target_dir . basename($_FILES["picFile"]["name"]);
// $_SESSION['img']=$target_file;
//   move_uploaded_file($_FILES["picFile"]["tmp_name"], $target_file);
//
//
// $query="INSERT INTO DETA(name,about,location,image) VALUES (:name,:about,:loc,:im)";
// $stmt=$db->prepare($query);
// $stmt->execute(array(':name' => $_POST['name'],
// ':about'=>$_POST['about'],
// ':loc'=>$_POST['loc'],
// ':im'=>$target_file
//  ));
//
// header('Location:viewprofile.php');
// }

  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Your Profile</title>
    <link rel="icon"  <?=htmlentities("href=".$img); ?> >
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
  <img <?=htmlentities("src=".$img); ?> id="profile_pic" class="img-thumbnail img-fluid" alt="profile-pic">
</div>
<div class="row justify-content-center">
  <div class="p-pic text-center">
    <label for="pic"><img src="imgs/camera.svg" class="pic" alt="camera"></label>
        <h6  id="file_name">Change Profile Picture</h6>
  </div>
</div>
<div class="row">
    <input type="file" id="pic" onchange="replace_file_name()" name="pic">
</div>
      </div>
<div class="form-group">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2">
      <input type="text" class="text-center form-control" onblur="upper()" class="edit_val" id="fname" name="name" size="20" placeholder="Please Enter Your Full Name" <?php echo "value=".$name; ?> >
    </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <label for="about"><h5 class="text-primary">About me</h5></label>
  </div>
  <div class="row">
   <textarea name="about" id="about" rows="4" class="form-control" cols="100"><?=$abt; ?></textarea>
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
  <input type="text" disabled id="uname" value="&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;" class="form-control">
  <small class="form-text text-center text-muted">We don't know your username.</small>
  </div>
  <div class="col-md-6">
  <input type="text" class="form-control" id="pass" disabled value="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
  <small class="form-text text-center text-muted">We don't know your password.</small>
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
  <input type="text" id="email" disabled class="form-control" <?="value=".$row['email']; ?> >
  </div>
  <div class="col-md-6">
    <?php echo "<input type='text' name='loc' id='loc' class='form-control'  placeholder='e.g. New Delhi' value=".$loc.">" ?>

  </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <div class="col-12 col-sm-6 form-group text-center">
<button  name="cancel" type="submit" class="btn btn-lg btn-danger">Cancel</button>
    </div>
    <div class="col-12 col-sm-6 form-group text-center">
<button type="submit" name="save" class="btn btn-lg btn-success">Save</button>
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
