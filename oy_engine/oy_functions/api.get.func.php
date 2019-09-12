<?php

  


//Category categories table
function get_category2arr($type, $user = 0){
   $json_string = BASE_PATH.'?API=cate&type='.$type;

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
$objx = array();

foreach ($obj as $value){
    $objx[$value['cat_id']] = $value['cat_name'];
}
   return $objx;
}

function get_categoryname($id){
   $json_string = BASE_PATH.'?API=cate&id='.$id;

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);

    if(isset($obj[0]['cat_name']))
          return $obj[0]['cat_name']; 
    else
        return $id;
}