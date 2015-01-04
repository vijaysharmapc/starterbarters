$(document).ready(function(){
$(".fade").hover(
function() {
$(this).stop().animate({"opacity": "0.5"}, "fast");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");
});

});

//list of categories
var catid = $("#cats").val();
if ( catid ) {
  $.post('ajax/process.php',{catid:catid},function (data) {
  $("#catdata").html(data);
});
}
