
function myTime(){
  var c = 0;
d = new Date();
var date = d.getTime(); d = new Number(d);
//console.log(d.toFixed());//worked produced 1521951749432ms
d = new Date();
var date = d.getTime(); d = d/1000; d = new Number(d);
//console.log(d.toFixed());//worked produced 1521951749s
var expiry_date = d.toFixed() + 300;

var date = d.getTime(); d = d/1000; d = new Number(d);
var rem = expiry_date - d.toFixed();

console.log(rem);
}


setInterval(myTime,1000);
