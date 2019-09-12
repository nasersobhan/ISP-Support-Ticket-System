<?php
set_time_limit(0);



$con=mysqli_connect("localhost","root","","info_quote");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



	
	$result = mysqli_query($con,"SELECT * FROM quotes where copy=0 limit 3000 ");
$i = 1;
while($row = mysqli_fetch_array($result)) {

    
$idxxxx = $row['id'];
$category = cate2db($row['category'],'12');
$author = cate2db($row['author'],'1055');
	


echo $i++.'<br/>';

mysqli_query($con,"UPDATE quotes SET author='{$author}',category='{$category}',copy=1 where id={$idxxxx}");

}

	
	
	

mysqli_close($con);
	

echo '<meta http-equiv="refresh" content="60">';
?>