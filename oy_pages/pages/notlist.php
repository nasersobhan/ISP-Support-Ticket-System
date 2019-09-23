<?php 

global $dbase;
$uid = user_uid();
$where = ' WHERE not_status = 1 AND not_uid='.$uid;
$url =  '#';
if (is_get('id')) {
    $id = is_get('id');
    $where .= ' AND not_id='.$id;
    $dbase->RowUpdate('sob_notifications', ['not_status'=>2], $where);
}elseif(is_get('num')){
    $numb = $dbase->num_rows('SELECT not_id FROM sob_notifications'. $where);
    if($numb)
        echo '<i class="fa fa-bell"></i>
        <span class="label label-danger">'. $numb .'</span>';
        //echo '<span class="red-att"><i class="fas fa-bell"></i><sup id="notnumbers" class="blink bold"> '. $numb .' </sup></span>';
    else
        echo '<i class="fa fa-bell"></i>';
        //echo '<i class="far fa-bell"></i>';
}else {
  
    $rows = $dbase->tbl2array2('sob_notifications', '*', $where);
    $rows = array_reverse($rows);
if(count($rows)){
    foreach ($rows as $row) {
        $seen = $row['not_seen'] == 1 ? true : false;
        if($row['not_url'])
            $url = HOME.'?pg='.$row['not_type'].'&id='.$row['not_url'].'&nrid='.$row['not_id'];
        else
            $url = '&nrid='.$row['not_id'];
            $color = $row['not_color'];
        if(empty($color))
            $color = 'info';
        echo '<li class="not-' . $color . '"><a data-id="'.$row['not_id'].'" class="" href="'.$url.'"><small>'.$row['not_title'].'
    <div class="block text-right">'.Agotime_fa($row['not_time']).'</div></small>
    </a></li>
    <li class="divider"></li>';
    }
    echo '<li class="text-center"><a href="#">بیشتر</a></li>';
}else{
    echo '<li class="text-center"><a href="#">اطلاعیه تازه ای وجود ندارد.</a></li>';
}


    $dbase->RowUpdate('sob_notifications', ['not_seen'=>1], $where);
}
