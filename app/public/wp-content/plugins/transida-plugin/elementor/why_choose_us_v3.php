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
class Why_Choose_Us_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_why_choose_us_v3';
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
		return esc_html__( 'Why Choose Us V3', 'transida' );
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
			'why_choose_us_v3',
			[
				'label' => esc_html__( 'Why Choose Us V3', 'transida' ),
			]
		);
		$this->add_control(
			'bg_image',
				[
				  'label' => __( 'Background Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
							['title1' => esc_html__('24/7 Online Support', 'transida')]
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
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Read More', 'transida')
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
        
        <!-- Whychooseus section four -->
        <section class="whychooseus-section-four" <?php if($settings['bg_image']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"<?php endif; ?>>
            <div class="auto-container">
                <div class="sec-title light text-center">
                    <?php if($settings['subtitle']): ?><div class="sub-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></div><?php endif; ?>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                </div>
                <div class="row">
                    <?php $i = 1; foreach($settings['services'] as $key => $item):?>
                    <div class="col-lg-3 col-md-6 whychooseus-block-four">
                        <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                            <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span><i class="fas fa-check"></i><a href="<?php echo esc_url($item['btn_link']['url']);?>"><i class="fas fa-check"></i><?php echo wp_kses($item['btn_title'], true);?></a></div>
                            <h4><?php echo wp_kses($item['title1'], true);?></h4>
                            <div class="text"><?php echo wp_kses($item['text1'], true);?></div>
                            <div class="count"><?php $i = sprintf('%02d', $i); echo $i; ?></div>
                        </div>
                    </div>
                    <?php $i++; endforeach;?>
                </div>
            </div>
        </section>
             
		<?php 
	}

}
