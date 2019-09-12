<div class="panel panel-default" >
    <div class="panel-heading "><h3>موجودی روغنیات در مخازن بر اساس تن</h3></div>
    <div class="panel-body ">                


    <table style="table-layout:fixed" id="datatbl" class="table table-responsive" >
	<tr>
            <th width="120px">نوع تیل/مخزن</th>
            <?php 
 global $curr, $sizetype;
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<th width="80px">'.$label.'</th>';   
            }

?>  
            
            
   
  </tr>
  
  
   <?php
             $oildx =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oildx as $id => $label){?>
                 <tr>
  <th width="140px"><?php echo $label.'('.$sizetype.')'; ?></td>
<?php foreach($oild as $sid => $slabel){
                 echo '<td>'.get_total($sid,$id).'</td>';   
            }
            
            
            ?>
    
   
  </tr>
                 
       <?php      }
            ?>
  
  
 
    </table>
    
  </div></div>