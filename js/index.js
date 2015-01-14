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



