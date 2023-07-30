<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $moroko_redux_demo = get_option('redux_demo'); ?>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (!function_exists('has_site_icon') || !has_site_icon()) {
        ?>
        <link rel="shortcut icon"
            href="<?php if (isset($moroko_redux_demo['favicon']['url'])) { ?><?php echo esc_url($moroko_redux_demo['favicon']['url']); ?><?php } ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class('dark-index'); ?>>
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
        <div class="container large-container">
            <div class="top-bar">
                <!-- Start: Top Logo -->
                <div class="row">
                    <div class="col-md-5 ">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <div class="logo-box d-flex align-items-center">
                                    <span class="logo-img">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="56" height="57"
                                            viewBox="0 0 56 57">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <rect id="Rectangle_183" data-name="Rectangle 183" width="56"
                                                        height="57" transform="translate(-28 0.142)" fill="#fff"
                                                        stroke="#707070" stroke-width="1" />
                                                </clipPath>
                                            </defs>
                                            <g id="Mask_Group_26" data-name="Mask Group 26"
                                                transform="translate(28 -0.142)" clip-path="url(#clip-path)">
                                                <path id="Path_255" data-name="Path 255"
                                                    d="M52.312,25.535c-.225-1.671-.4-3.351-.687-5.011A23.806,23.806,0,0,0,47,10.174,25.429,25.429,0,0,0,35.681,1.739a25.261,25.261,0,0,0-5.812-1.5A28.266,28.266,0,0,0,23.026.178,26.247,26.247,0,0,0,12.761,3.485a25.075,25.075,0,0,0-11.349,13.5A27.17,27.17,0,0,0,.076,22.55c-.059.405-.016.824-.037,1.235A25.737,25.737,0,0,0,3.471,38.3a25.07,25.07,0,0,0,12.007,10.58,27.97,27.97,0,0,0,7.085,1.944c.527.079,1.065.088,1.6.119.631.037,1.264.1,1.894.085,1.068-.032,2.141-.073,3.2-.195A25.562,25.562,0,0,0,51.667,30.723a35.033,35.033,0,0,0,.432-3.565c.059-.534.091-1.07.135-1.606l.077-.016m-16.906.033c0,.19,0,.381,0,.571a3.911,3.911,0,0,1-.018.617,8.921,8.921,0,0,1-3.669,6.05,8.832,8.832,0,0,1-8.568,1.4c-4.469-1.67-6.948-5.514-6.3-9.984a9.451,9.451,0,0,1,9.173-7.914,8.348,8.348,0,0,1,4.393,1.22,9.048,9.048,0,0,1,4.991,8.042M15.347,4.522l-.067-.144a2.809,2.809,0,0,1,.363-.275c.668-.358,1.321-.753,2.018-1.05A21.943,21.943,0,0,1,24.248,1.51a22.678,22.678,0,0,1,5.318.123A16.735,16.735,0,0,1,34.9,3.186c.58.3,1.121.665,1.68,1l-.067.16A33.405,33.405,0,0,0,25.942,2.659a33.569,33.569,0,0,0-10.6,1.862m.3,42.242a33.017,33.017,0,0,0,21.2-.181c-4.54,3.678-16.128,4.328-21.2.181m.8-40.543L16.4,6.1c.318-.2.626-.418.955-.6a18.455,18.455,0,0,1,7.876-2.049A19.6,19.6,0,0,1,31.366,4a9.484,9.484,0,0,1,3.932,1.8,2.151,2.151,0,0,1,.217.247l-.052.108a30.2,30.2,0,0,0-19.016.059m.182,38.83.05-.057c1.563.341,3.113.77,4.693,1a33.281,33.281,0,0,0,4.832.357,32.789,32.789,0,0,0,4.833-.379c1.572-.239,3.112-.685,4.794-1.069-.4.253-.689.456-1,.627a18.734,18.734,0,0,1-7.96,2.074,18.59,18.59,0,0,1-4.7-.269,12.558,12.558,0,0,1-4.722-1.657c-.289-.189-.55-.417-.824-.627m.749-36.99a15.881,15.881,0,0,1,10.64-2.536c2.055.176,5.748,1.544,6.264,2.427a29,29,0,0,0-16.9.109m17.369,34.9c-3.208,3.327-14.015,3.431-16.941.119a26.925,26.925,0,0,0,8.5,1.213,31.252,31.252,0,0,0,8.437-1.332M18.313,9.777a10.986,10.986,0,0,1,6.887-2.4A14.551,14.551,0,0,1,33.235,9.52a35.17,35.17,0,0,0-14.922.257m.651,31.768a35.009,35.009,0,0,0,14.873-.269,11,11,0,0,1-7.055,2.406,14.391,14.391,0,0,1-7.818-2.138m.34-29.807c2.521-2.558,10.432-3.108,13.239-.175a32.187,32.187,0,0,0-6.615-.71,29.057,29.057,0,0,0-6.624.885M32.831,39.286l.064.2a15.26,15.26,0,0,1-1.565.878,13.471,13.471,0,0,1-6.574,1.067,10.691,10.691,0,0,1-3.739-.921c-.507-.247-.969-.583-1.452-.878l.064-.172a26.559,26.559,0,0,0,13.2-.177M20.188,13.83c1.958-2.5,9.335-2.681,11.278-.234a24.972,24.972,0,0,0-11.278.234M32,37.22c-1.221,1.3-4.237,2.335-6.94,2.006A7.978,7.978,0,0,1,20.8,37.561,26.127,26.127,0,0,0,32,37.22M30.89,15.342c-1.68-.1-3.263-.271-4.845-.265s-3.179.191-4.866.3a7.883,7.883,0,0,1,9.71-.039m-.011,20.33a7.55,7.55,0,0,1-9.5,0,32.36,32.36,0,0,0,9.5,0"
                                                    transform="translate(-26.156 1.625)" fill="#fff" />
                                                <path id="Path_256" data-name="Path 256"
                                                    d="M194.523,185.771c-4.8,0-7.858,3.187-7.83,8.229a7.03,7.03,0,0,0,2.225,5.158,8.432,8.432,0,0,0,6.543,2.238,7.777,7.777,0,0,0,7.169-8.061,7.672,7.672,0,0,0-8.107-7.563m.122,7.141a.883.883,0,0,1,.757.686.91.91,0,0,1-.73.779.847.847,0,0,1-.761-.679.988.988,0,0,1,.734-.786"
                                                    transform="translate(-194.719 -166.425)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text">
                                        The Online Recording Studio
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End: Top Logo -->
                    <!-- Start:Navigation Area -->
                    <div class="col-md-7 ">
                        <!-- Start:Main Navigation -->
                        <div id="menu-toggle"><i class="fa fa-bars"></i></div>
                        <nav>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'primary',
                                    'container'       => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'menu'            => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new moroko_wp_bootstrap_navwalker(),
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
                                    'theme_location'  => 'primary',
                                    'container'       => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'menu'            => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new moroko_wp_bootstrap_navwalker(),
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
                </div>
                <!-- End:Navigation Area -->
            </div>
        </div>
    </header>
    <!-- =================================================
    Header Area End -->