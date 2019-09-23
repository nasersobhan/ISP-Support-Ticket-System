<?php get_header(); 

$id = is_get('id');
?>
<div class="content-box">


     
    <div class="col-md-4">
    <div class="panel panel-default" >
    <div class="panel-body"> 
   

    <?php theme_include('todo/add'); ?>


</div>
</div>
</div>



<div class="col-md-8">
    <div class="panel panel-default" >

    <div id="listtodo" class="panel-body">   
        
    
    <?php 
    theme_include('todo/list');
?>


</div>

</div>

    </div>
</div> 

<?php get_footer() ?>