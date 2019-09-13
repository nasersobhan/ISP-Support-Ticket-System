
<?php get_header();

$group_id = is_get('id');
$group_label = get_cate_name($group_id);
 ?>
<div class="content-box">
<div class="panel panel-default" >
        <div class="panel-heading "><h3>تیم: <?php e_lbl($group_label); ?></h3></div>
        <div class="panel-body ">  
<div id="groupbody" class="col-md-8">
<?php theme_include('groups/home'); ?>
</div>
    <div class="col-md-4">
      



<div class="row well">
<a class="btn btn-info pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?>">ارسال پیام به گروپ</a>

<a class="btn btn-danger pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?>">تعیین وظیفه</a>
</div>
<hr>
   


          <div class="well">
            <h4> اعضا گروپ <?php e_lbl($group_label); ?></h4>
            <form  method="post" ajaxform reset name="addusertogroup"  id="addusertogroup" class="form-inline"
            data-source="<?php echo HOME ?>?pg=groups&id=<?php echo $group_id; ?> #usertable" 
            data-selector="#GroupUserList" action="<?php echo HOME ?>?pg=groups&gid=<?php echo $group_id; ?>">
            <div class="form-group col-md-8">
<label for="username" class="col-md-4 control-label"> کابر جدید :</label>
<input data-only="u" class="form-control col-md-8 input-sm usergroupList" required type="text" id="username" name="uid">
</div>
<div class="col-md-4">
<button class="btn btn-success btn-sm btn-block" id="adduser" type="submit" ><?php echo g_lbl('add') ?></button>
</div>
</form>
<br><br><br><br>
  
  
    <div id="GroupUserList" >
    <table class="table" id="usertable">
<?php
global $dbase;
$type= $group_id;
$result = $dbase->query("SELECT * FROM sob_ugroups where ugr_gid='{$type}' ORDER BY ugr_id DESC LIMIT 60");?>


	<?php
while ($row = $dbase->fetch_array($result)) {

    ?>

  <tr>
    <td width="140px text-left">
    <input data-source="<?php echo HOME ?>?pg=groups&id=<?php echo $group_id; ?> #usertable" 
    data-selector="#reportx" class="btn btn-danger btn-sm btn-ajax" 
    url="<?php echo HOME ?>?pg=groups&did=<?php echo $row['ugr_id'] ?>" 
    type="button" confmsg="آیا مطمئن هستید این شخص را ازگروپ حذف میکنید؟" 
    name="Send" value="x">
    <?php echo user_name_ex($row['ugr_userid']) ?>
    <a alt="ارسال پیام خصوصی" title="ارسال پیام خصوصی" href="<?php echo HOME.'?pg=inbox&toid=u:'.$row['ugr_userid']; ?>" class="tip"><i class="far fa-paper-plane"></i></a>
    </td>



  </tr>



<?php
}
?>


</table>
</div>
</div>
<hr/>

<div class="well">
<?php theme_include('groups/add-task'); ?>
     </div>
</div>

</div>


    

<?php get_footer() ?>