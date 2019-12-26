<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
              <ul class="icons mt-3 pt-2">

                <?php if(get_theme_mod('fb-checkbox')=='1'){?>
                  <li class="fb"><a href="<?php echo get_theme_mod('fb-url'); ?>" class="fa fa-facebook"></a></li>
              <?php  }//endif ?>

              <?php if( get_theme_mod('insta-checkbox')=='1' ){ ?>
            
                <li class="insta"><a href="<?php echo get_theme_mod('Instagram-url');  ?>" class="fa fa-instagram"></a></li>
            <?php } //endif?>

                 <?php if( get_theme_mod( 'yt-checkbox' ) == '1'){ ?>
                    <li class="yt"><a href="<?php echo get_theme_mod('yt-url'); ?>" class="fa fa-youtube"></a></li>

                <?php } //endif ?>

                  <?php if( get_theme_mod( 'twit-checkbox' ) == '1'){ ?>
                    <li class="twit"><a href="<?php echo get_theme_mod('twit-url'); ?>" class="fa fa-twitter"></a></li>

                <?php } //endif ?>

                <?php if( get_theme_mod( 'Gplus-checkbox' ) == '1'){ ?>
                    <li class="gplus"><a href="<?php echo get_theme_mod('Gplus-url'); ?>" class="fa fa-google-plus"></a></li>

                <?php } //endif ?>
    
              </ul>
            </div>
      </div>
    </div>
  </div>

<div class="box-1 mt-1 box-3">
  <div id="carouselExampleControls" class="carousel slide slidercarousel" data-ride="carousel">
  <div class="container">
  <div class="carousel-inner">
    <?php 
  $cat = get_theme_mod('slider_cat'); 
  $args = array( 'category_name'=> $cat); 
$the_query = new WP_Query( $args ); 
 
if ( $the_query->have_posts() ) : 
   
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
      ?>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-6 mt-5 pt-5" style="max-height:450px;">
          <img src="<?php echo the_post_thumbnail_url(); ?>" class="d-block w-100 artist-img" alt="...">
      </div>
      <div class="col-md-6 mt-5 pt-5" style="max-height: 450px;">
        <h1 class="mb-3 head-topics"> <?php echo get_theme_mod('slider_title'); ?></h1>
        <div class="pt-2 paragraph scroll-ex1"><?php echo the_content() ;?></div>
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
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div class="box-1  mt-3 pt-3">
  <h1 class="mb-3 ml-5 head-topics"> <?php echo get_theme_mod('gallery_title'); ?></h1>
          <section class="gallery-block grid-gallery">
            <div class="container">
                <div class="row">
                  <?php 
                    $cat= get_theme_mod('gallery_cat');
                    $args = array('category_name'=> $cat, 'posts_per_page' => 6); 
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
  <!-- <div class="row gallery-row py-2 row-grid box-4">
    <?php 
    //$cat= get_theme_mod('gallery_cat');
    // $cat_no= get_theme_mod('gallery_cat_no');
   // $args = array( 'posts_per_page'=>3, 'category_name'=> $cat); 
    //$the_query = new WP_Query( $args ); 

    //if ( $the_query->have_posts() ) : 
    // Start the Loop 
    //while ( $the_query->have_posts() ) : $the_query->the_post(); 
      ?>


    
    <a href="<?php //the_post_thumbnail_url();?>" data-toggle="lightbox" data-gallery="gallery" class=" col-md-4 col-sm-4 col-grid mt-2">
      
      <img src="<?php //the_post_thumbnail_url();?>" class="imgfluid rounded img-grid mt-2">
    </a>

    <?php
   // endwhile; 
//else: 
   //_e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
//endif; 
 
//wp_reset_postdata(); 
?>    
  
  </div>
    <div class="row gallery-row py-2 row-grid box-4">
    <?php 
    $cat//= get_theme_mod('gallery_cat');
    // $cat_no= get_theme_mod('gallery_cat_no');
    //$args = array( 'posts_per_page'=>3, 'category_name'=> $cat, 'offset'=>3); 
   // $the_query = new WP_Query( $args ); 

    //if ( $the_query->have_posts() ) : 
    // Start the Loop 
   // while ( $the_query->have_posts() ) : $the_query->the_post(); 
      ?>


    
    //<a href="<?php //the_post_thumbnail_url()?>" data-toggle="lightbox" data-gallery="gallery" class=" col-md-4 col-sm-4 col-grid mt-2">
      
      <img src="<?php //the_post_thumbnail_url()?>" class="imgfluid rounded img-grid mt-2">
    </a>

    <?php
    //endwhile; 
//else: 
   // _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
//endif; 
 
//wp_reset_postdata(); 
?>    
  
  </div> -->
</div>

<div class="container">
  <div class="load-more">
    <?php      
    $page= get_theme_mod('themeslug_dropdownpages_setting');
    $args = array(
      'page_id' => $page);

    $the_query = new WP_Query( $args ); 

    if ( $the_query->have_posts() ) : 
    // Start the Loop 
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
      ?>
         
  <a href="<?php echo the_permalink();?>"> Load More....</a> 

  <?php
    endwhile; 
else: 
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
endif; 
 
wp_reset_postdata(); 
?>    
  
</div>
  </div>

<div class="box-1 mt-5 pt-5 md-5" >
   <div class="container">
            <div class="row py-5" >
                <div class="col-md-6">
                        <div class="well-title">
                            <h2 class="mb-3 ml-5 head-topics"><?php echo get_theme_mod('service_title');?></h2>
                        </div>
                       <div class="scroll-ex" >
                         <ul class="list-unstyled">
                          <?php 
                        $cat= get_theme_mod('service_cate');
                        $args = array( 'category_name'=> $cat); 
                        $the_query = new WP_Query( $args ); 
                         if ( $the_query->have_posts() ) : 
                        // Start the Loop 
                        while ( $the_query->have_posts() ) : $the_query->the_post();

    ?>
          <li class="media my-4">
            <img src="<?php echo the_post_thumbnail_url(); ?>" class="mr-3 thumbnail-img" alt="...">
            <div class="media-body">
              <h5><a href="<?php echo the_permalink();?>" class="mt-0 mb-1 load-more"><?php the_title(); ?></a></h5>
              <?php the_excerpt(); ?>
            </div>
          </li>
                       <?php
                endwhile; 
            else: 
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
            endif; 
             
            wp_reset_postdata(); 
            ?>    
        </ul>
    </div>
  </div>
  <div class="col-md-6 mt-2 pt-2" >
      <img src="<?php echo get_theme_mod('side_image'); ?>" class="d-block w-100 ml-5" alt="..." style="max-height: 550px;">
  </div>
</div>
</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-center m-auto">
      <div class="head-topics"><h2><?php echo get_theme_mod('title_testimonial'); ?></h2> </div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
          <?php
             $cat= get_theme_mod('testtimonial_cat');
            $args = array('posts_per_page'=>3, 'category_name'=> $cat); 
            $the_query = new WP_Query( $args ); 

            if ( $the_query->have_posts() ) : 
             while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
          <div class="item carousel-item">
            <div class="img-box"><img src="<?php the_post_thumbnail_url();?>" alt=""></div>
            <p class="testimonial"><?php the_excerpt(); ?></p>
            <p class="overview"><b><?php the_title(); ?></b></p>
          </div>
                     <?php
                endwhile; 
            else: 
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
            endif; 
             
            wp_reset_postdata(); 
            ?>  
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
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
