$(document).ready(function(){
$(".fade").hover(
function() {
$(this).stop().animate({"opacity": "0.5"}, "fast");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");
});

});



//apply fade on clicked link
/*
$("#Books,#DVD,#Sport,#Furn,#Two,#Elec,#Toys,#Real,#Cars").click(function () {
$(this).toggleClass('Highlight');
})
.mouseleave(function () {
$(this).toggleClass('Highlight');
});
*/
var lnk_id = $("#cats").val();
$(".point").each(function(i,j){
img_id =  (j.id);
if (img_id != lnk_id) {
	//alert(img_id);
	       $(this).addClass('hidden').removeClass('visible');  
	  }
  else if  (img_id == lnk_id)
     {
          $(this).addClass('visible').removeClass('hidden');	
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



