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
function upper() {
var p=document.getElementById('fname');
p.value=(p.value).toUpperCase();
}
function replace_file_name(){
  var d=document.getElementById('pic');
  var val=d.value.replace(/^.*\\/, "");
document.getElementById('file_name').innerHTML=val;
}
