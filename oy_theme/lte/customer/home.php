<?php get_header(); 

$id = is_get('id');
?>
<div class="content-box">


     





<div class="col-md-8">
    <div class="panel panel-default" >

    <div  class="panel-body ">   
    <div id="main-content">   
    
<?php 
    if (is_get('id') || is_get('cid')) {
    theme_pg_include('view');
}
else {
    theme_pg_include('add');
} ?>
        </div>

    </div>

    </div>

    </div>

    <div class="col-md-4">
    <div class="panel panel-default" >
    <div class="panel-body "> 
   
  <?php 
   if (is_get('id') || is_get('cid')) {
       global $edit;
       if (!$edit) {
           'مشتری یافت نشد.';
            exit();
       }
       $isedit = count($edit);

  
  ?>


    <table class="table">

<tr>
  <th>
  نام PPPOE
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_pppoename'] : ''); ?>
  </td>
</tr>


<tr>
  <th>
  پکیج
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_package'] : ''); ?>
  </td>
</tr>


<tr>
  <th>
  AP
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_ap'] : ''); ?>
  </td>
</tr>


<tr>
  <th>
  Signal
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_signal'] : ''); ?>
  </td>
</tr>



<tr>
  <th>
  CCQ
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_ccq'] : ''); ?>
  </td>
</tr>


<tr>
  <th>
  ای پی PPPOE
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_pppoeip'] : ''); ?>
  </td>
</tr>

<tr>
  <th>
  ای پی لوکال
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_localip'] : ''); ?>
  </td>
</tr>

<tr>
  <th>
  ای پی پابلیک
  </th>
  <td>
    <?php echo ($isedit ? $edit['cus_publicip'] : ''); ?>
  </td>
</tr>
</table>
    <?Php } ?>
  </div>
   
        </div> </div>


</div> 

<?php get_footer() ?>