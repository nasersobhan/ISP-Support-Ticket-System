      
    <div class="panel panel-default">
                                <div class="panel-heading">Tables</div>
                                
                                    <div class="list-group">
                                   <?php 
                                   
                                   $tbls = get_tbls();
                                   foreach ($tbls as $tbl){
                                       echo '<a class="list-group-item" href="'.get_tbllink($tbl).'">'.ucfirst($tbl).'</a>';
                                   }
                                   
                                   
                                   ?>
                                      
                                          
                                   
                                  </div>
                              </div>