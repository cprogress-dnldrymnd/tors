<?php
/**
 * The Template for displaying all single posts
 */
$moroko_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php while (have_posts()): the_post(); ?>
<?php $post_style = get_post_meta(get_the_ID(),'_cmb_post_style', true);  ?>
<!-- Inner Banner Area 
====================================================== -->
<section class="banner-sec">
    <div class="inner-page">
        <div class="main-banner">
            <div class="main-title">
                <span><?php if(isset($moroko_redux_demo['blog_single_subtitle'])){?>
                  <?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['blog_single_subtitle']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Here is some thought from us', 'moroko' ); } ?></span>
                <h1><?php if(isset($moroko_redux_demo['blog_single_title'])){?>
                  <?php echo wp_specialchars_decode(esc_attr($moroko_redux_demo['blog_single_title']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Our Blog', 'moroko' ); } ?></h1>
            </div>
        </div>
        <!-- Start: Object Image-->
        <div class="object-image-sec">
            <?php if(isset($moroko_redux_demo['background_blog_single']['url']) && $moroko_redux_demo['background_blog_single']['url'] != ''){ ?>
            <div class="object" style="background:url(<?php echo esc_url($moroko_redux_demo['background_blog_single']['url']); ?>) no-repeat center center"></div> 
            <?php }else{?>
            <div class="object" style="background:url(<?php echo get_template_directory_uri();?>/img/object.png) no-repeat center center"></div>
            <?php } ?>
        </div>
        <!-- End : Object Image -->
    </div>
</section>
<!-- =================================================
Inner Banner Area End -->

<?php if($post_style == 'style_3') : ?> 
<!-- Blog Content Area Start 
====================================================== -->
<section class="blog-area-sec">
    <div class="container">
        <div class="blog-contents">
            <div class="main-feature-contents">
                <!-- Start:Blog Item in Detailed -->
                <div class="blog-details">
                
                    <!-- Start:Left side Contents -->
                    <div class="col-md-8 left-side">
                        <?php if ( has_post_thumbnail() ) { ?>  
                        <div class="main-blog-img">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                        </div>
                        <?php } ?>
                        <div class="blog-info">
                            <h3><?php the_title(); ?></h3>
                            <p><span><?php the_time(get_option( 'date_format' ));?></span></p>
                            <?php the_content(); ?>
                        </div>
                        <!-- Start:User Comments -->
                        <div class="blog-comment-sec">
                            <?php comments_template();?>
                        </div>  
                        <!-- End:User Comments -->
                    </div>
                    <!-- End:Left side Contents -->
                    
                    <!-- Start:Right side Contents -->
                    <div class="col-md-4 right-side sidebar">
                        <?php get_sidebar();?>
                    </div>
                    <!-- Start:Right side Contents -->
                    
                </div>
                <!-- End:Blog Item in Detailed -->
            </div>
        </div> 
    </div>   
</section>
<!-- =================================================
Blog Content Area End -->

<?php elseif($post_style == 'style_2') : ?> 
<!-- Blog Content Area Start 
    ====================================================== -->
    <section class="blog-area-sec">
        <div class="container">
            <div class="blog-contents">
                <div class="main-feature-contents">
                    <!-- Start:Blog Item in Detailed -->
                    <div class="blog-details">
                        <!-- Start:Left side Contents -->
                        <div class="col-md-4 left-side sidebar">
                            <?php get_sidebar();?>
                        </div>
                        <!-- End:Left side Contents -->
                        <!-- Start:Right side Contents -->
                        <div class="col-md-8 right-side">
                            <?php if ( has_post_thumbnail() ) { ?>  
                            <div class="main-blog-img">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                            </div>
                            <?php } ?>
                            <div class="blog-info">
                                <h3><?php the_title(); ?></h3>
                                <p><span><?php the_time(get_option( 'date_format' ));?></span></p>
                                <?php the_content(); ?>
                            </div>
                            <!-- Start:User Comments -->
                            <div class="blog-comment-sec">
                                <?php comments_template();?>
                            </div>  
                            <!-- End:User Comments -->
                        </div>
                        <!-- Start:Right side Contents -->
                    </div>
                    <!-- End:Blog Item in Detailed -->               
                </div>
            </div> 
        </div>   
    </section>
    <!-- =================================================
    Blog Content Area End -->
<?php else: ?>
<!-- Blog Content Area Start 
====================================================== -->
<section class="blog-area-sec">
    <div class="container">
        <div class="blog-contents">
            <div class="main-feature-contents">
                <!-- Start:Blog Item in Detailed -->
                <div class="blog-details">
                    <?php if ( has_post_thumbnail() ) { ?>  
                    <div class="main-blog-img">
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                    </div>
                    <?php } ?>
                    <div class="blog-info">
                        <h3><?php the_title(); ?></h3>
                        <p><span><?php the_time(get_option( 'date_format' ));?></span></p>
                        <?php the_content(); ?>
                    </div>
                </div>
                <!-- End:Blog Item in Detailed -->
                
                <!-- Start:User Comments -->
                <div class="blog-comment-sec">
                    <?php comments_template();?>
                </div>                 
            </div>
        </div> 
    </div>   
</section>
<!-- =================================================
Blog Content Area End -->
<?php endif; ?>
<?php endwhile; ?>
<?php
get_footer();
?>