<?php    
exit();
ob_start();
addjs(DATA_CORE_PATH."/js/def/js.js?url=".HOME);
//addcss(DATA_CORE_PATH."/js/def/css.css?ver=24");
// Connect to the database
global $dbase;
$tbl = TBL_PIX.'comments_oy';
$id_post = (isset($_GET['pid']) ? $_GET['pid'] : "1"); //the post or the page id
 
 $query = "SELECT * FROM {$tbl} WHERE com_id_post = '$id_post' order by com_id DESC";
  $nums = $dbase->num_rows($query);
if(is_get('loadposts')){?>
    
        <?php 
        if(!isset($_SESSION['limcom']) OR !empty($_SESSION['limcom']))
            $_SESSION['limcom'] = 20;

        
         $lim = " LIMIT ".$_SESSION['limcom'];
    $sql =$dbase->query($query.$lim);
    
    while($affcom = mysqli_fetch_assoc($sql)){ 
        
        $com_id = $affcom['com_id'];
        $name = $affcom['com_name'];
        $email = $affcom['com_email'];
        $comment = $affcom['com_comment'];
        $date = $affcom['com_time'];

        // Get gravatar Image 
        // https://fr.gravatar.com/site/implement/images/php/
        $default = "mm";
        $size = 35;
        if(is_numeric($name)){
            $grav_url = user_photo($name);
            $name = user_name_ex($name);
             
        }else{
            $grav_url = "https://www.gravatar.com/avatar/".md5(strtolower(trim($email)))."?d=".$default."&s=".$size;
        }

    ?>
    <div class="cmt-cnt">
        <img  src="<?php echo $grav_url; ?>" />
        <div class="thecom ">
            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            
            <?php 
            if(is_arabic($comment))
                $dir = 'lang_rtl';
            else
                $dir = 'lang_ltr';
            
            ?>
            
            <p class="commentpost <?php echo $dir ?>">
               <?php echo nl2br($comment); ?>
          
            </p>
            <span class="Pull-right"><?php echo like_btn('comm-' . $com_id, 'comment') ?></span>
        </div>
    </div>

    
    <?php } ?>  
    
        
    
<?php


}elseif(is_get('limadd')){
    
    $_SESSION['limcom'] = ($_SESSION['limcom'] + 10);
    //echo $_SESSION['limcom'];
    $rem = ($nums - $_SESSION['limcom']);
    if($rem < 1)
        echo g_lbl('nomorecomment');
    else
        echo $rem.' '.  g_lbl('morecomment');
}elseif(is_get('add')){
   ob_start();
extract($_POST);
if($_POST['act'] == 'add-com'):
   if(is_loggedin()){
    $db['com_name'] = user_uid();
    $db['com_email'] = user_uid();  
   }else{
    $db['com_name'] = htmlentities($name);
    $db['com_email'] = htmlentities($email);
   }
    $db['com_comment'] = htmlentities($comment);
    $db['com_id_post'] = htmlentities($id_post);
    $db['com_private'] = is_post('comprivate');
        
        if($dbase->RowInsert($tbl,$db))
                echo 'success';


 endif;



}elseif(is_get('count')){



$max['num']  = $nums;
//echo json_encode($max);
ob_clean();
header('Content-type: text/json; charset=utf-8');
echo json_encode($max);

}else{
    
   
  
    
   ob_start();

  // code 

  
?>
<!DOCTYPE html>
<html lang="<?php echo get_lang() ?>">
    <head>
        <meta charset="utf-8" />
        <title>ooyta-Comments</title>
        <link type="text/css" rel="stylesheet" href="<?php theme_al_path() ?>/com/style.css?v=6">
        <script type="text/javascript" src="<?php echo DATA_CORE_PATH."/js/jquery-1.11.3.min.js" ?>"></script>
        <?php //  load_css(); ?>

    </head>
    <body class="<?php echo g_lbl('dir'); ?>">
       
       

<?php 

//echo $id_post;

 $date = date("Y-m-d h:i:s", (time())) ;
?>
        <div class="cmt-container <?php echo g_lbl('otherside').' '.  g_lbl('dir').''.  g_lbl('txt-al'); ?>" >
             <h1>ارسال نظر</h1>
<!--         <div class="new-com-bt">
        <span><?php echo g_lbl('writecomment'); ?></span>
    </div>-->
<div id="errorbox"></div>
    <?php if(is_loggedin()){ ?>
    
    
       <div class="new-com-cnt cmt-cnt">
          
        <div class="thecom">
             <img class="<?php echo g_lbl('otherside'); ?>" src="<?php user_avatar_crop(user_uid(),35);// user_avatar(); ?>" />

            <p> <textarea id="name-com" class="the-new-com <?php echo g_lbl('txt-al'); ?>"></textarea></p>
            
            <span class="<?php echo g_lbl('rightside'); ?>">
            

            <span class="<?php echo g_lbl('rightside'); ?>">
                <div  class="bt-add-com"><?php echo g_lbl('postcomment'); ?></div>
                <input checked id="entertosend" type="checkbox" value="1" /><?php echo g_lbl('entertosend'); ?>
            </span>
            </span>
        </div>
    </div><!-- end "cmt-cnt" -->
    
    
    
    <?php }else{?>

 <div class="new-com-cnt">
     <input type="text" id="name-com" name="name-com" value="" placeholder="<?php echo g_lbl('yourname'); ?>" />
        <input type="email" id="mail-com" name="mail-com" value="" placeholder="<?php echo g_lbl('youremail'); ?>" />
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com"><?php echo g_lbl('postcomment'); ?></div>
         <input checked id="entertosend" type="checkbox" value="1" /> <?php echo g_lbl('entertosend'); ?>

    </div>


 <?Php }?>
     <span class="afterthis2"></span>
    <span class="afterthis"></span>
       <div class="clear"></div>   
        


       <input value="<?php echo $nums ?>" type="hidden" id="msgcount" />

   <?php 
   
   $numxxx = ($nums - $_SESSION['limcom']);
   
   if($numxxx > 0){ ?>
   
  <div id="limadd" class="rem-btn">
          <?php echo $numxxx.' '.g_lbl('morecomment'); ?>
    </div>
       
   <?php } ?>
</div><!-- end of comments container "cmt-container" -->


<script type="text/javascript">
   $(function(){ 
       $( ".afterthis" ).load( "<?Php echo HOME.'?API=oy_comment&loadposts=1&pid='.$id_post ?>" );
        
       
        $('#limadd').click(function(event){  
            var vall = $(this).html();
            if(vall != '<?php echo g_lbl('nomorecomment'); ?>'){
             $( ".rem-btn" ).load( "<?Php echo HOME.'?API=oy_comment&limadd=1&pid='.$id_post ?>" , function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success"){
                    $( ".afterthis" ).load( "<?Php echo HOME.'?API=oy_comment&loadposts=1&pid='.$id_post ?>" );
                    console.log( "working" );
                }
                if(statusTxt == "error")
                    console.log("Error: " + xhr.status + ": " + xhr.statusText);
            });
              
         }else{
             $(this).hide();
         }
        });
        
        

       
        
  setInterval(function(){
      
 $.getJSON( "<?Php echo HOME.'?API=oy_comment&count=1&pid='.$id_post ?>", function( json ) {
     var data = json.num;
     var data2 = $("#msgcount").val();
     // console.log( "text: " + data2 + " | json:" + data);
     if(data!=data2){
          $( ".afterthis" ).load( "<?Php echo HOME.'?API=oy_comment&loadposts=1&pid='.$id_post ?>" );
         console.log( "Update: " + json.num );
          $("#msgcount").val(data);
     }
  
 });
}, 900);
        
        $(".the-new-com").keypress(function(e) {
    if(e.which == 13) {
        if ($('input#entertosend').is(':checked')) {
        $( ".bt-add-com" ).trigger( "click" );
            }
    }
});
        
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });
        
       

        /* on clic  on the cancel button */
//        $('.bt-cancel-com').click(function(){
//            $('.the-new-com').val('');
//            $('.new-com-cnt').fadeOut('fast', function(){
//                $('.new-com-bt').fadeIn('fast');
//            });
//        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');
            var Errorbox = $('#errorbox');
            
            if(theCom.val()<?php  echo (is_loggedin()  ? '' : ' && theName.val() && validateEmail(theMail.val())')  ?>){ 
                $.ajax({
                    type: "POST",
                    url: "<?Php echo HOME.'?API=oy_comment&add=1'?>",
                    data: 'act=add-com&id_post='+'<?php echo $id_post; ?>'+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                    success: function(html){
                        
                        if(html=='success'){
                            theCom.val('');
                            theCom.focus();
                             Errorbox.html('');
                            $( ".afterthis" ).load( "<?Php echo HOME.'?API=oy_comment&loadposts=1&pid='.$id_post ?>" );
                        }  
                     }  
                });
            }else{
            
                    if(!theCom.val()){
                     Errorbox.html('<?php echo g_lbl('needtowriteacomment') ?>'); 
                      theCom.focus();
                     }
                     
                     <?php if(!is_loggedin()){ ?>
                     else if(!theName.val()){
                     Errorbox.html('<?php echo g_lbl('needyourname') ?>');
                     theName.focus();
                 }
                    else if(!validateEmail(theMail.val())){
                        Errorbox.html('<?php echo g_lbl('needyouremail') ?>');
                         theMail.val('');
                        theMail.focus();
                    }
                     <?php } ?>
                     
            }
        });

    });
    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
  
</script>
<?php load_js(); ?>
</body>
</html>

<?php } ?>
