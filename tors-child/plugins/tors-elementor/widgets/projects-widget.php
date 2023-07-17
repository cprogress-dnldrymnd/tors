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
class TorsDevProjects extends \Elementor\Widget_Base {

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
        return 'bdevs-projects';
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
        return __( 'Projects', 'bdevs-elementor' );
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
        return 'eicon-image-rollover';
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
        return [ 'bdevs-elementor' ];
    }

    public function get_keywords() {
        return [ 'projects' ];
    }

    public function get_script_depends() {
        return [ 'bdevs-elementor'];
    }

    // BDT Position
    protected function element_pack_position() {
        $position_options = [
            ''              => esc_html__('Default', 'bdevs-elementor'),
            'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
            'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
            'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
            'center'        => esc_html__('Center', 'bdevs-elementor') ,
            'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
            'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
            'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
            'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
            'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
        ];

        return $position_options;
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'Projects', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'chose_style',
            [
                'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'project_style_1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
                    'project_style_2'  => esc_html__( 'Style 2', 'bdevs-elementor' ),
                ],
                'default'   => 'project_style_1',
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'This is heading', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'background_image',
            [
                'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
                'condition' => [
                    'chose_style' => ['project_style_1']
                ],
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 'project_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'type',
                        'label'       => esc_html__( 'Type:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is type' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'description',
                        'label'       => esc_html__( 'Description:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is description' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is title' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->add_control(
            'link_button',
            [
                'label'       => __( 'Link Button:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter link button', 'bdevs-elementor' ),
                'default'     => __( '#' ),
                'condition' => [
                    'chose_style' => ['project_style_2']
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button',
            [
                'label'       => __( 'Button:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter button', 'bdevs-elementor' ),
                'default'     => __( 'Contact Us' ),
                'condition' => [
                    'chose_style' => ['project_style_2']
                ],
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
                'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'description'  => 'Use align to match position',
                'default'      => 'left',
            ]
        );
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

    }

    public function render() {
        $settings  = $this->get_settings_for_display();
        extract($settings); ?>
        <?php $chose_style = $settings['chose_style'];?>
        <?php if( $chose_style == 'project_style_1' ): ?>
        <!-- Home Portfolio Area Start 
        ====================================================== -->
        <section class="portfolio-home-area">
            <div class="portfolio-top">
                <div class="container">
                    <?php if ( $settings['show_heading'] ) : ?>
                    <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                    <?php endif; ?>
                    <!-- Start: Caurosel Item 01 -->
                    <div id="demo">
                        <div id="owl-demo-portfolio" class="owl-carousel">
                            <?php foreach ( $settings['tabs'] as $item ) : ?>
                            <div class="item">
                                <a  href="<?php echo wp_kses_post($item['project_image']['url']); ?>" data-featherlight="image">
                                    <img src="<?php echo wp_kses_post($item['project_image']['url']); ?>"  alt="">
                                    <?php if(isset($item['type']) && $item['type'] != ''){?>
                                    <div class="mask">
                                        <div class="solid-col">
                                            <p><?php print wp_kses_post($item['type']); ?></p>
                                            <span class="plus"></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="text-content">
                                        <?php if(isset($item['description']) && $item['description'] != ''){?>
                                        <p><?php print wp_kses_post($item['description']); ?></p>
                                        <?php } ?>
                                        <?php if(isset($item['title']) && $item['title'] != ''){?>
                                        <h3><?php print wp_kses_post($item['title']); ?></h3>
                                        <?php } ?>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- End: Caurosel Item 01 -->
                </div>
            </div>
            <div class="object-image-sec">
                <div class="object" style="background:url(<?php echo wp_kses_post($settings['background_image']['url']); ?>) no-repeat center center"></div> 
            </div>
        </section>
        <!-- =================================================
        Home Portfolio Area End -->
        <?php elseif( $chose_style == 'project_style_2' ): ?>
        <!-- Portfolio Area Start 
    ====================================================== -->
    <section class="portfolio-area-sec">
        <div class="container">
            <div class="portfolio-contents">
                <div class="main-feature-contents">
                    <?php if ( $settings['show_heading'] ) : ?>
                    <div class="main-title">
                        <h4><?php print wp_kses_post($settings['heading']); ?></h4>
                    </div>
                    <?php endif; ?>
                    <div class="portfolio-contents">
                        <!-- Start:Portfolio Items -->
                        <ul>
                            <?php foreach ( $settings['tabs'] as $item ) : ?>
                            <li>
                                <div class="item">
                                    <a data-featherlight="image" href="<?php echo wp_kses_post($item['project_image']['url']); ?>">
                                        <img alt="" src="<?php echo wp_kses_post($item['project_image']['url']); ?>">
                                        <?php if(isset($item['type']) && $item['type'] != ''){?>
                                        <div class="mask">
                                            <div class="solid-col">
                                                <p><?php print wp_kses_post($item['type']); ?></p>
                                                <span class="plus"></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="text-content">
                                            <?php if(isset($item['description']) && $item['description'] != ''){?>
                                            <p><?php print wp_kses_post($item['description']); ?></p>
                                            <?php } ?>
                                            <?php if(isset($item['title']) && $item['title'] != ''){?>
                                            <h3><?php print wp_kses_post($item['title']); ?></h3>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- End:Portfolio Items -->
                    </div>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="main-feature-contents-btn-area">
                        <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="button-medium"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div> 
        </div>   
    </section>
    <!-- =================================================
    About Us Area End -->
        <?php endif; ?>
    <?php
    }

}



