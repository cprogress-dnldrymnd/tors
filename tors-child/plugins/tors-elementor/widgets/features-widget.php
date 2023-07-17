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
class TorsDevFeatures extends \Elementor\Widget_Base {

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
		return 'torsdev-features';
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
		return __( 'Features', 'torsdev-elementor' );
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
		return [ 'features' ];
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
				'label' => esc_html__( 'Features', 'torsdev-elementor' ),
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
		?>
		<!-- Home Features Area Start 
    ====================================================== -->
    <section class="features-area-sec features-area-sec-2">
		<div class="container">
			<div class="main-feature-contents">
				<div class="main-title">
					<?php if ( $settings['show_subheading'] ) : ?>
					<span><?php print wp_kses_post($settings['subheading']); ?></span>
					<?php endif; ?>
					<?php if ( $settings['show_heading'] ) : ?>
					<h2><?php print wp_kses_post($settings['heading']); ?></h2>
					<?php endif; ?>
				</div>
				<div class="features-contents ">
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
    <!-- =================================================
    Home Features Area End -->
	<?php
	}

}