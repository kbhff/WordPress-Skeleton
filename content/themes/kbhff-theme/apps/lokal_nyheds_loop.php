<?php 
	//Find ud af hvilken afdeling man er på
if(do_shortcode('[types field="tilknyttede-nyheder"]') != null) {	?>

	<div class="seneste_nyheder_overskrift"><h3>Seneste Nyheder fra afdelingen</h3></div>

	
	<?php $afdeling = do_shortcode('[types field="tilknyttede-nyheder"]');
	
	
	//Gets the tree newest posts
	$args = array(
	'afdeling' => $afdeling,
	'posts_per_page'=> 6,
	'order'    => 'DSC'
);
	query_posts( $args );?>
			
		<?php if ( have_posts() ) : ?> 

				<?php  //Start the Loop  ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="home-post">
  
    <a href="<?php the_permalink();?>"> 
   
      <div class="home-thumbnail">
          <?php // check if the post has a Post Thumbnail assigned to it.
              if ( has_post_thumbnail() ) {
                  
                  the_post_thumbnail('homepage-thumb');
              } 
              
              else { ?>
              <img src="<?php bloginfo('stylesheet_directory')?>/images/default.jpg"> <?php } ?>
              
      </div>  
      <div class="post-info-date">  
          <div class="home-date"><?php the_time('F j, Y');?></div>
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
  
  <?php 
 
  endwhile; 
   endif;
   
    // Reset Query
	wp_reset_query();
	}
 ?>