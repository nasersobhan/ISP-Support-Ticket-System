<?php  global $temLoader;$stylefile='';
  $val =  $temLoader->loadcombjs();

  header("content-type: application/javascript");
   echo $val;


?>