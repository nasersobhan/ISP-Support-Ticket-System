//$(window).resize(function(){
  //  var height = window.innerHeight;
  //  $('ss-comments').css('height', height);
//});
 function resizeIframe(id) {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
     var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document.body.scrollHeight;
    }
    document.getElementById(id).height= (newheight) + "px";
  }

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
link.setAttribute('href', '//webserver/test/commentsys/WCD/include.css')
document.getElementsByTagName('head')[0].appendChild(link);



var plant = document.getElementById('ss-comments');
var pid = plant.getAttribute('data-url'); // fruitCount = '12'
var width = plant.getAttribute('data-width'); // fruitCount = '12'
// 'Setting' data-attributes using setAttribute
///plant.setAttribute('data-fruit','7'); // Pesky birds



//var pid = '';
//var width = '';



var link = "//webserver/test/commentsys/WCD/index.php?pid=" + convertToSlug(pid);
var iframe = document.createElement('iframe');
iframe.frameBorder=0;
iframe.width=width+"px";
iframe.onload='javascript:resizeIframe(this)';
//iframe.height="250px";
iframe.id="ss-com-"+11;
iframe.setAttribute("src", link);
document.getElementById("ss-comments").appendChild(iframe);




