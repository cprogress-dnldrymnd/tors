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
class TorsDevAbout extends \Elementor\Widget_Base {

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
        return 'bdevs-about';
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
        return __( 'About', 'bdevs-elementor' );
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
        return 'eicon-user-circle-o';
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
        return [ 'about' ];
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
                'label' => esc_html__( 'About', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'This is heading ', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_1',
            [
                'label'       => __( 'About 1:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your about 1', 'bdevs-elementor' ),
                'default'     => __( 'Who we are', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_2',
            [
                'label'       => __( 'About 2:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your about 2', 'bdevs-elementor' ),
                'default'     => __( 'Our Vision', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_3',
            [
                'label'       => __( 'About 3:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your about 3', 'bdevs-elementor' ),
                'default'     => __( 'Our Mission', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'about_id',
                        'label'       => esc_html__( 'ID:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '1' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'    => 'about_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is title' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'content',
                        'label'       => esc_html__( 'Content:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is content' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'link_about',
                        'label'       => esc_html__( 'Link About:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '#' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'anchor_text',
                        'label'       => esc_html__( 'Anchor Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is anchor text' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->add_control(
            'link_video',
            [
                'label'       => __( 'Link Video:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter link video', 'bdevs-elementor' ),
                'default'     => __( '#' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'video_title',
            [
                'label'       => __( 'Video Title:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter video title', 'bdevs-elementor' ),
                'default'     => __( '#' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
          'video_image',
          [
            'label'   => esc_html__( 'Video Image', 'bdevs-elementor' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
            'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
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
    <!-- Home About Area Start 
    ====================================================== -->
    <section class="home-about-area">
        <div class="container">
            <div class="content-area">
                <?php if ( $settings['show_heading'] ) : ?>
                <h4 class="features-contents"><?php print wp_kses_post($settings['heading']); ?></h4>
                <?php endif; ?>
                <!-- Start: Tab Contents -->
                <div class="tab-content-area">
                    <?php if(isset($settings['about_1']) && $settings['about_1'] != ''){?>
                    <input type="radio" checked="" name="tabs" id="tab1">
                    <label for="tab1"><?php print wp_kses_post($settings['about_1']); ?></label>
                    <?php } ?>
                    <?php if(isset($settings['about_2']) && $settings['about_2'] != ''){?>
                    <input type="radio" name="tabs" id="tab2">
                    <label for="tab2"><?php print wp_kses_post($settings['about_2']); ?></label>
                    <?php } ?>
                    <?php if(isset($settings['about_3']) && $settings['about_3'] != ''){?>
                    <input type="radio" name="tabs" id="tab3">
                    <label for="tab3"><?php print wp_kses_post($settings['about_3']); ?></label>
                    <?php } ?>
                    <div class="content">
                        <?php foreach ( $settings['tabs'] as $item ) : ?>
                        <!--Start: Tab content 1-->  
                        <div id="content<?php print wp_kses_post($item['about_id']); ?>">
                            <div class="col-md-5"> 
                                <img src="<?php echo wp_kses_post($item['about_image']['url']); ?>" alt="">
                            </div>
                            <div class="col-md-7">
                                <?php if(isset($item['title']) && $item['title'] != ''){?>
                                <h4><?php print wp_kses_post($item['title']); ?></h4>
                                <?php } ?>
                                <?php print wp_kses_post($item['content']); ?>
                                <?php if(isset($item['link_about']) && $item['link_about'] != ''){?>
                                <a href="<?php print wp_kses_post($item['link_about']); ?>"><?php print wp_kses_post($item['anchor_text']); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <!--End: Tab content 1-->
                        <?php endforeach; ?>  
                    </div>
                </div>
                <!-- End: Tab Contents -->
                <?php if(isset($settings['link_video']) && $settings['link_video'] != ''){?>
                <h4 class="features-contents"><?php print wp_kses_post($settings['video_title']); ?></h4>
                <!-- Start: Video -->
                <div class="home-video-sec">
                    <div class="video-box">
                        <div class="video-cont">
                            <img src="<?php print wp_kses_post($settings['video_image']['url']); ?>" alt="" class="center"> 
                            <a  class="fancybox fancybox.iframe" href="<?php print wp_kses_post($settings['link_video']); ?>"><div class="mask"></div></a>
                        </div>
                    </div>
                </div>
                <!-- End: Video -->
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- =================================================
    Home About Area End -->
    <?php
    }

}


