
<?php get_header();

$group_id = is_get('id');
$group_label = get_cate_name($group_id);
 ?>
<div class="content-box">
<div class="panel panel-default" >
        <div class="panel-heading "><h4>تیم: <?php echo ($group_label); ?></h4></div>
        <div class="panel-body ">  




        <div class="col-md-4">


        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="<?Php echo HOME.'?pg=todo'; ?>">
                     کارهای قابل اجرا
                    </a>
                </h4>
                </div>
       
                <div id="todolist" class="list-group">
                <div id="in-todolist">
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_status=0 AND tod_groupshare = ".$group_id." ORDER BY tod_level,tod_id DESC LIMIT 15");

                    foreach($rows as $row){
                        echo '<label data-id="' . $row['tod_id'] . '" id="todo' . $row['tod_id'] . '" class="list-group-item">
                        <input type="checkbox" value="option1"> <span class="todotitle">'.$row['tod_title'].'</span>
                      </label>';
                    } 
                    ?>
                </div>
                </div>

                <div class ="panel-footer text-center ">
                <form method="post" action="<?php echo HOME ?>?pg=todo&add=go" 
                    noreturn
                    data-source="<?php echo get_current_url(); ?> #in-todolist" 
                    data-selector="#todolist" 
                    ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="addtodolist">
                    <div class="input-group col-md-12">
                    <input name="group" type="hidden" value="<?php echo $group_id ?>" />
                    <input placeholder="ایجاد جدید..." type="text" name="title" id="title" class="form-control input-sm" > 
                   
                    </div>

                    </form>
                </div>
              </div>
              </div>
              </div>


<div id="groupbody" class="col-md-5">
<?php theme_include('groups/home'); ?>
</div>
    <div class="col-md-3">
      



<div class="row well">
<a class="btn btn-info pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?> #addbox" data-toggle="modal" data-target="#Uni-modal" >ارسال پیام به گروپ</a>

<!-- <a class="btn btn-danger pull-right btn-block" href="<?php echo HOME.'?pg=inbox&toid=g:'.$group_id; ?>">تعیین وظیفه</a> -->
</div>
<hr>
   


          <div class="well">
          
            <form  method="post" ajaxform reset name="addusertogroup"  id="addusertogroup" class="form-inline"
            data-source="<?php echo HOME ?>?pg=groups&id=<?php echo $group_id; ?> #usertable" 
            data-selector="#GroupUserList" action="<?php echo HOME ?>?pg=groups&gid=<?php echo $group_id; ?>">

            <label for="username" class="col-md-12 control-label"> کابر جدید :</label> 

            <div class="input-group">
            <input data-only="u" required class="form-control col-md-7 input-sm usergroupList" required type="text" id="username" name="uid">
<span class="input-group-btn">
<button class="btn-sm btn btn-primary" type="submit" type="button"> + </button>
</span>
</div>

            <!-- <div class="form-group col-md-12">
<label for="username" class="col-md-12 control-label"> کابر جدید :</label> 
<input data-only="u" class="form-control col-md-7 input-sm usergroupList" required type="text" id="username" name="uid">
<div class="col-md-1"><button class="btn btn-success btn-sm btn-block" id="adduser" type="submit" >+</button></div>
</div> -->



</form>

  
<h4> اعضا گروپ <?php e_lbl($group_label); ?></h4>
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
    <a alt="ارسال پیام خصوصی" title="ارسال پیام خصوصی" href="<?php echo HOME.'?pg=inbox&toid=u:'.$row['ugr_userid']; ?> #addbox" data-toggle="modal" data-target="#Uni-modal" class="tip"><i class="far fa-paper-plane"></i></a>
    </td>


  </tr>



<?php
}
?>


</table>
</div>
</div>

</div>

</div>


    

<?php get_footer() ?>