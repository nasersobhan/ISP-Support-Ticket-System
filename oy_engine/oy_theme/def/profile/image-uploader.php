<?php get_header() ?>
  
  <section id="profile_main">
<div class="section-content">
<div class="wrap">

  <div  class="container">
    <div  class="form-wrap" >

<div class="container-fluid">
  <div class="row">
   <div class="col-xs-6 col-md-3">
   
  <?php get_sidebar() ?>
   
   
   
   </div>
   <div class="col-xs-12 col-md-9">
   				 <div  style="height:auto; border: 1px #ddd solid;-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px; padding:15px 30px; ">
<h3>Edit Profile Info</h3>





    <div class="container-fluid eg-container" id="basic-example">
    <div class="row eg-main">
      <div class="col-xs-12 col-sm-9">
        <div class="eg-wrapper col-xs-12">
          <img class="cropper" src="<?php global $user; echo $user->get_avatar_url() ?>" alt="Picture">
        </div>
      </div><br>

      <div class="col-xs-12 col-sm-3">
        <div class="eg-preview clearfix">
          <div class="preview preview-lg"></div>
          <div class="preview preview-md"></div>
          <div class="preview preview-sm"></div>
          <div class="preview preview-xs"></div>
        </div>
        <!--<div class="eg-data">
          <div class="input-group">
            <span class="input-group-addon">X</span>
            <input class="form-control" id="dataX" type="text" placeholder="x">
            <span class="input-group-addon">px</span>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Y</span>
            <input class="form-control" id="dataY" type="text" placeholder="y">
            <span class="input-group-addon">px</span>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Width</span>
            <input class="form-control" id="dataWidth" type="text" placeholder="width">
            <span class="input-group-addon">px</span>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Height</span>
            <input class="form-control" id="dataHeight" type="text" placeholder="height">
            <span class="input-group-addon">px</span>
          </div>-->
          <!-- <div class="input-group">
            <span class="input-group-addon">Rotate</span>
            <input class="form-control" id="dataRotate" type="text" placeholder="rotate">
            <span class="input-group-addon">deg</span>
          </div> -->
        </div>
      </div>
    </div>
    <div class="clearfix">
      <div class="eg-button">
        <button class="btn btn-warning" id="reset" type="button">Reset</button>
        <button class="btn  btn-warning" id="reset2" type="button">Reset (deep)</button>
        <button class="btn btn-primary" id="clear" type="button">Clear</button>
        <button class="btn btn-danger" id="destroy" type="button">Destroy</button>
        <button class="btn btn-success" id="enable" type="button">Enable</button>
        <button class="btn btn-warning" id="disable" type="button">Disable</button>
        <button class="btn btn-info" id="zoomIn" type="button">Zoom In</button>
        <button class="btn btn-info" id="zoomOut" type="button">Zoom Out</button>
        <button class="btn btn-info" id="rotateLeft" type="button">Rotate Left</button>
        <button class="btn btn-info" id="rotateRight" type="button">Rotate Right</button>
        <button class="btn btn-primary" id="setData" type="button">Set Data</button>
      </div>
      <div class="row eg-input">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-info" id="getData" type="button">Get Data</button>
            </span>
            <input class="form-control" id="showData" type="text">
            <span class="input-group-btn">
              <button class="btn btn-info" id="getData2" type="button">Get Data (Rounded)</button>
            </span>
          </div>
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-info" id="getImageData" type="button">Get Image Data</button>
            </span>
            <input class="form-control" id="showImageData" type="text">
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-primary" id="replace" type="button">Replace</button>
              
                <form id="imageform" method="post" enctype="multipart/form-data" action='<?php get_page_url('profile') ?>&option=avatar'>
              <div class="fileUpload btn btn-primary">
    <span>Upload</span>
    <input type="file" class="upload" name='photoimg' id="photoimg" />
</div><div id='imageloadstatus' style='display:none'><img id="avatarimg" src="<?php getd_img('loader.gif') ?>" alt="Uploading...."/> </div>
</form>



            </span>
            <input class="form-control" id="replaceWith" type="text" value="<?php get_upload_path() ?>temp/img/picture-2.jpg">
            
            
            <div id="result"></div>
          </div>
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-primary" id="setAspectRatio" type="button">Set Aspect Ratio</button>
            </span>
            <input class="form-control" id="aspectRatio" type="text" value="auto">
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-primary" id="zoom" type="button">Zoom</button>
            </span>
            <input class="form-control" id="zoomWith" type="number" value="0.5">
          </div>
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-primary" id="rotate" type="button">Rotate</button>
            </span>
            <input class="form-control" id="rotateWith" type="number" value="45">
          </div>
        </div>
      </div>

      <div class="row eg-output">
        <div class="col-md-12">
          <button class="btn btn-primary" id="getDataURL" type="button">Get Data URL</button>
          <button class="btn btn-primary" id="getDataURL2" type="button">Get Data URL (JPG)</button>
          <button class="btn btn-primary" id="getDataURL3" type="button">Get Data URL (160*90)</button>
        </div>
        <div class="col-md-6">
          <textarea class="form-control" id="dataURL" rows="10"></textarea>
        </div>
        <div class="col-md-6">
          <div id="showDataURL"></div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
 <?php  load_js(); ?>
<!-- js library -->

<!--<script src="<?php theme_path() ?>/Authenty_files/jquery.icheck.min.js"></script>-->
<script src="<?php theme_path() ?>/Authenty_files/waypoints.min.js"></script>

<!-- authenty js -->
<!--/*<script src="<?php theme_path() ?>/Authenty_files/authenty.js"></script>*/-->
<!--<script src="<?php theme_path() ?>/Authenty_files/init.js"></script>-->

<!-- preview scripts -->
<script>
		

		
			(function($) {
				
				
				






	
				
				
				
				
				
				
				
				
				$('#signIn_1').click(function (e) {  
	   
			var username = $.trim($('#un_1').val());
	    var password = $.trim($('#pw_1').val());

	    if ( username === '' || password === '' ) {
    /*    $('#form_1 .fa-user').removeClass('success').addClass('fail');*/
				$('#form_1').addClass('fail');
	    } else {
	   		/*$('#form_1 .fa-user').removeClass('fail').addClass('success');*/
				$('#form_1').removeClass('fail').removeClass('animated');
				return false;
	    }
	});
				
				
				
				
				
				
				
				// set focus on input
				var firstInput = $('section').find('input[type=text], input[type=email]').filter(':visible:first');
        
				if (firstInput != null) {
            firstInput.focus();
        }
				
				$('section').waypoint(function (direction) {
					var target = $(this).find('input[type=text], input[type=email]').filter(':visible:first');
					target.focus();
				}, {
	          offset: 300
	      }).waypoint(function (direction) {
					var target = $(this).find('input[type=text], input[type=email]').filter(':visible:first');
			  	target.focus();
	      }, {
	          offset: -400
	      });
				
				
				// animation handler
				$('[data-animation-delay]').each(function () {
	          var animationDelay = $(this).data("animation-delay");
	          $(this).css({
	              "-webkit-animation-delay": animationDelay,
	              "-moz-animation-delay": animationDelay,
	              "-o-animation-delay": animationDelay,
	              "-ms-animation-delay": animationDelay,
	              "animation-delay": animationDelay
	          });
	      });
				
	      $('[data-animation]').waypoint(function (direction) {
	          if (direction == "down") {
	              $(this).addClass("animated " + $(this).data("animation"));
	          }
	      }, {
	          offset: '90%'
	      }).waypoint(function (direction) {
	          if (direction == "up") {
	              $(this).removeClass("animated " + $(this).data("animation"));
	          }
	      }, {
	          offset: '100%'
	      });
			
			})(jQuery);
		</script>

</body>
</html>