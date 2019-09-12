
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
      






          <div class="well">
            <h4>لیست اعضا گروپ <?php e_lbl($group_label); ?></h4>
            <form  method="post" reset 
            data-source="<?php echo HOME ?>?pg=group&id=<?php echo $group_id; ?> #usertable" 
            data-selector="#GroupUserList" action="<?php echo HOME ?>?pg=group&gid=<?php echo $group_id; ?>" ajaxform name="add"  id="currency_id" lang="fa">
   نام کاربر:

    <select required name="uid">
<?php
  $users =  get_userList();
  foreach ($users as $user) {
      echo '<option value="'.$user['sob_id'].'">'.$user['sob_name'].'</option>';
  }
?>
</select>    
      <input class="btn btn-success btn-sm " id="load_reportx" type="submit" name="Send" value="<?php echo g_lbl('add') ?>">


</form>
<br>
<a class="btn btn-info pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?>">ارسال پیام به گروپ</a>

<a class="btn btn-danger pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?>">تعیین وظیفه</a>
        <hr>
  
  
 
  
  
    <div id="GroupUserList" >

<?php
global $dbase;
$type= $group_id;
$result = $dbase->query("SELECT * FROM sob_ugroups where ugr_gid='{$type}' ORDER BY ugr_id DESC LIMIT 60");?>
	<table class="table" id="usertable">





	<?php
while ($row = $dbase->fetch_array($result)) {

    ?>

  <tr>
    <td width="140px text-left">
    <input data-source="<?php echo HOME ?>?pg=group&id=<?php echo $group_id; ?> #usertable" 
    data-selector="#reportx" class="btn btn-danger btn-sm btn-ajax" 
    url="<?php echo HOME ?>?pg=group&did=<?php echo $row['ugr_id'] ?>" 
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