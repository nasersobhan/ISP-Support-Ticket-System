
<?php get_header(); global $curr, $sizetype;  ?>
<div class="content-box">

  <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    


<?php 
//$nx=is_get('eoe');
//if($nx!="")
//$where =  " and eoe='$nx'";
//
//$where = "";
//
//$per_page = 20; 
//$page = 1;
//
//if (isset($_GET['p'])) 
// {
//  $page = intval($_GET['p']); 
//  if($page < 1) $page = 1;
// }
//
//
// $start_from = ($page - 1) * $per_page; 
//
//
//global $dbase;
//
//$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 $where ORDER BY imp_time LIMIT $start_from, $per_page");?>
	
	
	<table id="datatbl" width="99%" align="center" >
    
      <tr >
    <td colspan="12">
    <a href="?page=list">لیست کامل</a> | <a href="?page=list&eoe=1">لیست صادر</a> | <a href="?page=list&eoe=2">لیست وارد</a> 
    </td>
    
    </tr>
  
	<tr>
    <th>نام شرکت</th>
    <th>نام دریور</th>
    <th width="70px">نمبر موتر</th>
    <th width="50px"> مقدار سمیر </th>
    <th width="50px">قیمت</th>
    <th>مجموع سمیر</th>
    <th width="50px">نوع</th>
    <th>تاریخ</th>
  
    <th>زمان ثبت شده</th>
     <th>مخزن</th>
    <th width="180px">وارد شده توسط</th>
     <?php //if(USER_TYPE==1){ ?>  <th width="120px"> عملیات</th><?php //} ?>
  </tr>
  
    <span style="color:#fff; width:100%; text-align:center; font-weight:bold; background-color:rgba(51,51,51,1) " name="mess" id="mess"></span>
  
   
	<?php
//while($row = $dbase->fetch_array($result))
//  {
//    
    

if(have_post()){
    while(have_post()) : the_post();  
    
?>

  <tr id="<?php imp_id(); ?>">
      
       <td width="140px"><a target="_blank" href="<?Php echo get_link('impexp','edit',get_imp_id());?>" title="go to page"><?Php echo get_cate_name(get_imp_name()) ?></a></td>

      
      

    <td><?Php echo imp_drivername() ?></td>
    <td ><?Php echo imp_trucknum() ?></td>
    
    <td ><?Php echo imp_s_amont().$sizetype ?></td>
    <td ><?Php echo imp_price().$curr ?></td>
    <td><?Php echo imp_s_total().$curr ?></td>
    <td><?Php echo get_cate_name(get_imp_koo()) ?></td>
  
        <td ><?Php echo valDate(get_imp_date()) ?></td>
    <td><?php echo valDate(get_imp_time(),'l j F Y H:i:s'); //Agotime(get_imp_time()) ?></td>
    <td ><?php echo get_cate_name(get_imp_st()); ?></td>
    <td ><?Php echo user_name_ex(get_imp_uid()); ?></td>
  <?php //if(USER_TYPE==1){ ?>   
  
  <td >

      <a  class="btn btn-secondary action-del" data-txt="<?php e_lbl('douwant2dl'); ?>" data-id="<?php imp_id() ?>" href="<?php echo HOME.'?pg=impexp&del='.get_imp_id() ?>"><i class="fa fa-remove" aria-hidden="true"></i></a>
    
     
    </td>
	<?php //} ?>
    
  </tr>




        <?php
    endwhile;
}
?>


<tr>
<td  colspan="12">
    
     <?Php
                if(is_get('loader') == false){
                    global $pagin;
                    echo $pagin;
                }
                ?>
    
    <?php
//$total_rows = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 $where");
// //$total_rows = mysql_fetch_row($total_rows);
//  $total_rows = $dbase->num_rows($total_rows);
//// $total_rows = $total_rows[0];
//
// $total_pages = $total_rows / $per_page;
// $total_pages = ceil($total_pages); # 19/5 = 3.8 ~=~ 4
//$othx=(isset($_GET['eoe'])?'&eoe='.$_GET['eoe']:'');
//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=list'.$othx;
// for($i = 1; $i  <= $total_pages; $i++)
// {
//  echo "<a href='$actual_link&p=$i'>$i</a> &nbsp;&nbsp;";
// }
 ?>
</td>

</tr>
    
</table>



</div></div></div>

<?php get_footer() ?>