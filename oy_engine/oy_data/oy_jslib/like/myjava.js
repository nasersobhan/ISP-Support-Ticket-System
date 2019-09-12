$( "body" ).on( "click", ".bookitmark", function() {
     
    var x_url = $(this).attr("data-url");
    var x_cat = $(this).attr("data-cat");
    var x_title = $(this).attr("data-title");
    $(this).removeClass( "btn-default" );
    //$(this).removeClass( "bookmarkit" ); toggleClass( "bounce spin" )
        $(this).toggleClass( "bmark unbmark" );
    //    $(this).html(function(i, html){
    //          return html === '<i class="glyphicon glyphicon-star"></i> bookmarked' ? '<i class="glyphicon glyphicon-star"></i> bookmark' : '<i class="glyphicon glyphicon-star"></i> bookmarked';
    //      })

       // $(this)..toggle.html();
                $.ajax({
                    url: homeURL + '?API=bookmark',
                    type: 'POST',
                    data: {'url':x_url,'cat':x_cat,'title':x_title}, // An object with the key 'submit' and value 'true;
                    success: function (result) {
                     // alert("Your bookmark has been saved" + result);
                    }
                });  

      
});


$( "body" ).on( "click", ".followit", function() {
 
    var x_url = $(this).attr("data-url");
    var x_cat = $(this).attr("data-cat");
    var x_title = $(this).attr("data-title");
    //$(this).removeClass( "btn-default" );
    //$(this).removeClass( "bookmarkit" ); toggleClass( "bounce spin" )
        $(this).toggleClass( "btn-success btn-default" );
    //    $(this).html(function(i, html){
    //          return html === '<i class="glyphicon glyphicon-star"></i> bookmarked' ? '<i class="glyphicon glyphicon-star"></i> bookmark' : '<i class="glyphicon glyphicon-star"></i> bookmarked';
    //      })

       // $(this)..toggle.html();
                $.ajax({
                    url: homeURL + '?API=follow',
                    type: 'POST',
                    data: {'url':x_url,'cat':x_cat,'title':x_title}, // An object with the key 'submit' and value 'true;
                    success: function (result) {
                     // alert("Your bookmark has been saved" + result);
                    }
                });  

  

    });   
    
    
    
$( "body" ).on( "click","like",  function() {

   
    var x_url = $(this).attr("lk-id");
    var x_cat = $(this).attr("lk-type");
var this_va = $(this);
    //$(this).removeClass( "btn-default" );
    //$(this).removeClass( "bookmarkit" ); toggleClass( "bounce spin" )
        $(this).toggleClass( "text-danger" );
    //    $(this).html(function(i, html){
    //          return html === '<i class="glyphicon glyphicon-star"></i> bookmarked' ? '<i class="glyphicon glyphicon-star"></i> bookmark' : '<i class="glyphicon glyphicon-star"></i> bookmarked';
    //      })

       // $(this)..toggle.html();
                $.ajax({
                    url: homeURL + '?API=like',
                    type: 'POST',
                    data: {'url':x_url,'type':x_cat}, // An object with the key 'submit' and value 'true;
                    success: function (result) {
                      //alert(result);
                      this_va.html(result);
                    }
                });  

   

    });
    
    