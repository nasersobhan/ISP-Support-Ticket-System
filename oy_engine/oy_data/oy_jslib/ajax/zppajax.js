
//wideArea();
//
//   function chooseFile() {
//      $("input[name='myfile']").click();
//	    }
//   
//
//
//var settings = {
//    url: "http://karyabee.com/uploadimg.php",
//    method: "POST",
//    allowedTypes:"jpg,png,gif,doc,pdf,zip",
//    fileName: "myfile",
//    multiple: false,
//    onSuccess:function(files,data,xhr)
//    {
//       
//    },
//    afterUploadAll:function()
//    {
//     
//    },
//    onError: function(files,status,errMsg)
//    {        
//       
//    }
//}
//
//$("#changephotox").uploadFile(settings);
//
//
//
$(function() {
//
//
//$(".infoimgx").click(function () {
//  /* $('.infotxtx').slideToggle('normal'); */
//    var $lefty = $('.infotxtx');
//    $lefty.animate({
//      left: parseInt($lefty.css('left'),10) == 0 ?
//        -$lefty.outerWidth() :
//        0
//    });
//});	
//
//
//		
//$( "input[requireds]" ).click(function() {
// $emptyFields.removeClass('fails');
//});
//
//			
				
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
	
	
	
//	
//	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 500, hide: 200 }});
//	$('[data-rel="chosen"],[rel="chosen"]').chosen();
			
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
   
   
function delet(id){
//document.getElementById(id).style.display='none';	
  $( "#"+id ).fadeOut( "slow" );
	}