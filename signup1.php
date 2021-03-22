<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
<div class="container">
  <div class="card mx-auto">
    <h2 class="text-center ">Sign Up</h2>
    <div class="card-body">
      <form class="" action="emailAuth.php" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" required name="email" id="email" placeholder="">
        </div>
        <div class="form-group">
          <label for="username">Create Username</label>
          <input type="text" required name="username" id="username" value="">
        </div>
      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" required name="password" id="password" value="">
        <input type="checkbox" id="show" onchange="change()">
        <label for="show">show password</label>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" required name="password" id="password" value="">
        <input type="checkbox" id="show" onchange="change()">
        <label for="show">show password</label>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
          <div class="form-group text-center">
          <h6>If you have an account, please <a href="login.php">log in</a></h6>
        </div>
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
