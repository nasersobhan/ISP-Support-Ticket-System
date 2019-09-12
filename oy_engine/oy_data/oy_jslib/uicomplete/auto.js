$(".sacui").each(function(){var $this = $(this); 
    var url = homeURL + "?API=datalist"; 
    var type = $this.attr('data-type'); 
    var cate = $this.attr('data-cate'); 
     var pare = $this.attr('data-pare');
    var inputclass = $this.attr('class'); 
    if (type)
        url = "https://d.ooyta.com/?API=datalist&type=" + type; 
    if(cate)
        url = "https://d.ooyta.com/?API=datalist&cate=" + cate; 
//    
//    if(pare)
//        url = "https://d.ooyta.com/?API=datalist&parent=" + pare;
    
    if(cate && type) 
        url = "https://d.ooyta.com/?API=datalist&type=" + type + '&cate='+cate; 
    
//    if(pare && type && !cate) 
//        url = "https://d.ooyta.com/?API=datalist&type=" + type + '&parent='+pare; 
//    
//      if(pare && cate && !type) 
//        url = "https://d.ooyta.com/?API=datalist&cate=" + cate + '&parent='+pare; 
//    
//    
//    if(pare && type && cate) 
//        url = "https://d.ooyta.com/?API=datalist&type=" + type + '&parent='+pare+ '&cate='+cate;
    var cache = {}; 
    $this.autocomplete({minLength:3, select:function(event, ui)
        {console.log("Selected: " + ui.item.label + " aka " + ui.item.value); $this.hide(); 
            var new_ele = $('<label class="' + inputclass + '" >' + ui.item.label + '</label>'); 
            new_ele.removeClass("sacui"); 
            new_ele.click(function(){
                $this.val('').show().focus(); 
                $(this).hide(); }); 
            $this.after(new_ele); 
            console.log(ui.item.label); 
            $this.val(ui.item.value); return false; }, autoFocus:true, source:function(request, response){var term = request.term; if (term in cache){response(cache[term]); return; }
$.getJSON(url, request, function(data, status, xhr){cache[term] = data; response(data); }); }}); });


$(".location2").each(function(){var $this = $(this); 
    var url = "https://d.ooyta.com/?API=cities"; 
//    var type = $this.attr('data-type'); 
//    var cate = $this.attr('data-cate'); 
//     var pare = $this.attr('data-pare');
    var inputclass = $this.attr('class'); 
//    if (type)
//        url = "https://d.ooyta.com/?API=datalist&type=" + type; 

    var cache = {}; 
    $this.autocomplete({minLength:3, select:function(event, ui)
        {console.log("Selected: " + ui.item.label + " aka " + ui.item.value); $this.hide(); 
            var new_ele = $('<label class="' + inputclass + '" >' + ui.item.label + '</label>'); 
            new_ele.removeClass("sacui"); 
            new_ele.click(function(){
                $this.val('').show().focus(); 
                $(this).hide(); }); 
            $this.after(new_ele); 
            console.log(ui.item.label); 
            $this.val(ui.item.value); return false; }, autoFocus:true, source:function(request, response){var term = request.term; if (term in cache){response(cache[term]); return; }
$.getJSON(url, request, function(data, status, xhr){cache[term] = data; response(data); }); }}); });





$(".usergroupList").each(function(){var $this = $(this); 
    var url = homeURL + "?API=userList"; 
    var inputclass = $this.attr('class'); 
    var cache = {}; 
    $this.autocomplete({minLength:3, select:function(event, ui)
        {
             $this.hide(); 
            var new_ele = $('<label class="' + inputclass + '" >' + ui.item.label + '</label>'); 
            new_ele.removeClass("sacui"); 
            new_ele.click(function(){
                $this.val('').show().focus(); 
                $(this).hide(); }); 
            $this.after(new_ele); 
            $this.val(ui.item.value); return false; }, autoFocus:true, source:function(request, response){var term = request.term; if (term in cache){response(cache[term]); return; }
$.getJSON(url, request, function(data, status, xhr){cache[term] = data; response(data); }); }}); });