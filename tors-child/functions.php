<?php
/**
 * Setup Moroko Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function moroko_child_theme_setup()
{
	load_child_theme_textdomain('moroko-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'moroko_child_theme_setup');


add_action('after_setup_theme', 'my_load_plugin');

// This function loads the plugin.
function my_load_plugin()
{
	include_once('plugins/tors-elementor/tors-elementor.php');
}