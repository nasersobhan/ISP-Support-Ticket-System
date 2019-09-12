<?php

global $dbase;




$result = $dbase->query("SELECT job_title,job_provinces,job_id FROM sob_jobs WHERE job_status=4 order by job_id DESC LIMIT 1000");

while($row = mysqli_fetch_array($result)) {
$city = $row['job_provinces'];
$cities = explode('-', $city);
echo $row['job_id']. '=> <br/>';
$cityNEW = array();
//echo '<br/>Title: '.$row['job_title'];
    foreach($cities as $city){
        
        $cityn = trim(get_location_name($city));
        
        echo '<br/>Current location: '.$city. '=> '.$cityn.'<br/>';

        $city_new = $dbase->get_single(TBL_PIX.'sob_categories_oy', "cat_name", $cityn, "cat_id");
        $query = "SELECT cat_id FROM sob_categories_oy WHERE cat_name like '%{$cityn}%' and cat_type='location' and cat_lang='en_US'  limit 1";
        $rowx = $dbase->fetch_assoc($query,true);
        $city_new = $rowx['cat_id'];

        //echo 'New cate: '.$city_new. '=> '. get_cate_name($city_new);
        
        $cityNEW[] = $city_new;
        

    }
    
    
    $id = $row['job_id'];
    $dbx['job_provinces'] = implode('-',$cityNEW);
    $dbx['job_status'] = 1;
    $dbase->RowUpdate('sob_jobs',$dbx," job_id='{$id}'");
    //echo '<br>=>End<hr/>';
    

}