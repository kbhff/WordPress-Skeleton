 
  <div class="home-post">
  
    <a href="<?php the_permalink();?>"> 
   
    <?php
    if($cat_flag == 1) {
			include(STYLESHEETPATH.'/apps/cat-flag.php'); 
   	
			 }?> 	
          
      <div class="home-thumbnail">
          <?php // check if the post has a Post Thumbnail assigned to it.
              if ( has_post_thumbnail() ) {
                  
                  the_post_thumbnail('homepage-thumb');
              } 
              
              else { ?>
              <img src="<?php bloginfo('stylesheet_directory')?>/images/default.jpg"> <?php } ?>
              
      </div>  
      <div class="post-info-date">  
          <div class="home-date"><?php the_time('j. F Y');?></div>
         <div class="comment">	
         
         	<?php	if (get_comments_number()>0) { ?>

                  <div class="comment-yes-comment">	
                  
                   <img src="<?php bloginfo('stylesheet_directory')?>/images/comment-green.png"/>	
                  		 <?php $myNumber = get_comments_number(); ?>                		
                       <div class="comment-number"><?php echo $myNumber; ?></div>
                        
                       
                  </div>  	 
                <?php  }
                else { // or, if we don't have comments: ?>
                     <div class="comment-no-comment">	
                     	
                        <img src="<?php bloginfo('stylesheet_directory')?>/images/comment-dark.png"/>
                     </div>
                <?php }?>
                
          </div> <!--.comment-->
	  </div> <!--.post-info-date-->
	
      <div class="home-title"><h4><?php the_title(); ?></h4></div>                        
      <div class="home-post-content"><?php the_excerpt(); ?></div>
   </a>   
   
   
  </div> <!--.home-post-->
