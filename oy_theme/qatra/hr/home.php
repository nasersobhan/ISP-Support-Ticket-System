<?php get_header(); 

$id = is_get('id');
?>
<div class="content-box">


     
    <div class="col-md-4">
    
    </div>


<div class="col-md-8">
    <div class="panel panel-default" >

    <div class="panel-body ">   
        
    
<?php 
if (is_get('overtime')) {
    theme_pg_include('overtime');
}
else {
    theme_pg_include('leave');
} 
?>


</div>

</div>

    </div>
</div> 

<?php get_footer() ?>