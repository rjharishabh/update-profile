(function(){
angular.module('signup',[])
.controller('signup_form', signup);
function signup() {
  var signup=this;
  signup.pass=null;
  signup.cpass=null;
  signup.check=function(){
    console.log("pass=",signup.pass);
    console.log("cpass=",!signup.cpass);
    if(signup.pass && signup.cpass){
      if(signup.pass===signup.cpass){
        document.getElementById('tick').innerHTML="<img class='eye' src='imgs/tick.svg' alt='tick'>";
        document.getElementById('ctick').innerHTML="<img class='eye' src='imgs/tick.svg' alt='tick'>";
      }
      else{
        document.getElementById('tick').innerHTML="<img class='eye' src='imgs/cross.svg' alt='cross'>";
       document.getElementById('ctick').innerHTML="<img class='eye' src='imgs/cross.svg' alt='cross'>";
      }
    }
    else {
      document.getElementById('tick').innerHTML="";
        document.getElementById('ctick').innerHTML="";
    }
  };
}
})();
