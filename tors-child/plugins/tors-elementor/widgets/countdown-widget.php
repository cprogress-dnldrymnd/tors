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
class TorsDevCountdown extends \Elementor\Widget_Base {

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
        return 'torsdev-countdown';
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
        return __( 'Countdown', 'torsdev-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve TorsDev Blog widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-countdown';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the TorsDev Blog widget belongs to.
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
        return [ 'Countdown' ];
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
                'label' => esc_html__( 'Countdown', 'torsdev-elementor' ),
            ]
        );
        $this->add_control(
            'background_image',
            [
                'label'   => esc_html__( 'Background Image', 'torsdev-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'torsdev-elementor' ),
            ]
        ); 
        $this->add_control(
            'logo_image',
            [
                'label'   => esc_html__( 'Logo Image', 'torsdev-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'torsdev-elementor' ),
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
            'description',
            [
                'label'       => __( 'Description:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your description', 'torsdev-elementor' ),
                'default'     => __( 'This is description ', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'date',
            [
                'label'       => __( 'Date:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your date', 'torsdev-elementor' ),
                'default'     => __( 'July 02 2024 6:51:10', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'days',
            [
                'label'       => __( 'Days:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your days', 'torsdev-elementor' ),
                'default'     => __( '<span id="days" class="count">120</span><span>Days</span>', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'hours',
            [
                'label'       => __( 'Hours:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your hours', 'torsdev-elementor' ),
                'default'     => __( '<span id="hours" class="count">23</span><span>Hours</span>', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'minutes',
            [
                'label'       => __( 'Minutes:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your minutes', 'torsdev-elementor' ),
                'default'     => __( '<span id="minutes" class="count">50</span><span>Minutes</span>', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'seconds',
            [
                'label'       => __( 'Seconds:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your seconds', 'torsdev-elementor' ),
                'default'     => __( '<span id="seconds" class="count">55</span><span>Seconds</span>', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

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
    extract($settings); ?>  
    <!-- Maintenance Area Start 
    ====================================================== -->
    <section class="countdown-sec">
        <div class="maintenance-bg" style="background:url(<?php echo wp_kses_post($settings['background_image']['url']); ?>) center center no-repeat fixed; background-size:cover">
            <div class="countdown-container" >
                <div class="countdown">
                    <div class="logo"> <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo wp_kses_post($settings['logo_image']['url']); ?>" alt=""></a></div>
                    <?php if ( $settings['show_heading'] ) : ?>
                    <h1><span class="cont-down-title"><?php print wp_kses_post($settings['heading']); ?></span></h1>
                    <hr>
                    <?php endif; ?>
                    <?php if(isset($settings['description']) && $settings['description'] != ''){?>
                    <h3><?php print wp_kses_post($settings['description']); ?></h3>
                    <?php } ?>
                    <ul class="count-dwn-cnt">
                        <?php if(isset($settings['days']) && $settings['days'] != ''){?>
                        <li>
                            <?php print wp_kses_post($settings['days']); ?>
                        </li> 
                        <?php } ?>   
                        <?php if(isset($settings['hours']) && $settings['hours'] != ''){?>
                        <li>
                            <?php print wp_kses_post($settings['hours']); ?>
                        </li> 
                        <?php } ?>  
                        <?php if(isset($settings['minutes']) && $settings['minutes'] != ''){?>
                        <li>
                           <?php print wp_kses_post($settings['minutes']); ?>
                        </li> 
                        <?php } ?>  
                        <?php if(isset($settings['seconds']) && $settings['seconds'] != ''){?>
                        <li>
                            <?php print wp_kses_post($settings['seconds']); ?>
                        </li> 
                        <?php } ?> 
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =================================================
    Maintenance Area End -->
    <script type="text/javascript">
        (function($) {
    "use strict";
    setInterval(function(){
        var future = new Date("<?php print wp_kses_post($settings['date']); ?> GMT+0200");  // date to count down
        var now = new Date();
        var difference = Math.floor((future.getTime() - now.getTime()) / 1000);
        
        var seconds = fixIntegers(difference % 60);
        difference = Math.floor(difference / 60);
        
        var minutes = fixIntegers(difference % 60);
        difference = Math.floor(difference / 60);
        
        var hours = fixIntegers(difference % 24);
        difference = Math.floor(difference / 24);
        
        
        var days = difference;
        
        $("#seconds").text(seconds);
        $("#minutes").text(minutes);
        $("#hours").text(hours);
        $("#days").text(days);
        
    }, 1000);
    
    function fixIntegers(integer)
    {
        if (integer < 0)
            integer = 0;
        if (integer < 10)
            return "0" + integer;
        return "" + integer;
    }
})(jQuery);
    </script>
    <?php
    }

}