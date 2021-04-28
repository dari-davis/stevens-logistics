<?php
/**
 * Theme functions and definitions.
 */
function transida_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'transida-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'transida-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'transida-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'transida-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'transida_child_enqueue_styles' );