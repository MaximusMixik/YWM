<?php
// form
add_filter( 'wpcf7_form_elements', 'my_wpcf7_form_elements' );

function my_wpcf7_form_elements( $content ) {
    $content = preg_replace('/ cols="\d+"/', '', $content );
    $content = preg_replace('/ rows="\d+"/', '', $content );
    return $content;
}
