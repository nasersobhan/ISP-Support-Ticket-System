<?php get_header(); 

$id = is_get('id');
?>
<div class="content-box">


     
    <div class="col-md-4">
    
    </div>


<div class="col-md-8">
    <div class="panel panel-default" >

    <div class="panel-body ">   
        
    
    <?php if (is_get('id')) {
    theme_pg_include('view');
}
else {
    theme_pg_include('add');
} ?>


</div>

</div>

    </div>
</div> 

<?php get_footer() ?>