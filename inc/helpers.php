<?php

require get_template_directory().'/inc/helpers/acf-image-src.php';
require get_template_directory().'/inc/helpers/acf-image-attrs.php';
require get_template_directory().'/inc/helpers/acf-link-attrs.php';
require get_template_directory().'/inc/helpers/get-array-value.php';
require get_template_directory().'/inc/helpers/get-inline-svg.php';
require get_template_directory().'/inc/helpers/pretty-log.php';
require get_template_directory().'/inc/helpers/excerpt.php';
require get_template_directory().'/inc/helpers/get-img-src.php';
require get_template_directory().'/inc/helpers/img-src.php';
require get_template_directory().'/inc/helpers/is-svg-icon.php';
require get_template_directory().'/inc/helpers/get-terms-links.php';
require get_template_directory().'/inc/helpers/get-terms-list.php';
require get_template_directory().'/inc/helpers/get-related-posts.php';

/* Wysiwig */
require get_template_directory().'/inc/helpers/content-block.php';

/* Same as above but only title + content, no wysiwig */
require get_template_directory().'/inc/helpers/heading-block.php';

/* Show 2 buttons in all templates */
require get_template_directory().'/inc/helpers/buttons-block.php';
require get_template_directory().'/inc/helpers/form-correction.php';