 <!-- <?php
 $_SESSION['img']='imgs/day93-programing.png';
require_once "db.php";
if (isset($_POST['name'])&&isset($_POST['about'])&&isset($_POST['loc'])) {


  $target_dir = "imgs/";
  $target_file = $target_dir . basename($_FILES["picFile"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES["picFile"]["tmp_name"], $target_file);


$query="INSERT INTO DETA(name,about,location) VALUES (:name,:about,:loc)";
$stmt=$db->prepare($query);
$stmt->execute(array(':name' => $_POST['name'],
':about'=>$_POST['about'],
':loc'=>$_POST['loc']
 ));



}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
<div class="container">
  <!-- <?php echo "<p style='float:right';>Your ip address is ".$_SERVER['REMOTE_ADDR']."</p>" ?> -->
  <!-- <button style='float:right;'  class="btn btn-sm btn-primary">Edit</button> -->
  <div class="profile">
    <div class="profile-pic">
     <img src=<?=$_SESSION['img'] ?> alt="profile-pic">
      <input type="file"  id="pic" name="picFile" >

      <!-- <label for="pic"><i class="fa fa-file-image-o fa-3x" aria-hidden="true"></i></label> -->
    </div>
      </div>
    <fieldset>
      <form action="pr.php" enctype="multipart/form-data" method="post">
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
</html> -->
