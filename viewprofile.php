<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <div class="container">
  <?php echo "<p style='float:right';>Your ip address is ".$_SERVER['REMOTE_ADDR']."</p>" ?>
<a style="float:right;display:block;"href="logout.php">Log out</a>
<fieldset>
  <form action="editprofile.php" enctype="multipart/form-data" method="post">
  <div class="profile">
    <div class="profile-pic">
     <img src=<?=$_SESSION['img'] ?> alt="profile-pic">
      <input type="file"  id="pic" name="picFile">
    </div>
      </div>

  <div class="text-center">
        <input type="text" class="text-center" name="name" size="30" placeholder="Full Name">
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


        </div>
            <input type="submit" value="Cancel" name="cancel">
      <input type="submit" value="Submit">
      </form>
    </fieldset>
  </div>
</body>
</html>
