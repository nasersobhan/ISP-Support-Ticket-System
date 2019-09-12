<?Php 
header("content-type: application/x-javascript");
echo 'var conid='.$_GET['cid'].';';
echo 'var home="http://webserver/jobs/";';
ob_start();
?>
$('#autoreply').click(function() {
	var checkedValue = $('#autoreply:checked').val();
	if(checkedValue)
	{
	$("#sendbtn").hide();
	} else {
		$("#sendbtn").show();
	}
});


$('#smform').keydown(function(e) {
	var checkedValue = $('#autoreply:checked').val();
	if(checkedValue)
	{
		//enter key
	    if (e.keyCode == 13) {
	        //submit form
	        sendmsg_form();
                //alert('sendmsg');
	    }
	}
})





// checks for Firefox and other  NON IE Chrome versions
  

    var current_user = -1; 
    setInterval(function(){
   //var box_height    = $('#message_parent');
    $.get(home+"message/user/"+conid, function( datax ) {
       current_user = datax;
    });
    
    
    $.get(home+"message/last/"+conid, function( datax ) {
    
        if(datax == current_user){
            console.info( "wating for user to see the message" + datax +' CU: '+  current_user);
        }else if(datax==0){
                console.info('no need to load' + datax +' CU: '+  current_user);
        }else if(datax != current_user && datax != 0){
        
          $(window).on("focusin", function () { 
                console.info( "resetting trigger value=" + datax +' CU: '+  current_user);   
                //reload page
                ajaxCodePost(home+"message/last/"+conid,'con_luid=3');
                console.info( "reloading page..." + datax +' CU: '+  current_user);
                $('#message_parent').load(home+"message/view/"+conid+" #message_box").animate({ 
                    scrollTop: $('#message_box')[0].scrollHeight
                    // $('#message_parent').scrollTop($('#message_parent').prop("scrollHeight"))
                }, 100);
                    $(document).prop('title', 'Nooooooooo');
             }).on("focusout", function () {
                   
                    $(document).prop('title', 'New Message');
                     console.log("blur");
             });
     
      
        }
    });
    
 
 // $('#ElementId').click();
}, 1000);





$("#message_parent").scrollTop($('#message_parent').prop("scrollHeight"));
function load_div(url, div){
    
    $( div ).load( url ).fadeIn('1500'); 
}



function sendmsg_form() {
	var box_height    = $('#message_parent');
	    var msg = $("#replaytxt").val();
		if(msg != '') {
		$.ajax({
			type: "POST",
			url: home+"message/view/"+conid+" #message_box",
			data: 'replay='+msg,
			cache: false,
			success: function(html) {	
				$('#result_mess').append(html);
				var height = box_height[0].scrollHeight;
				box_height.scrollTop(height);
				$("#replaytxt").val('');
                                $("#replaytxt").focus();
			}
		});
		return false;
		} else {
			alert("Message cannot be empty!");
			return false;
		}
}


function ajaxCodePost(url,pdata){
            jQuery.ajax({
			global: false,
                        type: "POST",
			url: url,
			data: pdata,
			cache: false,
			success: function(html) {	
                                return (html);
			}
		});
		
}






<?php 
$contents = ob_get_contents();
ob_end_clean();
echo $contents; ?>

