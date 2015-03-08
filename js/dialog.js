$(document).ready(function() {
$('a.login-window').click(function() {
    
            //Getting the variable's value from a link 
    var loginBox = $(this).attr('href');

    //Fade in the Popup
    $(loginBox).fadeIn(300);
    
    //Set the center alignment padding + border see css style
    var popMargTop = ($(loginBox).height() + 24) / 2; 
    var popMargLeft = ($(loginBox).width() + 24) / 2; 
    
    $(loginBox).css({ 
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });
    
    // Add the mask to body
    $('body').append('<div id="mask"></div>');
    $('#mask').fadeIn(300);
    
    return false;
});

// When clicking on the button close or the mask layer the popup closed
$('.btn_close').on('click', function() { 
  $('#mask , .login-popup').fadeOut(300 , function() {
    $('#mask').remove();  
}); 
return false;
});
});

$(document).on('click','#creategrp',function() {
var catid = $('#username').val();
//alert(catid);
//check if group name exist
 $.post('ajax/check_group.php',{catid:catid},function (data) {
//var tmp5 = data;
if (data == 22) {
alert("sorry group name already exits");
return false;
}
});
var var2 = $('#username').val();
alert(var2);
//check if group name exist

//alert(var2);
var cnt = var2.length;
if (cnt>15) {
alert("group name cannot be more than 15 characters");
return false;
} 

if (var2) {
$.ajax({
dataType :"json",
type :"POST",
data :{var2 :var2,},
url :'ajax/svegrp.php',
success : function(response){

if(response.status_value ==1){

$('#mask , .login-popup').fadeOut(300 , function() {
    $('#mask').remove();  
});};

}});
};
window.location.reload(true)
});

$(document).ready(function(){
$('#getgrp1').empty();
var3 =1;
//alert("ss");
$.ajax({
dataType :"json",
type :"POST",
data :{var3 :var3,},
url :'ajax/getgrp.php',
success : function(response){
var total_count = response.total_count;
if(response.status_value ==1){
lids ='';
result ='';
$("#getgrp1").append("<option value='1'> My dashboard</option><br>");
for(var i=0; i<total_count; i++)
{
lids+= response.data[i].group_name;
var str="<option id=''>"+lids+"</option><br>";
$("#getgrp1").append(str);
lids='';
};
};

}});
});


$(document).on('click','#creategrp',function() {
$('#getgrp1').empty();
var3 =1;
//alert("ss");
$.ajax({
dataType :"json",
type :"POST",
data :{var3 :var3,},
url :'ajax/getgrp.php',
success : function(response){
var total_count = response.total_count;
if(response.status_value ==1){
lids ='';
result ='';
$("#getgrp1").append("<option value='1'> My dashboard</option><br>");
for(var i=0; i<total_count; i++)
{
lids+= response.data[i].group_name;
var str="<option id=''>"+lids+"</option><br>";
$("#getgrp1").append(str);
lids='';
};
};

}});
});


$('.filter2').change(function () {	
$('#data_area').empty();
var tmp = ($(this).val());

//check for my dashboard
if (tmp==1){
$('div.dashbrd1').trigger('click');
return false;
}
$('#data_area').append('<a href="itemupload_grp.php" style="color:blue ;font-weight: bold">Upload a new item..</a>');
$.ajax({
dataType :"json",
type :"POST",
data :{tmp :tmp,},
url :'ajax/mylist_grp.php',
success : function(response) {
var total_count = response.total_count;
//alert(total_count);
if (response.status_value == 1) {

//alert(total_count);
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<p class ="clrbrk1"> &nbsp<a id= "editclk" href="edit _grp.php?lid='+lid+'" style="color:white ;font-weight: bold">Edit</a>  &nbsp<a class = "dlt1"  id ="'+lid+'" href="dashboard.php" style="color:white ;font-weight: bold">Delete</a> </p>';
result+='<div style="float: right;"> <img hspace="5" id="itmimg" src="' +response.data[i].file_path + '" alt="Smiley face" height="42" width="42"></div>';
result+='<li id ="clr"><span> Title : </span>' + response.data[i].title + '</li>';
result+='<li id ="clr"><span> I have : </span>' + response.data[i].have + '</li>';
result+='<li id ="clr"><span> I want : </span>' + response.data[i].want + '</li>';
result+='<li id ="clr"><span> Open to other swaps? </span>' + response.data[i].other + '</li>';
result+='<li id ="clr"><span> Place : </span>' + response.data[i].city + '</li>';
}
}
$('#data_area').append(result);
}
});
});


//delete line item
$(document).on('click','.dlt1',function() {
//alert("delete");
dlts=0;
if (confirm("Do you want to delete this item?") == true) {
var dlts = $(this).attr('id');
//alert(dlts);
$.ajax({
dataType :"json",
type :"POST",
data :{dlts :dlts,},
url :'ajax/delete_grp.php',
success : function(response){
alert(response.status_value);
}});
}else{
x = "You pressed Cancel!";
return false;
}
});


//check messages
$(document).ready(function(){
$('div.dashbrd2').click(function () {
var tmp = ($(this).attr('id'));
$('#data_area').empty();
//get group name
var tmp3 = ($('.filter2').val());
if (tmp3!=1) {
	alert(tmp3);
	$('div.dashbrd2').addClass('zoom');
	$('div.dashbrd1').removeClass('zoom');
	$('div.dashbrd3').removeClass('zoom');
	//alert($(this).attr('id'));
	$.post('ajax/inbox_grp.php',{catid:catid},function (data) {
   $("#data_area").html(data);
});
}})});


//activate scan msg
$(window).load(function() {
//alert('clicked');
var interval = 5000;
setInterval(ajaxcall2,interval);
});


var ajaxcall2 = function(){
grpcht = $('#grpcht').val();
//alert(grpcht);
$.post('ajax/showgrpmsg.php',{grpcht:grpcht},function (data) {
$("#chatarea3").html(data);
});
//}
};

$(document).on('click','#sendgrpm',function () {
var msg = $('#sendgrp').val();
alert(msg);	
$.post('ajax/sendmessage_grp.php',{msg:msg},function (data) {
});

$('#sendgrp').val('');
});

