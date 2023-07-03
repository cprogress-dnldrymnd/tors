<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $moroko_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
        ?>
    <link rel="shortcut icon" href="<?php if(isset($moroko_redux_demo['favicon']['url'])){?><?php echo esc_url($moroko_redux_demo['favicon']['url']); ?><?php }?>">
    <?php }?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Preloader Area Start 
    ====================================================== -->
    <div id="mask">
        <div id="loader">      
        </div>
    </div>
    <!-- =================================================
    Preloader Area End -->
    <!-- Header Area Start 
    ====================================================== -->
    <header class="header-area">
        <div class="container">
            <div class="top-bar">
                <!-- Start: Top Logo -->
                <div class="col-md-2 logobar">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if(isset($moroko_redux_demo['logo']['url']) && ($moroko_redux_demo['logo']['url'] != '')){?>
                            <img src="<?php echo esc_url($moroko_redux_demo['logo']['url']); ?>" alt="">
                            <?php }else{ ?>
                            <img src="<?php echo get_template_directory_uri();?>/img/top-logo.png" alt="">
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <!-- End: Top Logo -->
                <!-- Start:Navigation Area -->
                <div class="col-md-10 menubar">
                    <!-- Start:Main Navigation -->
                    <div id="menu-toggle"><i class="fa fa-bars"></i></div>
                    <nav> 
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new moroko_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="menu %2$s">%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
                    </nav>
                    <!-- End:Main Navigation -->
                    <!-- Start:Mobile Navigation -->
                    <div id="mob-menu"><i class="fa fa-bars"></i></div>
                    <div id="side-panel-menu">
                        <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new moroko_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class=" %2$s">%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
                    </div>
                    <!-- End:Mobile Navigation -->
            </div>
                <!-- End:Navigation Area -->
            </div>
        </div>
    </header>
    <!-- =================================================
    Header Area End -->
    
   