

            <div class="panel panel-default" >
                <div class="panel-heading "><h3>مجموع پرداخت و دریافتها</h3></div>
                <div class="panel-body ">                


                    <table style="table-layout:fixed" id="datatbl" class="table table-responsive" >
                        <tr>
                            <th width="120px">نوع تیل/نوع پول</th>
                            <?php
                            $oild = cat_2arr_l('currency', 0, 'fa_AF');
                            foreach($oild as $id => $label){
                                echo '<th width="80px">' . $label . '</th>';
                            }
                            ?>  



                        </tr>


                        <?php
                        $oildx = array(1 => 'پرداخت', 2 => 'دریافت', 5 => 'پرداخت متفرقه', 7 => 'دریافت متفرقه');
                        foreach($oildx as $id => $label){
                            ?>
                            <tr>
                                <th width="140px"><?php echo $label; ?></th>
                                <?php
                                foreach($oild as $sid => $slabel){
                                    echo '<td>' . get_totalmoney($sid, $id) . '</td>';
                                }
                                ?>


                            </tr>

                        <?php }
                        ?>
                        <tr>
                            <th width="140px">موجودی فعلی</th>
                            <?php
                            $oild = cat_2arr_l('currency', 0, 'fa_AF');
                            foreach($oild as $id => $label){
                                $mon = get_balmoney($id);

                                $color = ($mon > 0 ? 'text-success' : 'text-danger');
                                echo '<td><span class="' . $color . '">' . abs($mon) . '</span></td>';
                            }
                            ?>
                        <tr>
                    </table>

                </div></div>