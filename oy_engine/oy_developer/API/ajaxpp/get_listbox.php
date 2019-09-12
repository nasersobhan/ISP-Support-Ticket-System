<?php
//include("../../config.php");
//global $dbase;
header("Content-type: text/xml");
/*echo "<?xml version=\"1.0\" ?>\n";
echo "<companies>\n";
$select = "SELECT * FROM data_categories";

$res= $dbase->query($select);

			
            while($row = mysqli_fetch_array($res))
            {
               // $typex .= '<option value="' . $row['cat_id'] . '">' . $row['cat_title'] . '</option>'.PHP_EOL;
				echo "<Company>\n\t<id>".$row['cat_id']."</id>\n\t<name>".$row['cat_title']."</name>\n</Company>\n";
            }












echo "</companies>"; */
?>
<companies>
<Company>
	<id>1</id>
	<name>Private Company</name>
</Company>
<Company>
	<id>2</id>
	<name>Government Sector</name>
</Company>
<Company>
	<id>3</id>
	<name>ICT & Development</name>
</Company>
<Company>
	<id>4</id>
	<name>Contraction</name>
</Company>
</companies>