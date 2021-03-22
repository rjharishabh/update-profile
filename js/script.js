function change(){
  var p=document.getElementById('password');
  if(p.type=="password"){
      p.type="text";
      document.getElementById('pass').src="imgs/eye.svg";
  }
  else {
    p.type="password";
    document.getElementById('pass').src="imgs/eye-slash.svg";
  }
}
function cchange(){
  var p=document.getElementById('cpassword');
  if(p.type=="password"){
      p.type="text";
      document.getElementById('cpass').src="imgs/eye.svg";
  }
  else {
    p.type="password";
    document.getElementById('cpass').src="imgs/eye-slash.svg";
  }
}
