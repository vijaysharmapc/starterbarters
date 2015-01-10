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

$("#dp").hover(
function() {
$(this).stop().animate({"opacity": "0.5"}, "slow");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");
});

$("#dp").click(function() {
$("input[id='my_file']").click();
new_file = $("#my_file").val();
alert(new_file);
alert("Image ready to upload " + new_file + "");
if(typeof new_file !== 'undefined'){
$('#submit').click();
}
});



