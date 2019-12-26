<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Makeup_Artists
 */

get_header();
?>
<div class="container">
  	<div class="box-4">

		<?php if ( have_posts() ) : ?>

			<header class="heading">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="row">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

				<div class="col-md-6 mt-5 pt-5">

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
			</div>
			<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
