<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 global $temLoader;$stylefile='';
  $val =  $temLoader->getcssfiles();
   foreach($val as $style){
     $stylefile .= file_get_contents($style);
   // echo $style;
     
   }
   header("Content-type: text/css");
   echo $stylefile;


?>