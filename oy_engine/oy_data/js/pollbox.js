//$(window).resize(function(){
  //  var height = window.innerHeight;
  //  $('ss-poll').css('height', height);
//});
 function resizeIframe(id) {
   
   // var newheight;
    //var newwidth;

    //if(document.getElementById){
      //  newheight=document.getElementById(id).contentWindow.document.body.scrollHeight;
   // }
   // document.getElementById(id).height= (newheight) + "px";
     var heightx = $('#'+id).contents().height();
    
    
    //var x = $('#'+id).attr('src');
   // console.log('here:' + heightx);
    $('#ss-poll').height(heightx);
        $('#'+id).css('height', heightx)
  }
  
  
var homeURL =  'http://demo.shamal.net/poll/' ;

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace('http://','')
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'-')
        ;
}

var link = document.createElement('link')
link.setAttribute('rel', 'stylesheet')
link.setAttribute('type', 'text/css')
link.setAttribute('href', 'http://demo.shamal.net/oy_engine/oy_theme/def/com/include.css?v=1')
document.getElementsByTagName('head')[0].appendChild(link);



var plant = document.getElementById('ss-poll');
var pid = plant.getAttribute('data-url'); // fruitCount = '12'
var width = plant.getAttribute('data-width'); // fruitCount = '12'
// 'Setting' data-attributes using setAttribute
///plant.setAttribute('data-fruit','7'); // Pesky birds



//var pid = '';
//var width = '';



var link = "http://demo.shamal.net/poll/?pg=poll-single&pid=" + convertToSlug(pid);
var iframe = document.createElement('iframe');
iframe.frameBorder=0;
iframe.width=width+"px";
iframe.onload='resizeIframe("ss-com-11")';

//iframe.height="250px";
iframe.id="ss-com-11";
iframe.setAttribute("src", link);
iframe.setAttribute("id", "ss-com-11");
document.getElementById("ss-poll").appendChild(iframe);



  //$(document).ready(function(){
  window.onload = function(e){ 
 resizeIframe('ss-com-11'); 
  setInterval(function(){
  
    //resizeIframe('ss-com-11'); 
   resizeIframe('ss-com-11'); 
       
     
  
  }, 10);
  }

 //}); 
  
//  
//  $(document).ready(function(){
//$('#ss-com-11').height($(window).height());
//    window.onresize = function() {
// var heightx = $(this).contents().height();
//$("#ss-com-11").height(heightx)
//
//};
//});
//  
  



