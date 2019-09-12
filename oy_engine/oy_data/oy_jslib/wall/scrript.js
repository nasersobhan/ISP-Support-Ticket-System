$(document).ready(function()
{

/* Uploading Profile BackGround Image */
$('body').on('change','#bgphotoimg', function()
{
$("#bgimageform").ajaxForm({target: '#timelineBackground',
success:function(){
$("#timelineShade").hide();
$("#bgimageform").hide();
}).submit();
});

/* Banner position drag */
$("body").on('mouseover','.headerimage',function()
{
var y1 = $('#timelineBackground').height();
var y2 =  $('.headerimage').height();
$(this).draggable({
scroll: false,
axis: "y",
drag: function(event, ui) {
if(ui.position.top >= 0)
{
ui.position.top = 0;
}
else if(ui.position.top <= y1 - y2)
{
ui.position.top = y1 - y2;
}
},
stop: function(event, ui)
{
}
});
});

/* Bannert Position Save*/
$("body").on('click','.bgSave',function ()
{
var p = $("#timelineBGload").attr("style");
var Y =p.split("top:");
var Z=Y[1].split(";");
var dataString ='position='+Z[0];
$.ajax({
type: "POST",
url: "image_saveBG_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
if(html)
{
$(".bgImage").fadeOut('slow');
$(".bgSave").fadeOut('slow');
$("#timelineShade").fadeIn("slow");
$("#timelineBGload").removeClass("headerimage").css({'margin-top':html});
return false;
}
}
});
return false;
});

});