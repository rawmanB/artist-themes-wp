<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Makeup_Artists
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php //esc_html_e( 'Skip to content', 'makeupartists' ); ?></a> -->

	 <div class="container">
      <div class="row row-1">
        <div class="col-sm-6">
          <p class="text-1"> We are Open 
          	<?php echo get_theme_mod('open_time'); ?>
          	<?php echo get_theme_mod('day_hour_open'); ?>-
          	<?php echo get_theme_mod('close_time'); ?>
          	<?php echo get_theme_mod('day_hour_close'); ?>
          	<?php echo get_theme_mod('open-day');?> -
          	<?php echo get_theme_mod('close-day');?>
          </p>
        </div>
        <div class="col-sm-6">
          <p class="text-2">
            <a href="#" class="fa fa-phone env"><?php echo get_theme_mod('phone_no'); ?></a>
            <a href="#" class="fa fa-envelope env"><?php echo get_theme_mod('email'); ?></a>
          </p>
        </div>
      </div>
    </div>
    
    <nav class="navbar navbar-expand-md sticky-top navbar-trans navbar-light navbar-offcanvas">
      <div class="container">
        <div><?php
                    if (has_custom_logo()) {
                        echo '<div class="home-logo">'.the_custom_logo().'</div>';
                    } else {
                        echo '<div class="home-logo-1">'.get_bloginfo( 'name' ).'</div>';

                    }
                                
                    ?></div>
        <ul class="navbar-nav navbar-top">
            <?php
            wp_nav_menu(array(
            'theme_location'    => 'menu-1',
            'depth'             => 1,
            'container'         => 'div',
            'container_class'   => 'container',
            'menu_class'        => 'navbar-nav navbar-top',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
            ?>
        </ul>
        <button class="navbar-toggler navbar-toggler-right navbar-icon" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-controls="navbar-mobile" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
        </button>
        <div class="navbar-collapse collapse ml-auto" id="navbar-mobile">
            <ul class="navbar-nav ml-auto nav-1">
                <li class="nav-image">
                  <P class="nav-toggled-logo"> <?php
                  		if(has_custom_logo()){
                  			the_custom_logo();

                  		}
                  		else{
                  			  echo '<div class="home-logo-1">'.get_bloginfo( 'name' ).'</div>';
                  		}
                  	?> </P>
                    <img class="small-logo"src="" alt="">
                </li>
                 <?php
                wp_nav_menu(array(
                    'theme_location'=> 'menu-1',
                    'depth'         => 1,
                    'container'     => 'div',
                    'container_class'=> 'container',
                    'menu_class'    => 'navbar-nav ml-auto nav-1',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                )); 
                ?>
            </ul>
        </div>
    </div>

</nav>

	<div id="content" class="site-content">
