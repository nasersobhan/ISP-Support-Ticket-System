<?php
global $dbase;




if(is_get('action')){
		$con = is_get('action');
			
		
	 // echo get_cc2dd('RE',$con,  'name="inf_hcity" id="inf_hcity" class="form-control select2" ');
		
		
			$query = "SELECT accounts.acc_id, user_info.inf_name, user_info.inf_sname, accounts.acc_username
FROM user_info
LEFT JOIN accounts ON acc_id = inf_aid
WHERE (
(
accounts.acc_username LIKE  '%" . $con ."%'
)
OR (
user_info.inf_name LIKE  '%" . $con ."%'
)
OR (
user_info.inf_name LIKE  '%" . $con ."%'
)
)
AND accounts.acc_status =  '1'";
			$res =  $dbase->query($query);
		
            //$row = mysqli_fetch_array($res);
		
			//$respne= array();
           $i=0;
		 while($row = mysqli_fetch_array($res))
            {
				
				//print_r($row); echo '<br/>';
				
				
				$respne[$i]['id'] = $row['acc_id']; 
				$respne[$i]['value'] = $row['inf_name'].' '.$row['inf_sname'].' ('.$row['acc_username'].')'; 
				$i++;
				
			}
		
		
		//echo $query;
	
				ob_clean();
				header('Content-type: text/json');
				echo json_encode($respne);		
			
			
}else{
	
		$query = "SELECT inf_aid, inf_name, inf_sname FROM user_info";
			$res =  $dbase->query($query);
		
            //$row = mysqli_fetch_array($res);
		
			//$respne= array();
           $i=0;
		 while($row = mysqli_fetch_array($res))
            {
				
				//print_r($row); echo '<br/>';
				
				
				$respne[$i]['id'] = $row['inf_aid']; 
				$respne[$i]['value'] = $row['inf_name']; 
				$i++;
				
			}
		
		
		//echo $query;
	
				ob_clean();
				header('Content-type: text/json');
				echo json_encode($respne);		
	
}

