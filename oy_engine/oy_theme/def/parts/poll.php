 <div class="panel panel-default visible-lg-*">
        <div class="panel-heading"><?php cat_name(); $id= get_cat_id(); ?></div>
        

              
     



<div class="row" disabled data-url="<?php   echo post_viewlink($id,is_get('t')); ?>"  id='listofpolls'>
    
           
    <?php
global $dbase;
$quer = "SELECT * FROM sob_choices where cho_pid='{$id}'";

$rowsx = $dbase->num_rows($quer);
if($rowsx > 0){
$result = $dbase->query($quer);
 $contall=poll_count($id);
 //echo $contall;
while($row = $dbase->fetch_array($result))
  {
   $polcount =  poll_count($id,$row['cho_id']);
   $per =0;
   if($contall>0)
    $per = ($polcount * 100) /  ($contall);
           
?>
  <input <?php if(is_polled($id,$row['cho_id'])) echo 'checked disabled';  ?>  data-pid="<?php echo $id?>" id="<?php echo $row['cho_id'] ?>" type="radio" name="poller" value="1">
<label for="<?php echo $row['cho_id'] ?>"><span><span></span></span> 
    <label class="radio">
 <?Php echo $row['cho_text'] ?> -  <?php echo $per.'% ('.$polcount.')' ?> 
</label>
 </label>
    <div class="progress" style="height:10px;">
    
  <div class="progress-bar" role="progressbar" aria-valuenow="<?=$per?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$per?>%;">
  
  

</div>
        
</div>
<hr/>

<?php
   }
   
  }?>
     <span id="result"></span>
  
</div>

                
                
                
                
                
                              
            </div>
 