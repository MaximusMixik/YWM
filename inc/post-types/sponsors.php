<?php
function cptui_register_my_cpts_sponsors() {

	/**
	 * Post Type: Sponsors.
	 */

	$labels = [
		"name" => esc_html__( "Sponsors", "ywm" ),
		"singular_name" => esc_html__( "sponsors", "ywm" ),
	];

	$args = [
		"label" => esc_html__( "Sponsors", "ywm" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "sponsors", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businessman",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "sponsors", $args );
}

add_action( 'init', 'cptui_register_my_cpts_sponsors' );
