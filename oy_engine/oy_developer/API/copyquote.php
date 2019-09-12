<?php
set_time_limit(0);
global $dbase;


$con=mysqli_connect("localhost","root","","info_quote");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



	
	$result = mysqli_query($con,"SELECT * FROM quotes where copy=1 LIMIT 3000");
$i=1;
while($row = mysqli_fetch_array($result)) {
    
    $idxxxx = $row['id'];
    
    
   $dx['quo_aid'] = $row['author'];
   $dx['quo_text'] = $row['quote'];
   //$dx['quo_type'] = $row['author'];
  // $dx['quo_aid'] = $row['author'];
  $dbase->RowInsert('sob_quotes',$dx);
    $id = $dbase->insert_id();

//$category = cate2db($row['category'], '12');
//$author= cate2db($row['author'], '1055');
    $dt['tag_pid'] = $id;
    $dt['tag_did'] = $row['category'];
    $dbase->RowInsert('sob_tags',$dt);
    //echo $i++.' . '; 
  //  echo "Error: <br/>"; //$row['author'].': '.$row['quote'] .'<br/>';
    mysqli_query($con,"UPDATE quotes SET copy=2 where id={$idxxxx}");
//   }else{
//        echo $i++.' . '; 
//        echo "Done: <br/>".$row['author'].': '.$row['quote'] .'<br/>';
//      mysqli_query($con,"UPDATE quotes SET copy=5 where id={$idxxxx}");  
//   }
 
 
 echo $i++.' . ';
// echo $idxxxx.": Category: ({$category}) ".$row['category'];
 
  echo "Done: <br/>"; //$row['author'].': '.$row['quote'] .'<br/>';
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
echo '<meta http-equiv="refresh" content="60">';	

?>