

$(".select").select2({ minimumResultsForSearch: -1});

$(document).ready(function(){


$(".select2").select2({ placeholder: function(){
           $(this).data('placeholder');
       }, minimumResultsForSearch: -1,maximumSelectionLength: 2});



	

  
  
  
    
  
  
  
  
$('.page2').select2({
     placeholder: function(){
           $(this).data('placeholder');
       },
        minimumInputLength: 2, tags: true,
        ajax: {
          url: homeURL + '/?API=pages',
          dataType: 'json',
          data: function (term, page) {
            return {
              term: term.term
            };
          },
          results: function (data, page) {
            return { results: data };
          }
        }
      });

    
    
    $('.location2').select2({
        placeholder: function(){
           $(this).data('placeholder');
       },
     minimumInputLength: 3,
     ajax: {
       url: homeURL + '/?API=cities',
       dataType: 'json',
       data: function (term, page) {
         return {
           term: term.term
         };
       },
       results: function (data, page) {
         return { results: data };
       }
     }
   });
   
   

   
$(".cate2").each(function(){
          
      var $this = $(this);
      var type = $(this).attr('data-type');
                $this.select2({
                    
         placeholder: function(){
           $(this).data('placeholder');
       },
                 minimumInputLength: 2, 
                 ajax: {
                   url: homeURL + '/?API=cate&type='+ type,
                   dataType: 'json',
                   data: function (term, page) {
                     return {
                       term: term.term
                     };
                   },
                   results: function (data, page) {
                     return { results: data };
                   }
                 }
               });
      });
  
  
    $(".cate2au").each(function(){
  var $this = $(this);
  
  
  var type = $(this).attr('data-type');
  

    $this.select2({
        
        placeholder: function(){
           $(this).data('placeholder');
       },
    minimumInputLength: 1, tags: true, 
    ajax: {
        
      url: homeURL + '/?API=cate&type='+ type,
      dataType: 'json',
      data: function (term, page) {
        return {
          term: term.term
        };
      },
      results: function (data, page) {
        return { results: data };
      }
    }
    ,tokenSeparators: [","],
    createSearchChoice: function (term) {
        var text = term + (lastResults.some(function(r) { return r.text == term }) ? "" : " (new)");
        return { id: term, text: text };
    },
    
    
    });
 
  });  
   
 
  
  
  $(".cate2autag").each(function(){
  var $this = $(this);
  
  
  var type = $(this).attr('data-type');
  
  
   $this.select2({
       
       placeholder: function(){
           $(this).data('placeholder');
       },
    minimumInputLength: 1, tags: true,
    ajax: {
        
      url: homeURL + '/?API=cate&type='+ type,
      dataType: 'json',
      data: function (term, page) {
        return {
          term: term.term
        };
      },
      results: function (data, page) {
        return { results: data };
      }
    }
  ,    tokenSeparators: [","], multiple: true,
    createSearchChoice: function (term) {
        var text = term + (lastResults.some(function(r) { return r.text == term }) ? "" : " (new)");
        return { id: term, text: text };
    },
    
    
    });
  
  
  
  
  
  
  
  
});






});