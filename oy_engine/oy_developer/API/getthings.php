<?php
set_time_limit(0);



$con=mysqli_connect("localhost","root","","jobportal");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



	
	$result = mysqli_query($con,"SELECT * FROM sob_categories_oy where cat_type='tags' AND cat_status=1 LIMIT 3000");
$i=1;
while($row = mysqli_fetch_array($result)) {
    
    
    
    
    
    
    
$idxxxx = $row['cat_id'];
$category = cate2db($row['cat_name'], '12');
//$author= cate2db($row['cat_name'], '1055');
 mysqli_query($con,"UPDATE sob_categories_oy SET cat_status=3 where cat_id={$idxxxx}"); 
 
 
 echo $i++.' . ';
 echo $idxxxx.": Category: ({$category}) ".$row['cat_name'].'<br/>';
 
 // echo "/ Author: ({$author}) ".$row['cat_name'] .'<br/>';
//if(!empty($datax['web_title'])){
//
//
//
//
//mysqli_query($con,"UPDATE quotes SET copy=1 where id={$idxxxx}");
//}else{
//  
//}
}

	
	
	

mysqli_close($con);
//echo '<meta http-equiv="refresh" content="60">';	

?>