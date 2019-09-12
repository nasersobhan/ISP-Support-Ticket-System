<?php
global $dbase;


$row = array();
$return_arr = array();
$row_array = array();
$tbl = TBL_PIX .'pages';
if(isset($_REQUEST['term']))
{

   // if(isset($_GET['term']))
   // {
        $getVar = $_REQUEST['term'];
       // $getVar = 'her';
        $whereClause =  " pag_title LIKE '%" . $getVar ."%' AND pag_status<>100    ";
   // }
//    elseif(isset($_GET['id']))
//    {
//        $whereClause =  " iso = $getVar ";
//    }
    /* limit with page_limit get */

    //$limit = intval($_GET['page_limit']);

    $sql = "SELECT * FROM {$tbl} WHERE  $whereClause ORDER BY pag_title";

    /** @var $result MySQLi_result */
    $result = $dbase->query($sql);

        if($result->num_rows > 0)
        {

            while($row = $result->fetch_array())
            {
    
                
                $row_array['id'] = $row['pag_id'];
                $row_array['text'] = utf8_encode($row['pag_title'] );
                array_push($return_arr,$row_array);
            }
            
            

//        }else{
//              $row_array['id'] = 0;
//    $row_array['text'] = utf8_encode(' Not Found '.$getVar);
//    array_push($return_arr,$row_array); 
//        }
}

}
//else
//{
//    $row_array['id'] = 0;
//    $row_array['text'] = utf8_encode('Start Typing....');
//    array_push($return_arr,$row_array);
//
//}

$ret = array();
/* this is the return for a single result needed by select2 for initSelection */

    $ret['results'] = $return_arr;

//echo json_encode($ret);
ob_clean();
header('Content-type: text/json');
echo json_encode($ret);
//$db->close();

