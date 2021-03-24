<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
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
      <div class="row">
        <div class="col justify-content-center">
          <div class="card mx-auto">
            <h1 class="text-center text-primary">Create Account</h1>
            <div class="card-body">
              <form action="email.php" method="post" ng-controller="signup_form as signup">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="email"><h4>Enter Email</h4></label>
                    </div>
                    <div class="col-10">
                      <input type="email" name="email" class="form-control" required placeholder="me@example.com" id="email">
                    </div>
                      </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="username"><h4>Create Username</h4></label>
                    </div>
                    <div class="col-10">
                      <input type="text" name="username" class="form-control" placeholder="Username" required id="username">
                    </div>
                      </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label for="password"><h4>Create Password</h4></label>
                    </div>
                    <div class="col-10">
                      <input  class="form-control" type="password" ng-change="signup.check()" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" ng-model="signup.pass" name="password" required id="password">
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
                      <input  class="form-control" type="password" ng-change="signup.check()" ng-model="signup.cpass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="cpassword" required id="cpassword">
                    </div>
                    <div class="col-1"  onclick="cchange()">
                        <img  id="cpass" class="eye" src="imgs/eye-slash.svg" alt="i-slash">
                    </div>
                      <div class="col-1" id="ctick"></div>
                      </div>
                </div>

              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary">Register</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
