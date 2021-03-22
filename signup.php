<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="icon" href="imgs/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/angular.min.js"></script>
<script src="js/app.js"></script>
<script src="js/script.js"></script>
  </head>
  <body ng-app="signup">
    <div class="container">
        <a href="index.php"><h3 class="head text-white">Update Profile</h3></a>
      <div class="row">
        <div class="col justify-content-center">
          <div class="card mx-auto">
            <h1 class="text-center text-primary">Create Account</h1>
            <div class="card-body">
              <form action="emailAuth.php" method="post" ng-controller="signup_form as signup">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="email"><h4>Enter Email</h4></label>
                    </div>
                    <div class="col-10">
                      <input type="text" name="email" class="form-control" required placeholder="me@example.com" id="email">
                    </div>
                      </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="username"><h4>Create Username</h4></label>
                    </div>
                    <div class="col-10">
                      <input type="text" name="username" class="form-control" required id="username">
                    </div>
                      </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="password"><h4>Create Password</h4></label>
                    </div>
                    <div class="col-10">
                      <input  class="form-control" type="password" ng-change="signup.check()" ng-model="signup.pass" name="password" required id="password">
                    </div>
                    <div class="col-1"  onclick="change()">
                        <img id="pass" class="eye" src="imgs/eye-slash.svg" alt="i-slash">
                    </div>
                    <div class="col-1" id="tick"></div>
                      </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="cpassword"><h4>Confirm Password</h4></label>
                    </div>
                    <div class="col-10">
                      <input  class="form-control" type="password" ng-change="signup.check()" ng-model="signup.cpass" name="cpassword" required id="cpassword">
                    </div>
                    <div class="col-1"  onclick="cchange()">
                        <img  id="cpass" class="eye" src="imgs/eye-slash.svg" alt="i-slash">
                    </div>
                      <div class="col-1" id="ctick"></div>
                      </div>
                </div>

              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
              </div>
                  <div class="form-group text-center">
                  <h5>Already have an account?<a href="login.php">Log In</a></h5>
                  </div>
              </form>
                  </div>
            </div>
          </div>
        </div>
      </div>

  </body>
</html>
