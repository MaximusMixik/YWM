<?php

/*
 * Theme Functions
 */


/*
=====================
  Header nav menu
=====================
*/
function filter_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
  if ((in_array('menu-item-has-children', $item->classes))) {
    return '<div class="menu-item__parent">' . $item_output . '</div>';
  }
  
  return $item_output;
}

add_filter('walker_nav_menu_start_el', 'filter_walker_nav_menu_start_el', 10, 4);


/*
======================
 Move Yoast to bottom
======================
*/
function yoasttobottom() {
  return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');


/*
=================================================================
 Remove Gutenberg Block Library CSS from loading on the frontend
=================================================================
*/
function smartwp_remove_wp_block_library_css() {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');

/**
 * =================================================================
 * Check if WooCommerce is activated
 * =================================================================
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}



  /**
   * Responsive Image Helper Function
   *
   * @param string $image_id the id of the image (from ACF or similar)
   * @param string $image_size the size of the thumbnail image or custom image size
   * @param string $max_width the max width this image will be shown to build the sizes attribute 
   */

   function awesome_acf_responsive_image($image_id, $image_size, $max_width){

    // check the image ID is not blank
    if($image_id != '') {

      // set the default src image size
      $image_src = wp_get_attachment_image_url( $image_id, $image_size );

      // set the srcset with various image sizes
      $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

      // generate the markup for the responsive image
      echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

    }
  }


  // filter for tags (as a taxonomy) with comma
//  replace '--' with ', ' in the output - allow instructor tags with comma this way
if( !is_admin() ) { // make sure the filters are only called in the frontend
  $custom_taxonomy_type = 'wcs-instructor'; // here goes your taxonomy type
  
  function comma_taxonomy_filter( $tag_arr ){
      global $custom_taxonomy_type;
      $tag_arr_new = $tag_arr;
      if( $tag_arr->taxonomy == $custom_taxonomy_type && strpos( $tag_arr->name, '--' ) ){
          $tag_arr_new->name = str_replace( '--' , ', ', $tag_arr->name);
      }
      return $tag_arr_new;    
  }
  
  function comma_taxonomies_filter( $tags_arr ) {
      $tags_arr_new = array();
      foreach( $tags_arr as $tag_arr ) {
          $tags_arr_new[] = comma_taxonomy_filter( $tag_arr );
      }
      return $tags_arr_new;
  }
  
  add_filter( 'get_' . $custom_taxonomy_type, 'comma_taxonomy_filter' );
  add_filter( 'get_the_taxonomies', 'comma_taxonomies_filter' );
  add_filter( 'get_terms', 'comma_taxonomies_filter' );
  add_filter( 'get_the_terms', 'comma_taxonomies_filter' );
}

add_action('wp_enqueue_scripts', 'enqueue_modal_handler_script');

function enqueue_modal_handler_script() {
    // Enqueue the modal handler script
    wp_enqueue_script('modal-handler', get_template_directory_uri() . '/js/modal-handler.js', array('jquery'), null, true);
}

add_action('wp_ajax_get_instructor_image', 'get_instructor_image');
add_action('wp_ajax_nopriv_get_instructor_image', 'get_instructor_image');

function get_instructor_image() {
    // Check if the term ID is provided
    if (isset($_POST['term_id'])) {
        $term_id = intval($_POST['term_id']);
        
        // Retrieve the ACF image field
        $image = get_field('image', 'wcs-instructor_' . $term_id);
        
        if ($image && isset($image['url'])) {
            // Return the image URL
            wp_send_json_success(array('image_url' => $image['url']));
        } else {
            wp_send_json_error('Image not found');
        }
    } else {
        wp_send_json_error('Invalid term ID');
    }
}