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
class Funfacts_And_Services extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_funfacts_and_services';
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
		return esc_html__( 'Funfacts and Services', 'transida' );
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
			'funfacts_and_services',
			[
				'label' => esc_html__( 'Funfacts and Services', 'transida' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Branches', 'transida')],
                			['block_title' => esc_html__('Expert &', 'transida')]
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
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Title', 'transida')
                			],
            			],
            	    'title_field' => '{{block_title}}',
                 ]
        );
		$this->end_controls_section();
		
		//Services
		$this->start_controls_section(
            'service',
            [
                'label' => esc_html__( 'Our Service', 'transida' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Maximum Effort', 'transida')],
                			['title' => esc_html__('On - Time Delivery', 'transida')],
							['title' => esc_html__('Superior Service', 'transida')],
							['title' => esc_html__('100 % Gurantee', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon_image',
                    			'label' => __( 'Icon Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'transida')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'transida'),
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
        
        <!-- Whychooseus section three -->
        <section class="whychooseus-section-three">
            <div class="sec-bg-area">
                <div class="sec-bg" <?php if($settings['bg_img']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id']));?>);"<?php endif; ?>></div>
            </div>        
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="wrapper-box">
                            <div class="row">
                                <?php foreach($settings['funfact'] as $item):?>
                                <!--Column-->
                                <div class="column counter-column col-lg-12">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                                            <div>
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span>
                                                </div>
                                                <h4><?php echo wp_kses($item['block_title'], true);?>  </h4>
                                            </div>                            
                                        </div>
                                    </div>
                                </div>
                                <!--Column-->
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="wrapper-box-two">
                            <div class="row">
                                <?php foreach($settings['services'] as $items):?>
                                <div class="col-md-6 whychooseus-block-three">
                                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                                        <?php if($items['icon_image']['id']):?><div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($items['icon_image']['id'] ));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                        <h4><?php echo wp_kses($items['title'], $allowed_tags);?> </h4>
                                        <div class="text"><?php echo wp_kses($items['text1'], $allowed_tags);?></div>
                                        <div class="link"><a href="<?php echo esc_url($items['btn_link']['url']);?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php echo wp_kses($items['btn_title'], true);?></a></div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>
        
		<?php 
	}

}
