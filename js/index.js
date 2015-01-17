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
$('div.dashbrd1,div.dashbrd2,div.dashbrd3').click(function () {
var tmp = ($(this).attr('id'));
if (tmp == 'myl') {
	//alert($(this).attr('id'));
	$.post('ajax/mylist.php',{tmp:tmp},function (data) {
   $("#data").html(data);
});
}
if (tmp == 'msg') {
	alert($(this).attr('id'));
	$.post('ajax/process.php',{catid:catid},function (data) {
   $("#catdata").html(data);
});
}
if (tmp == 'mp') {
	alert($(this).attr('id'));
	$.post('ajax/process.php',{catid:catid},function (data) {
   $("#catdata").html(data);
});
}
});

//select category
$('.category1').change(function () {
$('#category2').empty();

$('#selcat').attr('value',($(this).val()));
var cat = ($(this).val())
//alert(cat);
var books = ["Action","Biographies","Comics","Cooking","Engineering","Entrance Exams","Health & Fitness","History & Politics","Humor","Indian Writing","Knowledge & Learning","Medicine","Music & Films","Others"];
var dvds = ['New Releases','Hollywood Movies','Bollywood Movies','Regional Movies','Tv Shows & Documentaries','Kids & Educational','Health & Fitness','Music','International Music','Bollywood Music','Indian Classical & Devotional','Gaming','Pc Games','Others'];
var sports = ['Climbing','Cycling','Fitness','Golf','Nature Sports','Racquet Sports','Running','Roller Sports','Team Sports','Watersports','Others'];
var furnitures = ['Living Room Furniture','Bedroom Furniture','Dining Room Furniture','Bar Furniture','Study Room Furniture','Outdoor Furniture','Lightings','Wall Decor','Bean Bags','Housekeeping','Others'];
var electronics = ['Mobiles','Tablets','Mobile Accessories','Laptops','Computer Accessories','Televisions','Speakers','Mp3 Players','Gaming & Accessories','Washing Machines','Kitchen Appliances','Cameras','Health Care Devices','Others'];
var toys = ['School Supplies','Toys For Boys','Toys For Girls','Infant Toys','Remote Controlled Toys','Soft Toys','Educational Toys','Infant Clothing','Cradels','Others'];
var twos = ['Mopeds','Scooter','Cruiser','Standard','Others'];
var cars = ['Others'];
var tmpary = [];

if (cat == 'books') {
tmpary.length = 0;
tmpary = books;
}
if (cat == 'dvds') {
tmpary = dvds;
}
if (cat == 'sports') {
tmpary = sports;
}
if (cat == 'furnitures') {
var tmpary = furnitures;
}
if (cat == 'electronics') {
var tmpary = electronics;
}
if (cat == 'toys') {
var tmpary = toys;
}
if (cat == 'twos') {
var tmpary = twos;
}
if (cat == 'cars') {
var tmpary = cars;
}

var sel = document.getElementById('category2');

for (var i = 0;i < tmpary.length; i++ ) {
	var opt = document.createElement('option');
    opt.innerHTML = tmpary[i];
    opt.value = tmpary[i];
    sel.appendChild(opt);
}
});






