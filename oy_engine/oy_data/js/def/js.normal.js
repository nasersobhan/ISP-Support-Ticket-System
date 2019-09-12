/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$( window ).load(function() {
     $(".loadingbox").fadeOut('slow');
});
function executeFunctionByName(functionName, context /*, args */) {
    var args = Array.prototype.slice.call(arguments, 2);
    var namespaces = functionName.split(".");
    var func = namespaces.pop();
    for (var i = 0; i < namespaces.length; i++) {
        context = context[namespaces[i]];
    }
    return context[func].apply(context, args);
}
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
  
 // console.log('here '+ntbsoh);
        $(ntbsoh).toggleClass('hidden', function() {   });
    //  $(ntbsoh).toggle( "slow", function() {   })
   
});



$("body").on({
    
    "mousemove": (function (event) {
               // console.log('mousemove');
                var a = $(this);
                a.data('title', a.attr('title')).removeAttr('title');
                showAnchorTitle(a, a.data('title'));
                // $('body').appendto('<div id="ati10" class="atl"></div>');
                
                
                 //$(xxx).prependTo('body').addClass(clasx);
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



blink('.blink');



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
     urlx = '#'+$this.attr( "data-id" );
      $(urlx).animate({
    
  
    color: "#f4667b",
    opacity: 0.25
  }, 200, function() {
     $(urlx).hide("slow");
  });
     
     
//    $(urlx).css({color: '#f4667b'},500,function(){
//						 $(urlx).hide("slow");
//});
//     $(urlx).hide( "fast", function() {
//    // alert(urlx);
//  });
});

$(document).on('click', '.btn-ajax', function(e){
    e.preventDefault();
    var $this = $(this);
     var urlx = $this.attr( "url" );
     var datax = $this.attr( "data-func" );
     
    var posting = $.ajax( urlx, datax  );
    posting.done(function( data ) {
    //var content = data;// $(data).find( "#content" );
    //$this.addClass( "btn-success" );
    

            if(datax){
              //alert(datax);
              executeFunctionByName(datax,window);
          }else{
              alert_msg(data,'success');
          }

//    $.notify({message: data},{mouse_over: true,offset:{
//		x: 0,
//		y: 100
//	}, type: 'success1',
//	delay: 5000,
//	//icon_type: 'image',
//	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
//		'<span data-notify="title">{1}</span>' +
//		'<span data-notify="message">{2}</span>' +
//	'</div>',animate: {
//		enter: 'animated fadeInRight',
//		exit: 'animated fadeOutRight'
//	},placement: {
//		from: "top",
//		align: "right"
//	}        });

    
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
            
//        
//$(document).on('click', '#listofpolls input', function(e){
//   $('#listofpolls input').attr('disabled','disabled');
//      $('#listofpolls input').addClass('disabled');
//       $('#listofpolls label').addClass('disabled');
//       // $('#listofpolls label').addClass('disabled');
//       var pid = $(this).attr('data-pid');
//       var cid = $(this).attr('id');
//        var urlx = $('#listofpolls').attr('data-url');
//       // console.log(urlx);
//          $.ajax({
//                    url: homeURL + '?pg=add-poll&sub=1',
//                    type: 'POST',
//                    data: {'cid':cid,'pid':pid}, // An object with the key 'submit' and value 'true;
//                    success: function (result) {
//                         $('#listofpolls').load(urlx + ' #listofpolls',function(){
//                              $('#listofpolls #pollresult').show().html(result);
//                              
//                                setTimeout(function() {
//                                     $('#listofpolls #pollresult').hide();
//                                }, 5000);
//                          
//                         });
//                        
//                   
//                    }
//                });  
//       
//      
//      // $('#listofpolls').load(homeURL+'?pg=add-poll&id='+xy+' #listofpolls');
//       
//});
//
//
//
//
//
//
//
//
//$(document).on('click', '#yesno .btn', function(e){
//  
//     // $('#listofpolls input').addClass('disabled');
//     var $this = $(this);
//     $this.addClass('disabled btn-success');
//       var pid = $(this).attr('data-pid');
//       var cid = $(this).attr('id');
//       
//          $.ajax({
//                    url: homeURL + '?pg=add-poll&yesno=1',
//                    type: 'POST',
//                    data: {'value':cid,'pid':pid}, // An object with the key 'submit' and value 'true;
//                    success: function (result) {
//                             $this.children('#count').html(result);
//                             if(cid=='yes')
//                                 $('#yesno #no').removeClass('disabled btn-success');
//                                 else
//                                      $('#yesno #yes').removeClass('disabled btn-success');
//                                     
//                    }
//                });  
//});
//



//
//
//function loadthebox(){
//    
//     var xy = $('#listofpolls').attr('data-pid');
//    
//    $('#listofpolls').load(homeURL+'?pg=add-poll&id='+xy+' #listofpolls');
//}



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
                 
//                  var over = '<div id="overlay" class="loadingbox hidden-print"><div id="fountainG">' +
//                '<img alt="Ooyta Logo" width="40" height="40" class="loading-logo blink" src="data:image/png;base64,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" />' +
//                '</div> </div>';
//  
//        $(over).appendTo($form);
                      alert_msg(data);
                 
                      //alert(data);
                 });
             }

  });
  
  
  $(document).on('click', '.action-btn', function(e){
       e.preventDefault();
         var $this = $(this);
         var asktext = $this.data('txt');
           var urlx = '#'+$this.attr( "data-id" );
            var $box = $(urlx);
            
            var over = '<div id="overlay" class="loadingbox hidden-print"><div id="fountainG">' +
                '<img alt="Ooyta Logo" width="40" height="40" class="loading-logo blink" src="data:image/png;base64,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" />' +
                '</div> </div>';
         $(over).appendTo($box);
         
         
        if (confirm(asktext)){
                var dllink = $this.attr('href');
             //  alert(dllink);
               
           
              

               $.get(dllink, function (data) {
                  
//                      $(urlx).animate({
//                        color: "#f4667b",
//                        opacity: 0.25
//                      }, 200, function() {
//                         $(urlx).hide('fast');
//                        //  $(urlx).remove();
//                      });
                     // alert_msg('Item Deleted, Thank you!','error');
                 
  
        
                      alert_msg(data);
                 
                      //alert(data);
                 });
                 
                 
                $('#overlay').remove();  
             }

  });
  
  function refreshabox(box){
       var url      = window.location.href; ;
      $(box).load( url + " "+box, function() {
         //   alert( "Load was performed." );
        });  
  }
  
//  
//var url = document.location.toString();
//if (url.match('#')) {
//     $( ".nav-tabs a" ).removeClass('active');
//    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show').addClass('active');
//} 
//
//// Change hash for page-reload
//$('.nav-tabs a').on('shown.bs.tab', function (e) {
//    window.location.hash = e.target.hash;
//});





var bodyclassxx = localStorage.getItem("isfullwidth");
      fullwidth(bodyclassxx);


$("body").on('click', '#makeitfull', function(e){
     e.preventDefault();
   
             var $smal = localStorage.getItem("isfullwidth");
     if($smal==1){
          fullwidth(0);
     }else{
          fullwidth(1);
     }
});    
    
    
  
    
function fullwidth(res){
     if(res==1){
         
         $('#page-content').removeClass('container').addClass('container-fluid');
         $('#makeitfull').find('i').removeClass('fa-expand').addClass('fa-compress');
     }else{
         $('#page-content').removeClass('container-fluid').addClass('container');
         $('#makeitfull').find('i').removeClass('fa-compress').addClass('fa-expand');
         
     }localStorage.setItem("isfullwidth", res);
}  

    var hidesidebarxx = localStorage.getItem("hidesidebar");
        sidebar(hidesidebarxx);
$("body").on('click', '#maincontentfull', function(e){
            e.preventDefault();
   
         var $smal = localStorage.getItem("hidesidebar");
         if($smal==1){
            sidebar(0);  //alert('Show it');
        } else{
            sidebar(1); //alert('Hide it'); 
        }

     
});  


function sidebar(res){
      if(res==1){
            
           // alert('Show it!');
            $('#main-body').removeClass('col-md-12');$('#main-sidebar').show();
            $('#maincontentfull').find('i').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');
        }else if(res==0){
           // alert('Hide it!');
           // localStorage.setItem("hidesidebar",  1);
            $('#main-body').addClass('col-md-12');$('#main-sidebar').hide();
            $('#maincontentfull').find('i').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
        }
      localStorage.setItem("hidesidebar", res);  
}  







