<?php get_header(); ?>

   
   
   

<div class="tab-pane fade active in" id="jobs">

     <table class="jobs_TBL table" id="recentjobs"  >
      <tbody>
      <tr>
        <td colspan="5" class="h20"  ><span class="style6"><strong>
                
                    
                    
         <h2> &nbsp;Job Page </h2>
         </strong></span></td>
        
     
       </tr>
        <td  colspan="5" class="h20"   >
        <form role="form" class="form-inline" action="<?php echo HOME ?>/search/job" method="post" >
                <div class="form-group">
            		<label class="sr-only" for="s_keyword">Keyword</label>
           		
                       <input type="text" class="form-control" id="s_keyword"  placeholder="Title etc." name="keyword">
          </div>
        
          <?php //get_cilist('1') ?>
          <?php //get_catelist_search() ?>
           <button type="submit" class="btn btn-default">Search</button>
       
         </form></td>
       </tr>
       <tr class="blue_head">
        <td  class="h20 w300"  ><span class="style6"><strong>&nbsp;&nbsp;Job Title</strong></span></td>
        <td class="w300"  ><span class="style6"><strong>Organization</strong></span></td>
        <td class="w50"  ><span class="style6"><strong>City</strong></span></td>
        <td class="w50"  ><span class="style6"><strong>Exp.</strong></span></td>
        <td  class="w100"  ><span class="style6"><strong>Clos. Date</strong></span></td>
       </tr>
      
       
          <?php if(have_post()) { while(have_post()) : the_post();   ?>
       
       
      <tr >
       <td class="h20"  >
           <a title="<?php job_title() ?>" href="<?php echo get_link('jobs','view',get_job_slug()); ?>"><?php job_title() ?></a></td>
       
       <td class="h20"><?php com_name() ?></td>
       <td  class=" h20" ><?php placeexport(get_job_provinces()) ?></td>
       <td  class=" h20" ><span rel="tooltip" title="" ><?php  job_experience();?>Y</span></td>
    
       <td class="h20  <?php if(get_job_closingdate() <= date('Y-m-d'))
				echo 'fred';?>"><?php job_closingdate() ?></td>
      </tr>
    
      
          <?php endwhile; } ?> 
      
     
       <tr >
       <td  colspan="5"  ><?php 
       global $total, $max_num, $curpage, $homepage; //echo $total, $max_num;
       echo pagination($total,$max_num,$curpage,$homepage.'&');  ?></td>
      </tr>
      <tr class="blue_head">
       <td class="h20 xfoot" colspan="5"  ><a title="contact us" href="<?php echo HOME ?>/emp/addjob">Post A Job (Free)</a> | <a title="Search Phone Directory" href="<?php echo HOME ?>/search/job">Search More</a></td>
      </tr>
       </tbody>
     </table>
     <br>
    
    </div>
<!--- others here -->
   </div>
  </div>



 <?php get_sidebar() ?></td>


<?php get_footer() ?>