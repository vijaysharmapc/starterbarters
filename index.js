
/*
index.js
use strict includes many rules one of them is dont allow undefined varibales
*/
//"use strict";
//this is jquery

$(document).ready(function () {


// use $ instead of jQuery below #is use of selector
var resultlist = jQuery("#resultlist");
resultlist.text("this is from jquery");

var toggleButton = $("#toggleButton");
toggleButton.on("click",function () {
resultlist.toggle(600);
if (toggleButton.text() == "Hide") {
toggleButton.text("Show");
} else {
	toggleButton.text("Hide");
}

});


var results = [{
name:"jQuery",
language:"JavaScript",
score:4.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234
}
},
{
name:"jQuery UI",
language:"JavaScript",
score:3.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234
}
},
{
name:"jQuery UI2.1",
language:"JavaScript",
score:5.5,
showLog:function () {
},
owner: {
login:"vj",
id:1234
}
}];
// $() every thing inside becomes jquery object 
resultlist.empty();
$.each(results, function (i,item) {
	var newresults = $("<div class = 'result'> " + 
"<div class = 'title'> " + item.name + "</div>" +
"<div>Language " + item.language + "</div>" +
"<div>Owner " + item.owner.login + "</div>" +
	"</div>");
newresults.hover(function () {
//make dom/doc element  darker
$(this).css("background-color","lightgray");
},function () {
//make this light
$(this).css("background-color","transparent");
});
	
	
	resultlist.append(newresults);
})







/*//un comment to see js in action

// below is javascript


var msg = "hello javascript";
//alert(msg);
console.log(msg);
var resultsDiv = document.getElementById("results");
resultsDiv.innerHTML = "<p> This is from Javascript </p>";
// find type of  varibales
console.log("msg is " + typeof(msg));
console.log("resultdiv is " + typeof(resultsDiv));
// java script == is comparision, it will convert char by itself and compare
// === checks if its equal
var none;
if (none == undefined){
console.log("none is undefined")
}

function showMsg(msg, more) {
	if (more) {
console.log("this is from function more and msg " + msg + more);
} else {
	console.log("this is from function only msgs " + msg);
}
}

showMsg("hello there asl");
showMsg("hello there asl"," look more asl");

//creating a function using variable

var showIt = function (msg) {
console.log("kkkkkk" + msg);
}
showIt("my variable function");

// callback is usefull when we wait for user input or some cycle to complete
function showitThen(msg,callback) {
	showIt(msg);
	callback();
}
//here we call show it then, then call it back
showitThen("showitThen called",function () {
	console.log("callback called");
});

//scope can be created only in fuction
var inGlobal = true;
function testMe() {
console.log("testMe(): " + inGlobal);
var someMsg = "some message";
console.log("testMe(): " +  someMsg);
}
// someMsg cannot be used here console.log("testMe(): " +  someMsg);
// but with a closure i can use variable out side a function too, 

testMe();

//arrays and objects
//curly braces mean what i create is a new object\//object is juts set of name value pairs
//stuff object contains are its properties
var result= {
name:"jQuery",
language:"JavaScript",
score:4.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234

}
};

console.log(result.name);

//we can add properties on flow too
result.phonenumber = "112-00987";
console.log(result.phonenumber);
//arrays

//var results = [];
//results.push(result);
//result.push({
//name: "dummy project"
//});

//results.push(result);
//result.push({
//name: "dummy project"
//});



var results = [{
name:"jQuery",
language:"JavaScript",
score:4.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234
}
},
{
name:"jQuery UI",
language:"JavaScript",
score:3.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234
}
},
{
name:"jQuery UI2.1",
language:"JavaScript",
score:5.5,
showLog:function () {
},
owner: {
login:"youou",
id:1234
}
}
];

console.log(results.length);
console.log(results[0].name);

for (var x = 0;x < results.length;x++)
{
	var result =results[x];
	//if (result.score < 4)break;
	if (result.score < 4)continue;
	console.log(result.name);

}



var dynamic = document.getElementById("results");
for (i = 0; i < 1000; i++) {

  // create a closure to preserve the value of "i"
  (function(i){

    window.setTimeout(function(){
      dynamic.innerHTML = x + i;
       },i *1000);

  }(i));
}


*/ //un comment to see js in action


}); //wait untill document is ready and execute function
