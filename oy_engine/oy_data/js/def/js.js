/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(window).on('load', function(){
     $(".loadingbox").fadeOut('slow');
});

function gup( name, url ) {
  if (!url){
      
  var scripts = document.getElementsByTagName("script"),
    url = scripts[scripts.length-1].src;
 
  }
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( url );
  return results == null ? null : results[1];
}



var homeURL =  gup( 'url') ;

//
// $(document).ready(function() {
//                $('body').append('<div id="ati10" class="atl"></div>');
//                $('.tip[title!=""]').each(function() {
//                    var a = $(this);
//                    a.hover(
//                        function() {
//                            showAnchorTitle(a, a.data('title'));
//                        },
//                        function() {
//                            hideAnchorTitle();
//                        }
//                    )
//            
//                    a.mousemove(function( event ) {
//                        $('#ati10').css({
//                            'top'  : (event.pageY- $('#ati10').outerHeight() - 10) + 'px',
//                           'left' : (event.pageX+5) + 'px'
//                        })
//                    })
//            
//                    .data('title', a.attr('title'))
//                    .removeAttr('title');
//                });
//});
// Fill modal with content from link href



$( "body" ).on( "click", '.OpenModallink', function(e) {
//$('.OpenModallink').click(function(e){
    e.preventDefault();
    var frameSrc = $(this).attr('href');
    var titlex = $(this).data('title');
    //$('#applyone').on('show', function () {

      $('#applyfram').attr("src",frameSrc);
      $('#titlefram').html(titlex);
	//});
    $('#applyone').modal({show:true});
});



$("body").on( "click", '.show-hider', function() {

    var ntbsoh = $(this).data('id');
        $(ntbsoh).toggleClass('hidden', function() {   });
   
});

$("body").on({
    
    "mousemove": (function (event) {
         
                var a = $(this);
                a.data('title', a.attr('title')).removeAttr('title');
                showAnchorTitle(a, a.data('title'));
               
                    $('#ati10').css({
                        'top': (event.pageY - $('#ati10').outerHeight() - 10) + 'px',
                        'left': (event.pageX + 5) + 'px'
                    });
    }),mouseleave:  function () {
                    var a = $(this);
               // console.log('hover');
                 hideAnchorTitle();
                // a.data('title', a.attr('title')).removeAttr('title');
            }

}, '.tip[title!=""]');
//
//$( "body" ).on( "mousemove hover", '.tip[title!=""]', function() {
//           var a = $(this);
//                    a.hover(
//                        function() {
//                            showAnchorTitle(a, a.data('title'));
//                        },
//                        function() {
//                            hideAnchorTitle();
//                        }
//                    )
//            
//                    a.mousemove(function( event ) {
//                        $('#ati10').css({
//                            'top'  : (event.pageY- $('#ati10').outerHeight() - 10) + 'px',
//                           'left' : (event.pageX+5) + 'px'
//                        })
//                    })
//            
//                    .data('title', a.attr('title'))
//                    .removeAttr('title');
//});




$( "body" ).on( "click", ".social-shares a", function(event) {
    event.preventDefault();
    window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
});

function blink(selector){
  
$(selector).fadeOut('slow', function(){
    $(this).fadeIn('slow', function(){
        blink(this);
    });
});
}

//$(document).ready(function(){
  $(function(){  blink('.blink'); });

  $( document ).ajaxComplete(function( event, request, settings ) {
    blink('.blink');
  });


$(document).on('click', '#respn1', function(e){
    $('#topnav1').toggleClass('responsive');
});
















$(function(){
 //$( "#pl-list" ).hide();
$( "#pl-shower" ).click(function() {
  $( "#pl-list" ).toggle( "slow", function() {
   
    $this = $('#pl-shower > i');
    if($this.hasClass('glyphicon-triangle-bottom')) 
        $this.removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-top');
    else 
        $this.removeClass('glyphicon-triangle-top').addClass('glyphicon-triangle-bottom');
	
    
    
    //$('#pl-shower > small').html(
          //  text == 'glyphicon-triangle-bottom' ? '<i class="glyphicon glyphicon-triangle-top"></i>' : '<i class="glyphicon glyphicon-triangle-bottom"></i>');
  
  });
  //$( $this ).toggle( "slow", function() {
   
 // });
 

});



$(document).ready(function() {
    
    

    
    
    
    
    
    
    
    
    
var panels=localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels); //get all panels
    for (var i in panels){ //<-- panel is the name of the cookie
         var $this = $("#"+panels[i]);
         
                 $uid = $this.attr( "data-id" );
                var $todo = $uid === undefined ? $this.parents('.panel').find('.panel-body') : $($uid);
                //console.log(panels[i]);
		$todo.hide();
		$this.addClass('p-ced');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	

    }

});


$(document).on('click', '.panel-heading span.show-hide', function(e){
    var $this = $(this);
    
    $uid = $this.attr( "data-id" );
    var $todo = $uid === undefined ? $this.parents('.panel').find('.panel-body') : $($uid);
	//console.log($uid);	
    
    
    
	if(!$this.hasClass('p-ced')) {
            
            $todo.slideUp();
               // $this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('p-ced');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                
           
                
                 var active = $this.attr('id'); //console.log(active);
                   var panels= localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
                   if ($.inArray(active,panels)==-1){ //check that the element is not in the array
                        panels.push(active);
                        
                    }
                   localStorage.panels=JSON.stringify(panels);
                
		
	} else {
            
//                var
//                var $todo = 
//                $uid = $this.attr( "data-id" );
//                var $todo = $uid ==='' ? $this.parents('.panel').find('.panel-body') : $uid;
		$todo.slideDown();
		$this.removeClass('p-ced');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                
                        var active = $this.attr('id');
                    var panels= localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
                    var elementIndex=$.inArray(active,panels);
                    if (elementIndex!==-1) //check the array
                    {        
                        panels.splice(elementIndex,1); //remove item from array
                    }
                    localStorage.panels=JSON.stringify(panels); //save array on localStorage
                
                
                
	}
});

$(document).on('click', '.hider', function(e){
    var $this = $(this);
     urlx = $this.attr( "data-id" );
     $(urlx).hide( "fast", function() {
    
  });
});

$(document).on('click', '.btn-ajax', function(e){
    var $this = $(this);
     urlx = $this.attr( "url" );
     datax = $this.attr( "data" );

     var source = $this.attr('data-source');
     var selector = $this.attr('data-selector');

     var conf = $this.attr('confmsg');
     if (typeof conf !== typeof undefined && conf !== false){
      var resultcon = confirm(conf);
      if (!resultcon) {
        return false;
      }

     }

    var posting = $.post( urlx, datax  );
    posting.done(function( data ) {
    //var content = data;// $(data).find( "#content" );
    $this.addClass( "btn-success" );
    
    alert_msg(data,'success');

    if (typeof source !== typeof undefined && source !== false && typeof selector !== typeof undefined && selector !== false) {
      $(selector).load(source);
      $(selector).addClass('highlighted');
      setTimeout(function(){
              $(selector).removeClass('highlighted');
          }, 1600);
    }
    
//    
//    
//    
//    $.notify({message: data},{	type: 'success',animate: {
//		enter: 'animated bounceInDown',
//		exit: 'animated bounceOutUp'
//	},placement: {
//		from: "bottom",
//		align: "center"
//	}});
//	 $("#result_mess", $form).fadeOut( 100 , function() {
//    jQuery(this).empty().append( data );
//	}).fadeIn( 1500 );
//    $("#result_mess", $form).empty().append( content );
 });
	
        
})









});


$('#notify').click(function() {
    $(this).fadeOut('slow');
});

    
    










//
//$(document).ready(function(){
//  $('.load-group a').click(function(e){
//       e.preventDefault();
//     var url = $(this).attr('href')
//    $('.row > #main-body').load(url + ' #main-body');
//  });
//});  <div id="ati10" class="atl"></div>
//







            function showAnchorTitle(element, text) {

                var offset = element.offset();
                $('#ati10')
                .css({
                    'top'  : (offset.top + element.outerHeight() + 4) + 'px',
                    'left' : offset.left + 'px'
                  //  'top'  : (event.pageY-5) + 'px',
                   // 'left' : (event.pageX+5) + 'px'
                })
                .html(text)
                .show();

            }

            function hideAnchorTitle() {
                $('#ati10').hide();
            }
            
            
          $( ".dropdown" ).click(function() {
  $( ".dropdown-content" ).toggle( "slow", function() {
    // Animation complete.
  })
});  
            
        
$(document).on('click', '.btn-msg', function(e){
       e.preventDefault();
         var $this = $(this);
         var asktext = $this.data('txt');
          alert_msg(asktext);
       
 });

  
  $(document).on('click', '.action-del', function(e){
       e.preventDefault();
         var $this = $(this);
         var asktext = $this.data('txt');
        if (confirm(asktext)){
                var dllink = $this.attr('href');
             //  alert(dllink);
               
              urlx = '#'+$this.attr( "data-id" );
              

               $.get(dllink, function (data) {
                  
                      $(urlx).animate({
                        color: "#f4667b",
                        opacity: 0.25
                      }, 200, function() {
                         $(urlx).hide('fast');
                        //  $(urlx).remove();
                      });
                     // alert_msg('Item Deleted, Thank you!','error');
                 
                      alert_msg(data);
                 
                      //alert(data);
                 });
             }

  });

