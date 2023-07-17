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
class TorsDevAboutFeatures extends \Elementor\Widget_Base {

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
		return 'torsdev-about-features';
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
		return __( 'About Features', 'torsdev-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve TorsDev FAQ widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-kit-parts';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the TorsDev Counter widget belongs to.
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
		return [ 'about features' ];
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
            'section_content_intro',
            [
                'label' => esc_html__( 'About Intro', 'torsdev-elementor' ),
            ]   
        );
        $this->add_control(
          'intro_image',
          [
            'label'   => esc_html__( 'Intro Image', 'torsdev-elementor' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
            'description' => esc_html__( 'Add image from here', 'torsdev-elementor' ),
          ]
        );  
        $this->add_control(
            'intro_heading',
            [
                'label'       => __( 'Intro Heading:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'torsdev-elementor' ),
                'default'     => __( 'This is heading ', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'intro_content',
            [
                'label'       => __( 'Intro Content:', 'torsdev-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your content', 'torsdev-elementor' ),
                'default'     => __( 'This is content', 'torsdev-elementor' ),
                'label_block' => true,
            ]
        );       
        $this->end_controls_section();

		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'About Features', 'torsdev-elementor' ),
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
		    'features_heading',
		    [
		        'label'       => __( 'Features Heading:', 'torsdev-elementor' ),
		        'type'        => Controls_Manager::TEXT,
		        'placeholder' => __( 'Enter your heading', 'torsdev-elementor' ),
		        'default'     => __( 'This is heading ', 'torsdev-elementor' ),
		        'label_block' => true,
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
	            'default'     => __( 'Learn more' ),
	            'label_block' => true,
	        ]
	    );
    	$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Feature Items', 'torsdev-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon:', 'torsdev-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'This is icon' , 'torsdev-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title:', 'torsdev-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'This is title' , 'torsdev-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content',
						'label'       => esc_html__( 'Content:', 'torsdev-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'This is content' , 'torsdev-elementor' ),
						'label_block' => true,
					],
				],
			]
		);	
		$this->end_controls_section();

		/** 
		*	Layout section 
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
		<!-- About Us Area Start 
	    ====================================================== -->
	    <section class="about-us-area">
	        <div class="container">
	            <div class="main-feature-contents">
	                <div class="about-content-sec ">
	                	<?php if(isset($settings['intro_image']['url']) && $settings['intro_image']['url'] != ''){?>
	                    <div class="col-md-6 " >
	                        <img src="<?php echo wp_kses_post($settings['intro_image']['url']); ?>" alt="" class="img-holder-with-shadow"> 
	                    </div>
	                    <?php } ?>
	                    <div class="col-md-6">
	                        <?php if(isset($settings['intro_heading']) && $settings['intro_heading'] != ''){?>
	                        <h4><?php print wp_kses_post($settings['intro_heading']); ?></h4>
	                        <?php } ?>
	                        <?php if(isset($settings['intro_content']) && $settings['intro_content'] != ''){?>
	                        <p><?php print wp_kses_post($settings['intro_content']); ?></p>
	                        <?php } ?>
	                    </div>
	                </div>
	                <div class="main-title ">
						<?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
						<span><?php print wp_kses_post($settings['subheading']); ?></span>
						<?php } ?>
						<?php if(isset($settings['features_heading']) && $settings['features_heading'] != ''){?>
						<h2><?php print wp_kses_post($settings['features_heading']); ?></h2>
						<?php } ?>
					</div>
					<div class="features-contents">
						<?php foreach ( $settings['tabs'] as $item ) : ?>
						<div class="col-md-4" >
							<div class="features-box">
								<?php if(isset($item['icon']) && $item['icon'] != ''){?>
								<div class="features-icon"><i class="<?php print wp_kses_post($item['icon']); ?>"></i></div>
								<?php } ?>
								<div class="features-text">
									<?php if(isset($item['title']) && $item['title'] != ''){?>
									<h3><?php print wp_kses_post($item['title']); ?></h3>
									<?php } ?>
	              					<?php if(isset($item['content']) && $item['content'] != ''){?> 
									<p><?php print wp_kses_post($item['content']); ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php endforeach; ?> 
					</div>
					<?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
					<div class="main-feature-contents-btn-area">
						<a class="button-medium" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
					</div>
					<?php } ?>
	            </div>
	        </div>
	    </section>
	<?php
	}

}