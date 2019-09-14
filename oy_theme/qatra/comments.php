<?php 
$tbl = 'sob_comments_oy';
global $dbase;
$comment_path = md5(is_get('pg').is_get('id')); ?>

<div id="posted-comments" class="">
    <div id="comments">
    <?php 

$comments = $dbase->tbl2array2($tbl, '*', "WHERE com_id_post='".$comment_path."'");
foreach($comments as $comment){

?>
<div class="well">
<strong><?php echo user_name_ex($comment['com_uid']); ?></strong>: <hr class="smallhr">
<?php echo nl2br($comment['com_comment']);?>
</div>
<hr>
<?php } ?>
</div>

</div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <span class="collapsed" role="button" >
         درج پاسخ
</span>
      </h4>
    </div>

      <div class="panel-body">
      <form ajaxform reset  
      data-source="<?php echo get_current_url(); ?> #comments" 
        data-selector="#posted-comments" 
      method="post" action="<?php echo HOME ?>?pg=comment&id=<?php echo $comment_path; ?>" name="add-comment"  id="add-comments">

      
      <div class="modal-body">
    

            <label for="com_comment" class="control-label"> متن :</label>
  
            <textarea name="com_comment" class="form-control autogrow" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm"  type="submit">بستن تکت</button>
      </div>
    </form>
    
    </div>
  </div>