<?php get_header(); ?>
<div class="content-box">
    <div class="col-md-12">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <h3 class="panel-title">لیست تکتها</h3>
            </div>
            <div  class="panel-body "> 

            <div class="well">
            </div>  
                <table class="table table-borderd">
                    <tr>
                        <th>عنوان</th>
                        <th>زمان ثبت</th>
                        <th>مسئول</th>
                        <th>دسته بندی</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    <?php global $dbase; 
                    $rows = $dbase->tbl2array2('sob_tickets','*', "WHERE tic_status=1");
                    foreach($rows as $row){
                        echo '<tr>';
                        echo '<td>'.$row['tic_title'].'</td>';
                        echo '<td>'.$row['tic_time'].'</td>';
                        echo '<td>'.toidlabel($row['tic_assigned']).'</td>';
                        echo '<td><span class="label label-info">'.get_cate_name($row['tic_category']).'</span></td>';
                        echo '<td><span class="label label-warning">'.get_cate_name($row['tic_tag']).'</span></td>';
                        echo '<td class="text-center">
                                    <a href="'.get_link('ticket','id',$row['tic_id']).'"><i class="fas fa-eye"></i></a>
                                    <a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=ticket&eid=' . $row['tic_id'] . ' #mainticket"><i class="fas fa-edit"></i></a> 
                                    <a class="text-danger" href=""><i class="fas fa-minus-square"></i></a>
                              </td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div> 

<?php get_footer() ?>