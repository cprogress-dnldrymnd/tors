<?php
/**
 * Setup Moroko Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */

define('theme_dir', get_stylesheet_directory_uri() . '/');
define('assets_dir', theme_dir . 'assets/');
define('image_dir', assets_dir . 'images/');
define('vendor_dir', assets_dir . 'vendors/');
function moroko_child_theme_setup()
{
	load_child_theme_textdomain('moroko-child', get_stylesheet_directory() . '/languages');
	//include_once('plugins/tors-elementor/tors-elementor.php');

}
add_action('after_setup_theme', 'moroko_child_theme_setup');
/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function enqueue_scripts()
{
	
	wp_enqueue_script('tors-main', assets_dir . 'javascripts/main.js');

}

add_action('wp_enqueue_scripts', 'enqueue_scripts'); // Register this fxn and allow Wordpress to call it automatcally in the header

/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields()
{
	require_once('includes/post-meta.php');
}


/*-----------------------------------------------------------------------------------*/
/* Require Files
/*-----------------------------------------------------------------------------------*/
require_once('includes/post-types.php');
require_once('includes/shortcodes.php');


add_filter('wpcf7_autop_or_not', '__return_false');