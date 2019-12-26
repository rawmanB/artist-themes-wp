<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Makeup_Artists
 */

get_header();
?>
  <div class="container">
  	<div class="box-4">
  		<div class="heading">
          	<h1 class="mb-3 ml-5 mt-5 head-topics"> <?php the_title(); ?></h1>
         </div>
  		<div class="row">
  			<?php
 
  			while ( have_posts() ) : the_post(); 
					      ?>
  			<div class="col-md-6 mt-5 pt-5">
  				<?php
                    if (has_post_thumbnail()) { ?>
                        <img src="<?php echo the_post_thumbnail_url(); ?>" class="d-block w-100 artist-img" alt="...">
                    <?php } else {?>
                        
                        <img src="<?php echo get_theme_mod('side_image'); ?>" class="d-block w-100 artist-img" alt="...">
                    <?php } 
                                
                    ?>
          
      </div>
  			<div class="col-md-6 mt-5 pt-5">
  				<?php the_content(); ?>
  			</div>
  				<?php
				 endwhile;
					 ?>
  		</div>
  	</div>
  </div>

  <div class="container mt-5 mb-5">
  <div class="well-title">
    <h2 class="mb-3 ml-5 head-topics"><?php echo get_theme_mod('service_title');?></h2>
    </div>
  	<div class="row">
  			<?php 
                        $cat= get_theme_mod('service_cate');
                        $args = array( 'category_name'=> $cat); 
                        $the_query = new WP_Query( $args ); 
                         if ( $the_query->have_posts() ) : 
                        // Start the Loop 
                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		   <div class="col-sm-3 py-1"> 	
  			<div class="card">
			  <img src="<?php echo the_post_thumbnail_url(); ?>" class="card-img-top card-img-size" alt="...">
			  <div class="card-block">
			    <h5 class="card-title"><?php the_title(); ?></h5>
			    <p class="card-text"><?php the_excerpt();?></p>
			    <a href="<?php echo get_permalink(); ?>" class="load-more">Read...</a>
			  </div>
			</div>
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

  	<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
  
<?php
get_footer();
