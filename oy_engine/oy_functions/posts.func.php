<?php



function add_parts($foods,$type,$id,$xtype){
    global $dbase;
    $uid = user_uid();
           if(is_array($foods))
           {
               foreach($foods as $food){
                   $id1 = add_ifnotexist($food,$xtype);              
                    $datax['fol_uid']= $uid;
                    $datax['fol_url']= $id1;
                    $datax['fol_pid']= $id;
                    $datax['fol_type']= $type;
                    $tblff = TBL_PIX.'follow';
                    $dbase->RowInsert($tblff,$datax);
                   
               }
           }
}


function get_otherlangs($pid,$clang = false){
    global $dbase;
    $tbl = TBL_PIX.'langs';
    $cats = $dbase->tbl2array2($tbl, 'lan_rid,lan_pid,lan_lang',   " WHERE (lan_pid ='{$pid}' OR lan_rid='{$pid}')" );
    $otherlist = array();
    $i = 0;
    foreach ($cats as $langid){
        $langid['lan_rid'];
        $langid['lan_pid'];
        $langid['lan_lang'];
        
        if($langid['lan_lang'] != $clang){
            if($langid['lan_rid'] == $pid)
                $oid = $langid['lan_pid'];
            else
                $oid = $langid['lan_rid'];
            $otherlist[$i]['lang'] = $langid['lan_lang'];
            $otherlist[$i]['pid'] = $oid;
            $i++;
        }
        
    }
    $list=array();
    if(count($otherlist) > 0){
        foreach ($otherlist as $lang){
            $list[] = '<a target="_blank" href="'.post_viewlink($lang['pid']).'" title="lang" >'.g_lbl($lang['lang']).'</a>';
            
        }
    }
    
    
    $tran = '<a href="'.post_translink(get_cat_id(),get_cat_type()).'">ترجمه</a>';
    
    if(count($list) > 0 )
        return $tran.' ('.implode(',', $list).')';
    else
        return $tran;
}

function get_follower($id,$type,$class='',$imp=''){
    
    global $dbase;
    
    $tbl = TBL_PIX.'follow';
    $cats = $dbase->tbl2array2($tbl, 'fol_url,fol_pid',   " WHERE (fol_pid ='{$id}' OR fol_url='{$id}') AND fol_type='{$type}' " );
  if(!empty($cats)){
    $reut=array();
 if(!empty($class))
     $class=' class="'.$class.'" ';
    foreach ($cats as $post){
        if($id == $post['fol_url'])
         $reut[]= '<a '.$class.' href="'.post_viewlink(post_slug($post['fol_pid'])).'" title="" >'.get_posttitle($post['fol_pid']).'</a>';  
            else
        $reut[]= '<a '.$class.' href="'.post_viewlink(post_slug($post['fol_url'])).'" title="" >'.get_posttitle($post['fol_url']).'</a>';
    }
    return implode($imp,$reut);
  }else
      return false;
}


function get_relateds($type,$cate,$lang='en_US'){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
        $query = "select cat_name,cat_slug from {$tbl} where cat_type='{$type}' and cat_category={$cate} AND cat_lang='{$lang}' AND cat_status=1 ORDER BY RAND() LIMIT 10";
        $res = $dbase->query($query);
       // echo $query;
while($row = $res->fetch_assoc()) {

?>
<a class="list-group-item" title="Post a new job to the site" href="<?php echo post_viewlink($row['cat_slug']); ?>"><?php echo $row['cat_name']; ?></a>
             
<?php                                        
}
                                
  
}


function get_lastposts($type,$num,$lang='en_US'){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
        $query = "select cat_name,cat_slug from {$tbl} where cat_type='{$type}' AND cat_lang='{$lang}' AND cat_status=1 ORDER BY cat_id DESC LIMIT {$num}";
        $res = $dbase->query($query);
       // echo $query;
while($row = $res->fetch_assoc()) {

?>
<a class="list-group-item" title="Post a new job to the site" href="<?php echo post_viewlink($row['cat_slug']); ?>"><?php echo $row['cat_name']; ?></a>
             
<?php                                        
}
                                
  
}

function get_rand_posts($type,$num,$lang='en_US'){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
        $query = "select cat_name,cat_slug from {$tbl} where cat_type='{$type}'  AND cat_lang='{$lang}' AND cat_status=1 ORDER BY RAND() LIMIT {$num}";
        $res = $dbase->query($query);
       // echo $query;
while($row = $res->fetch_assoc()) {

?>
<a class="list-group-item" title="Post a new job to the site" href="<?php echo post_viewlink($row['cat_slug'],$type); ?>"><?php echo $row['cat_name']; ?></a>
             
<?php                                        
}
                                
  
}



function get_posttitle($id){
    global $dbase;
    
    if(!empty($id) AND is_numeric($id)){
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_name FROM {$tbl} WHERE cat_id = {$id}";
        $row = $dbase->fetch_assoc($query,true);
        return $row['cat_name'];
    }else{
        return $id;
    }
}
function add_post($data,$section='health'){
    global $dbase;
   // $uid = user_uid(); //Get Current User ID
    $fld_pre = 'cat_'; // table Feild Prefix
    $tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
   
    
   
    $data[$fld_pre . 'slug'] = get_slug($data[$fld_pre . 'name'], $tbl, $fld_pre . 'slug');
    $data[$fld_pre . 'section'] = $section;
    $data[$fld_pre . 'uid'] = user_uid();
    
   // print_r($data);
    if($dbase->RowInsert($tbl, $data)){
    $last_ID = $dbase->insert_id();
    return $last_ID;}else return false;
}


function edit_post($data,$id){
    global $dbase;
   // $uid = user_uid(); //Get Current User ID
    $fld_pre = 'cat_'; // table Feild Prefix
    $tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
   
    
   
    $data[$fld_pre . 'slug'] = get_slug($data[$fld_pre . 'name'], $tbl, $fld_pre . 'slug');
    $data[$fld_pre . 'section'] = $section;
    //$data[$fld_pre . 'uid'] = user_uid();
    $fid = $fld_pre . 'id';
   // print_r($data);
    if($dbase->RowUpdate($tbl, $data,$fid."='{$id}'")){
    $last_ID = $id;
    return $last_ID;}else return false;
}

function add_ifnotexist($var,$type){
  
    if(!ctype_digit($var)){
            $export = post_exists($var,$type);
            if(!$export){
                global $lang;
              $data['cat_lang'] = (isset($lang) ? $lang : get_lang());
                $data['cat_name'] = $var;
                $data['cat_type'] =$type;
                $export =   add_post($data);
            }
        }else{
            $export = $var;    
        }
        return $export;
}
function post_exists($val,$type){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
    $row = $dbase->get_single_row($tbl, 'cat_id', " cat_name='{$val}' AND cat_type='{$type}'");
    if(isset($row['cat_id']))
        return $row['cat_id'];
    else return false;
}




////links

function post_viewlink($slug,$type=false){
   $type = ($type ?$type : is_get('t'));
    if(POST_DYN_URL == false){
       $result = '?pg=view&view='.$slug.'&t=' . $type ;
       return HOME . $result;
    }else{
        $result = $type . '/view/' . $slug.'.html';
        return HOME . $result;
    }
}

function post_editlink($slug,$type=false){
   $type = ($type ?$type : is_get('t'));
    if(POST_DYN_URL == false){
       $result = '?pg=add&val='.$slug.'&t=' . $type ;
       return HOME . $result;
    }else{
        $result = $type . '/edit/' . $slug.'.html';
        return HOME . $result;
    }
}
function post_translink($slug,$type=false){
   $type = ($type ?$type : is_get('t'));
    if(POST_DYN_URL == false){
       $result = '?pg=add&oid='.$slug.'&t=' . $type ;
       return HOME . $result;
    }else{
        $result = $type . '/translate/' . $slug.'.html';
        return HOME . $result;
    }
}


function post_lang($id){
    global $dbase;
       $tbl = TBL_PIX.'categories_oy';
       $fld_pre = 'cat_';
      $lang = $dbase->get_single($tbl, "{$fld_pre}id", $id, "{$fld_pre}lang");
      return $lang;
}

function post_slug($id){
    global $dbase;
       $tbl = TBL_PIX.'categories_oy';
       $fld_pre = 'cat_';
      $lang = $dbase->get_single($tbl, "{$fld_pre}id", $id, "{$fld_pre}slug");
      return $lang;
}
function post_idbyslug($slug){
    global $dbase;
       $tbl = TBL_PIX.'categories_oy';
       $fld_pre = 'cat_';
      $lang = $dbase->get_single($tbl, "{$fld_pre}slug", $slug, "{$fld_pre}id");
      return $lang;
}
function get_serialvalue($main,$exported){
    if(is_serialized($main)){
        $arr = unserialize($main);
        if($arr[$exported])
            return $arr[$exported];
        else
            return false;
    }else
        return $main;
}

function post_addlink($type=false){
        $type = ($type ? $type : is_get('t'));
    
    if(POST_DYN_URL == false){
       $result = '?pg=add&t=' . $type ;
       return HOME . $result;
    }else{
        $result = $type . '/add.php';
        return HOME . $result;
    }
    
    
}
function post_listlink($type=false){
       $type = ($type ? $type : is_get('t'));
    
    if(POST_DYN_URL == false){
       $result = '?pg=list&t=' . $type ;
       return HOME . $result;
    }else{
        $result = $type . '/index.html';
        return HOME . $result;
    } 
    
}
//function post_viewlink(){}
//function post_viewlink(){}



function post_paging($total, $per_page = 10, $page = 1, $url = '?'){
    global $dbase;
    //$query = "SELECT COUNT(*) as `num` FROM {$query}";
    // $row = $dbase->fetch_array($quer);
    //$total = $dbase->num_rows($query);
    $adjacents = "2";
    $prevlabel = "&laquo;".g_lbl('pervious');
    $nextlabel = g_lbl('next')." &raquo;";
    $lastlabel = g_lbl('last')." &rsaquo;&rsaquo;";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1; // //last page minus 1
    $pagination = "";
    //if(is_get('page'))
    $url = remove_querystring_var($url, 'page');
  //$str = preg_replace('/\bblank$/', '', $str);

    $prx_url='';
      //RewriteRule ^([^/]*)/page-([^/]*).html$    index.php?t=$1&pg=list&page$2  [NC]    # Handle product requests  
     if(POST_DYN_URL == false){
         $link = HOME."?t=". is_get('t')."&pg=list&page=::NUM";
         $fpage = HOME."?t=". is_get('t')."&pg=list";
     }else{
        $link = HOME. is_get('t')."/page-::NUM.html";
        $fpage = HOME. is_get('t')."/index.html";
     }
     
     
     
     $url = $link;
     
    if($lastpage > 1){
        $pagination .= "<ul class=\"pagination\" style=\"margin:0; padding:0\">";
        // $pagination .= "<li class='next'>Page {$page} of {$lastpage}</li>";
        if($page > 1)
            $pagination.= "<li><a href='".str_ireplace("::NUM", $prev, $url)."'>{$prevlabel}</a></li>";
        if($lastpage < 7 + ($adjacents * 2)){
            for($counter = 1; $counter <= $lastpage; $counter++){
                if($counter == $page)
                    $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                else{
                    if($counter == 1)
                        $pagination.= "<li><a href='{$fpage}'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                }
            }
        } elseif($lastpage > 5 + ($adjacents * 2)){
            if($page < 1 + ($adjacents * 2)){
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                }
              //  $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lpm1, $url)."'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lastpage, $url)."'>{$lastpage}</a></li>";
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
                $pagination.= "<li><a href='{$fpage}'>1</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", '2', $url)."'>2</a></li>";
               // $pagination.= "<li class='dot'>...</li>";
                for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                }
               // $pagination.= "<li class=\"active\">..</li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lpm1, $url)."'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lastpage, $url)."'>{$lastpage}</a></li>";
            } else{
                $pagination.= "<li><a href='{$fpage}'>1</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", 2, $url)."'>2</a></li>";
               // $pagination.= "<li class='dot'>..</li>";
                for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                }
            }
        }
        if($page < $counter - 1){
            $pagination.= "<li><a href='".str_ireplace("::NUM", $next, $url)."'>{$nextlabel}</a></li>";
           // $pagination.= "<li><a href='{$url}{$prx_url}page=$lastpage'>{$lastlabel}</a></li>";
        }
        $pagination.= "</ul>";
    }

        return $pagination;
}

function post_paging_v($total, $per_page = 10, $page = 1, $url = '?'){
    global $dbase;
    //$query = "SELECT COUNT(*) as `num` FROM {$query}";
    // $row = $dbase->fetch_array($quer);
    //$total = $dbase->num_rows($query);
    $adjacents = "2";
    $prevlabel = "&laquo;".g_lbl('pervious');
    $nextlabel = g_lbl('next')." &raquo;";
    $lastlabel = g_lbl('last')." &rsaquo;&rsaquo;";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1; // //last page minus 1
    $pagination = "";
    //if(is_get('page'))
    $url = remove_querystring_var($url, 'page');
  //$str = preg_replace('/\bblank$/', '', $str);

    $prx_url='';
      //RewriteRule ^([^/]*)/page-([^/]*).html$    index.php?t=$1&pg=list&page$2  [NC]    # Handle product requests
    
    
    //?pg=view&view=quote&t=quote
    ///quote/view/quote.html
     if(POST_DYN_URL == false){
         $link = HOME."?t=". is_get('t')."&pg=view&view=".is_get('view')."&page=::NUM";
         $fpage = HOME."?t=". is_get('t')."&pg=view";
     }else{
        $link = HOME. is_get('t')."/view/".is_get('view')."/page::NUM.html";
        $fpage = HOME. is_get('t')."/view/".is_get('view').".html";
     }
     
     
     
     $url = $link;
     
    if($lastpage > 1){
        $pagination .= "<ul class=\"pagination\" style=\"margin:0; padding:0\">";
        // $pagination .= "<li class='next'>Page {$page} of {$lastpage}</li>";
        if($page > 1)
            $pagination.= "<li><a href='".str_ireplace("::NUM", $prev, $url)."'>{$prevlabel}</a></li>";
        if($lastpage < 7 + ($adjacents * 2)){
            for($counter = 1; $counter <= $lastpage; $counter++){
                if($counter == $page)
                    $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                else{
                    if($counter == 1)
                        $pagination.= "<li><a href='{$fpage}'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                }
            }
        } elseif($lastpage > 5 + ($adjacents * 2)){
            if($page < 1 + ($adjacents * 2)){
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else{
                        if($counter == 1)
                            $pagination.= "<li><a href='{$fpage}'>{$counter}</a></li>";
                        else
                            $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                    }
                }
              //  $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lpm1, $url)."'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lastpage, $url)."'>{$lastpage}</a></li>";
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
                $pagination.= "<li><a href='{$fpage}'>1</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", '2', $url)."'>2</a></li>";
               // $pagination.= "<li class='dot'>...</li>";
                for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else{
                        if($counter == 1)
                            $pagination.= "<li><a href='{$fpage}'>{$counter}</a></li>";
                        else
                            $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                    }
                }
               // $pagination.= "<li class=\"active\">..</li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lpm1, $url)."'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", $lastpage, $url)."'>{$lastpage}</a></li>";
            } else{
                $pagination.= "<li><a href='{$fpage}'>1</a></li>";
                $pagination.= "<li><a href='".str_ireplace("::NUM", 2, $url)."'>2</a></li>";
               // $pagination.= "<li class='dot'>..</li>";
                for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a>{$counter}</a></li>";
                    else{
                        if($counter == 1)
                            $pagination.= "<li><a href='{$fpage}'>{$counter}</a></li>";
                        else
                            $pagination.= "<li><a href='".str_ireplace("::NUM", $counter, $url)."'>{$counter}</a></li>";
                    }
                }
            }
        }
        if($page < $counter - 1){
            $pagination.= "<li><a href='".str_ireplace("::NUM", $next, $url)."'>{$nextlabel}</a></li>";
           // $pagination.= "<li><a href='{$url}{$prx_url}page=$lastpage'>{$lastlabel}</a></li>";
        }
        $pagination.= "</ul>";
    }

        return $pagination;
}