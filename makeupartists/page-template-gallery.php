<?php
/* Template Name: Gallery */

get_header();
?>
        <section class="gallery-block grid-gallery">
            <div class="container">
                <div class="heading">
                    <h1 class="mb-3 ml-5 head-topics"> <?php echo get_theme_mod('gallery-page-title'); ?></h1>
                </div>
                <div class="row">
                	<?php 
                		$cat= get_theme_mod('gallery-page-cat');
					    $args = array('category_name'=> $cat); 
					    $the_query = new WP_Query( $args ); 

					    if ( $the_query->have_posts() ) :
					    while ( $the_query->have_posts() ) : $the_query->the_post(); 
					      ?>

      
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="<?php the_post_thumbnail_url();?>">
                            <img class="image scale-on-hover gallery-img" src="<?php the_post_thumbnail_url(); ?>">
                        </a>
                    </div>
                    <?php
					    endwhile; 
					else: 
					    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
					endif; 
					 
					wp_reset_postdata(); 
					?>
                    
                </div>
            </div>
        </section> 
        <?php
get_footer();
  ?>