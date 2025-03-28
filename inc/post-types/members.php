<?php
function cptui_register_my_cpts_members() {

	/**
	 * Post Type: Members.
	 */

	$labels = [
		"name" => esc_html__( "Members", "ywm" ),
		"singular_name" => esc_html__( "Members", "ywm" ),
	];

	$args = [
		"label" => esc_html__( "Members", "ywm" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "members", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "members", $args );
}

//add_action( 'init', 'cptui_register_my_cpts_members' );
