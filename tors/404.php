<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$moroko_redux_demo = get_option('redux_demo');
get_header('404'); ?> 
<!-- Error 404 Start 
====================================================== -->
<section class="error-page-sec">
<div class="error-page-bg" style="background:url(<?php echo esc_url($moroko_redux_demo['404_background']['url']); ?>) center center no-repeat fixed; background-size:cover" >
  <div class="overlay-mask">
    <div class="container">
      <div class="error-404-contents">
                  <h1><?php if(isset($moroko_redux_demo['404_title'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($moroko_redux_demo['404_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( '404', 'moroko' );
                        }?></h1>
                    <h3><?php if(isset($moroko_redux_demo['404_desc'])){?>
                            <?php echo htmlspecialchars_decode(esc_attr($moroko_redux_demo['404_desc']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'OOPPS! THE PAGE YOU WERE LOOKING FOR, COULD NOT BE FOUND.', 'moroko' );}?>
                          </h3>
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($redux_demo['404_button'])){?>
                            <?php echo htmlspecialchars_decode($redux_demo['404_button']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Back To Home', 'moroko' );
                            }
                            ?></a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ellipse"></a>
                    <div class="error-sorry-text">
                      <h2><?php if(isset($redux_demo['sorry'])){?>
                            <?php echo htmlspecialchars_decode($redux_demo['sorry']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Sorry', 'moroko' );
                            }
                            ?></h2>  
                    </div>
                </div>
                
                  
    </div>
  </div>  
</div>
    
</section>
<!-- =================================================
Error 404 Area End -->
<?php get_footer('404'); ?>