/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(".sacui").each(function(){
var $this = $(this);



   var url = homeURL+"?API=datalist";
   var type =  $this.attr('data-type');
   var inputclass =  $this.attr('class');
   if(type)
      url =  homeURL+"?API=datalist&type="+type;  
   
    var cache = {};
    $this.autocomplete({
      minLength: 3,
      //focus: function( event, ui ) {
        //$this.attr( 'placeholder', ui.item.label );
        //return false;
      //},
      select: function (event, ui) {
        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
       
          $this.hide();
          var new_ele = $('<label class="'+inputclass+'" >'+ui.item.label+'</label>');
          new_ele.removeClass("sacui");
            new_ele.click(function() {
            
            $this.val('').show().focus();
            $(this).hide();
            }); 
           $this.after(new_ele);
           console.log(ui.item.label);
             $this.val(ui.item.value);
      
        return false;
    },
      autoFocus: true,
      source:  function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
        
       
        
        $.getJSON(url , request, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        
        });
      }
    });
    
     
  // var selectItem = 
    
    
    
});



    

// select: function( event, ui ) {
//            $( "#project-id" ).val( ui.item.value );
//            return false;
//        }   
    
//    
//    $(function () {
//    var getData = function (request, response) {
//        $.getJSON(
//            "http://naserlap2/ooyta/data/?API=datalist&type=1055&term=" + request,
//            function (data) {
//                response(data);
//            });
//    };
// 
 
    
    
//        $("#mylabel").click(function(){
//           //;
//            $("#authorname").val('').show().focus();
//          
//            $(this).hide();
//    });
// 
//    $("#birds").autocomplete({
//        source: getData,
//        select: selectItem,
//        minLength: 1,
//        change: function() {
//            $("#birds").val("").css("display", 2);
//        }
//    });
//});
//    
//    
//    
    
    