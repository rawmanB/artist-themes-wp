<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Makeup_Artists
 */

?>

	</div><!-- #content -->

	<!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">

           <?php      
    $page= get_theme_mod('themeslug_dropdownpages_setting_id');
    $args = array(
      
      'post_type' => 'page',
      'page_id' => $page,
      'posts_per_page'=>1);

    $the_query = new WP_Query( $args ); 

    if ( $the_query->have_posts() ) : 
    // Start the Loop 
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
      ?>
          <div class="col-sm-12 col-md-6">
            <h6><?php the_title();?></h6>
            <p class="text-justify"><?php the_content();?></p>
          </div>


    <?php
    endwhile; 
else: 
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
endif; 
 
wp_reset_postdata(); 
?>    

          <div class="col-xs-6 col-md-3">
            <h6><?php echo get_theme_mod('column_title'); ?></h6>
            <ul class="footer-links">

              <?php 
                 $cat = get_theme_mod('column_cat'); 
                $args = array( 'category_name'=> $cat); 
                $the_query = new WP_Query( $args ); 
 
                if ( $the_query->have_posts() ) : 
   
                     while ( $the_query->have_posts() ) : $the_query->the_post(); 
              ?>
              <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>

                <?php
                    endwhile; 
                else: 
                    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
                endif; 
                 
                wp_reset_postdata(); 
                ?>   
            </ul>
          </div>
            <?php if( get_theme_mod( 'col3-checkbox' ) == '1'){ ?>
                    <div class="col-xs-6 col-md-3">
                      <h6><?php echo get_theme_mod('column3_title');?></h6>
                      <ul class="footer-links">
                         <?php 
                             $cat = get_theme_mod('column3_cat'); 
                            $args = array( 'category_name'=> $cat); 
                            $the_query = new WP_Query( $args ); 
             
                            if ( $the_query->have_posts() ) : 
               
                                 while ( $the_query->have_posts() ) : $the_query->the_post(); 
                          ?>
                      <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                       <?php
                            endwhile; 
                        else: 
                            _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
                        endif; 
                         
                        wp_reset_postdata(); 
                        ?>   
                    </ul>
                    </div>

                <?php } //endif ?>
          <?php if( get_theme_mod( 'col3-checkbox' ) == '0'){ ?>
          <div class="col-xs-6 col-md-3">

            <ul class="footer-links">
              <?php dynamic_sidebar( 'footer-1' ); ?>
            </ul>
          </div>
           <?php } //endif ?>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; <?php echo get_theme_mod('year'); ?>
         <a href="<?php the_permalink();?>"><?php
                    if (has_custom_logo()) {
                        echo the_custom_logo();
                    } else {
                        echo get_bloginfo( 'name' );

                    }
                                
                    ?></a>
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
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
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
