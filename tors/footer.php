<?php $moroko_redux_demo = get_option('redux_demo');?> 
<!-- Footer Area Start 
    ====================================================== -->
    <footer class="footer-area">
        <!-- Start:Footer Main Contents-->
        <div class="container">
            <div class="footer-contents">
                <!-- Start:Footer Top Content Area (Supporters) -->
                <div class="footer-top-sec">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php endif; ?>
                </div>
                <!-- End:Footer Top Content Area (Supporters) -->
                <!-- Start:Footer Bottom Content Area  -->
                <div class="footer-middle-sec">
                    <!-- Start:Logo Sec-->
                    <div class="col-md-3 " >
                        <div class="logo">
                            <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-area-2' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Start:Logo Sec -->
                    <!-- Start:Quick Links -->
                    <div class="col-md-3 ">
                        <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-3' ); ?>
                        <?php endif; ?>
                    </div>
                    <!-- End:Quick Links -->
                    <!-- Start:News Letter Area -->
                    <div class="col-md-3 ">
                        <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-4' ); ?>
                        <?php endif; ?>
                    </div>
                    <!-- Start:News Letter Area -->
                    <!-- Start:Social Icon Area -->
                    <div class="col-md-3">
                        <div class="social-icon">
                            <?php if ( is_active_sidebar( 'footer-area-5' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-area-5' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- End:Social Icon Area -->
                </div>
                <!-- End:Footer Bottom Content Area -->
            </div>
        </div>
        <!-- Start:Footer Main Contents-->      
        <!-- Start:Copyright Area -->
        <div class="copyright">
            <div class="container">
                <p><?php if(isset($moroko_redux_demo['footer_text'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($moroko_redux_demo['footer_text'])); ?>
                        <?php }else{?>
                        <?php echo esc_html__( '2022 © Moroko. All rights reserved.', 'moroko' );
                    } ?></p>
            </div>
        </div>
        <!-- End:Copyright Area -->
    </footer>
    <!-- =================================================
    Footer Area End -->
<?php wp_footer(); ?>
</body>
</html>