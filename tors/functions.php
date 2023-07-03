<?php
$moroko_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function moroko_theme_setup() {
    /*
    * This theme uses a custom image size for featured images, displayed on
    * "standard" posts and pages.
    */
    add_theme_support( 'custom-header' ); 
    add_theme_support( 'custom-background' );
    $lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('moroko', $lang);
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( "title-tag" );
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'audio' ) );
    add_post_type_support( 'project', 'post-formats' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu: Chosen menu in Home page, single, blog, pages ...', 'moroko' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'moroko_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

if(!function_exists('moroko_custom_frontend_style')){
    function moroko_custom_frontend_style(){
        global $moroko_redux_demo;
        echo '<style type="text/css">'.$moroko_redux_demo['custom-css'].'</style>';
    }
}
add_action('wp_head', 'moroko_custom_frontend_style');
 
function moroko_theme_scripts_styles() {
$moroko_redux_demo = get_option('redux_demo');
$protocol = is_ssl() ? 'https' : 'http';
   wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css');
   wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css');
   wp_enqueue_style( 'moroko-animate', get_template_directory_uri().'/css/animate.min.css');
   wp_enqueue_style( 'moroko-css', get_template_directory_uri().'/css/style.css');
   wp_enqueue_style( 'moroko-flexslider', get_template_directory_uri().'/css/flexslider.css');
   wp_enqueue_style( 'googlefonts-1', 'https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300', array(), null );
   wp_enqueue_style( 'googlefonts-2', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), null );
   wp_enqueue_style( 'moroko-style', get_stylesheet_uri(), array(), '2022-10-10' );

if(isset($moroko_redux_demo['rtl']) && $moroko_redux_demo['rtl']==1){
   wp_enqueue_style( 'rtl', get_template_directory_uri().'/rtl.css');  }

if(isset($moroko_redux_demo['chosen-color']) && $moroko_redux_demo['chosen-color']==1){
   wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
   } 
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
   wp_enqueue_script( 'comment-reply' );

   //Javascript 
   wp_enqueue_script('googleapis','http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js',array(),false,true);
   wp_enqueue_script('moroko-owl-carousel', get_template_directory_uri().'/js/owl.carousel.js',array(),false,true);
   wp_enqueue_script('moroko-owl-carousel-settings', get_template_directory_uri().'/js/owl-carousel-settings.js',array(),false,true);
   wp_enqueue_script('moroko-jquery-flexslider', get_template_directory_uri().'/js/jquery.flexslider.js',array(),false,true);
   wp_enqueue_script('moroko-flexslider-settings', get_template_directory_uri().'/js/flexslider-settings.js',array(),false,true);
   wp_enqueue_script('moroko-countdown', get_template_directory_uri().'/js/countdown.js',array(),false,true);
   wp_enqueue_script('jquery-mousewheel', get_template_directory_uri().'/js/jquery.mousewheel-3.0.6.pack.js',array(),false,true);
   wp_enqueue_script('jquery-fancybox', get_template_directory_uri().'/js/jquery.fancybox.js?v=2.1.5',array(),false,true);
   wp_enqueue_script('moroko-mini-grid', get_template_directory_uri().'/js/mini-grid.js',array(),false,true);
   wp_enqueue_script('moroko-settings', get_template_directory_uri().'/js/settings.js',array(),false,true);
   wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js',array(),false,true);
   wp_enqueue_script('featherlight', get_template_directory_uri().'/js/featherlight.min.js',array(),false,true);
   wp_enqueue_script('moroko-animation', get_template_directory_uri().'/js/animation.js',array(),false,true);
}
  
add_action( 'wp_enqueue_scripts', 'moroko_theme_scripts_styles' );
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
  return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
function moroko_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'moroko_mime_types');

//Custom Excerpt Function
function moroko_do_shortcode($content) {
  global $shortcode_tags;
  if (empty($shortcode_tags) || !is_array($shortcode_tags))
      return $content;
  $pattern = get_shortcode_regex();
  return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}
// Widget Sidebar
function moroko_widgets_init() {
	register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'moroko' ),
    'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'moroko' ),        
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h4>',        
		'after_title'   => '</h4>'
    ) ); 
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Top Widget Area', 'matelick' ),
    'id'            => 'footer-area-1',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'matelick' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<div class="main-title">
                            <span>',
    'after_title'   => '    </span>
                        </div>',
    ) );
     register_sidebar( array(
    'name'          => esc_html__( 'Footer One Widget Area', 'matelick' ),
    'id'            => 'footer-area-2',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'matelick' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Two Widget Area', 'matelick' ),
    'id'            => 'footer-area-3',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'matelick' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Three Widget Area', 'matelick' ),
    'id'            => 'footer-area-4',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'matelick' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Four Widget Area', 'matelick' ),
    'id'            => 'footer-area-5',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'matelick' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'moroko_widgets_init' );

//function tag widgets
function moroko_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'moroko_tag_cloud_widget' );
function moroko_excerpt() {
  $moroko_redux_demo = get_option('redux_demo');
  if(isset($moroko_redux_demo['blog_excerpt'])){
    $limit = $moroko_redux_demo['blog_excerpt'];
  }else{
    $limit = 20;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function moroko_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $paged; // current page
    if(empty($paged)) $paged = 1;
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
        $pages = 1;
    }
    if($pages != 1){
         echo '<ul class="pagination-style">';
         if($paged >= 1) echo '<li><a class="" href="'.get_pagenum_link($paged - 1).'" ><i class="fa fa-angle-left"></i></a></li>';
         for($page = 1; $page <= $pages; $page++){
         echo  $page == $paged ? '<li class="current"><a href="#">'. $page. '</a></li>' : '<li><a class="" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
     }
    if($paged <= $pages) echo '<li><a class="" href="'.get_pagenum_link($paged + 1).'" ><i class="fa fa-angle-right"></i></a></li>';
    echo "</ul>\n";
    }
}

add_filter('user_contactmethods', 'my_user_contactmethods');
function my_user_contactmethods($user_contactmethods){     
  $user_contactmethods['facebook'] = 'Facebook Link'; 
    return $user_contactmethods;  
} 

function moroko_search_form( $form ) {
  $form = '
  <form  method="get" class="search-form" action="' . esc_url(home_url('/')) . '"> 
        <input type="search" class="form-control" placeholder="'.esc_attr__('Search', 'moroko').'" value="' . get_search_query() . '" name="s" id="s"> 
        <button type="submit"><span class="icon fa fa-search"></span></button>
  </form>
	';
  return $form;
}
add_filter( 'get_search_form', 'moroko_search_form' );
//Custom comment List:

// Comment Form
function moroko_theme_comment($comment, $args, $depth) {
    //echo 's';
    $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='80' )!=''){?>
    <li>
        <div class="user-pic">
            <?php echo get_avatar($comment,$size='68' ); ?>
        </div>
        <div class="user-comment">
            <h5><?php printf( esc_html__('%s','moroko'), get_comment_author_link()) ?></h5>
            <span><?php $d = "F d , Y"; printf(get_comment_date($d)) ?></span>
            <?php comment_text() ?>
            <p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
        </div>
    </li>
    <?php }else{?>
    <li>
        <div class="user-comment">
            <h5><?php printf( esc_html__('%s','moroko'), get_comment_author_link()) ?></h5>
            <span><?php $d = "F d , Y"; printf(get_comment_date($d)) ?></span>
            <?php comment_text() ?>
            <p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
        </div>
    </li>
    <?php }?>
<?php
}

function moroko_next_project_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();
    if ( $next_post || $prev_post) : ?>
        <?php if ( ! empty( $next_post ) ) : ?>
            <?php if( ! empty( $prev_post ) ) { ?>
            <div class="col-xs-6">
                <div class="nav-left">
                    <a href="<?php echo get_permalink( $prev_post ); ?>"><em><?php echo esc_html__( 'Prev post', 'moroko' );?></em></a>
                    <hr>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="nav-right">
                    <a href="<?php echo get_permalink( $next_post ); ?>"><em><?php echo esc_html__( 'Next post', 'moroko' );?></em></a>
                    <hr>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-xs-12">
                <div class="nav-right">
                    <a href="<?php echo get_permalink( $next_post ); ?>"><em><?php echo esc_html__( 'Next post', 'moroko' );?></em></a>
                    <hr>
                </div>
            </div>
            <?php } ?>
        <?php elseif(! empty( $prev_post )) : ?>
        <div class="col-xs-12">
            <div class="nav-left">
                <a href="<?php echo get_permalink( $prev_post ); ?>"><em><?php echo esc_html__( 'Prev post', 'moroko' );?></em></a>
                <hr>
            </div>
        </div> 
        <?php endif; ?>
    <?php endif;
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'moroko_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function moroko_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'moroko' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'moroko' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'moroko' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'moroko' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'moroko' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'moroko' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'moroko' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Moroko Common', 'moroko' ),
            'slug'                     => 'moroko-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/moroko-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Moroko Elementor', 'moroko' ),
            'slug'                     => 'moroko-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/moroko-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'moroko' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'moroko' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'moroko' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'moroko' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'moroko' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'moroko' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'moroko' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'moroko' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'moroko' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'moroko' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'moroko' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'moroko' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'moroko' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'moroko' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'moroko' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'moroko' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'moroko' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>