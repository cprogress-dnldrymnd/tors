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
class TorsDevBanner extends \Elementor\Widget_Base {

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
        return 'torsdev-banner';
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
        return __( 'Banner x', 'torsdev-elementor' );
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
        return 'eicon-post-slider';
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
        return [ 'banner' ];
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
                'label' => esc_html__( 'Banner', 'torsdev-elementor' ),
            ]   
        );
        $this->add_control(
            'banner_image',
            [
                'label'   => esc_html__( 'Banner Image', 'torsdev-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'torsdev-elementor' ),
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'torsdev-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'heading',
                        'label'       => esc_html__( 'Heading:', 'torsdev-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is heading' , 'torsdev-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'subheading',
                        'label'       => esc_html__( 'Subheading:', 'torsdev-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is subheading' , 'torsdev-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'link_button',
                        'label'       => esc_html__( 'Link Button:', 'torsdev-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '#' , 'torsdev-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'button_description',
                        'label'       => esc_html__( 'Button Description:', 'torsdev-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is button description' , 'torsdev-elementor' ),
                        'label_block' => true,
                    ],
                ],
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
        $this->end_controls_section();

    }
    public function render() {
    $settings  = $this->get_settings_for_display();
    extract($settings); 
    ?>
     <!-- Home Banner Area 
    ====================================================== -->
    <section class="banner-sec">
        <div class="main-banner" style=" background:url(<?php echo wp_kses_post($settings['banner_image']['url']); ?>) no-repeat top center fixed; background-size:cover;">
            <div class="overlay-mask">
                <div class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php foreach ( $settings['tabs'] as $item ) : ?>
                            <!-- Start: Banner Slide 01 -->
                            <li>
                                <div class="caption">
                                    <?php if(isset($item['heading']) && $item['heading'] != ''){?>
                                    <h2><?php print wp_kses_post($item['heading']); ?></h2>
                                    <?php } ?>
                                    <?php if(isset($item['subheading']) && $item['subheading'] != ''){?>
                                    <h3><?php print wp_kses_post($item['subheading']); ?></h3>
                                    <?php } ?>
                                    <?php if(isset($item['link_button']) && $item['link_button'] != ''){?>
                                    <p><?php print wp_kses_post($item['button_description']); ?></p>
                                    <a href="<?php print wp_kses_post($item['link_button']); ?>" class="ellipse"></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <!-- End: Banner Slide 01 -->
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>        
            </div>
        </div>
    </section>
    <!-- =================================================
    Home Banner Area End -->
    <?php
    }

}


