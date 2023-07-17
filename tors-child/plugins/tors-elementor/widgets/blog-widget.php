<?php
namespace TorsDevElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * TorsDev Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class TorsDevBlog extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve TorsDev Elementor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'torsdev-blog';
    }

    /**
     * Get widget title.
     *
     * Retrieve TorsDev Elementor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Blog', 'torsdev-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve TorsDev About widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-post-list';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the TorsDev About widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'torsdev-elementor' ];
    }

    public function get_keywords() {
        return [ 'blog' ];
    }

    public function get_script_depends() {
        return [ 'torsdev-elementor'];
    }

    // BDT Position
    protected function element_pack_position() {
        $position_options = [
            ''              => esc_html__('Default', 'torsdev-elementor'),
            'top-left'      => esc_html__('Top Left', 'torsdev-elementor') ,
            'top-center'    => esc_html__('Top Center', 'torsdev-elementor') ,
            'top-right'     => esc_html__('Top Right', 'torsdev-elementor') ,
            'center'        => esc_html__('Center', 'torsdev-elementor') ,
            'center-left'   => esc_html__('Center Left', 'torsdev-elementor') ,
            'center-right'  => esc_html__('Center Right', 'torsdev-elementor') ,
            'bottom-left'   => esc_html__('Bottom Left', 'torsdev-elementor') ,
            'bottom-center' => esc_html__('Bottom Center', 'torsdev-elementor') ,
            'bottom-right'  => esc_html__('Bottom Right', 'torsdev-elementor') ,
        ];

        return $position_options;
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'Blog', 'torsdev-elementor' ),
            ]   
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'torsdev-elementor' ),
                'default'     => __( 'This is subheading ', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'torsdev-elementor' ),
                'default'     => __( 'This is heading ', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'torsdev-elementor' ),
                'default'     => __( '3', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sortby',
            [
                'label'     => esc_html__( 'Order', 'torsdev-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'sortby_style_1'  => esc_html__( 'Newest', 'torsdev-elementor' ),
                    'sortby_style_2'  => esc_html__( 'Oldest', 'torsdev-elementor' ),
                ],
                'default'   => 'sortby_style_1',
            ]
        );
        $this->add_control(
            'link_button',
            [
                'label'       => __( 'Link Button:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter link button', 'torsdev-elementor' ),
                'default'     => __( '#' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button',
            [
                'label'       => __( 'Button:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter button', 'torsdev-elementor' ),
                'default'     => __( 'View more Blogs' ),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        /** 
        *   Layout section 
        **/
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => esc_html__( 'Layout', 'torsdev-elementor' ),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'torsdev-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'torsdev-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'torsdev-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'torsdev-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'torsdev-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'description'  => 'Use align to match position',
                'default'      => 'left',
            ]
        );
        $this->add_control(
            'show_subheading',
            [
                'label'   => esc_html__( 'Show Subheading', 'torsdev-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );  
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'torsdev-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );   
        $this->end_controls_section();

    }

    public function render() {
        $settings  = $this->get_settings_for_display();
        extract($settings); 
        if ($settings['sortby']=='sortby_style_1') {
            $sortby = 'DESC';
        }
        if ($settings['sortby']=='sortby_style_2') {
            $sortby = 'ASC';
        }
        ?>
        <!-- Home Blog Area Start 
    ====================================================== -->
    <section class="home-blog-area">
        <div class="home-blog-contents">
            <div class="main-title">
                <?php if ( $settings['show_subheading'] ) : ?>
                <span><?php print wp_kses_post($settings['subheading']); ?></span>
                <?php endif; ?>
                <?php if ( $settings['show_heading'] ) : ?>
                <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                <?php endif; ?>
            </div>
            <ul class="home-blog-items">
                <?php
                $posts_per_page = $settings['posts_per_page'];
                $wp_query = new \WP_Query(array('posts_per_page' => $posts_per_page,'post_type' => 'post',  'orderby' => 'ID', 'order' => $sortby));     
                $args = new \WP_Query(array(   
                            'post_type' => 'post', 
                        ));  
                while ($wp_query -> have_posts()) : $wp_query -> the_post();  
                $featured_image_2 = get_post_meta(get_the_ID(),'_cmb_featured_image_2', true);   
                ?>
                <!--Start: Blog-item 1-->
                <li>
                    <img src="<?php echo wp_get_attachment_url($featured_image_2);?>" alt="">
                    <div class="mask-overlay">
                        <a  href="<?php echo wp_get_attachment_url($featured_image_2);?>" data-featherlight="image"><span class="plus"></span></a>
                    </div>
                    <div class="text-content">
                        <h3><?php the_title(); ?></h3>
                        <span><a href="<?php the_permalink();?>"><?php if(isset($tors_redux_demo['read_more'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($tors_redux_demo['read_more']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Read more', 'tors' ); } ?></a></span>
                    </div>
                </li>
                <!--End: Blog-item 1-->
                <?php endwhile; ?>
            </ul>
            <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
            <div class="butten-area">
                <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="button-large"><?php print wp_kses_post($settings['button']); ?></a>
            </div> 
            <?php } ?>
        </div>
    </section>
    <!-- =================================================
    Home Blog Area End -->
    <?php
    }

}
