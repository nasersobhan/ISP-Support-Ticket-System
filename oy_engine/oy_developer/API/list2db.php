<?php
global $dbase;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

		
$result = $dbase->query("SELECT imp_name,imp_id FROM sob_impexp where imp_status=1 LIMIT 1250");

while($row = $dbase->fetch_array($result))
  {
	
    $name = cate2db($row['imp_name'], 'company');
 $db= array();
    $db['imp_name'] = $name;
    $db['imp_status'] = 0;
    $dbase->RowUpdate('sob_impexp',$db,'WHERE imp_id='.$row['imp_id']);
    echo $row['imp_name'].' -> '. $name.'<br/>';

  }
  
  
  
  $result = $dbase->query("SELECT mon_name,mon_id FROM sob_money where mon_status=1 LIMIT 1250");

while($row = $dbase->fetch_array($result))
  {
	
    $name = cate2db($row['mon_name'], 'company');
 $db= array();
    $db['mon_name'] = $name;
    $db['mon_status'] = 0;
    $dbase->RowUpdate('sob_money',$db,'WHERE mon_id='.$row['mon_id']);

echo $row['mon_name'].' -> '. $name.'<br/>';
  }


