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
  
  $getVar = $_REQUEST['term'];
        if(is_get('type')){
            $type = is_get('type');
            $wherepart = " AND pos_type='{$type}' ";
        }else{
        $wherepart ='';}
        
$sql = "SELECT pos_id, pos_title FROM {$pref}posts WHERE pos_title like '%" . $getVar ."%' {$wherepart} AND (pos_status=1 OR pos_uid={$uid}) ORDER BY pos_title ASC";
    /** @var $result MySQLi_result */

    $result = $dbase->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                $row_array['id'] = $row['pos_id'];
                $row_array['text'] =($row['pos_title']); //utf8_encode(($row['pos_title']));
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
 
 
 
 
 
 
 
 
 











 ?>