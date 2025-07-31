<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package robbmyself
 * @since 1.0.0
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

/**
 * Insert favicons into the head section of the site.
 * Minor update to ensure favicons are loaded correctly.
 *
 * @since 1.0.0
 */
function robbmyself_insert_favicons() {
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/site.webmanifest">
	<?php
}
add_action('wp_head', 'robbmyself_insert_favicons', 20);