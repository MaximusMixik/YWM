<?php

function cptui_register_my_taxes_sponsors_level() {

	/**
	 * Taxonomy: Sponsors level.
	 */

	$labels = [
		"name" => esc_html__( "Sponsors level", "ywm" ),
		"singular_name" => esc_html__( "Sponsors level", "ywm" ),
	];

	
	$args = [
		"label" => esc_html__( "Sponsors level", "ywm" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'sponsors_level', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "sponsors_level",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "sponsors_level", [ "sponsors" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_sponsors_level' );