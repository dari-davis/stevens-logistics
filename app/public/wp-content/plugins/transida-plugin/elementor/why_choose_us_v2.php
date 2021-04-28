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
class Why_Choose_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_why_choose_us_v2';
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
		return esc_html__( 'Why Choose Us V2', 'transida' );
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
			'why_choose_us_v2',
			[
				'label' => esc_html__( 'Why Choose Us V2', 'transida' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'transida' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'transida' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Trasparent Pricing', 'transida')],
                			['title1' => esc_html__('On - Time Delivery', 'transida')],
							['title1' => esc_html__('Real Time Tracking', 'transida')],
							['title1' => esc_html__('24/7 Online Support', 'transida')],
							['title1' => esc_html__('Experienced Staff', 'transida')],
							['title1' => esc_html__('Insurance & guarantee', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'transida')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'transida')
                			],
            			],
            	    'title_field' => '{{title1}}',
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
        
        <!-- Whychooseus section two -->
        <section class="whychooseus-section-two">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></div>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                </div>
                <div class="row">
                    <?php foreach($settings['services'] as $key => $item):?>
                    <div class="col-lg-4 whychooseus-block-two">
                        <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                            <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span><i class="fas fa-check"></i></div>
                            <h4><?php echo wp_kses($item['title1'], $allowed_tags);?></h4>
                            <div class="text"><?php echo wp_kses($item['text1'], $allowed_tags);?></div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
              
		<?php 
	}

}
