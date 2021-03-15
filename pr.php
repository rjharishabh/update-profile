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
  <div class="profile">
     <img src="imgs/blank.png" alt="profile-pic">
  <h2>Full Name</h2>
  </div>
<div class="details">
  <div class="row">
    <h5>About me</h5>
  </div>
  <div class="row">
    <div id="about-me">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis venenatis ex.
    Suspendisse massa velit, finibus ut consequat id, malesuada sit amet leo. Praesent sodales non sapien et laoreet.
    Morbi lobortis quam erat, quis cursus nibh fermentum at. Aenean nisi metus, cursus non rhoncus a, laoreet in dolor.
    Donec fringilla elit et odio imperdiet,
    </div>
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
    <input type="text" name="" value="">
  </div>
  <div class="col-md-6">
    <input type="text" name="" value="">
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
    <input type="text" name="" value="">
  </div>
  <div class="col-md-6">
    <input type="text" name="" value="">
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




  </div>

  </body>
</html>
