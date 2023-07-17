<?php
/**
 * Plugin Name: Tors Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://shtheme.com/
 * Version:     1.0.0
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://shtheme.com
 * Text Domain: torsdev-elementor
 * Domain Path: /languages/
 */


/**
 * Main TorsDev Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class TorsDevElementor
{

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var TorsDevElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return TorsDevElementor An instance of the class.
	 */
	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{

		add_action('init', [$this, 'i18n']);
		add_action('plugins_loaded', [$this, 'init']);

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n()
	{

		load_plugin_textdomain('torsdev-elementor');

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return;
		}

		add_action('elementor/init', [$this, 'add_elementor_category'], 1);

		// Add Plugin actions
		add_action('elementor/frontend/after_register_scripts', [$this, 'register_frontend_scripts'], 10);

		// Register Widget Styles
		add_action('elementor/frontend/after_enqueue_styles', [$this, 'register_frontend_styles']);

		add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'torsdev-elementor'),
			'<strong>' . esc_html__('tors Elementor', 'torsdev-elementor') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'torsdev-elementor') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'torsdev-elementor'),
			'<strong>' . esc_html__('tors Elementor', 'torsdev-elementor') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'torsdev-elementor') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'torsdev-elementor'),
			'<strong>' . esc_html__('tors Elementor', 'torsdev-elementor') . '</strong>',
			'<strong>' . esc_html__('PHP', 'torsdev-elementor') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category()
	{
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'torsdev-elementor',
			array(
				'title' => __('tors Elementor', 'torsdev-elementor'),
				'icon'  => 'fa fa-plug',
			)
		);
	}

	/**
	 * Register Frontend Scripts
	 *
	 */
	public function register_frontend_scripts()
	{
		wp_register_script('torsdev-elementor', plugin_dir_url(__FILE__) . 'assets/js/torsdev-elementor.js', array('jquery'), self::VERSION);
	}

	/**
	 * Register Frontend styles
	 *
	 */
	public function register_frontend_styles()
	{
		wp_register_style('torsdev-elementor', plugin_dir_url(__FILE__) . 'assets/css/torsdev-elementor.css', self::VERSION);
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets()
	{

		// Include Widget files
		require_once plugin_dir_path(__FILE__) . 'widgets/banner-widget.php';


		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \TorsDevElementor\Widget\TorsDevBanner());
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls()
	{

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control('slider-widget', new Test_Control1());

	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content($id = 0)
	{
		if (class_exists('\ElementorPro\Plugin')) {
			echo do_shortcode('[elementor-template id="' . $id . '"]');
		}
		else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($id);
		}
	}

}

TorsDevElementor::instance();