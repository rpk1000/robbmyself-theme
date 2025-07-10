<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package robbmyself
 * @since 1.0.01
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */// Add Stylesheets
function kadence_child_theme_enqueue_styles() {
    $parenthandle = 'kadence-style';
    $theme = wp_get_theme();
    // Add Parent Theme Stylesheet
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    // Add Child Theme Stylesheet
    wp_enqueue_style( 'kadence-child-style', get_stylesheet_uri(),
        array( $parenthandle ), // add parent theme handle as dependency
		wp_get_theme()->get( 'Version' )
    );
    
}
add_action( 'wp_enqueue_scripts', 'kadence_child_theme_enqueue_styles' );

// Add Stylesheets to the Block Editor
function kadence_child_theme_enqueue_editor_styles() {
    $parenthandle = 'kadence-style';
    $theme = wp_get_theme();
    // Add Parent Theme Stylesheet
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    // Add Child Theme Stylesheet
    wp_enqueue_style( 'kadence-child-style', get_stylesheet_uri(),
        array( $parenthandle ), // add parent theme handle as dependency
		wp_get_theme()->get( 'Version' )
    );
    
}
add_action( 'enqueue_block_assets', 'kadence_child_theme_enqueue_editor_styles' );

// Add Custom JavaScript
function enqueue_custom_script() {
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/script.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_script', 20 );