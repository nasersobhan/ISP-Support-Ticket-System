                
                
                <div id="groupchat" class="panel-body">
                    <ul id="groupchat_list" class="chat">



                    <?php
        $id = is_get('id');
        global $dbase;
        $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_group = ". $id." ORDER BY mes_time DESC LIMIT 60");

        $rows = array_reverse($rows);
        foreach($rows as $row){
            $g1 = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
            $g2 = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
            $g3 = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);

            if(!isset($_SESSION['uidcolor'][$row['mes_uid']]))
                $_SESSION['uidcolor'][$row['mes_uid']]= $g1.$g2.$g3;

            $is_owner = ($row['mes_uid']==user_uid() ? TRUE : FALSE);
            $align = ($is_owner ? 'pull-left' : 'pull-right');
            $title_align = ($row['mes_uid']==user_uid() ? 'pull-right' : 'pull-left');
            $alignmain = ($is_owner ? 'left' : 'right');
            ?>
                    <li class="<?=$alignmain ?> clearfix"><span class="chat-img <?=$align ?>">
                            <img src="http://placehold.it/50/<?php echo $_SESSION['uidcolor'][$row['mes_uid']]; ?>/fff&text=<?php echo user_username($row['mes_uid']);?>" alt="User Avatar" class="img-circle" />
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
      