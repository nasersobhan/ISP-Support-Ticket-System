<?php get_header(); ?>
<div class="content-box">
    <div class="sidex">
                <div class="panel panel-default" >
    <div class="panel-heading "><h3><i class="fa fa-cogs Pull-left" aria-hidden="true"></i> <?php echo g_lbl('settings') ?></h3></div>
    <div class="panel-body ">  
        <div class="well">
        
            <h4><?php e_lbl('maincurr') ?></h4>
            <form data-rid="#reportx" method="post" id="currset" name="curr" ajaxform action="<?php echo HOME ?>?pg=settings&curr=1">
    <table align="center" width="600">


  <tr>

    <td>
        <select name="currency_name">
         <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
             $cur = get_setting('currency'); 
            foreach($oild as $id => $label){
                 echo '<option '.($cur==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';   
            }?></select>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" id="load_reportx" type="submit"  value="<?php echo g_lbl('save') ?>">

    </td>
  </tr>
  


  

</table>
</form>
        
        </div> <hr/>  <div class="well">
        
        
         <h4><?php e_lbl('measurement'); ?></h4>
<form data-rid="#reportx" method="post" id="sizety" name="sizety" ajaxform action="<?php echo HOME ?>?pg=settings&sizetype=1">
    <table  align="center" width="600">

        
  <tr>
   
    <td ><input  required value="<?php echo get_setting('sizetype') ?>" name="sizetype" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
        <input class="btn btn-success btn-sm Pull-left"  type="submit" name="Send" value="<?php echo g_lbl('save') ?>">

    </td>
  </tr>
  



</table>
</form>
</div>
        
        
        
        
  <div class="well">
        
        
         <h4><?php e_lbl('datetype'); ?></h4>
<form data-rid="#reportx" method="post" id="sizety" name="sizety" ajaxform action="<?php echo HOME ?>?pg=settings&datetype=1">
    <table  align="center" width="600">

        
  <tr>
  
    <td >
    
        <select name="datetype">
            
            <option value="1">میلادی</option>
            <option <?php echo (get_setting('datetype')==2 ? 'selected' :''); ?> value="2">هجری شمسی</option>
        </select>
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('save') ?>">

    </td>
  </tr>
  



</table>
</form>
</div>      
        
        
        
        
           
  <div class="well hidden">
        
        
         <h4><?php e_lbl('language'); ?></h4>
         <form data-rid="#reportx" method="post" id="langs" name="langx" action="<?php echo HOME ?>?pg=settings&langs=1">
    <table  align="center" width="600">

        
  <tr>
 
    <td >
    
        <select name="languageset">
            <?php global $LANGIS; ?>
            <option <?php if($LANGIS=='en_US') echo 'selected'; ?> value="en_US"><?php echo g_lbl('english'); ?></option>
            <option  <?php if($LANGIS=='fa_AF') echo 'selected'; ?>  value="fa_AF"><?php echo g_lbl('dari'); ?></option>
          
        </select>
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('save') ?>" >

    </td>
  </tr>
  



</table>
</form>
</div>    
        
        
    <div class="well">
        
        
         <h4><?php e_lbl('reporttext'); ?></h4>
<form data-rid="#reportx" method="post" id="sizety" name="sizety" ajaxform action="<?php echo HOME ?>?pg=settings&foot=1">
    <table  align="center" width="600">

        
        <tr>
    <td width="100"><?php e_lbl('headertxt'); ?>:</td>
    <td colspan="2">
    
    <input  required value="<?php echo get_setting('headertxt') ?>" name="headertxt" id="name" type="text" />
    
    </td>
 
  </tr>
        
  <tr>
    <td width="100"><?php e_lbl('footertxt'); ?>:</td>
    <td >
    
    <input  required value="<?php echo get_setting('footertxt') ?>" name="footertxt" id="name" type="text" />
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('save') ?>" >

    </td>
  </tr>
  
 


</table>
</form>
</div>      
        
        
<hr/>

        
       
        

         
  </div>
</div></div>
  
  
  
  
  
  
    <span id="reportx" >
 <div  class="sidex  Pull-left">


        <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo g_lbl('settings,current'); ?></h3></div>
    <div class="panel-body ">  








<?php
global $dbase;
$result = $dbase->query("SELECT * FROM sob_categories_oy where cat_type='settings'   ORDER BY cat_id DESC LIMIT 12");?>
	<table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
    <th width="160px"><?php e_lbl('title'); ?></th>

    <th width="120px"><?php e_lbl('value'); ?></th>
   
  </tr>






  <tr>
    <th width="140px"><?php e_lbl('maincurr'); ?></th>

    <td width="120px"><?Php echo get_cate_name(get_setting('currency')) ?></td>
   
  </tr>




  <tr>
    <th width="140px"><?php e_lbl('measurement'); ?></th>

    <td width="120px"><?Php echo (get_setting('sizetype')) ?></td>
   
  </tr>

  <tr>
    <th width="140px"><?php e_lbl('datetype'); ?></th>

    <td width="120px"><?Php echo (get_setting('datetype')==2 ? 'شمسی' : 'میلادی') ?></td>
   
  </tr>
  
    <tr>
    <th width="140px"><?php e_lbl('footertxt'); ?></th>

    <td width="120px"><?Php echo get_setting('footertxt');?></td>
   
  </tr>
  
     <tr>
    <th width="140px"><?php e_lbl('headertxt'); ?></th>

    <td width="120px"><?Php echo get_setting('headertxt');?></td>
   
  </tr>

  
     <tr>
    <th width="140px"><?php e_lbl('language'); ?></th>

    <td width="120px"><?Php global $LANGIS; echo $LANGIS;?></td>
   
  </tr>
  
  
</table>

     </div>
</div>

</div>


    

<?php get_footer() ?>