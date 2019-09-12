<?php get_header(); global $curr, $sizetype;  ?>
<div class="content-box">
    
    <style>
        
     .well{min-height: 200px}
        
        
        
</style>
    
      
<div class="panel panel-default" >
    <div class="panel-heading "><h3> نرم افزار قطره v<?php echo get_sitever(); ?><img width="16px" src="http://qd.sobhansoft.com/oy_theme/qatra/img/logo.png" class="pull-left img-responsive"></h3></div>
    <div class="panel-body ">   
    
    
    <div class="col-md-4">
        <div class="well text-center">
   <h3><?php e_lbl('update'); ?></h3>
              
              <p><?php echo g_lbl('current,version').': v'.get_sitever();
              if(newupdate())
                  echo '<br/>'.g_lbl('newupdatefound').'<br/><br/><a href="'.HOME.'?pg=update" class="btn btn-warning">'.g_lbl('update').'</a>';
              else
                   echo '<p class="text-success">'.g_lbl('noupdatefound').'.</p>'
              
              ?>
                  
    </div>
    </div>
          <div class="col-md-4"><div class="well text-center">
              <h3><?php e_lbl('licence'); ?></h3>
              
              <p><?php
              $le = get_licence();
              //echo g_lbl('licence').': '.$le;
              if($le=='TRIAL'){
                  $datetrial = get_setting('TRIAL');
                  
                  $d = date('l, F d y', strtotime($datetrial. ' + 15 day'));// (date('Y m d',$datetrial) + 15);
                  echo '<span class="text-danger">'.g_lbl('triallicence').'<br/>'.g_lbl('ucanuseuntl').'<br/>'.$d.'</span><br/>'.g_lbl('contacttoorder').'<br/><a target="_blank" href="http://sobhansoft.com/contact" class="btn btn-info">'.g_lbl('contactus').'</a>';
              }else{
                   echo '<p>'.g_lbl('licenced').'</p>';
                    echo '<h3 class="text-info"><mark>'.  get_setting('companyname').'</mark></h3>';
                     echo '<p>'.g_lbl('liewarning').'</p>';
              }
              ?>
                  
                  
                  
              </p>
            </div>   
    </div>
    
    
   
    
      <div class="col-md-4">
         
          <div class="well">
              <h3>پیغام ما</h3>
              <p>
                   <img src="http://qd.sobhansoft.com/oy_theme/qatra/img/logo.png" class="pull-right img-responsive">
              <?php echo get_ssmsg() ?>
              </p>
              
          </div>

    </div>
       
    </div></div>
    

  <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?>  <i class="fa fa-area-chart pull-left" aria-hidden="true"></i></h3>
   
    
    </div>
    <div class="panel-body ">    


        <?php //get_15daysre() ?>
        
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart','bar']});
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
       // data.addColumn('type', 'Slices');
        <?PHP 
             $oild =  cat_2arr_l('house',0,'fa_AF');
                $STORE= ARRAY();
                
            foreach($oild as $id => $label){
                $STORE[$id] = $label;   
            }
$oildx =  cat_2arr_l('oiltype',0,'fa_AF');
        ?>     
        data.addRows([<?php 
        $count = count($STORE);
        $i=0;
    foreach($STORE as $id => $label){
       echo "['".$label."', ".get_total($id)."]";
       if($i<=$count)
           echo ',';
       $i++;
    }  ?>]);
   
        var optionsx = {'title':'مقدار موجودی تیل در مخزنها',
                       'width':500,
                       'height':300,
                   fontName: 'Tahoma', 'is3D':true,
                   fontSize: '13',
               dir:'rtl'};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, optionsx);
      }
      
      
      
      
      
         
     
      function drawChartz() {
        var data = google.visualization.arrayToDataTable([
          ['روزها', 'فروش', 'خرید'],
          
          
          <?php 
          $resu = get_15daysre();
          
          
          //print_r($resu);
          foreach ($resu as $date => $res){
              if(!isset($res['sell'])) $res['sell'] = 0;
              if(!isset($res['buy'])) $res['buy'] = 0;
              echo " ['{$date}', ".$res['sell'].", ".$res['buy']."],";
          }
          
          ?>

        
        ]);


        var options = {
             
          
    
            fontName: 'Tahoma', 
            fontSize: '12', dir:'rtl',align:'right',
       
        
        title: 'خرید و فروش روغنیات روزانه',
        //chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'روز',
          minValue: 0,
        },
        vAxis: {
          title: 'خرید و فروش'
        }
      };

 var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
      
      
      
      
      <?php  $oildtype =  cat_2arr_l('oiltype',0,'fa_AF');
       $oilhouse =  cat_2arr_l('house',0,'fa_AF');
      
      ?>
      
      function drawChartx() {
        var data = google.visualization.arrayToDataTable([
           <?php 
         // $resu = get_15daysre();
        
                 echo " ['مخزن'"; //$res['sell'].", ".$res['buy']."],";
                  
                 foreach($oildtype as $sid => $slabel)
                 echo ",'".$slabel."'";   
                 //echo '<th width="80px">'.$label.'</th>'; 
                 echo '],';
          
          
            foreach($oilhouse as $id => $label){
                 echo " ['{$label}' "; //$res['sell'].", ".$res['buy']."],";
                  
                 foreach($oildtype as $sid => $slabel)
                    echo ','.get_total($id,$sid);   
                 //echo '<th width="80px">'.$label.'</th>'; 
                 echo '],';
                 
            }
          
 
//          
          ?>

        
        ]);

        
        var options = {
             
      
            'height':300,
            fontName: 'Tahoma', 
            fontSize: '12', dir:'rtl',align:'right',
       
        
        title: 'موجودی روغنیات در مخزنها',
        //chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'تن',
          minValue: 0,
        }     
      };

 var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
     // chart.draw(data, options);
      
      
       // var chart = new google.charts.Bar(document.getElementById('chart_div2'));

        chart.draw(data, options);
      }
      
      
      
      
      
      
      
      
      
        google.charts.setOnLoadCallback(drawChart);
     //   google.charts.setOnLoadCallback(drawTrendlines);
      
      google.charts.setOnLoadCallback(drawChartz);
      google.charts.setOnLoadCallback(drawChartx);
    </script>


    
    
   
    
    
    <div class="col-md-5" id="chart_div"></div>
  <div class="col-md-7" id="chart_div3"></div>
    
    
       

    <div class="col-md-12" id="chart_div2"></div>
    
<!--    <br/>
    <hr/>
           <div class="col-md-6"> <?php theme_include('parts/moneystat'); ?></div>
    <div class="col-md-6"> <?php theme_include('parts/oilinstock'); ?></div>-->
</div></div>




<div class="panel panel-default" >
    <div class="panel-heading "><h3> وضعیت قیمت روغنیات در جهان<i class="fa fa-area-chart pull-left" aria-hidden="true"></i></h3></div>
    <div class="panel-body ">   
    
    
    <div class="col-md-3">
            <script type="text/javascript"
	src="http://www.oil-price.net/TABLE2/gen.php?lang=en">
</script>

    </div>
          <div class="col-md-3">
       <script type="text/javascript"
	src="http://www.oil-price.net/widgets/brent_crude_price_large/gen.php?lang=en">
</script>
    </div>
    
    
      <div class="col-md-3">

<script type="text/javascript" src="http://www.oil-price.net/widgets/natural_gas_large/gen.php?lang=en#natural_gas_large"> </script>


    </div>
    
      <div class="col-md-3">
 <script type="text/javascript"
	src="http://www.oil-price.net/COMMODITIES/gen.php?lang=en">
</script>


    </div>
        
    </div></div>









</div>

<?php get_footer() ?>