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
function pre(inp){
if(inp<10){
return "0"+inp;
}
else {
  return inp;
}
}
function time() {
var p=new Date();
var hr=pre(p.getHours());
var min=pre(p.getMinutes());
var sec=pre(p.getSeconds());
document.getElementById('hr').innerHTML=hr;
document.getElementById('min').innerHTML=min;
document.getElementById('sec').innerHTML=sec;
}
(function () {
setInterval(time,100);
})();
