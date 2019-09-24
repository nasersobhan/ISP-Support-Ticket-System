                
                
                <div id="groupchat" class="panel-body">
                    <ul id="groupchat_list" class="chat">



                    <?php
        $id = is_get('id');
        global $dbase;
        $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_group = ". $id." ORDER BY mes_time DESC LIMIT 60");

        $rows = array_reverse($rows);
        foreach($rows as $row){
  

            $is_owner = ($row['mes_uid']==user_uid() ? TRUE : FALSE);
            $align = ($is_owner ?  'pull-right' : 'pull-left');
            $title_align = ($row['mes_uid']==user_uid() ? 'pull-left' : 'pull-right');
            $alignmain = ($is_owner ? 'right' : 'left');
            ?>
                    <li class="<?=$alignmain ?> clearfix"><span class="chat-img <?=$align ?>">
                            <img style="width:50px; height:50px;" src="<?php echo user_image($row['mes_uid']); ?>" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                     <?php if($is_owner) { ?>
               
                                        <strong class="primary-font"><?php echo user_name_ex($row['mes_uid'])?></strong>
    <small class="<?=$title_align ?> text-muted"><span class="glyphicon glyphicon-time"></span><?php echo Agotime_fa($row['mes_time'])?></small>

    <?php
                                     }else{ ?>
                                                             <small class="text-muted"><span class="glyphicon glyphicon-time"></span><?php echo Agotime_fa($row['mes_time'])?></small>
                                        <strong class="<?=$align ?> primary-font"><?php echo user_name_ex($row['mes_uid'])?></strong>   

                                                                            <?php
                                     }

                                     ?>
                   

                                </div>
                                <p>
                                <?php echo nl2br($row['mes_body'])?>
                                </p>
                            </div>
                        </li>
<?php
        } 
        ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form action="<?php echo HOME ?>?pg=inbox&send=<?php echo is_get('id') ?>" data-source="<?php echo HOME ?>?pg=groups&id=<?php echo $id;?> #groupchat_list" data-selector="#groupchat" ajaxform reset noreturn enctype="application/x-www-form-urlencoded" id="gchat" name="add" method="post">
                    <div class="input-group">
                    <input type="hidden" value="<?php echo is_get('id') ?>"  name="to">
                    <input type="hidden" value="groupchat-<?php echo is_get('id') ?>"  name="title">
                        <input id="btn-chat" type="text" name="body"  class="form-control input-sm" placeholder="متن را اینجا بنویسید...." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                ارسال
                            </button>
                        </span>
                    </div>
                    </form> 
                </div>
      