


$(document).ready(function(){
$(".fade").hover(
function() {
$(this).stop().animate({"opacity": "0.5"}, "fast");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");
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


$( "#dp" ).click(function() {
$(this).stop().animate({"opacity": "0.3"}, "fast");
 $("#move").removeClass("move_back");
$('#move').addClass("move_form");
});
$( "#dp" ).mousedown(function() {
$(this).stop().animate({"opacity": "1"}, "fast");
 $("#move").removeClass("move_form");
$('#move').addClass("move_back");
});



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

//alert(tmp);
if (tmp == 'myl') {
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
//var rec_s= new Array();
for(var i=0; i<total_count; i++)
{
result+='<li id ="clr"> Title : ' + response.data[i].title + '</li>';
result+='<li id ="clr"> I have : ' + response.data[i].have + '</li>';
result+='<li id ="clr"> I want : ' + response.data[i].want + '</li>';
result+='<li id ="clr"> Open to other swaps? ' + response.data[i].other + '</li>';
result+='<li id ="clr"> Place : ' + response.data[i].city + '</li>';
result+='<li id ="clr"> ------------------------------------------------</li>';
//alert(response.data[i].title);
//var xx=response.data[i].have;
//$('#data_area').append(
  //                   $('<p></p>').html("The Title of book is: " + response.data[i].title + "")
//);
}
}
$('#data_area').append(result);
}
});
} 


if (tmp == 'msg') {
	$('div.dashbrd2').addClass('zoom');
	$('div.dashbrd1').removeClass('zoom');
	$('div.dashbrd3').removeClass('zoom');
	//alert($(this).attr('id'));
	$.post('ajax/process.php',{catid:catid},function (data) {
   $("#data").html(data);
});
}
if (tmp == 'mp') {
	$('div.dashbrd3').addClass('zoom');
	$('div.dashbrd1').removeClass('zoom');
	$('div.dashbrd2').removeClass('zoom');
	//alert($(this).attr('id'));
	$.post('ajax/myprofile.php',{tmp:tmp},function (data) {
   $("#data").html(data);
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
var books = ["Action","Biographies","Comics","Cooking","Engineering","Entrance Exams","Health & Fitness","History & Politics","Humor","Indian Writing","Knowledge & Learning","Medicine","Music & Films","Other books"];
var dvds = ['New Releases','Hollywood Movies','Bollywood Movies','Regional Movies','Tv Shows & Documentaries','Kids & Educational','Health & Fitness','Music','International Music','Bollywood Music','Indian Classical & Devotional','Gaming','Pc Games','Other dvd & films'];
var sports = ['Climbing','Cycling','Fitness','Golf','Nature Sports','Racquet Sports','Running','Roller Sports','Team Sports','Watersports','Other sports gear'];
var furnitures = ['Living Room Furniture','Bedroom Furniture','Dining Room Furniture','Bar Furniture','Study Room Furniture','Outdoor Furniture','Lightings','Wall Decor','Bean Bags','Housekeeping','Other furnitures'];
var electronics = ['Mobiles','Tablets','Mobile Accessories','Laptops','Computer Accessories','Televisions','Speakers','Mp3 Players','Gaming & Accessories','Washing Machines','Kitchen Appliances','Cameras','Health Care Devices','Other electronics'];
var toys = ['School Supplies','Toys For Boys','Toys For Girls','Infant Toys','Remote Controlled Toys','Soft Toys','Educational Toys','Infant Clothing','Cradels','Others'];
var twos = ['Mopeds','Scooter','Cruiser','Standard','Other two wheelers'];
var cars = ['Other cars'];
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
var category = ["Action","Biographies","Comics","Cooking","Engineering","Entrance Exams","Health & Fitness","History & Politics","Humor","Indian Writing","Knowledge & Learning","Medicine","Music & Films","Other books","New Releases","Hollywood Movies","Bollywood Movies","Regional Movies","Tv Shows & Documentaries","Kids & Educational",
"Health & Fitness","Music","International Music","Bollywood Music","Indian Classical & Devotional","Gaming","Pc Games","Other dvd & films","Climbing","Cycling","Fitness","Golf","Nature Sports","Racquet Sports","Running","Roller Sports","Team Sports","Watersports","Other sports gear","Living Room Furniture",
"Bedroom Furniture","Dining Room Furniture","Bar Furniture","Study Room Furniture","Outdoor Furniture","Lightings","Wall Decor","Bean Bags","Housekeeping","Other furnitures","Mobiles","Tablets","Mobile Accessories","Laptops","Computer Accessories","Televisions","Speakers","Mp3 Players","Gaming & Accessories","Washing Machines",
"Kitchen Appliances","Cameras","Health Care Devices","Other electronics","School Supplies","Toys For Boys","Toys For Girls","Infant Toys","Remote Controlled Toys","Soft Toys","Educational Toys","Infant Clothing","Cradels","Others","Mopeds","Scooter","Cruiser","Standard","Other two wheelers"
,"Other cars"];
$('#category2').attr('value',($(this).val()));
var cat = ($(this).val());
//alert(cat);
for (var i = 0;i < category.length; i++ ) {
catary = category[i]
if (catary == cat) {
$('#subcat').val(i+1)
}
}
});
//show default my listings
$(document).ready(function(){
$('div.dashbrd1').trigger('click');
});