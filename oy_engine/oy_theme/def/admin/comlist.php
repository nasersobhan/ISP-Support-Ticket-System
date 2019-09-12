<?php headers(); 	emp::alogi();?>

 
    
<ul class="nav nav-tabs profile-tab" style="border:0;">
  <li class="active"><a href="#jobs" data-toggle="tab"> List </a></li>
</ul>
<div class="tab-content profile-tab-content" >
  <div class="tab-pane fade active in" id="jobs">
    <table cellpadding="0" cellspacing="0" class="jobs_TBL table">
      <tbody>
        <t>
      
        <td  colspan="5" height="20"  class="small_txt"><span class="style6"><strong>
          <h2> &nbsp;&nbsp Company List </h2>
          </strong></span></td>
      </tr>
      <tr >
        <td height="20"   class="small_txt w300"><span class="style6"><strong>&nbsp;&nbsp;Name</strong></span></td>
        <td width="50"  class="small_txt"><span class="style6"><strong>Category</strong></span></td>
        <td width="100"  class="small_txt"><span class="style6"><strong>Actionsss</strong></span></td>
       
      </tr>
       <title> Company list | <?php echo PAGETITLE ?>  </title>
                      
                      
                      
                      
          
          
<?php $max = 500;

$sql = mysql_query("SELECT * FROM  sob_logemp ORDER BY id DESC LIMIT $max");

while($r = mysql_fetch_array($sql))
{
if($r['active']==1){
	$col='green';
	$text='Active';
	}else{
	$col='red';
	$text='Suspend';
	}	
	
	?>

<tr id="<?php echo $r['id'];?>">
            <td style=""><?php echo $r['company'];?> </td>
            <td style=""><?php echo get_element('sob_jcate',$r['cate'],'catename');?></td>
            <td style="">
            <form style=" display:inline-block">
            
                <a href="<?php echo HOME ?>/?admin=comdl&cid=<?php echo $r['id']; ?>" title="Delete"> Delete</a> |            
                <a href="<?php echo HOME ?>/?admin=comsus&cid=<?php echo $r['id']; ?>&t=<?php echo $r['active']; ?>"  title="Suspend Account"> Suspend </a>
            
            
            </td>
</tr>

<?php
}
?>



   
 </table>  
   
      </form>
    
    </div>
   
</div>
</div>






  <!--- others here --> 
</div>
</div>
<?php showsidebar() ?>
</td>
<?php foot() ?>
<?php footer() ?>
