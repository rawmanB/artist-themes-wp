<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Makeup_Artists
 */

get_header();
?>
	<div class="parallax" style="background-image: url(<?php echo get_theme_mod('bg_image'); ?>);">
        <div class="container">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5" style="min-height: 500px;">
              <h1 class="mb-3 head-topics"><?php echo get_theme_mod('title'); ?></h1>
              <p><?php echo get_theme_mod('short_desc') ?></p>
            </div>
      </div>
    </div>
  </div>

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
                        
                        <img src="<?php echo get_theme_mod('side_image'); ?>" class="d-block w-100 " alt="...">
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
 
  <div class="parallax2 mt-5 md-10" data-parallax="scroll" data-image-src="<?php echo get_theme_mod('background_image_1'); ?>" data-z-index="1"> 
  <div class=" row">
    <div class="col-md-6">
      
    </div>
    <div class="col-md-6 box-2">
      <p class="advt"><?php echo get_theme_mod('title_banner');?></p>
    </div>
  </div>

</div>

<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
<?php

get_footer();
