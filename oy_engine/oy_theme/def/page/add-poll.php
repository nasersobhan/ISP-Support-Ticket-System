<?php
$id = is_get('id');
get_header();
?>





<div class="row">
    <div class="col-md-9" id="main-body">

  <div class="panel panel-default">
 
                                  <div class="panel-body">
     <div class="page-header ">
         <h1>ایجاد رای گیری</h1>		
         <h2>&nbsp;&nbsp<a href="<?php echo post_viewlink($id,get_typeof($id)); ?>" ><?php echo get_cate_name($id); ?></a>
                                                </h2>
					</div>
                


                                      <form data-func="loadthebox" ajaxform action="<?php echo get_link('add-poll','id',is_get('id')); ?>" method="POST">
                                          <div class="form-group">
    <label for="exampleInputEmail1">Poll Option</label>
    <input name="pollname" type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo g_lbl('typesome'); ?>">
  </div>
                                           <button type="submit" class="btn btn-default"><?php echo g_lbl('add'); ?></button>
                                      </form>

<hr/>

<div class="row" id='listofpolls' data-pid="<?php echo $id; ?>">
    <?php
global $dbase; 
$result = $dbase->query("SELECT * FROM sob_choices where cho_pid='{$id}'");?>
    <table class="table table-bordered" style="table-layout:fixed" id="datatbl" width="550" >
	





	<?php
        $i=0;
while($row = $dbase->fetch_array($result))
  { $i++;
?>

        <tr id="cho<?php echo $row['cho_id'] ?>">
      <td width="30px"><?=$i?></td>
    <td><?Php echo $row['cho_text'] ?></td>
<td width="50px"> <button data-id="cho<?php echo $row['cho_id'] ?>" type="button" class="btn btn-sm btn-danger hider"><i class="fa fa-minus" aria-hidden="true"></i></button></td>
<!--  <td width="50px"> <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button></td>-->
  </tr>



<?php
 }
 ?>   </table>
</div>



        </div>         
    </div>
    </div>
     <div class="col-md-3">
<?php get_sidebar('add'); ?>
     </div>
</div>


<?php get_footer(); ?>