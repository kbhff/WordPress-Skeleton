<div class="cat-flag-all">
    <div class="cat-flag">
    <?php 
    //	if ( has_afdeling(' ') ){
    //	
    //	echo 'hallooo';
    //	} /* do something */ 
    //	else { echo 'den kan ikke finde noget';}
    ?>
    
    <?php 
    if (get_the_terms($post->ID, 'afdeling')) {
                  $taxonomy_ar = get_the_terms($post->ID, 'afdeling');
                
                 
                  foreach ($taxonomy_ar as $taxonomy_term) {
                    $output =  $taxonomy_term->name ;
                  }
                    
                  if($output == 'Alle Afdelinger'){
                      foreach((get_the_category()) as $category) { 
                         echo $category->cat_name . ' '; }
                      }	
                      
                    else { echo $output; }
                }
    
    else {
    foreach((get_the_category()) as $category) { 
        echo $category->cat_name . ' '; }
        }
    
    ?>
    

    </div>
    <div class="cat-triangle"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/black_arrow.png"></div>
</div>
