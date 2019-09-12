<?php
 get_files();
 
          function get_files(){
              
                 if(is_get('dir'))
             $xt = is_get('dir');
         else
            $xt='';
              $path = RHOME.'oy_source'. $xt;
              
              
              $paths = glob($path."\\*" );
              
              
              if (in_array($path.'\\thumb', $paths)) 
                {
                    unset($paths[array_search($path.'\\thumb',$paths)]);
                }
                if (in_array($path.'\\Thumbs.db', $paths)) 
                {
                    unset($paths[array_search($path.'\\Thumbs.db',$paths)]);
                }

                $dirs1 = array_filter($paths, 'is_dir');
                $fils = array_filter($paths, 'is_file');
                
                $echox = array();
                
                $echox['dir'] = $dirs1;
                $echox['file'] = $fils;
                $respone = array();
                $i=0;
                 foreach($paths as $file) {
                     $respone[$i]['type'] =  file_type($file);
                     $respone[$i]['name'] = basename($file);
                      if(is_dir($file)){
                     $respone[$i]['path'] = get_home_path().'?dir='.str_ireplace(RHOME.'oy_source', '', $file);
                      }else{
                       $respone[$i]['path'] = get_home_path().'?file='.str_ireplace(RHOME.'oy_source', '', $file);    
                          
                      }
                  
                     $respone[$i]['size'] = (is_dir($file) ? get_cfiles($file) : human_filesize(filesize(($file))));
                     $respone[$i]['time'] = date('m j, Y, g:i a',filemtime($file));
                       $respone[$i]['icon'] = file_icon($file);
                        $i++;
                 }
                
                 global $posts;
         $posts = $respone;
                
                return $respone;
          }
          
          function get_cfiles($directory){
              if (glob($directory . "\*") != false)
                $filecount = count(glob($directory . "\*")) . ' Items';
                else
                $filecount = 'Empty';
                return $filecount;
          }
          
          function file_icon($file){
              $ext = pathinfo($file, PATHINFO_EXTENSION);
              $ext = ($ext=='' ? '_blank' : $ext);
               $res = DATA_CORE_PATH.'/icons/file/16px/'.$ext.'.png';   
               return $res;
          }
          function file_type($file){
             
              if(is_dir($file)){
                  $res = 'Directory';
                  
              }else{
                  
                  $ext = pathinfo($file, PATHINFO_EXTENSION);
                  
                  $res = strtoupper ($ext).' File';
              }
              
              
              return ucwords($res);
          }