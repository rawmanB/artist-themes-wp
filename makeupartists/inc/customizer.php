<?php
/**
 * Makeup Artists Theme Customizer
 *
 * @package Makeup_Artists
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function makeupartists_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'makeupartists_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'makeupartists_customize_partial_blogdescription',
		) );

		/* add header panel*/

		$wp_customize->add_panel('header_panel_id', 
			array(
				'title' =>__('Theme Customizer', 'makeupartists'),
				'description'=>'Edit whole themme functionality',
				'priority'=> 10
			));

		/*Add section for header panel*/
		$wp_customize->add_section('top_header_section',
			array(
				'title'=>__('Top header', 'makeupartists'),
				'description' => 'Edit top header section',	
				'panel' => 'header_panel_id',
				'priority'=> 20
			));

		/* Add settings and controls for the header section*/

		/*setting and control for opening time*/
		$wp_customize->add_setting('open_time',
			array(
				'default' => __('7', 'makeupartists'),
				'transport' => 'refresh',
				'priority' => 10
			));

		$wp_customize->add_control('open_time', 
			array(
				'label' => __('Opening time', 'makeupartists'),
				'section' => 'top_header_section',
				'setting' => 'open_time',
				'panel'   => 'header_panel_id',
				'type'	=> 'text',
				'priority' => 10
			));

		/*Add opening AM/Pm option for opening time*/

		$wp_customize->add_setting('day_hour_open',
			array(
				'default' =>__('AM', 'makeupartists'),
				'transport' => 'refresh',
				'priority'  => 11
			));

		$wp_customize->add_control('day_hour_open',
			array(
				'label' => __('AM/PM', 'makeupartists'),
				'section' => 'top_header_section',
				'setting' => 'day_hour_open',
				'panel' => 'header_panel_id',
				'type' => 'select',
				'choices' =>array(
					'AM' =>__('AM'),
					'PM' => __('PM'),
				)
			));

		/*setting and control for closing time*/
		$wp_customize->add_setting('close_time',
			array(
				'default' => __('7', 'makeupartists'),
				'transport' => 'refresh',
				'priority' => 10
			));

		$wp_customize->add_control('close_time', 
			array(
				'label' => __('Closeing time', 'makeupartists'),
				'section' => 'top_header_section',
				'setting' => 'close_time',
				'panel'   => 'header_panel_id',
				'type'	=> 'text',
				'priority' => 10
			));

		/*Add opening AM/Pm optin for closingtime time*/

		$wp_customize->add_setting('day_hour_close',
			array(
				'default' =>__('PM', 'makeupartists'),
				'transport' => 'refresh',
				'priority'  => 11
			));

		$wp_customize->add_control('day_hour_close',
			array(
				'label' => __('AM/PM', 'makeupartists'),
				'section' => 'top_header_section',
				'setting' => 'day_hour_close',
				'panel' => 'header_panel_id',
				'type' => 'select',
				'choices' =>array(
					'AM' =>__('AM'),
					'PM' => __('PM'),
				)
			));

		$wp_customize-> add_setting('open-day',
			array(
				'default'=> __('Sun', 'makeupartists'),
				'transport' => 'refresh',
				'priority' => 11
			));

		$wp_customize->add_control('open-day',
			array(
				'label'=> __('Opening Day', 'makeupartists'),
				'section'=> 'top_header_section',
				'setting' => 'open-day',
				'panel' =>'header_panel_id',
				'type'	=>'select',
				'choices' => array( 
      				 'Sun' => __( 'Sunday' ),
         			'Mon' => __( 'Monday' ),
        			 'Tues' => __( 'Tuesday' ),
        			 'Wed' => __( 'wednesday' ),
         			'Thur' => __( 'Thursday' ),
        			 'Fri' => __( 'Friday' ),
         			'Sat' => __( 'Saturday' ),
      )

			));

		$wp_customize-> add_setting('close-day',
			array(
				'default'=> __('Fri', 'makeupartists'),
				'transport' => 'refresh',
				'priority' => 11
			));

		$wp_customize->add_control('close-day',
			array(
				'label'=> __('Closing Day', 'makeupartists'),
				'section'=> 'top_header_section',
				'setting' => 'close-day',
				'panel' =>'header_panel_id',
				'type'	=>'select',
				'choices' => array( 
      				 'Sun' => __( 'Sunday' ),
         			'Mon' => __( 'Monday' ),
        			 'Tues' => __( 'Tuesday' ),
        			 'Wed' => __( 'wednesday' ),
         			'Thur' => __( 'Thursday' ),
        			 'Fri' => __( 'Friday' ),
         			'Sat' => __( 'Saturday' ),
      )

			));

		$wp_customize->add_setting( 'phone_no',
   array(
      'default' => '9812345678', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'phone_no',
   array(
      'label' => __( 'Contact No.', 'makeupartist' ),
      'section' => 'top_header_section',
      'panel' =>'header_panel_id',
      'setting'=> 'phone_no',
      'priority' => 12, 
      'type' => 'text',
  
    
   )
);

    $wp_customize->add_setting( 'email',
   array(
      'default' => 'abc@mail.com', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'email',
   array(
      'label' => __( 'Contact Email', 'makeupartist' ),
      'section' => 'top_header_section',
      'panel' =>'header_panel_id',
      'setting' => 'email',
      'priority' => 12, 
      'type' => 'text',
  
    
   )
);

    /*header banner*/

$wp_customize->add_section('header_banner',
array(
'title'=>__('Header banner', 'makeupartists'),
'description' => 'Edit top header banner',	
'panel' => 'header_panel_id',
'priority'=> 21));

/* banner title*/

$wp_customize->add_setting( 'title',
   array(
      'default' => 'Lorem ipsum', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'title',
   array(
      'label' => __( 'Title Header', 'makeupartist' ),
      'section' => 'header_banner',
      'panel' =>'header_panel_id',
      'setting' => 'title',
      'priority' => 12, 
      'type' => 'text',
  
    
   )
);

    /*banner title short description*/

    $wp_customize->add_setting('short_desc',
array(
'default' => 'lorem ipsum ',
'transport' => 'refresh',
));
    $wp_customize->add_control( 'short_desc',
   array(
      'label' => __( 'Short Description', 'makeupartist' ),
      'section' => 'header_banner',
      'panel' =>'header_panel_id',
      'setting' => 'short_desc',
      'priority' => 13, 
      'type' => 'textarea',
  
    
   )
);

    /*banner background image*/
    $wp_customize->add_setting('bg_image', 
array(
	'default' => '',
	'transport' =>'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bg_image',
array( 'label'    => __('Image Upload Test', 'makeupartist'),
     'section' => 'header_banner',
      'panel' =>'header_panel_id',
        'settings' => 'bg_image'

    )));

   

	/*Add section for Slider*/
		$wp_customize->add_section('slider',
			array(
				'title'=>__('First Slider', 'makeupartists'),
				'description' => 'Edit slider section',	
				'panel' => 'header_panel_id',
				'priority'=> 30,
			));

		/* Add settings and controls for the slider section*/

		/*setting and control for slider title */
		$wp_customize->add_setting('slider_title',
			array(
				'default' => __('Meet Our Makeup Artists', 'makeupartists'),
				'transport' => 'refresh',
				'priority' => 10
			));

		$wp_customize->add_control('slider_title', 
			array(
				'label' => __('Header of slider', 'makeupartists'),
				'section' => 'slider',
				'setting' => 'slider_title',
				'panel'   => 'header_panel_id',
				'type'	=> 'text',
				'priority' => 10
			));
    $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->slug;
      $i++;
    }
    $cats[$category->slug] = $category->name;
  }

/*setting and control for get categories*/
    $wp_customize->add_setting('slider_cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('slider_cat', 
      array(
        'label' => __('Choose any caregories to be displayed', 'makeupartists'),
        'section' => 'slider',
        'setting' => 'slider_cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));

    /*Add section for Slider*/
    $wp_customize->add_section('gallery',
      array(
        'title'=>__('Gallery', 'makeupartists'),
        'description' => 'Edit gallery section', 
        'panel' => 'header_panel_id',
        'priority'=> 31,
      ));

  

    /*setting and control for slider title */
    $wp_customize->add_setting('gallery_title',
      array(
        'default' => __('Recent works', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));

    $wp_customize->add_control('gallery_title', 
      array(
        'label' => __('Header of gallery', 'makeupartists'),
        'section' => 'gallery',
        'setting' => 'gallery_title',
        'panel'   => 'header_panel_id',
        'type'  => 'text',
        'priority' => 10
      ));

    /*setting and control for get categories*/
    $wp_customize->add_setting('gallery_cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('gallery_cat', 
      array(
        'label' => __('Choose any categories to be displayed', 'makeupartists'),
        'section' => 'gallery',
        'setting' => 'gallery_cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));

    $wp_customize-> add_setting('themeslug_dropdownpages_setting',
      array(
        'default'=> __('', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_dropdown_pages',
      ));
 
    $wp_customize->add_control('themeslug_dropdownpages_setting', array(
        'label'      => __('chose a page to display on clicking load more', 'makeupartists'),
        'section'    => 'gallery',
        'panel'   => 'header_panel_id',
        'type'    => 'dropdown-pages',
        'settings'   => 'themeslug_dropdownpages_setting',
    ));

    /*Add section for Slider*/
    $wp_customize->add_section('service',
      array(
        'title'=>__('Our Services Section', 'makeupartists'),
        'description' => 'Edit our services section', 
        'panel' => 'header_panel_id',
        'priority'=> 32,
      ));

     /*setting and control for title of the sectiom*/
    $wp_customize->add_setting('service_title',
      array(
        'default' => __('Our Services', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('service_title', 
      array(
        'label' => __('Title for the section', 'makeupartists'),
        'section' => 'service',
        'setting' => 'service_title',
        'panel'   => 'header_panel_id',
        'type'  => 'text',
    
      ));

    /*setting and control for get categories*/
    $wp_customize->add_setting('service_cate',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('service_cate', 
      array(
        'label' => __('Choose any categories to be displayed', 'makeupartists'),
        'section' => 'service',
        'setting' => 'service_cate',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));

    /*banner background image*/
    $wp_customize->add_setting('side_image', 
array(
  'default' => '',
  'transport' =>'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'side_image',
array( 'label'    => __('Image Upload Test', 'makeupartist'),
        'section' => 'service',
        'setting' => 'side_image',
        'panel'   => 'header_panel_id',

    )));
  $wp_customize->add_section('testimonial',
array(
'title'=>__('testimonial Section', 'makeupartists'),
'description' => '',  
'panel' => 'header_panel_id',
'priority'=> 33));

  /*setting and control for title of the sectiom*/
    $wp_customize->add_setting('title_testimonial',
      array(
        'default' => __('Our happy costumers', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('title_testimonial', 
      array(
        'label' => __('Quote for the section', 'makeupartists'),
        'section' => 'testimonial',
        'setting' => 'title_testimonial',
        'panel'   => 'header_panel_id',
        'type'  => 'text',
    
      ));

    /*setting and control for get categories*/
    $wp_customize->add_setting('testtimonial_cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('testtimonial_cat', 
      array(
        'label' => __('Choose any categories to be displayed', 'makeupartists'),
        'section' => 'testimonial',
        'setting' => 'testtimonial_cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));
/* banner section*/
  $wp_customize->add_section('second_banner',
array(
'title'=>__('Second banner Section', 'makeupartists'),
'description' => 'Edit iage and quote of the section',  
'panel' => 'header_panel_id',
'priority'=> 34));

  /*setting and control for title of the sectiom*/
    $wp_customize->add_setting('title_banner',
      array(
        'default' => __('Slay always', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('title_banner', 
      array(
        'label' => __('Quote for the section', 'makeupartists'),
        'section' => 'second_banner',
        'setting' => 'title_banner',
        'panel'   => 'header_panel_id',
        'type'  => 'text',
    
      ));

    /*banner background image*/
    $wp_customize->add_setting('background_image_1', 
array(
  'default' => '',
  'transport' =>'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'background_image_1',
array( 'label'    => __('Image Upload', 'makeupartist'),
        'section' => 'second_banner',
        'setting' => 'background_image_1',
        'panel'   => 'header_panel_id',

    )));
  /* footer section*/
  $wp_customize->add_section('footer',
array(
'title'=>__('Footer Section', 'makeupartists'),
'description' => 'Edit footer section',  
'panel' => 'header_panel_id',
'priority'=> 35,));

  $wp_customize-> add_setting('themeslug_dropdownpages_setting_id',
      array(
        'default'=> __('', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_dropdown_pages',
      ));
 
    $wp_customize->add_control('themeslug_dropdownpages_setting_id', array(
        'label'      => __('FIRST COLUMN (chose a page to display (About page recommended))', 'makeupartists'),
        'section'    => 'footer',
        'panel'   => 'header_panel_id',
        'type'    => 'dropdown-pages',
        'settings'   => 'themeslug_dropdownpages_setting_id',
    ));

    /*setting and control for secondcolumn title */
    $wp_customize->add_setting('column_title',
      array(
        'default' => __('Services', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));

    $wp_customize->add_control('column_title', 
      array(
        'label' => __('SECOND COLUMN (Header of column)', 'makeupartists'),
        'section'    => 'footer',
        'panel'   => 'header_panel_id',
        'setting'  => 'column_title',
        'type'  => 'text',
        'priority' => 10
      ));

    /*setting and control for get categories*/
    $wp_customize->add_setting('column_cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('column_cat', 
      array(
        'label' => __('Choose any categories to be displayed in second column', 'makeupartists'),
        'section' => 'footer',
        'setting' => 'column_cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));
    $wp_customize->add_setting('column3_title',
      array(
        'default' => __('categories', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));

    $wp_customize->add_control('column3_title', 
      array(
        'label' => __('THIRD COLUMN (Header of column)', 'makeupartists'),
        'section'    => 'footer',
        'panel'   => 'header_panel_id',
        'setting'  => 'column3_title',
        'type'  => 'text',
        'priority' => 10
      ));

     /*setting and control for get categories*/
    $wp_customize->add_setting('column3_cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('column3_cat', 
      array(
        'label' => __('Choose any categories to be displayed in second column', 'makeupartists'),
        'section' => 'footer',
        'setting' => 'column3_cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));

    $wp_customize->add_setting( 'col3-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'col3-checkbox',
   array(
      'label' => __( 'Add categories in THIRD COLUMN', 'makeupartist' ),
      'section' => 'footer',
      'panel' =>'header_panel_id',
      'settings' => 'col3-checkbox',

      'priority' => 10, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);

/*setting and control for title of the sectiom*/
    $wp_customize->add_setting('year',
      array(
        'default' => __('2019', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('year', 
      array(
        'label' => __('year of theme customized', 'makeupartists'),
       'section' => 'footer',
      'panel' =>'header_panel_id',
      'settings' => 'year',
        'type'  => 'text',
    
      ));

 /*social media icons display and linkls*/

 /* social links section*/
  $wp_customize->add_section('social_links_icons',
array(
'title'=>__('Soicla media Links and Icons', 'makeupartists'),
'description' => 'Edit social media links ',  
'panel' => 'header_panel_id',
'priority'=> 35));

    $wp_customize->add_setting( 'fb-url',
   array(
      'default' => 'Facebook URL', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'fb-url',
   array(
      'label' => __( 'Facebook URL', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, 
      'type' => 'text',
  
    
   )
);

$wp_customize->add_setting( 'fb-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'fb-checkbox',
   array(
      'label' => __( 'Add Facebook Icon', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',
      'priority' => 14, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);

$wp_customize->add_setting( 'Instagram-url',
   array(
      'default' => 'Instagram URL', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'Instagram-url',
   array(
      'label' => __( 'Instagram URL', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, 
      'type' => 'text',
  
    
   )
);

$wp_customize->add_setting( 'insta-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'insta-checkbox',
   array(
      'label' => __( 'Add Instagram Icon', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);

$wp_customize->add_setting( 'yt-url',
   array(
      'default' => 'Youtube URL', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'yt-url',
   array(
      'label' => __( 'Youtube URL', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, 
      'type' => 'text',
  
    
   )
);

$wp_customize->add_setting( 'yt-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'yt-checkbox',
   array(
      'label' => __( 'Add Youtube Icon', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);
$wp_customize->add_setting( 'twit-url',
   array(
      'default' => 'Twitter URL', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'twit-url',
   array(
      'label' => __( 'Twitter URL', 'makeupartist' ),
     'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, 
      'type' => 'text',
  
    
   )
);

$wp_customize->add_setting( 'twit-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'twit-checkbox',
   array(
      'label' => __( 'Add Twitter Icon', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);
$wp_customize->add_setting( 'Gplus-url',
   array(
      'default' => 'Google+ URL', 'makeupartist',
      'transport' => 'refresh', 
   )
);

    $wp_customize->add_control( 'Gplus-url',
   array(
      'label' => __( 'Google+ URL', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, 
      'type' => 'text',
  
    
   )
);

$wp_customize->add_setting( 'Gplus-checkbox',
   array(
      'default' => 0,
      'transport' => 'refresh',
   )
);
 
$wp_customize->add_control( 'Gplus-checkbox',
   array(
      'label' => __( 'Add Google+ Icon', 'makeupartist' ),
      'section' => 'social_links_icons',
      'panel' =>'header_panel_id',

      'priority' => 14, // Optional. Order priority to load the control. Default: 10
      'type'=> 'checkbox',
   )
);

/*Add section for Gallery page*/
    $wp_customize->add_section('gallery-page',
      array(
        'title'=>__('Gallery Page', 'makeupartists'),
        'description' => 'Edit gallery section', 
        'panel' => 'header_panel_id',
        'priority'=> 35,
      ));

  

    /*setting and control for slider title */
    $wp_customize->add_setting('gallery-page-title',
      array(
        'default' => __('Gallery', 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));

    $wp_customize->add_control('gallery-page-title', 
      array(
        'label' => __('Header of gallery', 'makeupartists'),
        'section' => 'gallery-page',
        'setting' => 'gallery-page-title',
        'panel'   => 'header_panel_id',
        'type'  => 'text',
        'priority' => 10
      ));

    /*setting and control for get categories*/
    $wp_customize->add_setting('gallery-page-cat',
      array(
        'default' => __($default, 'makeupartists'),
        'transport' => 'refresh',
        'priority' => 10
      ));



    $wp_customize->add_control('gallery-page-cat', 
      array(
        'label' => __('Choose any categories to be displayed', 'makeupartists'),
        'section' => 'gallery-page',
        'setting' => 'gallery-page-cat',
        'panel'   => 'header_panel_id',
        'type'  => 'select',
        'choices'=>$cats,
      ));

     

  


    function themeslug_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );

  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}




	}
}
add_action( 'customize_register', 'makeupartists_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function makeupartists_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function makeupartists_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function makeupartists_customize_preview_js() {
	wp_enqueue_script( 'makeupartists-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'makeupartists_customize_preview_js' );
