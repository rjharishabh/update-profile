<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
<div class="container">
  <div class="card mx-auto">
    <?php
    if(isset($_SESSION['error'])){
      echo ("<p class='text-danger'>".$_SESSION['error']."</p>");
      unset($_SESSION['error']);
    } ?>
    <?php
    if(isset($_SESSION['success'])){
      echo ("<p class='text-success'>".$_SESSION['success']."</p>");
      unset($_SESSION['success']);
    } ?>
    <h2 class="text-center ">Log In</h2>
    <div class="card-body">
      <form id="login" action="loginAuth.php" method="post">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" required id="username" value="">
              <a href="#">forgot username</a>
        </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required id="password" value="">
        <input type="checkbox" name="" value="" id="show" onchange="change()">
        <label for="show">show password</label>
        <a href="fpass.php">forgot password</a>
      </div>
     <div class="g-recaptcha" data-sitekey="6Ldo0nwaAAAAAIbM9sHZljoHPaIkzaScYpofH41i"></div>
      <div class="form-group text-center">

        <button type="submit" class="btn btn-primary">Log In</button>
      </div>
          <div class="form-group text-center">
          <h6>If you don't have an account, please <a href="signup.php">sign up</a></h6>
          </div>

          <!-- <script>
             function onSubmit(token) {
               document.getElementById("login").submit();
             }
           </script> -->
           <!-- <script>
              document.getElementById('login').addEventListener('submit', event => {
                   event.preventDefault()
                   function getRecaptchaToken(form) {
       grecaptcha.ready(function() {
           grecaptcha.execute('6LcAv3waAAAAANvAMZEG2I50PAm4qIQLXpYx5vrh', {action: 'loginAuth.php'}).then(function(token) {
             console.log(token);
            document.querySelector('[name="g-recaptcha-response"]').value = token //set the value of the hidden field
               form.submit() //submit the form
           });
       });
   }
               });
           </script> -->
      </form>
    </div>
  </div>

</div>
  </body>
  <script type="text/javascript">
    function change(){
      var p=document.getElementById('password');
      if(p.type=="password")
      p.type="text";
      else {
        p.type="password";
      }
    }
  </script>
</html>
