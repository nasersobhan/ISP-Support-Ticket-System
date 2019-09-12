/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$(function(){
//cascadeForm = $('.form-horizontal');



function exp_func(){
$('#exp_table').load(homeURL+'/?pg=profile #exp_table'); 
$('#edit_experience').addClass('hidden');
$("#edit_experience form").trigger('reset');
}

function edu_func(){
$('#edu_table').load(homeURL+'/?pg=profile #edu_table'); 
$('#edit_edu').addClass('hidden');
$("#edit_edu form").trigger('reset');
}


$( "body" ).on( "click", '.editexp', function() {
//$('.OpenModallink').click(function(e){

 
    var titlex = $(this).data('id');
    //$('#applyone').on('show', function () {
    
      $('#add_exp').addClass('hidden');
      //$('#edit_experience').addClass('hidden',function(){
          $('#exp-'+titlex).load(homeURL+'/?pg=resume&editexp='+titlex+' #edit_experience'); 
     // });
    
});





function ski_func(){
$('#sktbl').load(homeURL+'/?pg=profile #sktbl');

}
//$.fn.bootstrapSwitch.defaults.size = 'mini';
//$.fn.bootstrapSwitch.defaults.onColor = 'success';
//$("#onstat").bootstrapSwitch();



$('#onstat').on('switchChange.bootstrapSwitch', function(event, state) {




var url = jQuery(this).attr('data-url');

if(jQuery(this).is(':checked'))
admin = '1';
else
admin = '0';





jQuery.ajax({
type: "POST",
url: url,
data: { statusx : admin }
}).done(function( msg ){ 

$.notify({message: msg},{mouse_over: true,offset:{
		x: 0,
		y: 100
	}, type: 'success1',
	delay: 5000,
	//icon_type: 'image',
	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
		'<span data-notify="title">{1}</span>' +
		'<span data-notify="message">{2}</span>' +
	'</div>',animate: {
		enter: 'animated fadeInRight',
		exit: 'animated fadeOutRight'
	},placement: {
		from: "top",
		align: "right"
	}        });






});


});


var p = document.getElementById("ski_precent"),
    res = document.getElementById("ski_lvl");
    bar = document.getElementById("pres_bar");
p.addEventListener("input", function() {
    res.innerHTML = p.value+'%';
    bar.style.width = p.value+'%'; 
}, false); 


$(document).on('click', '.skdel', function(){
alert("success");
});

$( "#wo_present" ).click(function() {
   $this = $('#wo_present');
  if ($('#wo_present').is(':checked')) {
     //   $("#wor_to").hide();

  
      $("#wox_to").hide("slow", function() {
     $("input#wor_to").attr("disabled", true);
  });
    
    
  } else {
     $("#wox_to").show("slow", function() {
    $("input#wor_to").removeAttr("disabled");
  });
  
    
  }
});

$( "#ewo_present" ).click(function() {
   $this = $('#ewo_present');
  if ($('#ewo_present').is(':checked')) {
     //   $("#wor_to").hide();

  
      $("#ewox_to").hide("slow", function() {
     $("#ewox_to input#wor_to").attr("disabled", true);
  });
    
    
  } else {
     $("#ewox_to").show("slow", function() {
    $("#ewox_to input#wor_to").removeAttr("disabled");
  });
  
    
  }
});

function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
$(function () {
    $('.editablex').on('click', function () {
     var id= $(this).data('id');
        $(id).removeClass('hide');
         $(this).addClass('hide');
    });

    $('.editinput').on('blur', function () {
          var id= $(this).data('id');
          
          var namex= $(this).attr("name");
          if($(this).find(":selected").text())
               var val= $(this).find(":selected").text();
              else
          var val= $(this).val();
        $(id).removeClass('hide');
        //$(id).html(nl2br($(this).find(":selected").text()));
        $(id).html(nl2br(val));
        $(this).parent().addClass('hide');
        
          var val= $(this).val();
        jQuery.ajax({
        type: "POST",
        url: homeURL+'/?pg=profile&save=single',
        data: { vlx : val,nmx : namex }
        }).done(function( msg ){ 

        $.notify({message: msg},{mouse_over: true,offset:{
                        x: 0,
                        y: 100
                }, type: 'success1',
                delay: 5000,
                //icon_type: 'image',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<span data-notify="title">{1}</span>' +
                        '<span data-notify="message">{2}</span>' +
                '</div>',animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                },placement: {
                        from: "top",
                        align: "right"
                }        });






        });
        
        
        
    });
    
    
    
    
//        $('.editinput').on('focusout', function () {
//          var id= $(this).data('id');
//          
//        
//        $(id).removeClass('hide');
//        $(id).html($(this).val());
//        $(this).parent().addClass('hide');
//        
//        
//        
//        
//        
//        
//    });
});


