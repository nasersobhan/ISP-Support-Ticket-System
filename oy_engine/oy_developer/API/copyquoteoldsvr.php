<?php
set_time_limit(0);
global $dbase;

function isSerialized($str) {
    return ($str == serialize(false) || @unserialize($str) !== false);
}
$con=mysqli_connect("localhost","root","","jobportal");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



	
	$result = mysqli_query($con,"SELECT * FROM sob_categories_oy where cat_type='quote' and cat_status=1 LIMIT 3000");
$i=1;
while($row = mysqli_fetch_array($result)) {
    
    $idxxxx = $row['cat_id'];
    
    if(isSerialized($row['cat_content'])){
        $conx = unserialize($row['cat_content']);


        //print_r($con);

        $auid = $conx['author'];
        if($conx['author'] && $conx['desc']){
         $query = mysqli_query($con, "SELECT cat_name FROM sob_categories_oy WHERE cat_id={$auid} LIMIT 1");
            $author = mysqli_fetch_array($query);
       // return $author[0];

            
            
            
            

       // $author = mysqli_fetch_array(mysqli_query($con,));
        echo ($author[0]).': '.$conx['desc'].'<br/>'; 
       $dx['quo_aid'] = get_cate_id_byname($author[0]);
      $dx['quo_text'] = $conx['desc'];

      //
  $dbase->RowInsert('sob_quotes',$dx);
  mysqli_query($con,"UPDATE sob_categories_oy SET cat_status=44 where cat_id={$idxxxx}");
  echo $i++.' . '."Done: <br/>"; 
    }
    }


}

	
	
	

mysqli_close($con);
echo '<meta http-equiv="refresh" content="60">';	

?>