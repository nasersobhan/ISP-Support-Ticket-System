function cascadeSelect(parent, child){
				var childOptions = child.find('option:not(.static)');
					child.data('options',childOptions);
 
 
 
 
 
				parent.change(function(){
					childOptions.remove();
					child.find('option').remove();
					$.ajax({
						url: homeURL + '/?API=cities',
						type:'POST',
						data: 'action=' + this.value,
						dataType: 'json',
						success: function( json ) {
							$.each(json, function(i, value) {
								child.append($('<option>').text(value.local_name).attr('value', value.id)).change();;
							});
						}
					});
					
					
					child.removeAttr('disabled')
					
					////child
						//.append(child.data('options').filter('.parent_' + this.value))
					//	.change();
				})
 
				childOptions.not('.static, .parent_' + parent.val()).remove();
 
		};

function cascadeCity(parent, child){
				var childOptions = child.find('option:not(.static)');
					child.data('options',childOptions);
 
				parent.change(function(){
					childOptions.remove();
					child.find('option').remove();
					$.ajax({
						url:'https://d.ooyta.com/?API=cate',
						type:'POST',
						data: 'con=' + this.value,
						dataType: 'json',
						success: function( json ) {
							$.each(json, function(i, value) {
								child.append($('<option>').text(value.local_name).attr('value', value.id)).change();;
							});
						}
					});
					
					
					child.removeAttr('disabled')
					
					////child
						//.append(child.data('options').filter('.parent_' + this.value))
					//	.change();
				})
 
				//childOptions.not('.static, .parent_' + parent.val()).remove();
 
		};
function cascadecat(parent, child){
				var childOptions = child.find('option:not(.static)');
					child.data('options',childOptions);

                                        var type = parent.attr('d-t');
                                           var lang = parent.attr('l-d');  
var ulrx = 'https://d.ooyta.com/?API=cate&type='+type+'&lang='+lang;
console.log(ulrx);
				parent.change(function(){
					
					$.ajax({
						url: ulrx,
						type:'POST',
						data: 'action=' + this.value+'&type='+type+'&lang='+lang,
						dataType: 'json',
						success: function( json ) {
                                                    childOptions.remove();
                                                    child.find('option').remove();
							$.each(json, function(i, value) {
								child.append($('<option>').text(value.cat_name).attr('value', value.cat_id)).change();
							});
						}
					});
					
					
					child.removeAttr('disabled')
					
					////child
//						.append(child.data('options').filter('.parent_' + this.value))
//						.change();
				})
 
				//childOptions.not('.static, .pt_' + parent.val()).remove();
 
		};

//toconvert opacity
function convertHex(hex,opacity){
    hex = hex.replace('#','');
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);
    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
    return result;
}


function addNumbers(sox,num1,num2,tot)
                {
                        var val1 = document.getElementById(num1).value;
                        var val2 = document.getElementById(num2).value;
                        var ansD = document.getElementById(tot);
						if(sox=='/')
                        ansD.value = val1 / val2;
						if(sox=='*')
						ansD.value = val1 * val2;
						ansD.value = Math.round(parseFloat(ansD.value))
                }



function validate(field_name, field_value, num){
	var numbers = /^[0-9-.]+$/;
	
	if(num=='num'){
		if (field_value == null || field_value == "" || !field_value.match(numbers))
    	{
			document.getElementById(field_name).value="";
			document.getElementById(field_name).focus();
			 document.getElementById( field_name).placeholder = 'لطفا فیلد را با عدد پر کنید.';
    	}else{
			document.getElementById(field_name).placeholder = '';
			}
		
		}else{
		
		if (field_value == null || field_value == "")
    	{
			document.getElementById(field_name).value="";
			document.getElementById(field_name).focus();
			 document.getElementById(field_name).placeholder = 'لطفا فیلد را پر کنید.';
    	}else{
			document.getElementById(field_name).placeholder = '';
			}
		}
	
}



function allnumeric(uzip)  
{   

var numbers = /^[0-9]+$/;  
if(uzip.value.match(numbers))  
{  
return true;  
}  
else  
{  
alert('ZIP code must have numeric characters only');  
uzip.focus();  
return false;  
}  
}




//<![CDATA[
var div = "result_mess";
var loadingmessage = "<p  class='bg-danger pd7'><i class='fa fa-spinner fa-spin'></i> Loading</p>";
function Ajaxrequest(){
    var xmlHttp;
    try{
        // Firefox, Opera 8.0+, Safari    
        xmlHttp=new XMLHttpRequest();
        return xmlHttp;
        }
        catch (e){
            try{
                // Internet Explorer    
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
                return xmlHttp;
                }
                catch (e){
                    try{
                        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                        return xmlHttp;
                        }
                        catch (e){
                            alert("مرورگر شما از آژاکس پشتیبانی نمی کند!");
                            return false;
            }
        }
    }
}


function formget(form, url) {
    var poststr = getFormValues(form);
    postData(url, poststr);
}
function postData(url, parameters){
    var xmlHttp = Ajaxrequest();
    xmlHttp.onreadystatechange =  function(){
        if(xmlHttp.readyState > 0 && xmlHttp.readyState < 4){
            document.getElementById(div).innerHTML=loadingmessage;
            }
            if (xmlHttp.readyState == 4) {
                document.getElementById(div).innerHTML=xmlHttp.responseText;
				
                }
                }
                xmlHttp.open("POST", url, true);
				xmlHttp.setRequestHeader("charset", "utf-8");
                xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlHttp.setRequestHeader("Content-length", parameters.length);
                xmlHttp.setRequestHeader("Connection", "close");
                xmlHttp.send(parameters);
}
function getFormValues(formobj)
{
    var str = "";
    var valueArr = null;
    var val = "";
    var cmd = "";
    for(var i = 0;i < formobj.elements.length;i++)
    {
        switch(formobj.elements[i].type)
        {
            case "text":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
			break;
			case "date":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
			break;
			case "password":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
			break;
			case "email":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
            break;
            case "textarea":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
            break;
			case "select-op":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
            break;
			case "select-one":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
			 break;
			case "select-multiple":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
			 break;
            case "radio":
            str += formobj.elements[i].name +
            "=" + formobj.elements[i].options[formobj.elements[i].selectedIndex].value + "&";
            break;
            case "checkbox":
            if(formobj.elements[i].checked == true){
                str += formobj.elements[i].name +
                "=" + formobj.elements[i].value + "&";
            }
            break;
            }
        }
		
		
		
		
str = str.substr(0,(str.length - 1));
return str;
}




function frmval(field_name){


var index;

for (index = 0; index < field_name.length; ++index) {
	
	
field_value = document.getElementById(field_name[index]).value;
		if (field_value == null || field_value == "")
    		 {
			 document.getElementById(field_name[index]).value="";
			 document.getElementById(field_name[index]).focus();
			 document.getElementById( field_name[index]).placeholder = 'Please fill this filed.';
			 return false;
    	}else{
			 document.getElementById(field_name[index]).placeholder = '';
			 }
    
}
			
return true;
}



	function autopass(cid){
									var randomstring = Math.random().toString(36).slice(-12);
									 document.getElementById(cid).value=randomstring;
									
									}
//]]>






 //$('[type=date]').pikaday();
 
 

//$('requrid').pikaday();

$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$('input[required]').focusout(function() {
   //  if($(this).hasAttr('required')) {
        if(!$(this).val()){
             $(this).focus();

            // $(this).parent().removeClass("has-success");
            // $(this).parent().addClass('has-error');
             $(this).addClass("form-control-danger");
            $(this).parent().addClass("has-danger");
             $(this).attr("placeholder", " * Please Fill this input");
          
         }else{
            $(this).parent().removeClass("has-success");
              $(this).removeClass("form-control-danger");
              
                $(this).parent().removeClass("has-danger");
                $(this).parent().addClass("has-success");
           // $(this).css('border-color','');
          //   $(this).parent().addClass('has-success');
           $(this).addClass('form-control-success');
         }
   //  }
    
  });




$(function(){

    $( "form" ).submit(function( event ) {
       // var valid = true;
//alert( "Handler for .submit() called." );
 // event.preventDefault();
        $(this).find('input[required]').each(function(){
           // if($(this).hasAttr('required')) {
                if(!$(this).val()){
                    // $(this).addClass("reqinput");
                    $(this).addClass('form-control-danger');
                    //$(this).focus();
                   // $(this).css('border-color','c00');
                     // $(this).attr("class", "reqinput");
                    // $(this).attr("placeholder", "Please Fill this as it's required");
                   //  valid = false;
                    event.preventDefault();

                 }else{
                   //   valid = true;
                   $(this).removeClass("form-control-danger");
                     $(this).addClass('form-control-success');
                 }
      

    });
      //  return valid; 

    });
});

/*
 * 
 * 
 * function validateContact() {
	var valid = true;
	$("#frmContact input[required=true], #frmContact textarea[required=true]").each(function(){
		$(this).removeClass('invalid');
		$(this).attr('title','');
		if(!$(this).val()){ 
			$(this).addClass('invalid');
			$(this).attr('title','This field is required');
			valid = false;
		}
		if($(this).attr("type")=="email" && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
			$(this).addClass('invalid');
			$(this).attr('title','Enter valid email');
			valid = false;
		}  
	}); 
	return valid;
}
 */
 //wideArea();






$(document).ready(function(){
    


   





$(".e-val").blur(function() 
{
    
    
    
 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
 var emailaddress = $(this).val();
 if(!emailReg.test(emailaddress)) {
     $(this).focus();
     $(this).closest( ".has-feedback" ).addClass('has-error');
    $(this).closest( ".has-feedback" ).removeClass('has-success');
 
   $(this).parent().next( "span.glyphicon" ).addClass('glyphicon-remove');
    $(this).parent().next( "span.glyphicon" ).removeClass('glyphicon-ok');
}else{
  
    $(this).closest( ".has-feedback" ).removeClass('has-error');
    $(this).closest( ".has-feedback" ).addClass('has-success');
        $(this).parent().next( "span.glyphicon" ).removeClass('glyphicon-remove');
    $(this).parent().next( "span.glyphicon" ).addClass('glyphicon-ok');
 }

});





});
   

    
   $( ".autogrow" ).each(function(index) { 
       $(this).on("keyup", function(){
       
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
            $(this).height($(this).height()+5);
        };
});
       
   });
  
   