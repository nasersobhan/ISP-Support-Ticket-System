<?php get_header(); 

$id = is_get('id');
?>
<div class="content-box">


     
    <div class="col-md-4">
    <div class="panel panel-default" >
    <div class="panel-body "> 
    <a href="<?php echo HOME.'?pg=inbox'?>" class="btn-warning btn-block btn-lg">پیام جدید</a>
    <br>
    <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Inbox" aria-controls="Inbox" role="tab" data-toggle="tab">دریافتی</a></li>
    <li role="presentation"><a href="#Outbox" aria-controls="Outbox" role="tab" data-toggle="tab">ارسالی</a></li>
    <li role="presentation"><a href="#Unread" aria-controls="Unread" role="tab" data-toggle="tab">خوانده نشده ها</a></li>
  </ul>


  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Inbox">
    <br>
    <div class="list-group">
        <?php
        global $dbase;
        $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_tid = ".user_uid()." ORDER BY mes_time DESC LIMIT 20");

        foreach($rows as $row){
            $classes = ($row['mes_read'] == 0 ? 'txt-bold' : '').' '.($row['mes_id'] == $id ? 'active' : '');
            echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].'" class="list-group-item '.($classes).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_uid']).'</a>';
        } 
        ?>
     </div>


    </div>
    <div role="tabpanel" class="tab-pane" id="Outbox">
    <br>
    <div class="list-group">
        <?php
        global $dbase;
        $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_uid = ".user_uid()." ORDER BY mes_time DESC LIMIT 20");
        foreach($rows as $row){
            echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].'" class="list-group-item '.(($row['mes_read'] == 0 ? 'txt-bold' : '')).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_tid']).'</a>';
        } 
        ?>
     </div>
    
    </div>
    <div role="tabpanel" class="tab-pane" id="Unread">
    <br>
        <div class="list-group">
            <?php
            global $dbase;
            $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_tid = ".user_uid()." AND mes_read=0 ORDER BY mes_time DESC LIMIT 20");
            foreach($rows as $row){
                echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].'" class="list-group-item '.(($row['mes_read'] == 0 ? 'txt-bold' : '')).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_uid']).'</a>';
            } 
            ?>
        </div>
    
    </div>

  </div>
   
        </div> </div>



</div>


<div class="col-md-8">
    <div class="panel panel-default" >

    <div  class="panel-body ">   
    <div id="main-content">   
    
<?php 
    if (is_get('id')) {
    theme_pg_include('view');
}
else {
    theme_pg_include('add');
} ?>
</div>

</div>

</div>

    </div>
</div> 

<?php get_footer() ?>