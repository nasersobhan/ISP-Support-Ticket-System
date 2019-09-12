//$(function(){ 
    
      setInterval(function(){
          
           $.getJSON( homeURL + "?pg=time&now=1", function( json ) {
                                var sdata = json.shamsi;
                                var mdata = json.meladi;
                     $("#sdatax2").html(sdata);
                     $("#mdatex").html(mdata);
   
                   });

                }, 1000);
                
                
      setInterval(function(){
          
        $( "#timesx" ).load( homeURL + "?pg=time #timesx" );
console.log('Work');
                }, 60000);
    
$("#convertm").submit(function(e) {

    var url = homeURL + "?pg=time&c=1"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#convertm").serialize(), // serializes the form's elements.
           success: function(data)
           {
              $('#mresult').html(data); //alert(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

$("#converts").submit(function(e) {

    var url = homeURL + "?pg=time&s=1"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#converts").serialize(), // serializes the form's elements.
           success: function(data)
           {
              $('#sresult').html(data); //alert(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
        
//});