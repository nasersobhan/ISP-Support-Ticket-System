

//find(".fsel[multiple]:not(.location2):not(.page2):not(.select2)").kendoMultiSelect().end()
$("input[type='checkbox']").change(function (e) {
    if ($(this).is(":checked")) { //If the checkbox is checked
        $(this).closest('tr').addClass("selected"); 
        $(this).closest('tr.blue_head').removeClass("selected"); 
        //Add class on checkbox checked
    } else {
        $(this).closest('tr').removeClass("selected");
        //Remove class on checkbox uncheck
    }
});

//$(document).ready(function() {
  $('tr').click(function(event) {
    if (event.target.type !== 'checkbox') {
      $(':checkbox', this).trigger('click');
    }
    
  });
//});





  $("#checkAll").click(function(){
   $('form#baction input:checkbox').not(this).prop('checked', this.checked);
  if ($(this).is(":checked")) {
       $('form#baction input:checkbox').not(this).closest('tr').addClass("selected"); ;
  }else{
       $('form#baction input:checkbox').not(this).closest('tr').removeClass("selected"); ;
  }
    //$('form#baction input:checkbox').trigger('click');
});
