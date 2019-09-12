




//Ajax Loader
function ajaxindicatorstart(text)
{
	if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="ajax-loader.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
	}

	jQuery('#resultLoading').css({
		'width':'100%',
		'height':'100%',
		'position':'fixed',
		'z-index':'10000000',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto'
	});

	jQuery('#resultLoading .bg').css({
		'background':'#000000',
		'opacity':'0.7',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});

	jQuery('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'fixed',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto',
		'font-size':'16px',
		'z-index':'10',
		'color':'#ffffff'

	});

    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}



$(document).ajaxStart(function () {
 		//show ajax indicator
//ajaxindicatorstart('loading data.. please wait..');
}).ajaxStop(function () {
//hide ajax indicator
//ajaxindicatorstop();
});















///OLD FOCKs




//wideArea();

   function chooseFile() {
      $("input[name='myfile']").click();
	    }
   


var settings = {
    url: "http://karyabee.com/uploadimg.php",
    method: "POST",
    allowedTypes:"jpg,png,gif,doc,pdf,zip",
    fileName: "myfile",
    multiple: false,
    onSuccess:function(files,data,xhr)
    {
       
    },
    afterUploadAll:function()
    {
     
    },
    onError: function(files,status,errMsg)
    {        
       
    }
}

//$("#changephotox").uploadFile(settings);



$(function() {


$(".infoimgx").click(function () {
  /* $('.infotxtx').slideToggle('normal'); */
    var $lefty = $('.infotxtx');
    $lefty.animate({
      left: parseInt($lefty.css('left'),10) == 0 ?
        -$lefty.outerWidth() :
        0
    });
});	


		
$( "input[requireds]" ).click(function() {
 $emptyFields.removeClass('fails');
});

			
				
$("form[ajaxform]" ).submit(function( event ) {
  event.preventDefault();
 dataString = $(this).serialize();
  var $form = $( this ),
   url = $form.attr( "action" );

  var $fields = $("input[requireds]");

        var $emptyFields = $fields.filter(function() {
            return $.trim(this.value) === "";
        });

        if (!$emptyFields.length) {
           //alert("form has been filled");
		   $emptyFields.removeClass('fails');
		
        } else {
			$emptyFields.addClass('fails');
			//$emptyFields.attr("placeholder", "Type your answer here");
			$emptyFields.focus();
           	return false;
        }


  
  
  var posting = $.post( url, dataString  );
  posting.done(function( data ) {
    var content = data;// $(data).find( "#content" );
	 $("#result_mess", $form).fadeOut( 100 , function() {
    jQuery(this).empty().append( data );
	}).fadeIn( 1500 );
    $("#result_mess", $form).empty().append( content );
 });
});
			
			
			
			
			
			
			
			
			
	$('.xmypage').click(function(){
								  
		var toLoad = $(this).attr('href')+' #recentjobs';
		//var loadin = $(this).attr('loadin');
		//var title = $(this).attr('title');
		
		$('#recentjobs').fadeOut('slow',loadContent);
		$('.loadingbox').remove();
		$('#recentjobs').append('<div class="loadingbox"></div>');
		$('.loadingbox').fadeIn('normal');
		//window.location. = $(this).attr('href');
		function loadContent() {
			$('#recentjobs').load(toLoad,'',showNewContent());
			//$('.content-header h1').html(title);
			
		}
		function showNewContent() {
			$('#recentjobs').fadeIn('slow',hideLoader());
		}
		function hideLoader() {
			$('.loadingbox').fadeOut('slow');
			//$('.loadingbox').remove();
		}
		
		return false;
	});
	
	
	
	
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 500, hide: 200 }});
	//$('[data-rel="chosen"],[rel="chosen"]').chosen();
			
            });




    
    
    /* $('#sendmessagex').live('click', function(){

$.ajax({
            url:'http://www.sobhansoft.com/def/sContact/send.php?type=ajax',//url to submit
            type: "post",
            dataType : 'html',
            data : $("#sendmessage").serialize(),
            success: function (data)
            {
                    $('#result_mess').append(data);
            }
        });

return false;
   });
   */
   