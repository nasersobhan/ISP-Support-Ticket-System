<?Php

//print_r($_FILES);

$uploadedfile = $_FILES['file']['tmp_name'];
//include 'includes/compressImage.php';	
$name = md5(time()).'-'.basename($_FILES['file']['name']);                     
                                
move_uploaded_file($uploadedfile, '.\files\\'.$name);
echo $name;

?>