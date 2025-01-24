<?php

// ACF Settings


/*
==================
 ACF options page
==================
*/
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Site Settings',
		'menu_title' => 'Site Settings',
		'menu_slug' => 'site-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	// Place, where we add social media links
	acf_add_options_sub_page(array(
		'page_title' => 'Social Media',
		'menu_title' => 'Social media',
		'parent_slug' => 'site-settings',
	));

	// Allow client to add GTM, Analytics and other scripts to the head, body etc.
	acf_add_options_sub_page(array(
		'page_title' => 'Scripts',
		'menu_title' => 'Scripts',
		'parent_slug' => 'site-settings',
	));

	// Allow client to change 404 copy
	acf_add_options_sub_page(array(
		'page_title' => '404 - Error page',
		'menu_title' => '404 - Error page',
		'parent_slug' => 'site-settings',
	));

	// Header Settings
	acf_add_options_sub_page(array(
		'page_title' => 'Header Settings',
		'menu_title' => 'Header Settings',
		'parent_slug' => 'site-settings',
	));

	// Footer Settings
	acf_add_options_sub_page(array(
		'page_title' => 'Footer Settings',
		'menu_title' => 'Footer Settings',
		'parent_slug' => 'site-settings',
	));
}


// add blocks thumbnails

    // 'features',
$layouts = [
    'hero',
    'faq',
    'duplex_1',
    'media-block_1',
    'content',
    'info',
    'speakers',
    'testimonials',
    'sponsors',
    'pricing',
    'contact-us',
    'schedule',
    'resources',
    'event',
    'benefits',
    'sponsors-info',
    'event-translation',
    'payment',
];

foreach ($layouts as $image) {
    add_filter("acfe/flexible/thumbnail/layout={$image}", function($thumbnail, $field, $layout) use ($image) {
        return get_template_directory_uri() . "/assets/images/blocks-preview/{$image}.jpg";
    }, 10, 3);
}

add_action('admin_head', 'acf_flexible_admin_styles');
function acf_flexible_admin_styles() {
    echo '<style>
        .acfe-flexible-layout-thumbnail {
            background-size: contain;
        }
    </style>';
}

