


$(document).ready(function(){
$(".fade").hover(
function() {
$(this).stop().animate({"opacity": "0.4"}, "fast");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");

});
//get counts
var catid =1;
 $.post('ajax/counts_swap.php',{catid:catid},function (data) {
 $("#counta").html(data);
});
});


var lnk_id = $("#cats").val();
$(".hidden").each(function(i,j){
img_id =  (j.id);
if (img_id != lnk_id) {
$(this).removeClass("visible");
$(this).addClass("hidden");

}
  else if  (img_id == lnk_id)
     {
$(this).removeClass("hidden");
$(this).addClass("visible");
     }
});



//list of categories
var catid = $("#cats").val();
if ( catid ) {
 $.post('ajax/process.php',{catid:catid},function (data) {
 $("#catdata").html(data);
});
}
// city and location filter
$('#filter').change(function () {
$('#localityf').empty();
$('#filter').attr('value',($(this).val()));
var cty = ($(this).val());
//alert(cty);
var catid = $("#cats").val();
//alert(catid);
if ( catid ) {
 $.post('ajax/process.php',{catid:catid,cty:cty},function (data) {
 $("#catdata").html(data);
});
}

if (cty) {
 $.post('ajax/getloaclity.php',{cty:cty,catid:catid},function (data) {
 $("#localityf").append("<option value='1'>Select all</option><br>");
 $("#localityf").append(data);
});
}
//locality

});
$('#localityf').change(function () {
$("#sectiondta").empty();
var llt = ($(this).val());
var catid = $("#cats").val();
var cty = $('#filter').val();

if ( catid ) {
 $.post('ajax/process_llty.php',{catid:catid,llt:llt,cty:cty},function (data) {
 $("#catdata").html(data);
});
}});






$('div.dashbrd1,div.dashbrd2,div.dashbrd3').hover(
function () {
$(this).css('cursor','pointer');
$(this).animate({
//opacity: 0.7,
//left: "+=50"
});
});

//my dashboard buttons
$(document).ready(function(){
$('div.dashbrd1,div.dashbrd2,div.dashbrd3').click(function () {
$('div.dashbrd1').addClass('zoom');
$('div.dashbrd2').removeClass('zoom');
$('div.dashbrd3').removeClass('zoom');
var tmp = ($(this).attr('id'));
$('#data_area').empty();
//alert(tmp);
if (tmp == 'myl') {
$('#data_area').append('<a href="itemupload.php" style="color:blue ;font-weight: bold">Upload a new item</a>');
$.ajax({
dataType :"json",
type :"POST",
data :{tmp :tmp,},
url :'ajax/mylist.php',
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
result+='<p class ="clrbrk1"> &nbsp<a id= "editclk" href="edit.php?lid='+lid+'" style="color:white ;font-weight: bold">Edit</a>  &nbsp<a class = "dlt1"  id ="'+lid+'" href="dashboard.php" style="color:white ;font-weight: bold">Delete</a> </p>';
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
//activate scan msg
var interval = 3000;
setInterval(ajax_call,interval);
};
//get edit page
//$('#editclk').click(function () {
//var addval = $(this).attr('href');
//alert(addval);
//});



if (tmp == 'msg') {
	//alert("yes");
	$('div.dashbrd2').addClass('zoom');
	$('div.dashbrd1').removeClass('zoom');
	$('div.dashbrd3').removeClass('zoom');
	//alert($(this).attr('id'));
	$.post('ajax/inbox.php',{catid:catid},function (data) {
   $("#data_area").html(data);
});
}

if (tmp == 'mp') {
	$('div.dashbrd3').addClass('zoom');
	$('div.dashbrd1').removeClass('zoom');
	$('div.dashbrd2').removeClass('zoom');
	//alert($(this).attr('id'));
	$.post('ajax/myprofile.php',{tmp:tmp},function (data) {
   $("#data_area").html(data);
});
}
});
});

//select category
$('.category1').change(function () {
$('#category2').empty();

$('#selcat').attr('value',($(this).val()));
var cat = ($(this).val())
//alert(cat);
var books = ["Select","Action","Biographies","Comics","Cooking","Engineering","Entrance Exams","Health & Fitness","History & Politics","Humor","Indian Writing","Knowledge & Learning","Medicine","Kids Books","Other books"];
var dvds = ['Select','New Releases','Hollywood Movies','Bollywood Movies','Regional Movies','Tv Show & Documentaries','Kids & Educational','Health & Fitness','Music','International Music','Bollywood Music','Classical & Devotional','Gaming','Pc Games','Other dvd & films'];
var sports = ['Select','Climbing','Cycling','Fitness','Golf','Nature Sports','Racquet Sports','Running','Roller Sports','Team Sports','Watersports','Other sports gear'];
var furnitures = ['Select','Living Room Furniture','Bedroom Furniture','Dining Room Furniture','Bar Furniture','Study Room Furniture','Outdoor Furniture','Lightings','Wall Decor','Bean Bags','Housekeeping','Other furnitures'];
var electronics = ['Select','Mobiles','Tablets','Mobile Accessories','Laptops','Computer Accessories','Televisions','Speakers','Mp3 Players','Gaming & Accessories','Washing Machines','Kitchen Appliances','Cameras','Health Care Devices','Other electronics'];
var toys = ['Select','School Supplies','Toys For Boys','Toys For Girls','Infant Toys','Remote Controlled Toys','Soft Toys','Educational Toys','Infant Clothing','Cradels','Others'];
var twos = ['Select','Mopeds','Scooter','Cruiser','Standard','Other two wheelers'];
var cars = ['Select','Other cars'];
var tmpary = [];

if (cat == 'books') {
tmpary.length = 0;
tmpary = books;
$('#cat').val(1);
}
if (cat == 'dvds') {
tmpary = dvds;
$('#cat').val(2);
}
if (cat == 'sports') {
tmpary = sports;
$('#cat').val(3);
}
if (cat == 'furnitures') {
var tmpary = furnitures;
$('#cat').val(4);
}
if (cat == 'electronics') {
var tmpary = electronics;
$('#cat').val(5);
}
if (cat == 'toys') {
var tmpary = toys;
$('#cat').val(6);
}
if (cat == 'twos') {
var tmpary = twos;
$('#cat').val(7);
}
if (cat == 'cars') {
var tmpary = cars;
$('#cat').val(8);
}

var sel = document.getElementById('category2');

for (var i = 0;i < tmpary.length; i++ ) {
	var opt = document.createElement('option');
    opt.innerHTML = tmpary[i];
    opt.value = tmpary[i];
    sel.appendChild(opt);
}
});

//get sub category number in item upload
$('#category2').change(function () {
var category = ["Action","Biographies","Comics","Cooking","Engineering","Entrance Exams","Health & Fitness","History & Politics","Humor","Indian Writing","Knowledge & Learning","Medicine","Kids Books","Other books","New Releases","Hollywood Movies","Bollywood Movies","Regional Movies","Tv Show & Documentaries","Kids & Educational",
"Health & Fitness","Music","International Music","Bollywood Music","Classical & Devotional","Gaming","Pc Games","Other dvd & films","Climbing","Cycling","Fitness","Golf","Nature Sports","Racquet Sports","Running","Roller Sports","Team Sports","Watersports","Other sports gear","Living Room Furniture",
"Bedroom Furniture","Dining Room Furniture","Bar Furniture","Study Room Furniture","Outdoor Furniture","Lightings","Wall Decor","Bean Bags","Housekeeping","Other furnitures","Mobiles","Tablets","Mobile Accessories","Laptops","Computer Accessories","Televisions","Speakers","Mp3 Players","Gaming & Accessories","Washing Machines",
"Kitchen Appliances","Cameras","Health Care Devices","Other electronics","School Supplies","Toys For Boys","Toys For Girls","Infant Toys","Remote Controlled Toys","Soft Toys","Educational Toys","Infant Clothing","Cradels","Others","Mopeds","Scooter","Cruiser","Standard","Other two wheelers"
,"Other cars"];
$('#category2').attr('value',($(this).val()));
var cat = ($(this).val());
//alert(cat);

for (var i = 0;i < category.length; i++ ) {
catary = category[i]
if (catary == cat) {
//alert(catary);
//test = $('#subcat').val(i+1);
$('#subcat').val(i+1)
}
}
});

//get swap loction
$('#city').change(function () {
cty =  $('#city').find(":selected").text();
if (cty == 'other'){
$('#othercity').removeClass("Hidden");
$('#othercity').addClass("visible");
}else {
$('#othercity').removeClass("visible");
$('#othercity').addClass("Hidden");
}
//alert(cat);
});



//show default my listings
$(document).ready(function(){
$('div.dashbrd1').trigger('click');
});






//catch edit click
$(document).ready(function(){
var editid = $("#editclk").val();
//alert(editid);
if (editid) {
$.ajax({
dataType :"json",
type :"POST",
data :{editid :editid,},
url :'ajax/editpage.php',
success : function(response) {
var total_count = response.total_count;
//alert(total_count);
if (response.status_value == 1) {
//alert(total_count);
var results = "";
var cnts=0;
var lids=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lids = 0;
lids+= response.data[i].line_ids;
results+='<table id="itemupdate">';
results+='<tr><td>Title : &nbsp</td>';
results+='<td><INPUT type="text" name="title" title ="Name of the item" value ="'+response.data[i].titles+'" id ="title" required></td></tr>';

results+='<tr><td>I have : &nbsp</td>';
results+='<td><textarea name="ihave" id="ihave" rows="5" cols="40" maxlength="200" title="short description of what you have to offer (max 200 characters)" required>'+response.data[i].haves+'</textarea></td>';

results+='<tr><td>I want : &nbsp</td>';
results+='<td><textarea name="ihave" id="iwant" rows="5" cols="40" maxlength="200" title="short description of what you want  (max 200 characters)" required>'+response.data[i].wants+'</textarea></td>';

results+='<tr><td>Open to others?  &nbsp</td>';
results+='<td><select name="other" id="open" title="open to other swap offers besides what you want?"><option value="yes">Yes</option><option value="no">No</option></select></td></tr>';

results+='<tr><td>Swap location :  &nbsp</td>';

results+='<td><select name="city" id="city" title="place where you want to connect?"><option value="bengaluru">Bengaluru</option><option value="ahmedabad">Ahmedabad</option>'
results+='<option value="chennai">Chennai</option><option value="delhi">Delhi</option><option value="hyderabad">Hyderabad</option><option value="jaipur">Jaipur</option>'
results+='<option value="kolkata">Kolkata</option><option value="mumbai">Mumbai</option><option value="pune">Pune</option></select></td></tr>'

results+='<tr></tr>';
results+='<tr></tr>';
results+='<tr><td><input type="submit" value="Save Changes" name="save" id ="saves" ></td></tr>';
results+='<tr><td><a id= "back" href="dashboard.php" style="color:Black ;font-weight: ">Back</a></td></tr>';
results+='</table>';
//results+='<input type="submit" value="Save Changes" name="save" id ="saves" >';
//dynamically set image path on edit page
loc =response.data[i].file_paths;
$('#idp').attr("src",loc);

}

}
$('#editdata').append(results);
}
});
//window.location.reload(true);
//location.reload(true);
}
//
});

//update line item
$(document).on('click','#saves',function() {
var ttl = $('#title').val();
ttl = $.trim(ttl);
var ihv = $('#ihave').val();
ihv = $.trim(ihv);
var iwt = $('#iwant').val();
iwt = $.trim(iwt);
var opn = $('#open').val();
opn = $.trim(opn);
var cty = $('#city').val();
cty = $.trim(cty);
//data validation
if (ttl == ''||ihv == ''||iwt == ''||opn == ''||cty == '') {
alert("Fields can not be empty");
return false;
};
//data validation
$.ajax({
dataType :"json",
type :"POST",
data :{ttl :ttl,ihv :ihv,iwt :iwt,opn :opn,cty :cty,},
url :'ajax/update.php',
success : function(response){
alert(response.status_value);
}});

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
url :'ajax/delete.php',
success : function(response){
alert(response.status_value);
}});
}else{
x = "You pressed Cancel!";
return false;
}
});

// visitor view realted things
//$(document).ready(function(){
//get list of subcategories
$(document).on('click','.catlist',function() {
var llty2 = $('#localityf').val();
var cty2 = $('#filter').val();
//alert(llty2);
//alert(cty2);
var catname = $(this).text();
//alert(catname);
$('#sectiondta').empty();
$('#sectiondta').html('<p> Available swap range in - '+catname+' </p> ');
//scat=0;
var tmps = $(this).attr('id');
//alert(tmps);
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,llty2 :llty2,cty2 :cty2,},
url :'ajax/itemlist.php',
success : function(response) {
var total_count = response.total_count;
//alert(total_count);
//alert(total_count);
if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ='+lid+' class = "clickview">';
result+='<p class ="clrbrk11"> &nbsp<a id= "view" href="viewitem.php?lid='+lid+'" style="color:white ;font-weight: bold"></a>	</p>';
result+='<div style="float: right;"> <img hspace="5" id="itmimg" src="' +response.data[i].file_path + '" alt="Smiley face" height="42" width="42"></div>';
result+='<li id ="clr"><span> Title : </span>' + response.data[i].title + '</li>';
result+='<li id ="clr"><span> I have : </span>' + response.data[i].have + '</li>';
result+='<li id ="clr"><span> I want : </span>' + response.data[i].want + '</li>';
result+='<li id ="clr"><span> Open to other swaps? </span>' + response.data[i].other + '</li>';
result+='<li id ="clr"><span> Place : </span>' + response.data[i].city + '</li>';
result+='</div>';
}
}
$('#sectiondta').append(result);

if(total_count == 0){
$('#sectiondta').append('No items found');
};
}

});
return false;
});
//});

//item
$(document).on('mouseenter','.clickview',function() {
$(this).css('cursor','pointer');
});

$(document).on('click','.clickview',function() {
var subcat = ($(this).attr('id'));
//alert(subcat);
window.location.href = "itemview.php?subcat="+subcat;
});

//return false;
/*
$.ajax({
dataType :"json",
type :"POST",
data :{tmp2 :tmp2,},
url :'ajax/viewitem.php',
success : function(response) {
var total_count = response.total_count;
alert(total_count);
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
//result+='<p class ="clrbrk1"> &nbsp<a id= "editclk" href="edit.php?lid='+lid+'" style="color:white ;font-weight: bold">Edit</a>  &nbsp<a class = "dlt1"  id ="'+lid+'" href="dashboard.php" style="color:white ;font-weight: bold">Delete</a> </p>';
//result+='<div style="float: right;"> <img hspace="5" id="itmimg" src="' +response.data[i].file_path + '" alt="Smiley face" height="42" width="42"></div>';
//result+='<li id ="clr"> Title : ' + response.data[i].title + '</li>';
//result+='<li id ="clr"> I have : ' + response.data[i].have + '</li>';
//result+='<li id ="clr"> I want : ' + response.data[i].want + '</li>';
//result+='<li id ="clr"> Open to other swaps? ' + response.data[i].other + '</li>';
//result+='<li id ="clr"> Place : ' + response.data[i].city + '</li>';
}
}
$('#editdata2').append("test");
}
	});
//-------------
*/


//--------------

//profile pic
$( "#dp" ).click(function() {
$(this).stop().animate({"opacity": "0.2"}, "fast");
 $("#move").removeClass("move_back");
$('#move').addClass("move_form");
});
$( "#dp" ).mousedown(function() {
$(this).stop().animate({"opacity": "1"}, "fast");
 $("#move").removeClass("move_form");
$('#move').addClass("move_back");
});

//item pic
$( "#idp" ).click(function() {
$(this).stop().animate({"opacity": "0.3"}, "fast");
 $("#move").removeClass("move_back");
$('#move').addClass("move_form");
});
$( "#idp" ).mousedown(function() {
$(this).stop().animate({"opacity": "1"}, "fast");
 $("#move").removeClass("move_form");
$('#move').addClass("move_back");
});

//new image rotate
function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    
 var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}



$(function() {
   var img_interval =  setInterval( "slideSwitch()", 7000 );

$('#slideshow').hover(function() {
	$(this).css('cursor','crosshair');
        clearInterval(img_interval);
    }, function() {
        img_interval = setInterval( slideSwitch, 7000 );
    });

});


//check email registered are same
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
$(document).on('click','#state',function () {
//alert()
var eid = ($('#eid').val());
if(!isValidEmailAddress(eid)) {
alert("not a correct email id"); } else {
if (eid) {
$.post('ajax/checkemail.php',{eid:eid},function (data) {
if (data ==1) {
alert("Email already exit");
$('#eid').val('');
$('#state').val('');
return false;
};
});
}
}
});

//send message 
$('#lftcnt').html(300);
$('#lftcnt2').html(200);
$('#lftcnt3').html(200);
$('#msgarea,#msgarea2,#msgarea3').keyup(function () {
var nme = ($(this).attr('id'));
if (nme == 'msgarea') {
$('#msgstatus').html('');
var cnt = 300;
getcount(cnt,nme);
}else {
var cnt = 200;
getcount(cnt,nme);
}
});
function getcount(cnt,nme){
var count = $('#'+nme+'').val().length;
var rmcnt = cnt-count;
$('#lftcnt').html(rmcnt);
if (nme == 'msgarea2'){
$('#lftcnt2').html(rmcnt);
}
if (nme == 'msgarea3'){
$('#lftcnt3').html(rmcnt);
}
};


$(document).on('click','.msglink',function () {
var msgd = ($(this).attr('id'));
//alert(msgd);
$('#tomsg').text(msgd);
});

//send message from out and my dash
$(document).on('click','#sendmsg2',function() {
var var1 = $('#sendmsg3').val();
//alert(var1);
var msg1 = $('#msgarea').val();
//alert(msg1);

if (msg1=='') {
alert("No message typed")
return false;
}
//alert(var1);
//alert(msg1);

if (var1) {
$.ajax({
dataType :"json",
type :"POST",
data :{var1 :var1,msg1 :msg1,},
url :'ajax/sendmessage.php',
success : function(response){
//alert(response.status_value);
$('#msgarea').val('');
$('#msgstatus').html('<p>&#10004sent</p>')
}});
}
});




$(document).on('click','#sendmsg',function() {
var var1 = $('#sendmsg').val();
//alert(var1);
var msg1 = $('#msgarea').val();
//alert(msg1);

if (msg1=='') {
alert("No message typed")
return false;
}
//alert(var1);
//alert(msg1);

if (var1) {
$.ajax({
dataType :"json",
type :"POST",
data :{var1 :var1,msg1 :msg1,},
url :'ajax/sendmessage.php',
success : function(response){
//alert(response.status_value);
$('#msgarea').val('');
$('#msgstatus').html('<p>&#10004sent</p>')
}});
}
});

//scan for msg
var ajax_call = function(){
var1=0;
$.ajax({
dataType :"json",
type :"POST",
data :{var1 :var1,},
url :'ajax/scanmsg.php',
success : function(response){
	var total_count = response.total_count;
//alert(response.status_value);
$('#msgcnt').html('');
if (total_count >0) {
$('#msgcnt').html('<a id= "back" href="dashboard.php" style="color:red ;font-weight: ">'+total_count+'</a>');
}
}});

};


$(document).on('mouseover','.msglst',function () {
$(this).css('cursor','pointer');
});
//send message



//email verification & reset password
$(document).on('click','#vmail',function () {
var emailv = ($('#emailv').val());
if (emailv) {
 $.post('ajax/sendmail.php',{emailv:emailv},function (data) {
alert(data);
});
}});

$(document).on('click','#resetclick',function () {
var pswd1 = ($('#pass1').val());
var pswd2 = ($('#pass2').val());
if (pswd1!=pswd2) {
alert("passwords do not match!!")
$('#pass1').val('');
$('#pass2').val('');
return false;
}

});

//email verification & reset password




//top 6 new items
$(document).ready(function(){
var tmps = 1;
$('#window1').empty();
$('#window2').empty();
$('#window3').empty();
$('#window4').empty();
$('#window5').empty();
$('#window6').empty();
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,},
url :'ajax/toplist.php',
success : function(response) {
var total_count = response.total_count;
//alert(total_count);
//alert(total_count);
if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
var result = "";
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ='+lid+' class = "clickview" >';
result+='<a  id="title1" href="itemview.php?subcat='+lid+'" style="color:darkblue ;font-weight: bold">'+ response.data[i].title +'</a>';
result+='<img hspace="" id="itmimg2" src="' +response.data[i].file_path + '" alt="Smiley face" height="100" width="100">';
result+='</div>';
if (i==0) {
result+='<div id ="ttl">';
result+='</div>';
$('#window1').html(result);
}
if (i==1) {
$('#window2').append(result);
}
if (i==2) {
$('#window3').append(result);
}
if (i==3) {
$('#window4').append(result);
}
if (i==4) {
$('#window5').append(result);
}
if (i==5) {
$('#window6').append(result);
}
}}
}
});
});



// all items views and filters
$(document).on('mouseenter','.catlist2',function() {
$(this).css('cursor','pointer');
$(this).css('background-color','black' );
});

$(document).on('mouseleave','.catlist2',function() {
$(this).css('background-color','#8B1300' );
});




$('#localityf2').change(function () {
$('#allv').trigger('click');
});
// default pointer on filter change to all
$('#filter2').change(function () {
$('#filter2').attr('value',($(this).val()));
var cty = ($(this).val());
//alert(cty);
var llt ="1";
if (cty==1) {
$('#allv').trigger('click');
}

var aid = 'allv';
var cty = ($('#filter2').val());
if (aid == 'allv'){
$(".head h2").html("Listing uploaded swap / barter offers - All categories");
$('#catsall').val(0);
}
//********************
var selcat = $('#catsall').val();


//alert("category "+ selcat+ "");
if (typeof selcat!== 'undefined') {
tmps = selcat;
$('#vall2').empty();
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,cty :cty,llt :llt,},
url :'ajax/viewall1.2.php',
success : function(response) {
var total_count = response.total_count;

if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ='+lid+' class = "clickview clickviewall" >';
result+='<a  id="title1" href="itemview.php?subcat='+lid+'" style="color:darkblue ;font-weight: bold">'+ response.data[i].title +'</a><br>';
result+='<img hspace="" id="itmimg2" src="' +response.data[i].file_path + '" alt="Smiley face" height="100" width="100">';
result+='</div>';
}
}
$('#vall2').append(result);
}

});
}
//*******************
/*location filter list populate*/
$("#localityf2").empty();
if (cty) {
 $.post('ajax/getloaclity.php',{cty:cty},function (data) {
 $("#localityf2").append("<option value='1'>Select all</option><br>");
 $("#localityf2").append(data);
});
}
});


// on cat click
$(document).on('click','.catlist2',function() {
var aid = ($(this).attr('id'));
var cty = ($('#filter2').val());

if (aid == 'allv'){
$(".head h2").html("Listing uploaded swap / barter offers - All categories");
$('#catsall').val(0);
}
if (aid == 'sbooks'){
$(".head h2").html("Listing uploaded swap / barter offers - in books");
$('#catsall').val(1);
}
if (aid == 'sdvd'){
$(".head h2").html("Listing uploaded swap / barter offers - in DVD & films");
$('#catsall').val(2);
}
if (aid == 'ssports'){
$(".head h2").html("Listing uploaded swap / barter offers - in sports gear");
$('#catsall').val(3);
}
if (aid == 'sfurni'){
$(".head h2").html("Listing uploaded swap / barter offers - in furniture");
$('#catsall').val(4);
}

if (aid == 'selec'){
$(".head h2").html("Listing uploaded swap / barter offers - in electronics");
$('#catsall').val(5);
}

if (aid == 'stoys'){
$(".head h2").html("Listing uploaded swap / barter offers - in toys & kids gear");
$('#catsall').val(6);
}

if (aid == 'stwow'){
$(".head h2").html("Listing uploaded swap / barter offers - in two wheelers ");
$('#catsall').val(7);
}

//********************
var selcat = $('#catsall').val();
var llt = $('#localityf2').val();
//alert(llt);
//alert("category "+ selcat+ "");
if (typeof selcat!== 'undefined') {
tmps = selcat;
$('#vall2').empty();
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,cty :cty,llt :llt,},
url :'ajax/viewall1.2.php',
success : function(response) {
var total_count = response.total_count;

if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ='+lid+' class = "clickview clickviewall" >';
result+='<a  id="title1" href="itemview.php?subcat='+lid+'" style="color:darkblue ;font-weight: bold">'+ response.data[i].title +'</a><br>';
result+='<img hspace="" id="itmimg2" src="' +response.data[i].file_path + '" alt="Smiley face" height="100" width="100">';
result+='</div>';
}
}
$('#vall2').append(result);
}

});
}
//*******************

//alert(aid);
});





//view all clicked  from index page

var selcat = $('#catsall').val();
var cty =1;

if (typeof selcat!== 'undefined') {
tmps = selcat;
$('#vall2').empty();
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,cty :cty},
url :'ajax/viewall1.3.php',
success : function(response) {
var total_count = response.total_count;

if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ='+lid+' class = "clickview clickviewall" >';
result+='<a  id="title1" href="itemview.php?subcat='+lid+'" style="color:darkblue ;font-weight: bold">'+ response.data[i].title +'</a><br>';
result+='<img hspace="" id="itmimg2" src="' +response.data[i].file_path + '" alt="Smiley face" height="100" width="100">';
result+='</div>';
}
}
$('#vall2').append(result);
}

});
}

$(document).ready(function(){
	$('#back2').click(function(){
		window.history.back();
		return false;
	});
});


//group pop up

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
alert('dd');

}

$('#slideshow').addClass("hidden");


//post review
$(document).on('click','#sendmsgr',function() {
var var1 = $('#sendmsgr').val();
//alert(var1);
var msg1 = $('#msgarearr').val();
//alert(msg1);
$('#msgarearr').val('');
if (msg1=='') {
alert("No message typed")
return false;
}
//alert(var1);
//alert(msg1);

if (var1) {
$.ajax({
dataType :"json",
type :"POST",
data :{var1 :var1,msg1 :msg1,},
url :'ajax/reviewsave.php',
success : function(response){
//alert(response.status_value);
$('#msgarea').val('');
$('#msgstatus').html('<p>&#10004sent</p>')
}});
}
});


//shoe review
$(document).ready(function(){
//var llty2 = $('#localityf').val();
//var cty2 = $('#filter').val();
//alert(llty2);
//alert(cty2);
//var catname = $(this).text();
//alert(catname);
//$('#sectiondta').empty();
//$('#sectiondta').html('<p> Available swap range in - '+catname+' </p> ');
//scat=0;
var tmps = 1;
//alert(tmps);
$.ajax({
dataType :"json",
type :"POST",
data :{tmps :tmps,},
url :'ajax/reviewlist.php',
success : function(response) {
var total_count = response.total_count;
//alert(total_count);
//alert(total_count);
if (response.status_value == 1) {
var result = "";
var cnt=0;
var lid=0;
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
lid = 0;
lid+= response.data[i].line_id;
result+='<div  id ="review" class = "review">';
//result+='<p class ="clrbrk11"> &nbsp<a id= "view" href="viewitem.php?lid='+lid+'" style="color:white ;font-weight: bold"></a>	</p>';
result+='<div style="float: right;"> <img hspace="5" id="itmimg" src="' +response.data[i].have + '" alt="Smiley face" height="30" width="30"></div>';
result+='<li id ="clr"><span> '+response.data[i].name+ ' : </span>' + response.data[i].title + '</li>';
//result+='<li id ="clr"><span> I have : </span>' + response.data[i].have + '</li>';
result+='</div>';
}
$('#vall3').append(result);
}


if(total_count == 0){
$('#vall3').append('No items found');
};
}

});
return false;
});

