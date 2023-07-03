<?php
$moroko_redux_demo = get_option('redux_demo');
get_header(); ?>
<!-- Inner Banner Area 
    ====================================================== -->
    <section class="banner-sec">
        <div class="inner-page">
            <div class="main-banner">
                <div class="main-title">
                        <span><?php if(isset($moroko_redux_demo['blog_subtitle'])){?>
                      <?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['blog_subtitle']));?>
                      <?php } else { ?>
                      <?php echo esc_html__( 'Here is some thought from us', 'moroko' ); } ?></span>
                        <h1><?php if(isset($moroko_redux_demo['blog_title'])){?>
                      <?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['blog_title']));?>
                      <?php } else { ?>
                      <?php echo esc_html__( 'Our Blog', 'moroko' ); } ?></h1>
                    </div>
            </div>
            <!-- Start: Object Image-->
            <div class="object-image-sec">
                <?php if(isset($moroko_redux_demo['background_blog']['url']) && $moroko_redux_demo['background_blog']['url'] != ''){ ?>
                <div class="object" style="background:url(<?php echo esc_url($moroko_redux_demo['background_blog']['url']); ?>) no-repeat center center"></div> 
                <?php } else { ?>
                <div class="object" style="background:url(<?php echo get_template_directory_uri();?>/img/object.png) no-repeat center center"></div>
                <?php } ?>
            </div>
            <!-- End : Object Image -->
        </div>
    </section>
    <!-- =================================================
    Inner Banner Area End -->
    
    
    <!-- Blog Content Area Start 
    ====================================================== -->
    <section class="blog-area-sec">
        <div class="container">
            <div class="blog-contents">
                <div class="main-feature-contents">
                    <?php if(isset($moroko_redux_demo['blog_desc'])){?>
                    <div class="main-title">
                        <h4><?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['blog_desc']));?></h4>
                    </div>
                    <?php } ?>
                    <div class="blog-list-area">
                        <!-- Start:Blog Items (With Mini Grid) -->
                        <div class="blog-items-area ">
                            <?php 
                                while (have_posts()): the_post();
                                $category = get_the_category(); 
                            ?>
                            <!-- Start:Blog Items 01-->
                            <div class="col-md-4 ">
                                <div class="blog-item">
                                    <div class="blog-item-wrapper">
                                        <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="blog-image-holder">
                                            <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" data-featherlight="image">
                                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                                                <div class="mask"></div>
                                            </a>
                                        </div>
                                        <?php } ?>
                                        <div class="blog-item-info">
                                            <span><?php the_time(get_option( 'date_format' ));?></span>
                                            <a href="<?php the_permalink();?>"><h4><?php the_title(); ?></h4></a>
                                            <p><?php echo esc_attr(moroko_excerpt(20));?></p>
                                            <a class="button-small" href="<?php the_permalink();?>"><?php if(isset($moroko_redux_demo['read_more'])){?>
                                              <?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['read_more']));?>
                                              <?php }else{?>
                                              <?php echo esc_html__( 'Read more', 'moroko' ); } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End:Blog Items 01-->
                            <?php endwhile; ?>
                        </div>
                        <!-- End:Blog Items (With Mini Grid) -->
                    </div>
                    <div class="main-feature-contents-btn-area text-center">
                        <?php moroko_pagination(); ?>
                    </div>
                </div>
            </div> 
        </div>   
    </section>
    <!-- =================================================
    Blog Content Area End -->
<?php
get_footer();
?>