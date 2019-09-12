<?php



class post_data{
    var $posts = array();
    var $post = array();
    var $post_count= 0;
    var $post_index= 0;
    var $postx;
    
    
    function __construct($query,$type='query'){
             
           global $dbase;
        
           if($type=='query')
               $queryx = $query;
           else{
               
             $queryx = ''; 
           }
           
           
          $this->postx = 'oy_post'; //.substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz',5)),0,5);
global $dbase;
           $maxtor = $dbase->query($queryx);
           // while ($row  =  $dbase->fetch_array($maxtor) ){
           while ($row  =  mysqli_fetch_assoc($maxtor) ){
               $this->posts[] = $row;
           }
           if($this->have_post()){
                $this->have_post();
                $this->the_post();
                $this->mk_func();
           } 
    }
    
    
    //HAVE_POST FUNCTION
        function have_post() {
        

            if ($this->posts && ($this->post_index <= $this->post_count)){
                $this->post_count = count($this->posts);
                return true;

            }
            else {
                $this->post_count = 0;
                return false;
            }
        }

        //THE_POST FUNCTION
        function the_post() {
           // global $posts, $post, $post_count, $post_index;

            //$post = new query($post1);
            // make sure all the posts haven't already been looped through
            if ($this->post_index > $this->post_count) {
                return false;
            }
            //$post = $posts[$post_count];
            // retrieve the post data for the current index
            if($this->post_index)
            $this->post = $this->posts[$this->post_index-1];
            else
            $this->post = $this->posts[0];
            //$posts = new query($job);
            // increment the index for the next time this method is called
            
           // global $$this->postx;
            $this->post_index++;
            //$x = $this->postx;
            //echo $this->postx;
            //$$x = array();
            global $oy_post;
            $oy_post= $this->post;
            
            
            return $this->post;

        }
        
        
function mk_func(){

    $postx = $this->post;

    foreach ($postx as $key => $value) {
        if (is_int($key)) {
            unset($postx[$key]);
        }
    }

	foreach ($postx as $key => $value){
		if(!function_exists($key)){
			eval( 'function ' . $key . '() { 
					global $oy_post;
					 echo  $oy_post[\''.$key.'\'];
                                         
					}');  
                }
		
	}
	foreach ($postx as $key => $value){
		if(!function_exists('get_'.$key)){
			eval( 'function get_' . $key . '() { 
					 global $oy_post;
					 return  $oy_post[\''.$key.'\'];
                                         
					}');  
                }
		
	}
	
	
}



function eliminate (){
    global $oy_post;
     $this->posts = array();
     $this->post= array();
     $this->post_count= 0;
     $this->post_index= 0;
     $this->postx;
     $oy_post = array();
}
    
}




//function

function end_rows(){
    global $rowsquery;
    $rowsquery->eliminate();
    unset($rowsquery);
}
function get_rows($query){
    $rowsquery = "";
    global $rowsquery;
    $tbl_pre = TBL_PIX;
    $rowsquery = new post_data($query); 
   
}

function posts_av(){
    global $rowsquery;
    return $rowsquery->have_post();
}

function get_record(){
    global $rowsquery;
    return $rowsquery->the_post();
}














