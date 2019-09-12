$(document).ready(function(){
	function getresult(page) {
            
            var url = $("#faq-result").attr('data-url') + '&loader=1&page='+page;
		$.ajax({
			url: url,
			type: "POST",
			data:  {x:1},
			beforeSend: function(){
			 //$(".loadingbox").fadeIn();
                        // console.log(url);
			},
			complete: function(){
			 //$(".loadingbox").fadeOut();
			},
			success: function(data){
                           // console.log(data);
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	}
	$(window).on("scroll",function(){
  
		if (($(window).scrollTop() + 550) > $(document).height() - $(window).height()){
                    var pagenum = parseInt($(".pagenum").last().val());
                    var totalnum = parseInt($(".total-page").val());
			if(pagenum < totalnum) {
				
                               $('.pagination').hide();
                               /// console.log('page: '+pagenum + ' : total: ' + totalnum);
                                pagenum = pagenum + 1;
				getresult(pagenum);
                                $(".pagenum").last().val(pagenum);
                               // $(".pagenum").last().val = pagenum;
			}

		}
	}); 
});
