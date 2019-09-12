<?php
global $dbase;
 $pref = TBL_PIX;
 
 $uid = (is_loggedin() ? user_uid() : 0);
 
 
 
 
 
 
if(isset($_REQUEST['term']))
{
    
    
$row = array();
$return_arr = array();
$row_array = array();
$ret = array();
   // if(isset($_GET['term']))
   // {
       
       // $getVar = 'her';
       // $whereClause =  " loc_local_name LIKE '%" . $getVar ."%' AND (loc_type='RE' OR loc_type='CI')    ";
   // }
//    elseif(isset($_GET['id']))
//    {
//        $whereClause =  " iso = $getVar ";
//    }
    /* limit with page_limit get */

    //$limit = intval($_GET['page_limit']);

   // $sql = "SELECT * FROM {$tblpfx}location_oy WHERE  $whereClause ORDER BY loc_local_name";
        //$pref = TBL_PIX;
  $getVar = $_REQUEST['term'];
        if(is_get('type')){
            $type = is_get('type');
            $wherepart = " AND cat_type='{$type}' ";
        }else{
        $wherepart ='';}
        
$sql = "SELECT cat_id, cat_name FROM {$pref}categories_oy WHERE cat_name like '%" . $getVar ."%' {$wherepart} AND (cat_status=1 OR cat_uid={$uid}) ORDER BY cat_name ASC";
    /** @var $result MySQLi_result */

    $result = $dbase->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                $row_array['id'] = $row['cat_id'];
                $row_array['text'] =($row['cat_name']); //utf8_encode(($row['cat_name']));
                array_push($return_arr,$row_array);
               // echo $sql;
            }

}



/* this is the return for a single result needed by select2 for initSelection */

    $ret['results'] = $return_arr;
//print_r($return_arr);
//echo json_encode($ret);
ob_clean();
header('Content-type: text/json; charset=utf-8');
echo json_encode($ret);


exit();
}
 
 
 
 
 
 
 
 
 
 
 
// 
// 
//if(is_get('type2')){
//   
//    
//    //$user = 1;
//    //AND cat_uid='{$user}' 
//    $query = "SELECT cat_id, cat_name FROM {$pref}categories WHERE cat_type = '" . is_get('type') ."'  ORDER BY cat_order ASC";
//			$res =  $dbase->query($query);
//		
//   
//			$respne= array();
//           $i=0;
//		 while($row = mysqli_fetch_array($res))
//            {
//				
//				$respne[$i]['cat_id'] = $row['cat_id']; 
//				$respne[$i]['cat_name'] = $row['cat_name']; 
//				$i++;
//				
//			}
//		
//				
//				ob_clean();
//				header('Content-type: text/json; charset=utf-8');
//				echo json_encode($respne);
//                                //print_r($respne);
//    
//    
//}
//if(is_get('id')){
//    $pref = TBL_PIX;
//    
//    $user = 1;
//    
//    $query = "SELECT cat_name FROM {$pref}categories WHERE cat_id = '" . is_get('id') ."' AND cat_uid='{$user}' ";
//			$res =  $dbase->query($query);
//		
//   
//			$respne= array();
//           $i=0;
//		 while($row = mysqli_fetch_array($res))
//            {
//				
//				
//				$respne[$i]['cat_name'] = $row['cat_name']; 
//				$i++;
//				
//			}
//		
//				
//				ob_clean();
//				header('Content-type: text/json; charset=utf-8');
//				echo json_encode($respne);
//                                //print_r($respne);
//    
//    
//}

if(isset($_REQUEST['action'])){
		$con = $_REQUEST['action'];
		//$type = $_POST['type'];	
		
			
			$query = "SELECT cat_id, cat_name FROM {$pref}categories_oy WHERE cat_parent = " . $con ."";
			$res =  $dbase->query($query);
		
   
			$respne= array();
           $i=0;
		 while($row = mysqli_fetch_array($res))
            {
				
				$respne[$i]['cat_id'] = $row['cat_id']; 
				$respne[$i]['cat_name'] = $row['cat_name']; 
				$i++;
				
			}
			
				ob_clean();
				header('Content-type: text/json; charset=utf-8');
				echo json_encode($respne);		
			
			
}


if(isset($_REQUEST['con'])){
		$con = $_REQUEST['con'];
		//$type = $_POST['type'];	
		
			$query = "SELECT id, local_name FROM meta_location WHERE iso like '" . $con ."%' AND ( type='CI') ";
			//$query = "SELECT cat_id, cat_name FROM {$pref}categories WHERE cat_parent = " . $con ."";
			$res =  $dbase->query($query);
		
   
			$respne= array();
           $i=0;
		 
          
           
           while($row = mysqli_fetch_array($res))
            {
				
				$respne[$i]['id'] = $row['id']; 
				$respne[$i]['local_name'] = $row['local_name']; 
				$i++;
				
			}
                        
       
           
           if(count($respne)==0){
                     $respne[0]['id'] = '0'; 
		$respne[0]['local_name'] = 'No';        
                        }
		
	/*	$response = array(
									'state'  => 200,
									'message' => 'Good',
									'result' => HOME.get_user($_GET['info'])
								);	*/				
				ob_clean();
				header('Content-type: text/json; charset=utf-8');
				echo json_encode($respne);		
			
			
}
















//else
//{
//    $row_array['id'] = 0;
//    $row_array['text'] = utf8_encode('Start Typing....');
//    array_push($return_arr,$row_array);
//
//}


 ?>