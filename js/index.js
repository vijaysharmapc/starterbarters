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
$("#Books,#DVD,#Sport,#Furn,#Two,#Elec,#Toys").click(function () {
$(this).toggleClass('Highlight');
})
.mouseleave(function () {
$(this).toggleClass('Highlight');
});


//list of categories
var catid = $("#cats").val();
if ( catid ) {
  $.post('ajax/process.php',{catid:catid},function (data) {
 $("#catdata").html(data);
//$("#catdata").html(data).replaceWith('<a href="link">aa</a>'));
//catdata").replaceWith('<a href="link">aa</a>');
});
}
