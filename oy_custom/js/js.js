
function addNumbers(sox, num1, num2, tot) {
    var val1 = document.getElementById(num1).value;
    var val2 = document.getElementById(num2).value;
    var ansD = document.getElementById(tot);
    if (sox == '/')
        ansD.value = val1 / val2;
    if (sox == '*') {
        ansD.value = val1 * val2;
        ansD.value = Math.round(parseFloat(ansD.value))
    } if (sox == '-') {
        ansD.value = val1 - val2;
    }
}



function validate(field_name, field_value, num) {
    var numbers = /^[0-9-.]+$/;

    if (num == 'num') {
        if (field_value == null || field_value == "" || !field_value.match(numbers)) {
            document.getElementById(field_name).value = "";
            document.getElementById(field_name).focus();
            document.getElementById("qay_" + field_name).innerHTML = 'لطفا این فیلد را با عدد پر کنید';
        } else {
            document.getElementById("qay_" + field_name).innerHTML = '';
        }

    } else {

        if (field_value == null || field_value == "") {
            document.getElementById(field_name).value = "";
            document.getElementById(field_name).focus();
            document.getElementById("qay_" + field_name).innerHTML = 'لطفا این فیلد را پر کنید';
        } else {
            document.getElementById("qay_" + field_name).innerHTML = '';
        }
    }

}



function allnumeric(uzip) {

    var numbers = /^[0-9]+$/;
    if (uzip.value.match(numbers)) {
        return true;
    }
    else {
        alert('ZIP code must have numeric characters only');
        uzip.focus();
        return false;
    }
}




//<![CDATA[
var div = 'mess';
var loadingmessage = 'لطفا کمی صبر کنید....';
function Ajaxrequest() {
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari    
        xmlHttp = new XMLHttpRequest();
        return xmlHttp;
    }
    catch (e) {
        try {
            // Internet Explorer    
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            return xmlHttp;
        }
        catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                return xmlHttp;
            }
            catch (e) {
                alert("مرورگر شما از آژاکس پشتیبانی نمی کند!");
                return false;
            }
        }
    }
}
function formget(form, url) {
    // var poststr = getFormValues(form);
    $.post(url, $(form).serialize(), function(response){ 
        //alert("success");
       //$("#mypar").html(response.amount);
       return response
  });
}

function postData(url, parameters) {
    var xmlHttp = Ajaxrequest();
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState > 0 && xmlHttp.readyState < 4) {
            document.getElementById(div).innerHTML = loadingmessage;
        }
        else if (xmlHttp.readyState == 4) {
            document.getElementById(div).innerHTML = xmlHttp.responseText;
            //document.getElementById('name').value="";
            //				document.getElementById('amountx').value="";
            //				document.getElementById('totalz').value="";
            //				document.getElementById('dis').value="";
            //				document.getElementById('name').focus()
            //				document.getElementById('pricex').value="";
            //				document.getElementById('car').value="";
            //				document.getElementById('driver').value="";
            //				document.getElementById('ratea').value="";
        }
    }
    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("charset", "utf-8");
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xmlHttp.setRequestHeader("Content-length", parameters.length);
    // xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(parameters);
}
function getFormValues(formobj) {
    var str = "";
    var valueArr = null;
    var val = "";
    var cmd = "";
    for (var i = 0; i < formobj.elements.length; i++) {
        switch (formobj.elements[i].type) {
            case "text":
                str += formobj.elements[i].name +
                    "=" + encodeURI(formobj.elements[i].value) + "&";
            case "date":
                str += formobj.elements[i].name +
                    "=" + encodeURI(formobj.elements[i].value) + "&";

                break;
            case "textarea":
                str += formobj.elements[i].name +
                    "=" + encodeURI(formobj.elements[i].value) + "&";

                break;
            case "select-one":
                str += formobj.elements[i].name +
                    "=" + formobj.elements[i].options[formobj.elements[i].selectedIndex].value + "&";
                break;
            case "checkbox":
                if (formobj.elements[i].checked == true) {
                    str += formobj.elements[i].name +
                        "=" + formobj.elements[i].value + "&";
                }
                break;
        }
    }
    str = str.substr(0, (str.length - 1));
    return str;
}
//]]>








function delet(id) {
    document.getElementById(id).style.display = 'none';
}




function reload(url, id) {
    $(id).load(url, function () {
        //alert( "Load was performed." );
    });
}

$('.viewlink').hover(function () {
    var url = $(this).data('url');
    reload(url, '#viewportal');
});
//var mouseX;
//var mouseY;
//$(document).mousemove( function(e) {
//   mouseX = e.pageX; 
//   mouseY = e.pageY;
//});  
//$(".viewlink").mouseover(function(){
//  $('#viewportal').css({'top':mouseY,'left':mouseX}).fadeIn('slow');
//});
//$(".viewlink").mouseout(function(){
//  $('#viewportal').fadeOut('slow');
//});
// $(".viewlink").mouseout(function(){
//  $('#viewportal').fadeOut('slow');
//});   

//   function get_loax(url,value){
//    
//    url = url + value;
//  //  $('#mess').html(url);
//  
//     $('#mess').load( url);
//}
//
//
//
//
//        document.getElementById('load_reportx').addEventListener("click", function(event) {
//    (function(event) {
//        //'http://naserlap/qatra/?pg=impexp&eoe=1 #reportx'
//        var url = $('#load_reportx').data('url');
//       reload(url,'#reportx');
//    }).call(document.getElementById('click_me'), event);
//});

function hoverdiv(e, divid) {

    var left = e.clientX + "px";
    var top = e.clientY + "px";

    var div = document.getElementById(divid);

    div.style.left = left;
    div.style.top = top;

    $("#" + divid).toggle();
    return false;
}






function alert_msg(data, res, inside = 'body'){
    var boxclass = 'alertmsg'
    var boxid = makeid(8);
    
    var clasx = 'msg-info';
    if(res=='success')
        clasx = 'msg-sucess';
    
    if(res=='error')
        clasx = 'msg-error';


    if(inside !== 'body'){
        boxclass = 'alertmsg_form'
        xxx = '<div id="' + boxid + '" onclick=\"$(this).remove();\" class="' + boxclass + '">'+data+'</div>';

        $(inside).append(xxx);
        $('#'+boxid).addClass(clasx).fadeIn('slow').delay(8000).fadeOut("slow", function(){
            $('#'+boxid).remove();
        });
  
    }else{
        var xxx = '<div id="' + boxid + '" onclick=\"$(this).remove();\" class="alertmsg">'+data+'</div>';
        $('body').append(xxx);
        $('#'+boxid).addClass(clasx).fadeIn('slow').delay(8000).fadeOut("slow", function(){
            $('#'+boxid).remove();
        });
    }

   
   
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
 


$('#usermodalclick').click(function(e) {
    e.preventDefault()
    var target = $(this).data('target');
    $('#modalusers').modal({
        show: true, 
        backdrop: 'static',
        keyboard: true
     })
})


// $('#notifications').hover(function(){
//    // $(this).addClass('text-green');
//     $('#notifications i').removeClass('far').addClass('fas');
// }, function(){
//    // $(this).removeClass('text-green');
//     $('#notifications i').removeClass('fas').addClass('far');
// });


// $('#todolist').on('change','#in-todolist input[type="checkbox"]'
 $('body').on('click','[data-target="#Uni-modal"]',function(e) {
    $('#Uni-modal').find("#modal-content").load($(this).attr("href"), function() {
        $('#Uni-modal').find('.modal-title').addClass('text-center');
        $('#Uni-modal').modal('show');
        $('#Uni-modal').find('.modal-footer').append('<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">خروج</button>');
    });
});

function throttle(f, delay){
    var timer = null;
    return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function(){
            f.apply(context, args);
        },
        delay || 500);
    };
}

$('#myUserSearch').keyup(throttle(function(){
    var query = $(this).val();
    $( "#userlist" ).load( homeURL + "?pg=my&us=" + query + " #in-userlist" );
}, 1000));

$('#tic_progress').change(function(){
    $('#tic_progress_value').html($(this).val() + '%' );
    // var num = 'rgba(255,0,0,'+ ($(this).val()/100) +')';
    // console.log(num);
    // $(this).css('background-color', '#ff0000');

});

$('body').on('change','#todolist input[type="checkbox"]', function(event){
    //     var checkbox = $(this).find('[type="checkbox"]');
    console.log('changed');
    var $parent_label = $(this).parent('label');
     var taskid = $parent_label.attr('data-id');
    if(this.checked) {
        $parent_label.find('.todotitle').css('text-decoration','line-through').addClass('text-danger');
        $.post( homeURL + "?pg=todo&checked=1", { id: taskid })
        .done(function( data ) {
            $parent_label.append( "<span class='label label-success' id='removed'>" + data + "</span>" );
        });
    }else{
        $parent_label.find('.todotitle').removeClass('text-danger').css('text-decoration','');
        $.post( homeURL + "?pg=todo&checked=2", { id: taskid })
        .done(function( data ) {
            $parent_label.find('#removed').remove();
           
        });
    }
});

// $('#todolist').on('click','#in-todolist label', function(event){

//     var checkbox = $(this).find('[type="checkbox"]');
//     var taskid = $(this).attr('data-id');

//     if(checkbox.checked){
//         $(this).css('text-decoration','none').removeClass('text-danger');


//         // $(this).fadeOut(3000, function(){ 
//         //     $(this).remove();
//         // });
//     }else{

 
//         $(this).css('text-decoration','line-through').addClass('text-danger');
  
//     }
// });


function loadusergrouplist(){

    $(".usergroupList").each(function(){var $this = $(this); 

        var inputclass = $this.attr('class'); 
        var onlydata = $this.attr('data-only'); 
        if (typeof onlydata !== typeof undefined && onlydata !== false) {
            var url = homeURL + "?API=userList&only=" + onlydata; 
        } else {
            var url = homeURL + "?API=userList"; 
        }
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
}

$( document ).ajaxComplete(function( event, xhr, settings ) {
    loadusergrouplist();
    $('input[type=radio][name=lea_accepted]').on('change', function() {
        // $('input[name="lea_accepted"]').change(function() {
            console.log(this.value);
            if (this.value == '1') {
                $('#leave_reason').addClass('hidden');
            }
            else if (this.value == '0') {
                $('#leave_reason').removeClass('hidden');
            }
        });

});

$(document).ready(function () {
    $('.dropdown-toggle').dropdown();
    $('#notifications').load(homeURL + '/?pg=notlist&num=1');
    loadusergrouplist()
});

setInterval(function() {
    $('#notifications').load(homeURL + '/?pg=notlist&num=1');
}, 90 * 1000);

$('#notifications').click(function(){
    $('#not-list').load(homeURL + '/?pg=notlist');
});


$("body").on( "click", '.show-hider', function() {

    var ntbsoh = $(this).data('id');
        $(ntbsoh).toggleClass('hidden', function() {   });
   
});

$("body").one( "click", '#customer-info', function() {
    var cid = $(this).data('id');
    $('#customer-infobox').load(homeURL + '/?pg=customer&id=' + cid + ' #tablebox', function(responseTxt, statusTxt, xhr){
        // if(statusTxt == "success")
        //   $(this).attr('id','customer-info-loaded')
        if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
      });
});



//    //form Submit
//    $("body").on('change','#avatar',function(evt){	 
//       evt.preventDefault();
//       var formData = new FormData($(this)[0]);
//    $.ajax({
//        url: 'fileUpload',
//        type: 'POST',
//        data: formData,
//        async: false,
//        cache: false,
//        contentType: false,
//        enctype: 'multipart/form-data',
//        processData: false,
//        success: function (response) {
//          alert(response);
//        }
//    });
//    return false;
//  });


 $('body').on("change","#user-avatar", function (e) {
    var file = $(this)[0].files[0];
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()

    // execute upload
    upload.doUpload('#avatarh');
    console.log('onchagne');
});


var Upload = function (file) {
    this.file = file;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function (inputval) {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);
    console.log('upload');
    $.ajax({
        type: "POST",
        url: homeURL + "?pg=file",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
            $(inputval).val(data);
        },
        error: function (error) {
            $(inputval).val(error);
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    $(progress_bar_id + " .status").text(percent + "%");
};



//customers 

$('#tic_cid').blur(function() {
    var valx = $('#tic_cid').val();
    var $this = $('#tic_cid');
    if(valx){
        $('#sidebarbox').load(homeURL + '/?pg=customer&cid=' + valx + ' #main-content', function(responseTxt, statusTxt, xhr){
            if(!responseTxt){
                alert('مشتری یافت نشد.');
            }
            $this.parent()[0].addClass('has-success');
            if(statusTxt == "error")
              alert("Error: " + xhr.status + ": " + xhr.statusText);
          });
    }
  });