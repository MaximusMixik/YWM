<?php

/*
==============================
    Add Styles And Scripts
==============================
*/


function codelibry_enqueue () {

  $DEVELOPMENT = true; // change to false if PRODUCTION

  $ABSOLUTE_DIST = get_template_directory() . '/dist'; // Absolute path to the dist folder
  $DIST = get_template_directory_uri() . '/dist'; // Dir to the dist theme folder
  $LIB = get_template_directory_uri() . '/lib'; // Dir to the lib theme folder

  if($DEVELOPMENT) {
    
    $style_version = filemtime( "{$ABSOLUTE_DIST}/main.min.css" );
    $custom_version = filemtime( "{$ABSOLUTE_DIST}/main.min.js" );

  } else {

    $style_version = '1.0.0';
    $vendor_version = '1.0.0';
    $custom_version = '1.0.0';

  }


  /* Styles */
  wp_enqueue_style('bootstrap', "{$DIST}/bootstrap-grid.min.css", array(), '5.0.2', 'all');
  // wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2', 'all');

  wp_enqueue_style( 'main', "{$DIST}/main.min.css", array(), $style_version, 'all' );


  /* JavaScript */
	
  wp_deregister_script('jquery');
  wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), array(), null, array('strategy'  => 'defer'));
  wp_enqueue_script( 'jquery');
	
  // GSAP: https://gsap.com
  wp_enqueue_script( 'gsap', "{$LIB}/gsap.js", array(), '1.0.0', array('strategy'  => 'defer') );

  // GSAP Scroll Trigger (GSAP Plugin): https://gsap.com/docs/v3/Plugins/ScrollTrigger
  wp_enqueue_script( 'scroll-trigger', "{$LIB}/scroll-trigger.js", array('gsap'), '1.0.0', array('strategy'  => 'defer') );

  // Lenis Smooth Scroll: https://github.com/darkroomengineering/lenis 
  wp_enqueue_script( 'lenis', "{$LIB}/lenis.js", array(), '1.0.0', array('strategy'  => 'defer') );

  // Swiper Slider: https://swiperjs.com/get-started
  wp_enqueue_script( 'swiper', "{$LIB}/swiper.js", array(), '1.0.0', array('strategy'  => 'defer') );

  // Lottie Player: https://lottiefiles.github.io/lottie-player/usage.html
  wp_enqueue_script( 'lottie-player', "{$LIB}/lottie-player.js", array(), '1.0.0', array('strategy'  => 'defer') );

  // Our Custom JavaScript (should depend on libaries above)
  wp_enqueue_script( 'main', "{$DIST}/main.min.js", array(
    'jquery', 
    'gsap', 
    'scroll-trigger', 
    'lenis', 
    'swiper',
    'lottie-player',
  ), $custom_version, array('strategy'  => 'defer') );

 // bootstrap JS 
    // wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '5.0.2', true);

  /* Passing PHP variables to JavaScript */

  wp_localize_script( 'main', 'codelibry',
    array( 
      'ajax_url' => admin_url( 'admin-ajax.php' ),
      'ajax_nonce' => wp_create_nonce( "secure_nonce_name" ),
      'site_url' => get_site_url(),
      'theme_url' => get_template_directory_uri()
    )
  );

}

add_action('wp_enqueue_scripts', 'codelibry_enqueue');