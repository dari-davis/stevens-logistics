<?php

namespace TRANSIDAPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Slider_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_slider_v1';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slider V1', 'transida' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'transida' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'slider_v1',
			[
				'label' => esc_html__( 'Slider V1', 'transida' ),
			]
		);
		$this->add_control(
		  'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Pricing Plan', 'transida')],
						['block_title' => esc_html__('Get A Quote', 'transida')]
					],
				'fields' => 
					[
						[
							'name' => 'icons',
							'label' => esc_html__('Enter The icons', 'transida'),
							'type' => Controls_Manager::SELECT2,
							'options'  => get_fontawesome_icons(),
						],
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'transida'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'transida')
						],
						[
							'name' => 'ext_link',
							'label' => __( 'External Url', 'transida' ),
							'type' => Controls_Manager::URL,
							'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							'show_external' => true,
							'default' => ['url' => '','is_external' => true,'nofollow' => true,],
						],
					],
				'title_field' => '{{block_title}}',
			 ]
		);
		$this->add_control(
			'bg_title',
			[
				'label'       => __( 'BG Transparent Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your BG Transparent Title', 'transida' ),
				'default'     => __( 'Transida', 'transida' ),
			]
		);
		$this->add_control(
              'slide', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('safety & reliable on-time', 'transida')],
                			['title' => esc_html__('make easy distribution', 'transida')],
							['title' => esc_html__('Shipments delivered on time', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'slide_image',
                    			'label' => __( 'Background Slide Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'transida')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>
        
        <!-- Bnner Section -->
        <section class="banner-section" id="home">
            <div class="left-panel">
                <div class="side-menu-nav sidemenu-nav-toggler"><span class="flaticon-interface"></span><?php esc_html_e('More', 'transida'); ?></div>
                <?php foreach($settings['info'] as $item):?>
                <div class="option-box">
                    <a href="<?php echo esc_url( $item['ext_link']['url'] );?>">
                        <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ", "",( $item['icons'] )));?>"></span></div>
                        <h4><?php echo wp_kses( $item['block_title'], true );?></h4>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="background-text">
                <div data-parallax='{"x": 100}'>
                    <div class="text-1"><?php echo wp_kses( $settings['bg_title'], true );?></div>
                    <div class="text-2"><?php echo wp_kses( $settings['bg_title'], true );?></div>
                </div>                
            </div>
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    <?php foreach($settings['slide'] as $key => $item):?>
                    <!-- Slide Item -->
                    <div class="swiper-slide" <?php if($item['slide_image']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['slide_image']['id']));?>);"<?php endif; ?>>
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4><?php echo wp_kses( $item['subtitle'], true );?> </h4>
                                    <h1><?php echo wp_kses( $item['title'], true );?></h1>
                                    <div class="text"><?php echo wp_kses( $item['text'], true );?></div>
                                    <div class="link-box">
                                        <a href="<?php echo esc_url( $item['btn_link']['url'] );?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses( $item['btn_title'], true );?> </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <?php endforeach;?>
                </div>
            </div>
            <div class="banner-slider-nav style-two">
                <div class="banner-slider-control banner-slider-button-prev"><span><i class="far fa-angle-left"></i><?php esc_html_e('Prev', 'transida'); ?></span></div>
                <div class="banner-slider-control banner-slider-button-next"><span><?php esc_html_e('Next', 'transida'); ?><i class="far fa-angle-right"></i></span> </div>
            </div>
        </section>
        <!-- End Bnner Section -->
          
		<?php 
	}

}
